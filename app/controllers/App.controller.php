<?php
require_once FRAMEWORK_PATH . 'Controller.class.php';
class AppController extends Controller
{
	function deletePicture()
	{
		$this->isAjax = true;
		
		if ($this->isXHR())
		{
			Object::import('Model', 'Gallery');
			$GalleryModel = new GalleryModel();
			
			if ($this->isDemo())
			{
				$_GET['err'] = 7;
				$this->tpl['gallery_arr'] = $GalleryModel->getAll(array('foreign_id' => $_POST['foreign_id']));
				return;
			}
			
			$arr = $GalleryModel->get($_POST['id']);
			
			if (1 == $GalleryModel->delete($_POST['id']))
			{
				clearstatcache();
				if (is_file(ROOT_PATH . $arr['small_path']))
				{
					unlink(ROOT_PATH . $arr['small_path']);
				}
				
				clearstatcache();
				if (is_file(ROOT_PATH . $arr['medium_path']))
				{
					unlink(ROOT_PATH . $arr['medium_path']);
				}
				
				clearstatcache();
				if (is_file(ROOT_PATH . $arr['large_path']))
				{
					unlink(ROOT_PATH . $arr['large_path']);
				}
			}
			
			$this->tpl['gallery_arr'] = $GalleryModel->getAll(array('foreign_id' => $_POST['foreign_id']));
		}
	}
	
	function friendlyURL($str, $divider='-')
	{
		$str = mb_strtolower($str, mb_detect_encoding($str)); // change everything to lowercase
	    $str = trim($str); // trim leading and trailing spaces
	    $str = preg_replace('/[_|\s]+/', $divider, $str); // change all spaces and underscores to a hyphen
	    $str = preg_replace('/\x{00C5}/u', 'AA', $str);
	    $str = preg_replace('/\x{00C6}/u', 'AE', $str);
	    $str = preg_replace('/\x{00D8}/u', 'OE', $str);
	    $str = preg_replace('/\x{00E5}/u', 'aa', $str);
	    $str = preg_replace('/\x{00E6}/u', 'ae', $str);
	    $str = preg_replace('/\x{00F8}/u', 'oe', $str);
	    $str = preg_replace('/[^a-z\x{0400}-\x{04FF}0-9-]+/u', '', $str); // remove all non-cyrillic, non-numeric characters except the hyphen
	    $str = preg_replace('/[-]+/', $divider, $str); // replace multiple instances of the hyphen with a single instance
	    $str = preg_replace('/^-+|-+$/', '', $str); // trim leading and trailing hyphens
		return $str;
	}
	
	function setPicture()
	{
		$this->isAjax = true;
		
		if ($this->isXHR())
		{
			Object::import('Model', 'Gallery');
			$GalleryModel = new GalleryModel();
			
			if ($this->isDemo())
			{
				$_GET['err'] = 7;
				$this->tpl['gallery_arr'] = $GalleryModel->getAll(array('foreign_id' => $_POST['foreign_id']));
				return;
			}
			
			$arr = $GalleryModel->get($_POST['id']);

			if (count($arr) > 0)
			{
				switch ($arr['status'])
				{
					case 'T':
						$sql_status = 'F';
						break;
					case 'F':
						$sql_status = 'T';
						break;
				}

				$GalleryModel->update(array('status' => $sql_status, 'id' => $_POST['id']));
			}
			
			$this->tpl['gallery_arr'] = $GalleryModel->getAll(array('foreign_id' => $_POST['foreign_id']));
		}
	}
	
