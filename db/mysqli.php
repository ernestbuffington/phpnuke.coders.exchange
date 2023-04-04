<?php
/***************************************************************************
 *                                 mysqli.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: mysqli.php,v 1.16 2006/11/02 20:04:36 Revolution Exp $
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

if(!defined("SQL_LAYER"))
{

  if(!defined('SQL_LAYER')){
    define("SQL_LAYER","mysqli");
  }
  if(!defined('MYSQL_NUM')){
    define("SQL_NUM", "MYSQL_NUM");
  }
  if(!defined('MYSQL_BOTH')){
    define("SQL_BOTH", "MYSQL_BOTH");
  }
  if(!defined('MYSQL_ASSOC')){
    define("SQL_ASSOC", "MYSQL_ASSOC");
  }
  if(!defined('END_TRANSACTION')){
    define('END_TRANSACTION', "2");
  }

class sql_db
{
	public $mysql_version;
	public $db_connect_id;
	public $query_result;
	public $row = [];
	public $rowset = [];
	public $num_queries = 0;
    public $time;
    public $debug = 0;
    public $saved = '';
    public $connect_id;
	public $querylist = [];
	public $file;
	public $line;
	public $qtime;
	//public $persistency;
	//public $user;
	public $password;
	//public $server;
	//public $dbname;
##########################################
	public $return_on_error = false;
	public $transaction = false;
	public $sql_time = 0;
	//public $num_queries = []; <- this was wrong in phpbb3
	public $open_queries = [];

	public $curtime = 0;
	public $query_hold = '';
	public $html_hold = '';
	public $sql_report = '';

	public $persistency = false;
	public $user = '';
	public $server = '';
	public $dbname = '';

	// Set to true if error triggered
	public $sql_error_triggered = false;

	// Holding the last sql query on sql error
	public $sql_error_sql = '';
	// Holding the error information - only populated if sql_error_triggered is set
	public $sql_error_returned = [];

	// Holding transaction count
	public $transactions = 0;

	// Supports multi inserts?
	public $multi_insert = false;

	/**
	* Current sql layer
	*/
	public $sql_layer = SQL_LAYER;

	/**
	* Wildcards for matching any (%) or exactly one (_) character within LIKE expressions
	*/
	public $any_char;
	public $one_char;

	/**
	* Exact version of the DBAL, directly queried
	*/
	public $sql_server_version = false;

	function _backtrace_log($query, $failed=false, $queryid=0)
	{
		global $debug;
		if (!is_bool($debug) && $debug == 'full') {
			$this->_backtrace();
			if ($failed) {
				$this->querylist[$this->file][] = '<span style="color: #FF0000; font-weight: bold;">FAILED LINE '.$this->line.':</span> '.htmlspecialchars($query);
			} else {
    			$this->querylist[$this->file][(int)$this->num_queries] = '<span style="font-weight: bold;">LINE '.$this->line.':</span> '.htmlspecialchars($query);
    			if (isset($this->qtime[(int)$this->num_queries])) {
        			$time = (isset($this->qtime[(int)$this->num_queries])) ? ' QTIME:'.substr($this->qtime[(int)$this->num_queries],0,5) : '';
        			$this->querylist[$this->file][(int)$this->num_queries] .= $time;
    			}
			}
		}
	}

	function _backtrace()
	{
		$this->file = 'unknown';
		$this->line = 0;
		if (version_compare(phpversion(), '4.3.0', '>=')) {
			$tmp = debug_backtrace();
			for ($i=0; $i<count($tmp); ++$i) {
				if (!preg_match('#[\\\/]{1}includes[\\\/]{1}db[\\\/]{1}[a-z_]+.php$#', $tmp[$i]['file'])) {
					$this->file = $tmp[$i]['file'];
					$this->line = $tmp[$i]['line'];
					break;
				}
			}
		}
	}

	# Constructor
	function __construct($sqlserver, $sqluser, $sqlpassword, $database, $persistency = true)
	{
		
		$this->num_queries = array(
			'cached'		=> 0,
			'normal'		=> 0,
			'total'			=> 0,
		);
		
		if(!isset($new_link)) {
		 $new_link = false;
		}
	
		$this->persistency = $persistency;
		$this->user = $sqluser;
		$this->password = $sqlpassword;
		$this->server = $sqlserver;
		$this->dbname = $database;
		//$newURL = 'install';
        
		// Fill default sql layer based on the class being called.
		// This can be changed by the specified layer itself later if needed.
		$this->sql_layer = substr(get_class($this), 5);
				
		// Do not change this please! This variable is used to easy the use of it - and is hardcoded.
		$this->any_char = chr(0) . '%';
		$this->one_char = chr(0) . '_';
	
		
		//if($sqlpasswordz == ''):
		// header("Location: $newURL");
         //die();
		//endif;

		if ($this->dbname != '') {
			//$this->db_connect_id = mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			 $this->db_connect_id = mysqli_connect($this->server, $this->user, $this->password, $this->dbname);
                
				# Determine what version we are using and if it natively supports UNICODE
				$this->mysql_version = mysqli_get_server_info($this->db_connect_id);

				# not sure why this was removed i see no explanation, Thanks Dick!
				if (version_compare($this->mysql_version, '4.1.3', '>='))
				{
				//	mysqli_query("SET NAMES 'utf8'", $this->db_connect_id);
				//	mysqli_query("SET CHARACTER SET 'utf8'", $this->db_connect_id);
				}

				$this->connect_id = $this->db_connect_id;

				return $this->db_connect_id;
		}

		return false;
	}

   /** phpbb 3
	* Version information about used database
	* @param bool $raw if true, only return the fetched sql_server_version
	* @return string sql server version
	*/
	function sql_server_info($raw = false)
	{
		global $cache;

		if (empty($cache) || ($this->sql_server_version = $cache->get('mysqli_version')) === false)
		{
			$result = mysqli_query($this->db_connect_id, 'SELECT VERSION() AS version');
			$row = mysqli_fetch_assoc($result);
			mysqli_free_result($result);

			$this->sql_server_version = $row['version'];

			if (!empty($cache))
			{
				$cache->put('mysqli_version', $this->sql_server_version);
			}
		}

		return ($raw) ? $this->sql_server_version : 'MySQL(i) ' . $this->sql_server_version;
	}
	
	/** phpbb3
	* SQL Transaction
	* @access private
	*/
	function _sql_transaction($status = 'begin')
	{
		switch ($status)
		{
			case 'begin':
				return mysqli_autocommit($this->db_connect_id, false);
			break;

			case 'commit':
				$result = mysqli_commit($this->db_connect_id);
				mysqli_autocommit($this->db_connect_id, true);
				return $result;
			break;

			case 'rollback':
				$result = mysqli_rollback($this->db_connect_id);
				mysqli_autocommit($this->db_connect_id, true);
				return $result;
			break;
		}

		return true;
	}
		
   /** phpbb3
	* return on error or display error message
	*/
	function sql_return_on_error($fail = false)
	{
		$this->sql_error_triggered = false;
		$this->sql_error_sql = '';

		$this->return_on_error = $fail;
	}

	/** phpbb3
	* Return number of sql queries and cached sql queries used
	*/
	function sql_num_queries($cached = false)
	{
		return ($cached) ? $this->num_queries['cached'] : $this->num_queries['normal'];
	}

	/** phpbb3
	* Add to query count
	*/
	function sql_add_num_queries($cached = false)
	{
		$this->num_queries['cached'] += ($cached !== false) ? 1 : 0;
		$this->num_queries['normal'] += ($cached !== false) ? 0 : 1;
		$this->num_queries['total'] += 1;
	}
		
	# phpbb3 re-write Other base methods
	function sql_close()
	{
		if($this->db_connect_id)
		{
           if ($this->transaction)
		   {
			  do
			  {
				$this->sql_transaction('commit');
			  }
			  while ($this->transaction);
		   }

		  foreach ($this->open_queries as $query_id)
		  {
			$this->sql_freeresult($query_id);
		  }

		  // Connection closed correctly. Set db_connect_id to false to prevent errors
		  if ($result = $this->_sql_close())
		  {
			$this->db_connect_id = false;
		  }
		  return $result;
		
		}
		else
		{
			return false;
		}
	}

	/** phpbb3
	* Build LIMIT query
	* Doing some validation here.
	*/
	function sql_query_limit($query, $total, $offset = 0, $cache_ttl = 0)
	{
		if (empty($query))
		{
			return false;
		}

		// Never use a negative total or offset
		$total = ($total < 0) ? 0 : $total;
		$offset = ($offset < 0) ? 0 : $offset;

		return $this->_sql_query_limit($query, $total, $offset, $cache_ttl);
	}

	/** phpbb3
	* Fetch field
	* if rownum is false, the current row is used, else it is pointing to the row (zero-based)
	*/
	function sql_fetchfield($field, $rownum = false, $query_id = false)
	{
		global $cache;

		if ($query_id === false)
		{
			$query_id = $this->query_result;
		}

		if ($query_id !== false)
		{
			if ($rownum !== false)
			{
				$this->sql_rowseek($rownum, $query_id);
			}

			if (!is_object($query_id) && isset($cache->sql_rowset[$query_id]))
			{
				return $cache->sql_fetchfield($query_id, $field);
			}

			$row = $this->sql_fetchrow($query_id);
			return $row[$field] ?? false;
		}

		return false;
	}

	/** phpbb3
	* Correctly adjust LIKE expression for special characters
	* Some DBMS are handling them in a different way
	*
	* @param string $expression The expression to use. Every wildcard is escaped, except $this->any_char and $this->one_char
	* @return string LIKE expression including the keyword!
	*/
	function sql_like_expression($expression)
	{
		$expression = str_replace(array('_', '%'), array("\_", "\%"), $expression);
		$expression = str_replace(array(chr(0) . "\_", chr(0) . "\%"), array('_', '%'), $expression);

		return $this->_sql_like_expression('LIKE \'' . $this->sql_escape($expression) . '\'');
	}

	/** phpbb3
	* SQL Transaction
	* @access private
	*/
	function sql_transaction($status = 'begin')
	{
		switch ($status)
		{
			case 'begin':
				// If we are within a transaction we will not open another one, but enclose the current one to not loose data (prevening auto commit)
				if ($this->transaction)
				{
					$this->transactions++;
					return true;
				}

				$result = $this->_sql_transaction('begin');

				if (!$result)
				{
					$this->sql_error();
				}

				$this->transaction = true;
			break;

			case 'commit':
				// If there was a previously opened transaction we do not commit yet... but count back the number of inner transactions
				if ($this->transaction && $this->transactions)
				{
					$this->transactions--;
					return true;
				}

				// Check if there is a transaction (no transaction can happen if there was an error, with a combined rollback and error returning enabled)
				// This implies we have transaction always set for autocommit db's
				if (!$this->transaction)
				{
					return false;
				}

				$result = $this->_sql_transaction('commit');

				if (!$result)
				{
					$this->sql_error();
				}

				$this->transaction = false;
				$this->transactions = 0;
			break;

			case 'rollback':
				$result = $this->_sql_transaction('rollback');
				$this->transaction = false;
				$this->transactions = 0;
			break;

			default:
				$result = $this->_sql_transaction($status);
			break;
		}

		return $result;
	}

	/** phpbb3
	* Build sql statement from array for insert/update/select statements
	*
	* Idea for this from Ikonboard
	* Possible query values: INSERT, INSERT_SELECT, UPDATE, SELECT
	*
	*/
	function sql_build_array($query, $assoc_ary = false)
	{
		if (!is_array($assoc_ary))
		{
			return false;
		}

		$fields = $values = array();

		if ($query == 'INSERT' || $query == 'INSERT_SELECT')
		{
			foreach ($assoc_ary as $key => $var)
			{
				$fields[] = $key;

				if (is_array($var) && is_string($var[0]))
				{
					// This is used for INSERT_SELECT(s)
					$values[] = $var[0];
				}
				else
				{
					$values[] = $this->_sql_validate_value($var);
				}
			}

			$query = ($query == 'INSERT') ? ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')' : ' (' . implode(', ', $fields) . ') SELECT ' . implode(', ', $values) . ' ';
		}
		else if ($query == 'MULTI_INSERT')
		{
			trigger_error('The MULTI_INSERT query value is no longer supported. Please use sql_multi_insert() instead.', E_USER_ERROR);
		}
		else if ($query == 'UPDATE' || $query == 'SELECT')
		{
			$values = array();
			foreach ($assoc_ary as $key => $var)
			{
				$values[] = "$key = " . $this->_sql_validate_value($var);
			}
			$query = implode(($query == 'UPDATE') ? ', ' : ' AND ', $values);
		}

		return $query;
	}

	/** phpbb3
	* Build IN or NOT IN sql comparison string, uses <> or = on single element
	* arrays to improve comparison speed
	*
	* @access public
	* @param	string	$field				name of the sql column that shall be compared
	* @param	array	$array				array of values that are allowed (IN) or not allowed (NOT IN)
	* @param	bool	$negate				true for NOT IN (), false for IN () (default)
	* @param	bool	$allow_empty_set	If true, allow $array to be empty, this function will return 1=1 or 1=0 then. Default to false.
	*/
	function sql_in_set($field, $array, $negate = false, $allow_empty_set = false)
	{
		if (!sizeof($array))
		{
			if (!$allow_empty_set)
			{
				// Print the backtrace to help identifying the location of the problematic code
				$this->sql_error('No values specified for SQL IN comparison');
			}
			else
			{
				// NOT IN () actually means everything so use a tautology
				if ($negate)
				{
					return '1=1';
				}
				// IN () actually means nothing so use a contradiction
				else
				{
					return '1=0';
				}
			}
		}

		if (!is_array($array))
		{
			$array = array($array);
		}

		if (sizeof($array) == 1)
		{
			reset($array);
			$var = current($array);

			return $field . ($negate ? ' <> ' : ' = ') . $this->_sql_validate_value($var);
		}
		else
		{
			return $field . ($negate ? ' NOT IN ' : ' IN ') . '(' . implode(', ', array_map(array($this, '_sql_validate_value'), $array)) . ')';
		}
	}
	
	/** phpbb3
	* Run more than one insert statement.
	*
	* @param string $table table name to run the statements on
	* @param array &$sql_ary multi-dimensional array holding the statement data.
	*
	* @return bool false if no statements were executed.
	* @access public
	*/
	function sql_multi_insert($table, &$sql_ary)
	{
		if (!sizeof($sql_ary))
		{
			return false;
		}

		if ($this->multi_insert)
		{
			$ary = array();
			foreach ($sql_ary as $id => $_sql_ary)
			{
				// If by accident the sql array is only one-dimensional we build a normal insert statement
				if (!is_array($_sql_ary))
				{
					$this->sql_query('INSERT INTO ' . $table . ' ' . $this->sql_build_array('INSERT', $sql_ary));
					return true;
				}

				$values = array();
				foreach ($_sql_ary as $key => $var)
				{
					$values[] = $this->_sql_validate_value($var);
				}
				$ary[] = '(' . implode(', ', $values) . ')';
			}

			$this->sql_query('INSERT INTO ' . $table . ' ' . ' (' . implode(', ', array_keys($sql_ary[0])) . ') VALUES ' . implode(', ', $ary));
		}
		else
		{
			foreach ($sql_ary as $ary)
			{
				if (!is_array($ary))
				{
					return false;
				}

				$this->sql_query('INSERT INTO ' . $table . ' ' . $this->sql_build_array('INSERT', $ary));
			}
		}

		return true;
	}	
	
	
	/** phpbb3
	* Function for validating values
	* @access private
	*/
	function _sql_validate_value($var)
	{
		if (is_null($var))
		{
			return 'NULL';
		}
		else if (is_string($var))
		{
			return "'" . $this->sql_escape($var) . "'";
		}
		else
		{
			return (is_bool($var)) ? intval($var) : $var;
		}
	}
	
	/** phpbb3
	* Build sql statement from array for select and select distinct statements
	*
	* Possible query values: SELECT, SELECT_DISTINCT
	*/
	function sql_build_query($query, $array)
	{
		$sql = '';
		switch ($query)
		{
			case 'SELECT':
			case 'SELECT_DISTINCT';

				$sql = str_replace('_', ' ', $query) . ' ' . $array['SELECT'] . ' FROM ';

				// Build table array. We also build an alias array for later checks.
				$table_array = $aliases = array();
				$used_multi_alias = false;

				foreach ($array['FROM'] as $table_name => $alias)
				{
					if (is_array($alias))
					{
						$used_multi_alias = true;

						foreach ($alias as $multi_alias)
						{
							$table_array[] = $table_name . ' ' . $multi_alias;
							$aliases[] = $multi_alias;
						}
					}
					else
					{
						$table_array[] = $table_name . ' ' . $alias;
						$aliases[] = $alias;
					}
				}

				// We run the following code to determine if we need to re-order the table array. ;)
				// The reason for this is that for multi-aliased tables (two equal tables) in the FROM statement the last table need to match the first comparison.
				// DBMS who rely on this: Oracle, PostgreSQL and MSSQL. For all other DBMS it makes absolutely no difference in which order the table is.
				if (!empty($array['LEFT_JOIN']) && sizeof($array['FROM']) > 1 && $used_multi_alias !== false)
				{
					// Take first LEFT JOIN
					$join = current($array['LEFT_JOIN']);

					// Determine the table used there (even if there are more than one used, we only want to have one
					preg_match('/(' . implode('|', $aliases) . ')\.[^\s]+/U', str_replace(array('(', ')', 'AND', 'OR', ' '), '', $join['ON']), $matches);

					// If there is a first join match, we need to make sure the table order is correct
					if (!empty($matches[1]))
					{
						$first_join_match = trim($matches[1]);
						$table_array = $last = array();

						foreach ($array['FROM'] as $table_name => $alias)
						{
							if (is_array($alias))
							{
								foreach ($alias as $multi_alias)
								{
									($multi_alias === $first_join_match) ? $last[] = $table_name . ' ' . $multi_alias : $table_array[] = $table_name . ' ' . $multi_alias;
								}
							}
							else
							{
								($alias === $first_join_match) ? $last[] = $table_name . ' ' . $alias : $table_array[] = $table_name . ' ' . $alias;
							}
						}

						$table_array = [...$table_array, ...$last];
					}
				}

				$sql .= $this->_sql_custom_build('FROM', implode(', ', $table_array));

				if (!empty($array['LEFT_JOIN']))
				{
					foreach ($array['LEFT_JOIN'] as $join)
					{
						$sql .= ' LEFT JOIN ' . key($join['FROM']) . ' ' . current($join['FROM']) . ' ON (' . $join['ON'] . ')';
					}
				}

				if (!empty($array['WHERE']))
				{
					$sql .= ' WHERE ' . $this->_sql_custom_build('WHERE', $array['WHERE']);
				}

				if (!empty($array['GROUP_BY']))
				{
					$sql .= ' GROUP BY ' . $array['GROUP_BY'];
				}

				if (!empty($array['ORDER_BY']))
				{
					$sql .= ' ORDER BY ' . $array['ORDER_BY'];
				}

			break;
		}

		return $sql;
	}
	
	/**
	* Explain queries
	*/
	function sql_report($mode, $query = '')
	{
		global $cache, $starttime, $phpbb_root_path, $user;

		if (empty($_REQUEST['explain']))
		{
			return false;
		}

		if (!$query && $this->query_hold != '')
		{
			$query = $this->query_hold;
		}

		switch ($mode)
		{
			case 'display':
				if (!empty($cache))
				{
					$cache->unload();
				}
				$this->sql_close();

				$mtime = explode(' ', microtime());
				$totaltime = $mtime[0] + $mtime[1] - $starttime;

				echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
						<meta http-equiv="Content-Style-Type" content="text/css" />
						<meta http-equiv="imagetoolbar" content="no" />
						<title>SQL Report</title>
						<link href="' . $phpbb_root_path . 'adm/style/admin.css" rel="stylesheet" type="text/css" media="screen" />
					</head>
					<body id="errorpage">
					<div id="wrap">
						<div id="page-header">
							<a href="' . build_url('explain') . '">Return to previous page</a>
						</div>
						<div id="page-body">
							<div id="acp">
							<div class="panel">
								<span class="corners-top"><span></span></span>
								<div id="content">
									<h1>SQL Report</h1>
									<br />
									<p><b>Page generated in ' . round($totaltime, 4) . " seconds with {$this->num_queries['normal']} queries" . (($this->num_queries['cached']) ? " + {$this->num_queries['cached']} " . (($this->num_queries['cached'] == 1) ? 'query' : 'queries') . ' returning data from cache' : '') . '</b></p>

									<p>Time spent on ' . $this->sql_layer . ' queries: <b>' . round($this->sql_time, 5) . 's</b> | Time spent on PHP: <b>' . round($totaltime - $this->sql_time, 5) . 's</b></p>

									<br /><br />
									' . $this->sql_report . '
								</div>
								<span class="corners-bottom"><span></span></span>
							</div>
							</div>
						</div>
						<div id="page-footer">
							Powered by phpBB &copy; 2000, 2002, 2005, 2007 <a href="http://www.phpbb.com/">phpBB Group</a>
						</div>
					</div>
					</body>
					</html>';

				exit_handler();

			break;

			case 'stop':
				$endtime = explode(' ', microtime());
				$endtime = $endtime[0] + $endtime[1];

				$this->sql_report .= '

					<table cellspacing="1">
					<thead>
					<tr>
						<th>Query #' . $this->num_queries['total'] . '</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td class="row3"><textarea style="font-family:\'Courier New\',monospace;width:99%" rows="5" cols="10">' . preg_replace('/\t(AND|OR)(\W)/', "\$1\$2", htmlspecialchars(preg_replace('/[\s]*[\n\r\t]+[\n\r\s\t]*/', "\n", $query))) . '</textarea></td>
					</tr>
					</tbody>
					</table>

					' . $this->html_hold . '

					<p style="text-align: center;">
				';

				if ($this->query_result)
				{
					if (preg_match('/^(UPDATE|DELETE|REPLACE)/', $query))
					{
						$this->sql_report .= 'Affected rows: <b>' . $this->sql_affectedrows($this->query_result) . '</b> | ';
					}
					$this->sql_report .= 'Before: ' . sprintf('%.5f', $this->curtime - $starttime) . 's | After: ' . sprintf('%.5f', $endtime - $starttime) . 's | Elapsed: <b>' . sprintf('%.5f', $endtime - $this->curtime) . 's</b>';
				}
				else
				{
					$error = $this->sql_error();
					$this->sql_report .= '<b style="color: red">FAILED</b> - ' . $this->sql_layer . ' Error ' . $error['code'] . ': ' . htmlspecialchars($error['message']);
				}

				$this->sql_report .= '</p><br /><br />';

				$this->sql_time += $endtime - $this->curtime;
			break;

			case 'start':
				$this->query_hold = $query;
				$this->html_hold = '';

				$this->_sql_report($mode, $query);

				$this->curtime = explode(' ', microtime());
				$this->curtime = $this->curtime[0] + $this->curtime[1];

			break;

			case 'add_select_row':

				$html_table = func_get_arg(2);
				$row = func_get_arg(3);

				if (!$html_table && sizeof($row))
				{
					$html_table = true;
					$this->html_hold .= '<table cellspacing="1"><tr>';

					foreach (array_keys($row) as $val)
					{
						$this->html_hold .= '<th>' . (($val) ? ucwords(str_replace('_', ' ', $val)) : '&nbsp;') . '</th>';
					}
					$this->html_hold .= '</tr>';
				}
				$this->html_hold .= '<tr>';

				$class = 'row1';
				foreach (array_values($row) as $val)
				{
					$class = ($class == 'row1') ? 'row2' : 'row1';
					$this->html_hold .= '<td class="' . $class . '">' . (($val) ? $val : '&nbsp;') . '</td>';
				}
				$this->html_hold .= '</tr>';

				return $html_table;

			break;

			case 'fromcache':

				$this->_sql_report($mode, $query);

			break;

			case 'record_fromcache':

				$endtime = func_get_arg(2);
				$splittime = func_get_arg(3);

				$time_cache = $endtime - $this->curtime;
				$time_db = $splittime - $endtime;
				$color = ($time_db > $time_cache) ? 'green' : 'red';

				$this->sql_report .= '<table cellspacing="1"><thead><tr><th>Query results obtained from the cache</th></tr></thead><tbody><tr>';
				$this->sql_report .= '<td class="row3"><textarea style="font-family:\'Courier New\',monospace;width:99%" rows="5" cols="10">' . preg_replace('/\t(AND|OR)(\W)/', "\$1\$2", htmlspecialchars(preg_replace('/[\s]*[\n\r\t]+[\n\r\s\t]*/', "\n", $query))) . '</textarea></td></tr></tbody></table>';
				$this->sql_report .= '<p style="text-align: center;">';
				$this->sql_report .= 'Before: ' . sprintf('%.5f', $this->curtime - $starttime) . 's | After: ' . sprintf('%.5f', $endtime - $starttime) . 's | Elapsed [cache]: <b style="color: ' . $color . '">' . sprintf('%.5f', ($time_cache)) . 's</b> | Elapsed [db]: <b>' . sprintf('%.5f', $time_db) . 's</b></p><br /><br />';

				// Pad the start time to not interfere with page timing
				$starttime += $time_db;

			break;

			default:

				$this->_sql_report($mode, $query);

			break;
		}

		return true;
	}
							
        function check_query($query) {
        global $prefix, $ZendCache;
        if (!stristr($query, "UPDATE") && !stristr($query, "INSERT") && !stristr($query, "DELETE")) 
		{ 
		  return; 
		}
       
	    $tables = ['nuke' => $prefix . '_config', 
				   'nuke' => $prefix . '_bbconfig', 
				   'nuke' => $prefix . '_blocks',
				   'nuke' => $prefix . '_groups',  
				   'nuke' => $prefix . '_modules'];
				   
        foreach( $tables as $file => $table )
        {
            if (stristr($query, $table)) {
				//$ZendCache->delete($file, 'config');
            }
        }
        return;
    }

    function union_secure($query) {
         # check if it is a SELECT query
          if (strtoupper((string) $query[0]) == 'S') {
             # SPLIT when theres 'UNION (ALL|DISTINT|SELECT)'
             $query_parts = preg_split('#(union)([\s\ \*\/]+)(all|distinct|select)#i', (string) $query, -1, PREG_SPLIT_NO_EMPTY);
             # and then merge the query_parts:
             if ((is_countable($query_parts) ? count($query_parts) : 0) > 1) 
			 {
                 $query = '';
             
			    foreach($query_parts AS $part) {
                    $query .= 'UNI0N SELECT'; // A Zero
                    $query .= $part;
                }
            }
        }
    }

	# Base query method
	//function sql_query($query = "", $transaction = FALSE)
	function sql_query($query = '', $cache_ttl = 0, $transaction = FALSE)
	{
	    // Get time before query
        $stime = get_microtime();
        $qtime = get_microtime();

		// Remove any pre-existing queries
		if (isset($this->query_result)) 
		unset($this->query_result);

        if(!isset($query))
		$query = '';
		
		if ($query != '')
		{
			global $cache;

            // EXPLAIN only in extra debug mode
			if (defined('DEBUG_EXTRA'))
			{
				$this->sql_report('start', $query);
			}
            
            if(isset($cache)) {
			   $this->query_result = ($cache_ttl && method_exists($cache, 'sql_load')) ? $cache->sql_load($query) : false;
			   $this->sql_add_num_queries($this->query_result);
			}
			
            if(SQL_LAYER == 'mysqli') {
                $this->union_secure($query);
            }
            if($this->debug) {
                $this->saved .= $query . "<br />";
            }
            //$this->num_queries++; # I have gotten errors on query!
			$this->query_result = mysqli_query($this->db_connect_id, $query); 
		}

		if ($this->query_result)
		{
            if (defined('DEBUG_EXTRA'))
			{
				$this->sql_report('fromcache', $query);
			}
		    //Check query to clear cache?
            $this->check_query($query);
            $this->time += (get_microtime()-$stime);
            $this->qtime[(int) $this->num_queries] = (get_microtime()-$qtime);
			$this->_backtrace_log($query, false, (int) $this->num_queries);
			if (isset($this->row[(int) $this->num_queries])) unset($this->row[(int) $this->num_queries]);
			if (isset($this->rowset[(int) $this->num_queries])) unset($this->rowset[(int) $this->num_queries]);
			return $this->query_result;
		}
		else
		{

                if (($this->query_result = mysqli_query($this->db_connect_id, $query)) === false)
				{
					$this->sql_error($query);
				}

				if (defined('DEBUG_EXTRA'))
				{
					$this->sql_report('stop', $query);
				}

				if ($cache_ttl && method_exists($cache, 'sql_save'))
				{
					$cache->sql_save($query, $this->query_result, $cache_ttl);
				}
				
            $this->_backtrace();
            $logdata = ['File: '. $this->file, 'Line: '. $this->line, 'Message: ' . $sqlerror['message'], 'Code: ' . $sqlerror['code'], 'Query: ' . $query];
            //Log error
            if (function_exists('log_write')) {
                //Log error
                log_write('error', $logdata, 'SQL Error');
            } else {
                die('SQL Error: '.$query.'<br />'.$sqlerror['message']);
            }

			// backtrace
			$this->_backtrace_log($query, true);
            //Calc runtime
            $this->time += (get_microtime()-$stime);

 
//			return ( $transaction == END_TRANSACTION ) ? true : false;
			return $transaction == END_TRANSACTION;		
	  }
	}

   /** phpbb3
	* Build LIMIT query
	*/
	function _sql_query_limit($query, $total, $offset = 0, $cache_ttl = 0)
	{
		$this->query_result = false;

		// if $total is set to 0 we do not want to limit the number of rows
		if ($total == 0)
		{
			// MySQL 4.1+ no longer supports -1 in limit queries
			$total = '18446744073709551615';
		}

		$query .= "\n LIMIT " . ((!empty($offset)) ? $offset . ', ' . $total : $total);

		return $this->sql_query($query, $cache_ttl);
	}
    
	/** phpbb3
	* Fetch current row
	*/
	//function sql_fetchrow($query_id = false)
	function sql_fetchrow($query_id = false, $trash=0)
	{
		global $cache;

		if ($query_id === false)
		{
			$query_id = $this->query_result;
		}

		if (!is_object($query_id) && isset($cache->sql_rowset[$query_id]))
		{
			return $cache->sql_fetchrow($query_id);
		}

		return ($query_id !== false) ? mysqli_fetch_assoc($query_id) : false;
	}	
	
	function sql_uquery($query)
    {
        return $this->sql_query($query, true);
    }

    /**
	 * Performs a simple select query.
	 *
	 * @param string $table The table name to be queried.
	 * @param string $fields Comma delimetered list of fields to be selected.
	 * @param string $conditions SQL formatted list of conditions to be matched.
	 * @param array $options List of options: group by, order by, order direction, limit, limit start.
	 * @return mysqli_result The query data.
	 */
    function sql_simple_select($table, $fields="*", $conditions="", $options=[])
	{
		$query = "SELECT ".$fields." FROM ".$table;

		if($conditions != "")
		{
			$query .= " WHERE ".$conditions;
		}

		if(isset($options['group_by']))
		{
			$query .= " GROUP BY ".$options['group_by'];
		}

		if(isset($options['order_by']))
		{
			$query .= " ORDER BY ".$options['order_by'];
			if(isset($options['order_dir']))
			{
				$query .= " ".strtoupper($options['order_dir']);
			}
		}

		if(isset($options['limit_start']) && isset($options['limit']))
		{
			$query .= " LIMIT ".$options['limit_start'].", ".$options['limit'];
		}
		else if(isset($options['limit']))
		{
			$query .= " LIMIT ".$options['limit'];
		}

		return $this->sql_query($query);
	}

	function sql_usimple_select($table, $fields="*", $conditions="", $options=[], $type=SQL_BOTH)
	{
		$query = "SELECT ".$fields." FROM ".$table;

		if($conditions != "")
		{
			$query .= " WHERE ".$conditions;
		}

		if(isset($options['group_by']))
		{
			$query .= " GROUP BY ".$options['group_by'];
		}

		if(isset($options['order_by']))
		{
			$query .= " ORDER BY ".$options['order_by'];
			if(isset($options['order_dir']))
			{
				$query .= " ".strtoupper($options['order_dir']);
			}
		}

		if(isset($options['limit_start']) && isset($options['limit']))
		{
			$query .= " LIMIT ".$options['limit_start'].", ".$options['limit'];
		}
		else if(isset($options['limit']))
		{
			$query .= " LIMIT ".$options['limit'];
		}

		$query_id = $this->sql_query($query, true);
        $result = $this->sql_fetchrow($query_id, $type);
        $this->sql_freeresult($query_id);
        return $result;
	}

	# Other query methods
	function sql_numrows($query_id = 0)
	{
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}
		if($query_id)
		{
			$result = mysqli_num_rows($query_id);
			return $result;
		}
		else
		{
			return false;
		}
	}

	function sql_unumrows($query) {
		return $this->sql_numrows($this->sql_query($query, true));
	}

	function sql_affectedrows()
	{
		if($this->db_connect_id)
		{
			$result = mysqli_affected_rows($this->db_connect_id);
			return $result;
		}
		else
		{
			return false;
		}
	}

	function sql_numfields($query_id = 0)
	{
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}
		if($query_id)
		{
			$result = mysqli_num_fields($query_id);
			return $result;
		}
		else
		{
			return false;
		}
	}

	function sql_fieldname($offset, $query_id = 0)
	{
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}
		if($query_id)
		{
			$result = mysqli_fetch_field_direct($query_id, $offset);
			return $result;
		}
		else
		{
			return false;
		}
	}

	function sql_fieldtype($offset, $query_id = 0)
	{
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}
		if($query_id)
		{
			$result = mysqli_fetch_field_direct($query_id, $offset);
			return $result;
		}
		else
		{
			return false;
		}
	}

	function sql_fetchrowset($query_id = 0)
	{
	    $stime = get_microtime();
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}
		if($query_id)
		{
			if (isset($this->rowset[(int) $this->num_queries])) unset($this->rowset[(int) $this->num_queries]);
			if (isset($this->row[(int) $this->num_queries])) unset($this->row[(int) $this->num_queries]);
			$result = null;
			while($this->rowset[$this->num_queries] = mysqli_fetch_array($query_id))
			{
				$result[] = $this->rowset[(int) $this->num_queries];
			}
			$this->time += (get_microtime()-$stime);
			return $result;
		}
		else
		{
			return false;
		}
	}

	function sql_rowseek($rownum, $query_id = 0){
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}
		if($query_id)
		{
			$result = mysqli_data_seek($query_id, $rownum);
			return $result;
		}
		else
		{
			return false;
		}
	}

	function sql_nextid(){
		if($this->db_connect_id)
		{
			$result = mysqli_insert_id($this->db_connect_id);
			return $result;
		}
	    return false;
	}

	function sql_freeresult($query_id = 0){
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}

		if ( $query_id )
		{
		    if (isset($this->row[(int) $this->num_queries])) 
			unset($this->row[(int) $this->num_queries]);

			if (isset($this->rowset[(int) $this->num_queries])) 
			unset($this->rowset[(int) $this->num_queries]);

			//mysqli_free_result($this->num_queries); # removed for php 8

			if (isset($this->querylist[$this->file][(int)$this->num_queries])) 
			{
			    $this->querylist[$this->file][(int)$this->num_queries] .= '<span style="color: #0000FF; font-weight: bold;"> *</span>';
			}

			return true;
		}
		else
		{
			return false;
		}
	}

	function sql_escapestring($string)
    {
        return $this->sql_addq($string);
    }

	function sql_addq($string)
    {
        static $magic_quotes;
        if ($magic_quotes) $string = stripslashes($string);
        return (version_compare(phpversion(), '4.3.0', '>=')) ? mysqli_real_escape_string($this->db_connect_id, $string) : mysqli_escape_string($this->db_connect_id, $string);
    }

   /**
	* display sql error page
	*/
	function sql_error($sql = '')
	{
		global $auth, $user, $config;

		// Set var to retrieve errored status
		$this->sql_error_triggered = true;
		$this->sql_error_sql = $sql;

		$this->sql_error_returned = $this->_sql_error();

		if (!$this->return_on_error)
		{
			$message = 'SQL ERROR [ ' . $this->sql_layer . ' ]<br /><br />' . $this->sql_error_returned['message'] . ' [' . $this->sql_error_returned['code'] . ']';

			// Show complete SQL error and path to administrators only
			// Additionally show complete error on installation or if extended debug mode is enabled
			// The DEBUG_EXTRA constant is for development only!
			if ((isset($auth) && $auth->acl_get('a_')) || defined('IN_INSTALL') || defined('DEBUG_EXTRA'))
			{
				// Print out a nice backtrace...
				$backtrace = get_backtrace();

				$message .= ($sql) ? '<br /><br />SQL<br /><br />' . htmlspecialchars($sql) : '';
				$message .= ($backtrace) ? '<br /><br />BACKTRACE<br />' . $backtrace : '';
				$message .= '<br />';
			}
			else
			{
				// If error occurs in initiating the session we need to use a pre-defined language string
				// This could happen if the connection could not be established for example (then we are not able to grab the default language)
				if (!isset($user->lang['SQL_ERROR_OCCURRED']))
				{
					$message .= '<br /><br />An sql error occurred while fetching this page. Please contact an administrator if this problem persists.';
				}
				else
				{
					if (!empty($config['board_contact']))
					{
						$message .= '<br /><br />' . sprintf($user->lang['SQL_ERROR_OCCURRED'], '<a href="mailto:' . htmlspecialchars($config['board_contact']) . '">', '</a>');
					}
					else
					{
						$message .= '<br /><br />' . sprintf($user->lang['SQL_ERROR_OCCURRED'], '', '');
					}
				}
			}

			if ($this->transaction)
			{
				$this->sql_transaction('rollback');
			}

			if (strlen($message) > 1024)
			{
				// We need to define $msg_long_text here to circumvent text stripping.
				global $msg_long_text;
				$msg_long_text = $message;

				trigger_error(false, E_USER_ERROR);
			}

			trigger_error($message, E_USER_ERROR);
		}

		if ($this->transaction)
		{
			$this->sql_transaction('rollback');
		}

		return $this->sql_error_returned;
	}

	function sql_ufetchrow($query = "", $type=SQL_BOTH)
    {
        $query_id = $this->sql_query($query, true);
        $result = $this->sql_fetchrow($query_id, $type);
        $this->sql_freeresult($query_id);
        return $result;
    }

	function sql_optimize($table_name="")
    {
        $result = null;
        global $dbname;
        $error = false;
        if (empty($table_name)) {
            $nuke_tables = $this->sql_fetchtables($dbname, true);
            foreach($nuke_tables as $table) {
                if(!$result = $this->sql_query('OPTIMIZE TABLE ' . $table)) {
                    $error = true;
                }
                $this->sql_freeresult($result);
            }
        } else {
            if(!$result = $this->sql_query('OPTIMIZE TABLE ' . $table_name)) {
                $error = true;
            }
            $this->sql_freeresult($result);
        }
        $this->sql_freeresult($result);
		return ((!$error) ? true : false);
    }

	/*!
	* Performs a search on the current/chosen database and returns all tables
	* associated with it
	*
	* @public function sql_fetchtables
	* @param  string  $database
	* @param  boolean $nuke_only
	* @return array   $tables
	*/	
	function sql_fetchtables($database="", $nuke_only=false)
    {
        global $prefix;
        $result = $this->sql_query(empty($database) ? 'SHOW TABLES' : 'SHOW TABLES FROM '.$database);
        $tables = [];
        while ([$name] = $this->sql_fetchrow($result)) {
            if ($nuke_only) {
                if(stristr($name, $prefix.'_')) {
                    $tables[$name] = $name;
                }
            } else {
                $tables[$name] = $name;
            }
        }
        $this->sql_freeresult($result);
        return $tables;
    }

	function sql_fetchdatabases()
    {
        $result = $this->sql_query('SHOW DATABASES');
        $databases = [];
        while ([$name] = $this->sql_fetchrow($result)) {
            $databases[$name] = $name;
        }
        $this->sql_freeresult($result);
        return $databases;
    }

    function sql_ufetchrowset($query = '', $type=SQL_BOTH)
    {
        $query_id = $this->sql_query($query, true);
        return $this->sql_fetchrowset($query_id);
    }

    # print debug
    function print_debug() {
        if ($this->debug) {
            return $this->saved;
        }
        return '';
    }

    function mariadb_short_version()
	{
		global $heading_color;
	  if($this->db_connect_id):
	  $result  = '<hr><span style="color:'.$heading_color.';">Database Server</span></br>';
	  $result .= mysqli_get_server_info($this->db_connect_id);
	  return $result;
		else:
			return false;
		endif;
	}

	# added by Ernest Allen Buffington 4/29/2021 Thursday 9:05pm
    function mariadb_version()
	{
	  if($this->db_connect_id):
	  $result  = '<div class="poweredby"> <a class="poweredby" href="http://www.php-nuke-titanium.86it.us/" target="_blank">Powered by PHP-Nuke Titanium v'.NUKE_TITANIUM.' | &copy; 2005, 2022 PHP-Nuke Titanium Group</a></div>';
	  $result .= 'MySQLi Database Server: ';
	  $result .= mysqli_get_server_info($this->db_connect_id);
	  return $result;
		else:
			return false;
		endif;
	}

} // class sql_db

} // if ... define
