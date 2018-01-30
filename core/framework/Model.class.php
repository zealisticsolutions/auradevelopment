<?php
require_once FRAMEWORK_PATH . 'Object.class.php';
class Model extends Object
{
	var $debug = false;
	
	var $transactionStarted = false;
	
	var $schema = array();
	
	var $primaryKey = null;
	
	var $table = null;
	
	var $prefix = null;
	
	var $joins = array();
	
	var $subqueries = array();

	var $comparisonTypes = array('=', '!=', '<>', '>', '<', '>=', '<=', '<=>', 'IS', 'IS NOT', 'IS NULL', 'IS NOT NULL', 'IN', 'NOT IN', 'ISNULL', 'LIKE', 'BETWEEN');
	
	var $joinTypes = array('left', 'inner', 'cross', 'right', 'natural', 'straight');
	// this members are added to to Multiple joins
	var $result = array(); // Any results from a query will be stored here
    var $myQuery = "";    // used for debugging process with SQL return
    var $numResults = "";  // used for returning the number of rows
	//-----------------------------------------------------------------------------
/**
 * Constructor
 */
	function Model()
	{
		if (defined('DEFAULT_PREFIX'))
		{
			$this->prefix = DEFAULT_PREFIX;
		}
	}
	
	function getTable()
	{
		return $this->prefix . $this->table;
	}
	
	function begin()
	{
		if (!$this->transactionStarted && mysql_query("START TRANSACTION"))
		{
			$this->transactionStarted = true;
			return true;
		}
		return false;
	}
	
	function commit()
	{
		if ($this->transactionStarted && mysql_query("COMMIT"))
		{
			$this->transactionStarted = false;
			return true;
		}
		return false;
	}
	
	function rollback()
	{
		if ($this->transactionStarted && mysql_query("ROLLBACK"))
		{
			$this->transactionStarted = false;
			return true;
		}
		return false;
	}
	
	function rollbackToSavepoint($identifier)
	{
		if ($this->transactionStarted && mysql_query("ROLLBACK TO SAVEPOINT " . $identifier))
		{
			return true;
		}
		return false;
	}
	
	function releaseSavepoint($identifier)
	{
		if ($this->transactionStarted && mysql_query("RELEASE SAVEPOINT " . $identifier))
		{
			return true;
		}
		return false;
	}
	
	function savepoint($identifier)
	{
		if ($this->transactionStarted && mysql_query("SAVEPOINT " . $identifier))
		{
			return true;
		}
		return false;
	}
	
	function autocommit($value = 0)
	{
		if (!in_array($value, array(0,1))) return false;
		if (!$this->transactionStarted && mysql_query("SET autocommit = " . $value))
		{
			$this->transactionStarted = true;
			return true;
		}
		return false;
	}
	
	function get($id)
	{
		$a_arr = array();
		$arr = array();
		$id = $this->escape($id, $this->primaryKey);
		
		$j = $this->buildJoins($a_arr);
	    $sql_join = $j['join'];
	    $sql_join_fields = $j['fields'];
		
	    # TODO add support of sub queries
	    
	    $query = "SELECT `t1`.* $sql_join_fields FROM `".$this->getTable()."` AS `t1` $sql_join WHERE `t1`.`$this->primaryKey` = '$id' LIMIT 1";
	    if ($this->debug) echo '<pre>'.$query.'</pre>';
		$r = mysql_query($query);
		if (mysql_num_rows($r) == 1)
		{
			$row = mysql_fetch_object($r);
			$f = $this->showColumns($this->getTable());
			for($j = 0; $j < count($f); $j++)
			{
				$arr[$f[$j]['field']] = $row->$f[$j]['field'];
			}
			if (count($a_arr) > 0)
			{
				foreach ($a_arr as $v)
				{
					$arr[$v] = $row->$v;
				}
			}
		}
		return $arr;
	}
	
	function buildJoins(&$a_arr)
	{
		$sql_join = null;
	    $sql_join_fields = null;
    	if (count($this->joins) > 0)
    	{
    		foreach ($this->joins as $j)
    		{
    			list($_joins, $_fields) = explode("|", $j);
    			$sql_join[] = $_joins;
    			$sql_join_fields[] = $_fields;
    			
    			$farr = explode(",", $_fields);
    			foreach ($farr as $_el)
    			{
    				$d = explode(".", $_el);
    				$a_arr[] = $d[1];
    			}
    		}
    		if (count($sql_join_fields) > 0)
    		{
    			$sql_join_fields = ", " . join(", ", $sql_join_fields);
    		}
    		
    		if (count($sql_join) > 0)
    		{
    			$sql_join = join(" ", $sql_join);
    		}
    	}
    	return array('fields' => $sql_join_fields, 'join' => $sql_join);
	}
	