	function upload($global_files, $post_title, $id, $t_path, $filename)
	{
		if (count($global_files) > 0)
		{
			Object::import('Component', 'upload');
			Object::import('Model', 'Gallery');
			$GalleryModel = new GalleryModel();
			
			$files = array();
		    foreach ($global_files as $k => $l)
		    {
		        foreach ($l as $i => $v)
		        {
		            if (!array_key_exists($i, $files))
		            {
		                $files[$i] = array();
		            }
		            $files[$i][$k] = $v;
		        }
		    }
		    $_f = array();
		    
			foreach ($files as $key => $file)
		    {
		    	if (empty($file['tmp_name'])) continue;
		    	$isConvertPossible = $this->isConvertPossible($file['tmp_name']);
		    	if (!$isConvertPossible['ok'])
		    	{
		    		$_f[$key] = array('name' => $file['name'], 'ok' => false, 'code' => 1, 'params' => $isConvertPossible);
		    		continue;
		    	}
		    	
		    	$d = array();
	        	$handle = new upload($file);
				if ($handle->uploaded)
				{
					# SMALL
					$handle->allowed = array('image/*');
	        		$handle->mime_check = true;
					$handle->file_new_name_body = $id . "_" . $filename;
					$handle->image_convert = 'jpg';
					$handle->jpeg_quality = 100;
					$handle->image_resize = true;
					$handle->image_x = 116;
					$handle->image_y = 76;
					$handle->image_ratio_y = false;
					$handle->image_ratio_crop = true;
					$handle->process(UPLOAD_PATH . $t_path . 'small/');
					if ($handle->processed)
					{
						$d['small_path'] = str_replace('\\', '/', $handle->file_dst_pathname);
						$d['small_path'] = preg_replace('/\/+/', '/', $d['small_path']);
					} else {
						//echo 'error : ' . $handle->error;
					}
				
					# MEDIUM
					$handle->allowed = array('image/*');
	        		$handle->mime_check = true;
					$handle->file_new_name_body = $id . "_" . $filename;
					$handle->image_convert = 'jpg';
					$handle->jpeg_quality = 100;
					$handle->image_resize = true;
					$handle->image_x = 400;
					$handle->image_y = 300;
					$handle->image_ratio_y = true;
					$handle->process(UPLOAD_PATH . $t_path . 'medium/');
					if ($handle->processed)
					{
						$d['medium_path'] = str_replace('\\', '/', $handle->file_dst_pathname);
						$d['medium_path'] = preg_replace('/\/+/', '/', $d['medium_path']);
					} else {
						//echo 'error : ' . $handle->error;
					}
					
					# LARGE (only upload)
					$handle->allowed = array('image/*');
	        		$handle->mime_check = true;
					$handle->file_new_name_body = $id . "_" . $filename;
					$handle->image_convert = 'jpg';
					$handle->jpeg_quality = 100;
					$handle->image_resize = false;
					$handle->process(UPLOAD_PATH . $t_path . 'large/');
					if ($handle->processed)
					{
						$d['large_path'] = str_replace('\\', '/', $handle->file_dst_pathname);
						$d['large_path'] = preg_replace('/\/+/', '/', $d['large_path']);
					} else {
						//echo 'error : ' . $handle->error;
					}
					
					if (empty($handle->error))
					{
						$d['mime_type'] = $handle->file_src_mime;
						$d['name'] = $handle->file_src_name;
						$d['foreign_id'] = $id;
						$d['title'] = $post_title[$key];
						$insert_id = $GalleryModel->save($d);
						$_f[$key] = array('name' => $file['name'], 'ok' => ($insert_id !== false && (int) $insert_id > 0 ? true : false));
					}
				}
			}
			return $_f;
		}
		return false;
	}
	
	function isConvertPossible($tmp_name)
	{
		$can_convert = true;
		if (function_exists('memory_get_usage') && ini_get('memory_limit'))
		{
			$imageInfo = getimagesize($tmp_name);
			$MB = 1048576;
			$K64 = 65536;
			$TWEAKFACTOR = 1.6;
			$memoryNeeded = round(($imageInfo[0] * $imageInfo[1] * $imageInfo['bits'] * $imageInfo['channels'] / 8 + $K64) * $TWEAKFACTOR);
			$memoryNeeded = memory_get_usage() + $memoryNeeded;
			$memory_limit = ini_get('memory_limit');
			if ($memory_limit != '')
			{
				$memory_limit = substr($memory_limit, 0, -1) * 1024 * 1024;
			}
			if ($memoryNeeded > $memory_limit)
			{
				$memoryNeeded = round($memoryNeeded / 1024 / 1024, 2);
				$can_convert = false;
			}
		}
		return array('ok' => $can_convert, 'memory_needed' => $memoryNeeded, 'memory_limit' => $memory_limit);
	}
}
?>