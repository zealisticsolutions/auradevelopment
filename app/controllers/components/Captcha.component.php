<?php
class Captcha
{
	var $font = null;
	var $fontSize = 12;
	var $height = 35;
	var $image = null;
	var $length = null;
	var $sessionVariable = null;
	var $width = 79;	
/**
 * 
 * Constructor
 */
	function Captcha($fontPath, $sessionVariable, $length = 4)
	{
		$this->font = $fontPath;
		$this->sessionVariable = $sessionVariable;
		$this->length = intval($length);
	}
	
	function init($renew=null)
	{
    	if (!is_null($renew))
    	{
    		$_SESSION[$this->sessionVariable] = NULL;
    	}

		if (empty($_SESSION[$this->sessionVariable]))
		{
			$str = "";
			$length = 0;
			for ($i = 0; $i < $this->length; $i++)
			{
				//this numbers refer to numbers of the ascii table (small-caps)
				// 97 - 122 (small-caps)
				// 65 - 90 (all-caps)
				// 48 - 57 (digits 0-9)
				$str .= chr(rand(65, 90));
			}
			$_SESSION[$this->sessionVariable] = $str;
			$rand_code = $_SESSION[$this->sessionVariable];
		} else {
			$rand_code = $_SESSION[$this->sessionVariable];
		}

		if (!is_null($this->image))
		{
			$image = imagecreatefrompng($this->image);
		} else {
			$image = imagecreatetruecolor($this->width, $this->height);
			
			$backgr_col = imagecolorallocate($image, 204, 204, 204);
			$border_col = imagecolorallocate($image, 153, 153, 153);
			
			imagefilledrectangle($image, 0, 0, $this->width, $this->height, $backgr_col);
			imagerectangle($image, 0, 0, $this->width - 1, $this->height - 1, $border_col);
		}
		
		$text_col = imagecolorallocate($image, 68, 68, 68);		

		$angle = rand(-10, 10);
		$box = imagettfbbox($this->fontSize, $angle, $this->font, $rand_code);
		$x = (int)($this->width - $box[4]) / 2;
		$y = (int)($this->height - $box[5]) / 2;
		imagettftext($image, $this->fontSize, $angle, $x, $y, $text_col, $this->font, $rand_code);
		
		header("Content-type: image/png");
		imagepng($image);
		imagedestroy ($image);
	}
	
	function setFont($fontPath)
	{
		$this->font = $fontPath;
	}
	
	function setLength($length)
	{
		if ((int) $length > 0)
		{
			$this->length = intval($length);
		}
	}
	
	function setSessionVariable($sessionVariable)
	{
		$this->sessionVariable = $sessionVariable;
	}
	
	function setHeight($height)
	{
		if ((int) $height > 0)
		{
			$this->height = intval($height);
		}
	}
	
	function setWidth($width)
	{
		if ((int) $width > 0)
		{
			$this->width = intval($width);
		}
	}

	function setFontSize($fontSize)
	{
		if ((int) $fontSize > 0)
		{
			$this->fontSize = intval($fontSize);
		}
	}

	function setImage($image)
	{
		$this->image = $image;
	}
}
?>