	function getAll($options=array())
	{
		$a_arr = array();
		$opts = $this->buildOpts($options);
		$sql_conditions = $opts['conditions'];
		
		$sql_limit = NULL;
		if (array_key_exists('offset', $options) && array_key_exists('row_count', $options))
		{
			$sql_limit = "LIMIT " . intval($options['offset']) . ", " . intval($options['row_count']);
		}
		
		if (!empty($options['col_name']) && !empty($options['direction']) && in_array(strtoupper($options['direction']), array('ASC', 'DESC')))
		{
			$sql_order = " ORDER BY ".$options['col_name']." " . strtoupper($options['direction']);
		} else {
			$sql_order = " ORDER BY `t1`.`id` DESC";
		}
		
	    $j = $this->buildJoins($a_arr);
	    $sql_join = $j['join'];
	    $sql_join_fields = $j['fields'];
    	
		$sql_subquery = null;
    	if (count($this->subqueries) > 0)
    	{
    		foreach ($this->subqueries as $v)
    		{
    			$sql_subquery .= ", (" . $v['query'] . ") AS `" . $v['alias'] . "`";
    			$a_arr[] = $v['alias'];
    		}
    	}
		
		$arr = array();
		 $query = "SELECT `t1`.*
					$sql_join_fields
					$sql_subquery
					FROM `".$this->getTable()."` AS `t1`
					$sql_join
					WHERE 1=1 $sql_conditions
					$sql_order
					$sql_limit
					";
		if ($this->debug) echo '<pre>'.$query.'</pre>';
		
		$r = mysql_query($query) or die(mysql_error());
		if (mysql_num_rows($r) > 0)
		{
			$i = 0;
			$f = $this->showColumns($this->getTable());
			for($j = 0; $j < count($f); $j++)
			{
				$a_arr[] = $f[$j]['field'];
			}
			while ($row = mysql_fetch_object($r))
			{
				if (count($a_arr) > 0)
				{
					foreach ($a_arr as $v)
					{
						$arr[$i][$v] = $row->$v;
					}
				}
				$i++;
			}
		}
		return $arr;
	}
	
	function getCount($options=array())
	{
		$opts = $this->buildOpts($options);
		$sql_conditions = $opts['conditions'];

		$query = "SELECT COUNT(*) AS `count` FROM `".$this->getTable()."` AS `t1` WHERE 1=1 $sql_conditions LIMIT 1";
		if ($this->debug) echo '<pre>'.$query.'</pre>';
		$r = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_object($r);
		return $row->count;
	}
	
	function buildOpts($options)
	{
		$keywords = array('col_name', 'direction', 'row_count', 'offset');
		
		$defaults = array();
		$_arr = array();
		foreach ($this->schema as $field)
		{
			$defaults[$field['name']] = NULL;
			foreach ($options as $ok => $ov)
			{
				if (strpos($ok, $field['name']) !== false && !in_array($ok, $keywords))
				{
					$_arr[$ok] = $ov;
				}
			}
		}
		$opts = array_merge($defaults, $_arr);
		$sql_conditions = NULL;
		foreach ($opts as $key => $value)
		{
			if (is_array($value) && count($value) == 3)
			{
				# indexes: [0] - value, [1] - operator, [2] - type
				if (!in_array($value[1], $this->comparisonTypes)) return false;
				
				$sql_conditions .= " AND $key " . $value[1] ." ". $this->escape($value[0], null, $value[2]);
			} else {
				if (!empty($value))
				{
					$sql_conditions .= " AND $key = '" . $this->escape($value, $key) . "'";
				}
			}
		}
		return array('conditions' => $sql_conditions);
	}
	
	function save($data)
	{
		$save = array();
		
		
		foreach ($this->schema as $field)
		{
			if (isset($data[$field['name']]))
			{
				$save[] = "`".$field['name']."` = '" . $this->escape($data[$field['name']], null, $field['type']) . "'";
			} else {
				$save[] = "`".$field['name']."` = " . (strpos($field['default'], ":") === 0 ? substr($field['default'], 1) : "'".$this->escape($field['default'], null, $field['type'])."'");
			}
		}
		if (count($save) > 0)
		{
			mysql_query("INSERT IGNORE INTO `".$this->getTable()."` SET " . join(",", $save)) or die(mysql_error());
			if (mysql_affected_rows() == 1)
			{
				return mysql_insert_id();
			}
		}
		return false;
	}
	
