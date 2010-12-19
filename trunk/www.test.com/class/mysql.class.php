<?php
/**
 * mysql查询类
 *
 */
class dbQuery {
	/**
	 * 查询总次数
	 *
	 * @var int
	 */
	var $querynum = 0;
	/**
	 * 连接句柄
	 *
	 * @var object
	 */
	var $link;
	var $sqls ='';
	var $error = false ;
	/**
	 * 构造函数
	 *
	 * @param string $dbhost 主机名
	 * @param string $dbuser 用户
	 * @param string $dbpw   密码
	 * @param string $dbname 数据库名
	 * @param int $pconnect 是否持续连接
	 */
	function dbQuery($dbhost, $dbuser, $dbpw, $dbname = '',$dbcharset, $pconnect = 0) {
		if($pconnect) {
			if(!$this->link = @mysql_pconnect($dbhost, $dbuser, $dbpw)) {
				$this->halt('Can not connect to MySQL server');
			}
		} else {
			if(!$this->link = @mysql_connect($dbhost, $dbuser, $dbpw)) {
				$this->halt('Can not connect to MySQL server');
			}
		}
		if($this->version() > '4.1') {
			/* global $dbcharset; */
			if($dbcharset) {
				mysql_query("SET character_set_connection=$dbcharset, character_set_results=$dbcharset, character_set_client=binary", $this->link);
			}

			if($this->version() > '5.0.1') {
				mysql_query("SET sql_mode=''", $this->link);
			}
		}

		if($dbname) {
			mysql_select_db($dbname, $this->link);
		}

	}
	/**
	 * 选择数据库
	 *
	 * @param string $dbname
	 * @return
	 */
	function select_db($dbname) {
		return mysql_select_db($dbname, $this->link);
	}
	/**
	 * 取出结果集中一条记录
	 *
	 * @param object $query
	 * @param int $result_type
	 * @return array
	 */
	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return @mysql_fetch_array($query, $result_type);
	}

	/**
	 * 查询SQL
	 *
	 * @param string $sql
	 * @param string $type
	 * @return object
	 */
	function query($sql, $type = '') {

		$func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ?
			'mysql_unbuffered_query' : 'mysql_query';
		if(!($query = $func($sql, $this->link)) && $type != 'SILENT') {
			$this->halt('MySQL Query Error', $sql);
		}
		$this->querynum++;

		return $query;
	}
	/**
	 * 取影响条数
	 *
	 * @return int
	 */
	function affected_rows() {
		return mysql_affected_rows($this->link);
	}
	/**
	 * 返回错误信息
	 *
	 * @return array
	 */
	function error() {
		return (($this->link) ? mysql_error($this->link) : mysql_error());
	}
	/**
	 * 返回错误代码
	 *
	 * @return int
	 */
	function errno() {
		return intval(($this->link) ? mysql_errno($this->link) : mysql_errno());
	}
	/**
	 * 返回查询结果
	 *
	 * @param object $query
	 * @param string $row
	 * @return mixed
	 */
	function result($query, $row = 'gbk') {
		$query = mysql_result($query, $row);
		return $query;
	}
	/**
	 * 结果条数
	 *
	 * @param object $query
	 * @return int
	 */
	function num_rows($query) {
		$query = mysql_num_rows($query);
		return $query;
	}
	/**
	 * 取字段总数
	 *
	 * @param object $query
	 * @return int
	 */
	function num_fields($query) {
		return mysql_num_fields($query);
	}
	/**
	 * 释放结果集
	 *
	 * @param object $query
	 * @return bool
	 */
	function free_result($query) {
		return mysql_free_result($query);
	}
	/**
	 * 返回自增ID
	 *
	 * @return int
	 */
	function insert_id() {
		return ($id = mysql_insert_id($this->link)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
	}
	/**
	 * 从结果集中取得一行作为枚举数组
	 *
	 * @param object $query
	 * @return array
	 */
	function fetch_row($query) {
		$query = mysql_fetch_row($query);
		return $query;
	}
	/**
	 * 从结果集中取得列信息并作为对象返回
	 *
	 * @param object $query
	 * @return object
	 */
	function fetch_fields($query) {
		return mysql_fetch_field($query);
	}
	/**
	 * 返回mysql版本
	 *
	 * @return string
	 */
	function version() {
		return mysql_get_server_info($this->link);
	}
	/**
	 * 关闭连接
	 *
	 * @return bool
	 */
	function close() {
		return mysql_close($this->link);
	}
	/**
	 * 输出错误信息
	 *
	 * @param string $message
	 * @param string $sql
	 */
	function halt($message = '', $sql = '') {
		if ($this->error===false)
		{
			//echo $message.'<br>'.$sql;
			error_404($message.'<br>'.$sql);
			exit;
		}

	}
	/**
	 * 新增 更改 数据
	 *
	 * @table string $表明
	 * @array string $更改数组
	 * @where string $判断类型
	 */
	function save($table,$array,$where='',$id='')
	{
		global $cookievarpre;
		$table = $cookievarpre.$table;
		$sql = "show fields from $table";
		$reset = $this->query($sql);
		while ($row = $this->fetch_array($reset))
		{
			if ($row['Extra']!='auto_increment')
			$list[] = $row['Field'];
		}

		if (!empty($where))
		{
			foreach ($array as $key=>$value)
			{
				if (in_array($key,$list))
				{
					$field[] = '`'.$key."`='".$value."'";
				}
			}
			$sql = "update $table set ".implode(',',$field)." where ".$where;
			//exit;
			$this->query($sql);
			$info = $id;
		}
		else
		{
			foreach ($array as $key=>$value)
			{
				if (in_array($key,$list))
				{
					$field[] = '`'.$key.'`';
					$values[] = "'".$value."'";
				}
			}
			if ($id=='')
			$sql = "insert into $table  (".implode(',',$field).") values (".implode(',',$values).")";
			else
			$sql = "replace into $table  (".implode(',',$field).") values (".implode(',',$values).")";
			$this->query($sql);
			$info = $this->insert_id();
		}
		return $info;
	}
	function arrays($sql)
	{
		$reset = $this->query($sql);
		while ($row = $this->fetch_array($reset))
		{
			$list[] = $row;
		}
		return $list;
	}
	function one_array($sql)
	{
		$reset = $this->query($sql);
		return $row = $this->fetch_array($reset);
	}
	/**
	 * 删除
	 *
	 * @table string $表
	 * @where string $判断类型
	 */
	 function delete($table,$where)
	 {
	 	global $cookievarpre;
		$table = $cookievarpre.$table;

		$this->query("delete from $table where ".$where);
	 }
	 function maxnum($sql)
	 {
		return $this->result($this->query($sql));
	 }
}

?>