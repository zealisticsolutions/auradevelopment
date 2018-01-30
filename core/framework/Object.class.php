<?php
class Object
{
	function _getNextOrder($table, $conditions=array())
	{
		$sql_conditions = "";
		if (count($conditions) > 0)
		{
			foreach ($conditions as $key => $value)
			{
				$sql_conditions .= " AND `$key` = '$value' ";
			}
		}
		$r     = mysql_query("SELECT MAX(`order`) AS `max` FROM `".$table."` WHERE 1=1 $sql_conditions ");
		$row   = mysql_fetch_object($r);
		return ($row->max == 'NULL') ? 1 : $row->max + 1;
	}
	
 	function escapeString($string)
    {
    	if (get_magic_quotes_gpc())
    	{
    		$string = stripslashes($string);
    	}
    	return function_exists('mysql_real_escape_string') ? mysql_real_escape_string($string) : mysql_escape_string($string);
    }
    
    function addLinked($table, $foreignKey, $associationKey, $fk_value, $array)
    {
		if (is_array($array))
		{
			$arr = array();
		    foreach($array as $v)
		    {
		    	if (!empty($v))
		    	{
			    	$arr[] = "('$fk_value', '$v')";
		    	}
		    }
		    if (count($arr) > 0)
			{
				$values = join(",", $arr);
		    	if (!mysql_query("INSERT INTO `$table`(`$foreignKey`, `$associationKey`) VALUES $values;"))
		    	{
		    		return false;
		    	}
		    	return true;
			}
		}
		return false;
    }
    
	function getLinked($table, $foreignKey, $associationKey, $fk_value)
	{
		$arr = array();
		$r = mysql_query("SELECT `$associationKey` FROM `$table` WHERE `$foreignKey` = '$fk_value'") or die(mysql_error());
		if(mysql_num_rows($r) > 0)
		{
			while($row = mysql_fetch_object($r))
			{
				$arr[] = $row->$associationKey;
			}
		}
		return $arr;
	}
	
    function deleteAllLinked($table, $foreignKey, $value)
    {
		//$value = intval($value);
		mysql_query("DELETE FROM `$table` WHERE `$foreignKey` = '$value'") or die(mysql_error());
    }
    
	function showColumns($table, $database = null)
    {
    	$arr = array();
    	
    	$database = (!is_null($database)) ? " FROM `$database`" : null;
		$r = mysql_query("SHOW COLUMNS FROM `".$table."` $database") or die(mysql_error());
		if (mysql_num_rows($r) > 0)
		{
			$i = 0;
			while ($row = mysql_fetch_object($r))
			{
				$arr[$i]['field']   = $row->Field;
				$arr[$i]['type']    = $row->Type;
				$arr[$i]['null']    = $row->Null;
				$arr[$i]['key']     = $row->Key;
				$arr[$i]['default'] = $row->Default;
				$arr[$i]['extra']   = $row->Extra;
				$i++;
			}
		}
    	return $arr;
    }
    
	function import($type, $name)
	{
		$type = strtolower($type);
		if (!in_array($type, array('model', 'component')))
		{
			return false;
		}
		
		switch ($type)
		{
			case 'model':
				if (is_array($name))
				{
					foreach ($name as $n)
					{
						require_once MODELS_PATH . $n . '.model.php';
					}
				} else {
					require_once MODELS_PATH . $name . '.model.php';
				}
				break;
			case 'component':
				if (is_array($name))
				{
					foreach ($name as $n)
					{
						require_once COMPONENTS_PATH . $n . '.component.php';
					}
				} else {
					require_once COMPONENTS_PATH . $name . '.component.php';
				}
				break;
		}
		return;
	}
}
?>