	function update($data)
	{
		$update = array();
		
		foreach ($this->schema as $field)
		{
			if (isset($data[$field['name']]))
			{
				if (!is_array($data[$field['name']]))
				{
					$update[] = "`".$field['name']."` = '" . $this->escape($data[$field['name']], null, $field['type']) . "'";
				} else {
					# Indexes: 0 - value,... @TODO
					$update[] = "`".$field['name']."` = " . $data[$field['name']][0];
				}
			}
		}
		if (count($update) > 0)
		{
		 	mysql_query("UPDATE `".$this->getTable()."`
				SET " . join(",", $update) . "
				WHERE `".$this->primaryKey."` = '".$data[$this->primaryKey]."'
				LIMIT 1
			") or die(mysql_error());
			if (mysql_affected_rows() == 1)
			{
				return true;
			}
		}
		return false;
	}
	
	function delete($id)
	{
		$id = $this->escape($id, $this->primaryKey);
		mysql_query("DELETE FROM `".$this->getTable()."` WHERE 1=1 AND `".$this->primaryKey."` = '$id' LIMIT 1") or die(mysql_error());
		return mysql_affected_rows();
	}
	
	function getColumnType($column)
	{
		foreach ($this->schema as $col)
		{
			if ($col['name'] == $column)
			{
				return $col['type'];
			}
		}
		return false;
	}
	
	function escape($value, $column=null, $type=null)
	{
		if (is_null($type) && !is_null($column))
		{
			$type = $this->getColumnType($column);
		}
		
		switch ($type)
		{
			case 'null':
				return $value;
				break;
			case 'int':
			case 'smallint':
			case 'tinyint':
			case 'mediumint':
			case 'bigint':
				return intval($value);
				break;
			case 'float':
			case 'decimal':
			case 'double':
			case 'real':
				return floatval($value);
				break;
			case 'string':
			case 'varchar':
			case 'enum':
			case 'set':
			case 'char':
			case 'text':
			case 'tinytext':
			case 'mediumtext':
			case 'longtext':
			case 'date':
			case 'datetime':
			case 'year':
			case 'time':
			case 'timestamp':
			default:
				return $this->escapeString($value);
				break;
		}
	}

	function addJoin(&$member, $table, $alias, $clauses=array(), $fields = array(), $type='left')
	{
		if (in_array($type, $this->joinTypes))
		{
			$type_join = ($type !== 'straight') ? strtoupper($type) : strtoupper($type) . "_JOIN";
			if (in_array($type, array('left', 'right')))
			{
				$type_join .= " OUTER";
			}
			$join_str  = ($type !== 'straight') ? 'JOIN' : null;
			 
		} else {
			return false;
		}
		if (count($clauses) > 0)
		{
			$clauses_arr = array();
			foreach ($clauses as $k => $v)
			{
				$key = (strpos($k, ".") !== false) ? explode(".", $k) : $k;
				$val = (strpos($v, ".") !== false) ? explode(".", $v) : $v;
				
				$l_clause = (is_array($key)) ? "`" . join("`.`", $key) . "`" : $key;
				$r_clause = (is_array($val)) ? "`" . join("`.`", $val) . "`" : $val;
				
				# TODO support of <, >, <=, >=, etc.
				$clauses_arr[] = "$l_clause = $r_clause";
				//$clauses_arr[] = "$k = $v";
			}
			# TODO support of OR, XOR, etc.
			$clauses_str = join(" AND ", $clauses_arr);
		} else {
			return false;
		}
		
		$member[] = $type_join . " " . $join_str . " `" .$table . "` AS `" . $alias . "` ON " . $clauses_str . "|" . join(",", $fields);
		$member = array_unique($member);
	}

	function addSubQuery(&$member, $query, $alias)
	{
		$member[] = array('query' => $query, 'alias' => $alias);
		//FIXME Remove duplicates. Below didn't work as I expect!
		//$member = array_unique($member);
	}
	
	// this function Developed for Multiple joins
	function MultipleJoins($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null)
	{
		// Create query from the variables passed to the function
		$q = 'SELECT '.$rows.' FROM '.$table;
		if($join != null){
			$q .= ' JOIN '.$join;
		}
        if($where != null){
        	$q .= ' WHERE '.$where;
		}
        if($order != null){
            $q .= ' ORDER BY '.$order;
		}
        if($limit != null){
            $q .= ' LIMIT '.$limit;
        }
 $this->myQuery = $q; // Pass back the SQL
		// Check to see if the table exists
       
        	// The table exists, run the query
        	$query = @mysql_query($q);
			if($query){
				// If the query returns >= 1 assign the number of rows to numResults
				$this->numResults = mysql_num_rows($query);
				// Loop through the query results by the number of rows returned
				for($i = 0; $i < $this->numResults; $i++){
					$r = mysql_fetch_array($query);
                	$key = array_keys($r);
                	for($x = 0; $x < count($key); $x++){
                		// Sanitizes keys so only alphavalues are allowed
                    	if(!is_int($key[$x])){
                    		if(mysql_num_rows($query) >= 1){
                    			$this->result[$i][$key[$x]] = $r[$key[$x]];
							}else{
								$this->result = null;
							}
						}
					}
				}
				//return true; // Query was successful
				return $this->result;
			}else{
				array_push($this->result,mysql_error());
				return false; // No rows where returned
			}
      	
    }
}
?>
