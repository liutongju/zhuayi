<?php
/**
 * index.php     Zhuayi DB抽象类
 *
 * @copyright    (C) 2005 - 2010  Zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 * 
 * ------------------------------------------------
 * $this->load_class('db');
 * 
 * // 查询单条记录
 * $reset = $this->db->fetch('admin');
 * 
 * // 查询多条记录,默认为30条
 * $reset = $this->db->fetch_row('admin');
 * 
 * // 带判断条件查询多条
 * $this->db->fetch_row('admin',array('id'=>'1'),' id desc',' 0,30');
 * 
 * // 链式调用方法,查询单条
 * $reset = $this->db->table('admin')->show();
 * 
 * // 链式调用查询多条,并指定字段
 * $reset = $this->db->table(array('article','keyid , id , title '))->limit('0,30')->order(' id desc ')->show();
 *
 * // 链式调用查询多条,带复杂判断
 * $reset = $this->db->table('article')->limit('0,11')->where('id > 100')->show();
 *
 * // 链式调用: 新增数据
 * $reset = $this->db->table('admin')->add(array('password'=>'2','username'=>'zhuayi'));
 *
 * // 新增数据
 * $reset = $this->db->insert('admin',array('password'=>'2','username'=>'zhuayi'));
 *
 * // 链式调用: 编辑数据
 * $reset = $this->db->table('admin')->where(array('id'=>'3'))->edit(array('password'=>'3','username'=>'zhuayi'));
 *
 * // 链式调用: 编辑数据,自定义判断挑件
 * $reset = $this->db->table('admin')->where('id = 2 ')->edit(array('password'=>'{+}3','username'=>'zhuayi'));
 *
 * // 链式调用: 查询总数
 * $reset = $this->db->table('admin')->where(array('id'=>'3'))->maxnum();
 *
 * // 查询总数
 * $reset = $this->db->maxnum('admin',array('id'=>'3'));
 * //编辑数据
 * $reset = $this->db->update('admin',array('password'=>time(),'username'=>'zhuayi'),array('id'=>'3'))
 *
 * // 链式调用: 删除数据
 * $reset = $this->db->table('admin')->where(array('id'=>'3'))->del();
 *
 * // 删除数据
 * $reset = $this->db->delete('admin',' id > 3');
 *
 * -------------------------------------------------
 */
//include_once dirname(__FILE__).'/mysql.class.php';

class db
{

	public $table;

	public $limit;

	public $order;

	public $where;

	public $fields = '*';

	var $querynum;

	/**
	 * 构造函数
	 * @param find $fields 数据库配置文件 
	 */
	function __construct($fields = array())
	{
		global $cache;

		extract($fields, EXTR_OVERWRITE);
		
		foreach ($fields as $key=>$val)
		{
			$this->$key = $val;
		}

		/* 加载缓存类 */
		$this->cache = & $cache;

		/* 定义表前缀 */
		define('T', $this->mysql_pre);

	}

	function link($act = '0')
	{

		if ($act == '0')
		{
			/* 连接主库 */
			$dbhost = $this->mysql_host_m.':'.$this->mysql_port;
		}
		else
		{
			/* 连接从库*/
			$dbhost = $this->mysql_host_s.':'.$this->mysql_port;
		}

		if(!$this->link = @mysql_connect($dbhost, $this->mysql_user, $this->mysql_pass))
		{
			$this->error('Can not connect to MySQL server');
		}

		/* 设置编码 */
		if($this->mysql_charset)
		{
			mysql_query("SET character_set_connection={$this->mysql_charset}, character_set_results={$this->mysql_charset}, character_set_client=binary", $this->link);
		}

		/* 选择数据库 */
		if($this->mysql_db)
		{
			mysql_select_db($this->mysql_db, $this->link);
		}

	}
	
	function error($str)
	{
		$title = '数据库出错...';
		$str = 'sql: '.$str.'<br>';
		$str .= 'error: '.mysql_error().'<br>';
		$str .= 'errno: '.mysql_errno();
		output::error($title,$str);
	}
	
	/**
	 * --------------------------------
	 * table 设置表名
	 *
	 * @param string $table 表明
	 * @return	$this
	 * --------------------------------
	 */
	function table($table)
	{
		$this->where = '';
		$this->fields = '*';
		if (is_array($table))
		{

			$this->table = T.$table[0];
			$this->fields = $table[1];
		}
		else
		{
			$this->table = T.$table;
		}
		
		$this->order = '';
		$this->limit = '';
		$this->where = '';

		return $this;
	}

	/**
	 * --------------------------------
	 * _fields 得到该表所有字段
	 *
	 * @param array $array 
	 * @return	array
	 * --------------------------------
	 */
	function _fields($array)
	{

		$array2 = array();
		$reset2 = array();
		foreach ($array as $key=>$val)
		{
			$key = trim($key);
			$key2 = explode('.',$key);
			if (isset($key2[1]))
			{
				$reset2[$key] = $val;
			}
			else
			{
				$array2[$key] = $val;
			}
		}

		$fields_key = 'cache_fields_'.$this->table;

		$table_fields = $this->cache->get($fields_key);

		if ($table_fields === false)
		{
			$table_fields = $this->query(' show fields from '.$this->table,1,true);
			$this->cache->set($fields_key,$table_fields,86400);
		}
		

		$fields = array_keys($array2);
		
		foreach ($table_fields as $val)
		{
			if (in_array($val['Field'],$fields))
			{
				$reset2[$val['Field']] = addslashes($array[$val['Field']]);
			}
		}

		return $reset2;
	}

	/**
	 * ----------------------------------------------------------------
	 * limit 设置查询记录数
	 *
	 * @param string $limit 查询结果数,查询单数为空或者"1",查询列表" 0 , 30"
	 * @return $this
	 * ----------------------------------------------------------------
	 */ 
	function limit($limit = '')
	{
		$this->limit = $limit;
		return $this;
	}

	/**
	 * ----------------------------------------------------------------
	 * factor 根据数组键值,返回SQL查询条件
	 *
	 * @param string $where 可为数组或(id=18)类型,只有数组才会和字段对比
	 * @return $this
	 * ----------------------------------------------------------------
	 */
	function factor($where)
	{

		if (!is_array($where))
		{
			if (!empty($where))
			{
				$where = ' where '.$where;
			}
			return $where;
		}
		$where = $this->_fields($where);
		$where2 = array();
		foreach ($where as $key=>$val)
		{
			$key = explode('.',$key);
			if (isset($key[1]))
			{
				$key = ' '.$key[0].'.`'.$key[1].'` ';
			}
			else
			{
				$key = ' `'.$key[0].'` ';
			}
			
			/* 模糊搜索 */
			if (preg_match('/\{%(.*?)%\}/i',$val))
			{
				$val = preg_replace('/\{%(.*?)%\}/i','$1',$val);
				$where2[] = $key." like '%".$val."%'";
			}
			elseif (preg_match('/\{(.*?)\}/i',$val))
			{

				/* 大于 {>} 小于{<}  {in}*/
				$val = preg_replace('/\{(.*?)\}/i','$1',$val);
				$where2[] = $key.$val."";
			}
			else
			{
				$where2[] = $key." = '".$val."'";
			}
			
		}
		
		$where =   implode(' and ',$where2);

		if (!empty($where))
		{
			$where = ' where '.$where;
		}
		return $where;
	}

	/**
	 * ---------------------------------------
	 * where 查询条件
	 *
	 * @param string $where 查询条件,可为数组
	 * @return $this
	 * ---------------------------------------
	 */ 
	function where($where = '')
	{

		$this->where = $this->factor($where);
		return $this;
	}

	/**
	 * ----------------------------------------------------------------
	 * order 结果排列顺序
	 *
	 * @param string $order 例子: id desc => order by id desc
	 * @return $this
	 * ----------------------------------------------------------------
	 */ 
	function order($order)
	{
		if (empty($order))
		{
			return $this;
		}

		$this->order = ' order by '.$order;
		
		return $this;	
	}

	/**
	 * ---------------------------------------
	 * show 查询结果
	 *
	 * @return $this
	 * ---------------------------------------
	 */
	function show()
	{

		$sql =  "select ".$this->fields." from ".$this->table.$this->where.$this->order;
		
		$reset = $this->query($sql,$this->limit,1);
		return $reset;
	}

	/**
	 * ---------------------------------------
	 * fetch 封装的查询单条结果
	 *
	 * @return list
	 * ---------------------------------------
	 */
	function fetch($table,$where = '',$order = '')
	{

		return $this->table($table)->where($where)->order($order)->limit(1)->show();

	}

	/**
	 * ---------------------------------------
	 * fetch_show 封装的查询多条结果
	 *
	 * @return list
	 * ---------------------------------------
	 */
	function fetch_row($table,$where = '',$order = '',$limit = ' 0,30 ')
	{
		return $this->table($table)->where($where)->order($order)->limit($limit)->show();
	}

	/**
	 * ---------------------------------------
	 * insert 封装的插入记录
	 *
	 * @return 自增$id
	 * ---------------------------------------
	 */
	function insert($table,$array)
	{
		return $this->table($table)->add($array);
	}

	/**
	 * ---------------------------------------
	 * add 插入记录
	 *
	 * @return 自增$id
	 * ---------------------------------------
	 */
	function add($array)
	{
		$array = $this->_fields($array);

		$key = array_keys($array);
		$key = '( `'.implode('`,`',$key).'` ) ';

		$value = array_values($array);
		$value = "(' ".implode("','",$value)."' ) ";

		$sql = 'insert into '.$this->table.$key.' values '.$value;

		if ($this->query($sql)!== false)
		{
			return $this->insert_id();
		}
		else
		{
			return false;
		}

	}

	/**
	 * ---------------------------------------
	 * update 封装的修改记录
	 *
	 * @return void
	 * ---------------------------------------
	 */
	function update($table,$array,$where)
	{
		return $this->table($table)->where($where)->edit($array);
	}

	/**
	 * ---------------------------------------
	 * edit 修改记录
	 *
	 * @return void
	 * ---------------------------------------
	 */
	function edit($array)
	{
		$array = $this->_fields($array);

		if (empty($array))
		{
			return false;
		}

		$reg = '/\{(.*[+,-])\}/i';
		foreach ($array as $key=>$val)
		{
			if (!preg_match($reg,$val))
			{
				$field[] = ' `'.$key."` = '".$val."' ";
			}
			else
			{
				$val = preg_replace($reg,' $1 ',$val);
				$field[] = ' `'.$key."` = ".' `'.$key."` ".$val."  ";
			}
			
		}

		$sql = 'update '.$this->table.' set '.implode(',',$field).$this->where;

		return $this->query($sql);
	}

	/**
	 * ---------------------------------------
	 * delete 封装的删除记录
	 *
	 * @return void
	 * ---------------------------------------
	 */
	function delete($table,$where)
	{
		return $this->table($table)->where($where)->del();
	}

	/**
	 * ---------------------------------------
	 * del 删除记录
	 *
	 * @return void
	 * ---------------------------------------
	 */
	function del()
	{
		$sql = " delete from ".$this->table.$this->where;

		$this->query($sql,0,1);
	}

	/**
	 * ---------------------------------------
	 * fetch_page 大数据分页,调用方法同fetch_row,不同的是返回总数
	 *
	 * @return void
	 * ---------------------------------------
	 */
	function fetch_id($table,$where = '',$order = '',$limit = ' 0,30 ')
	{
		/* limit */
		$limit = explode(',',$limit);

		/* 从数组中取出分页 */
		if ($limit[0] < 0 )
		{
			$limit[0] = 0;
		}

		if (is_array($table))
		{
			$id_table = $table[0];
		}
		else
		{
			$id_table = $table;
		}

		/* 此处用来遍历 ID键值,为了后边的IN操作*/
		$id_table = array($id_table,'id');

		/* 遍历ID,返回导数组中*/
		$list = $this->fetch_row($id_table,$where,'','all');

		$id_list = @array_slice($list,$limit[0],$limit[1]);

		$id = array();
		foreach ($id_list as $val)
		{
			$id[]= $val['id'];
		}
		return implode(',',$id);

		/* 结果总数 */
		$resule['maxnum'] = count($list);
		$resule['list'] = array();

		/* 如果ID为空,则返回空数据 */
		if ($resule['maxnum'] == 0)
		{
			return $resule;
		}
		if (is_array($where))
		{
			$where = array_merge($where,array('id'=>'{in}('.implode(',',$id).')'));
		}
		else if (empty($where))
		{
			$where .= '  id in('.implode(',',$id).')';
		}
		else
		{
			$where .= ' and  id in('.implode(',',$id).')';
		}

		$resule['list'] = $this->fetch_row($table,$where,$order," {$limit[0]}, {$limit[1]}");
		return $resule;
	}

	/**
	 * ---------------------------------------
	 * maxnum 取全部数据
	 *
	 * @return void
	 * ---------------------------------------
	 */
	function maxnum($table = '',$where = '')
	{
		
		if (!empty($table))
		{
			$this->table($table);
		}
		if (!empty($where))
		{
			$this->where($where);
		}

		$sql = "select count(*) from ".$this->table.$this->where;
		$this->list = true;
		$reset = $this->query($sql);
		return $reset['count(*)'];
	}

	/**
	 * ---------------------------------------
	 * 返回查询结果
	 *
	 * @param object $query
	 * @param string $row
	 * @return mixed
	 * ---------------------------------------
	 */
	function result($query, $row = '')
	{
		$query = mysql_result($query, $row);
		return $query;
	}

	/**
	 * ---------------------------------------
	 * 返回自增ID
	 *
	 * @return int
	 * ---------------------------------------
	 */
	function insert_id()
	{
		return ($id = mysql_insert_id($this->link)) >= 0 ? $id : $this->result($this->_query("SELECT last_insert_id()"), 0);
	}


	function _query($sql,$act = '')
	{
		if (isset($_GET['db_debug']))
		{
			echo "\n<!--\n sql: {$sql} \n-->\n";
		}

		$this->link($act,$act);

		if(!($query = mysql_query($sql, $this->link)))
		{
			return false;
		}
		else
		{
			return $query;
		}
	}

	/* 取单条信息 */
	function _fetch_row($query, $result_type = MYSQL_ASSOC)
	{
		return @mysql_fetch_array($query, $result_type);
	}

	/* 取多条信息 */
	function _fetch_array($query, $result_type = MYSQL_ASSOC)
	{
		$list = array();
		while ($row = @mysql_fetch_array($query, $result_type))
		{
			$list[] = $row;
		}
		return $list;
	}

	/**
	 * ---------------------------------------
	 * query 执行SQL
	 *
	 * @return void
	 * ---------------------------------------
	 */
	function query($sql,$limit='',$act=0 )
	{

		$list = 0;
		/* 增加$limit参数,用来判断是否全部显示all,或者单条显示limit 0,1 或者 自定义多条 limit 0,30 */
		if (substr(trim($sql),0,4) == 'show')
		{
			$limit = '';
			$list = '1';
		}
		elseif ($limit == 'all')
		{
			/* 全部查询,不包含limit */
			$limit = '';
			$list = '1';
		}
		else if ($limit == '1')
		{
			/* 只查询单条 */
			$limit = " limit 0, 1";
			$list = '0';
		}
		else if (!empty($limit))
		{
			/* 自定义查询多条 */
			$limit = explode(',',$limit);
			if ($limit[0] < 0 )
			{
				$limit[0] = 0;
			}
			$limit = " limit {$limit[0]}, {$limit[1]}";
			$list = '1';
		}

		$sql .= $limit;

		if (!$reset = $this->_query($sql,$act))
		{
			$this->error($sql);
		}

		if ($list == '1')
		{
			$return = $this->_fetch_array($reset);
		}
		elseif ($list == '0')
		{
			$return =  $this->_fetch_row($reset);
		}
		else
		{
						
			$return = $this->_fetch_array($reset);
		}
		$this->querynum++;

		return $return;
	}

	/**
	 * ---------------------------------------
	 * 关闭连接
	 *
	 * @return bool
	 * ---------------------------------------
	 */
	function close() {
		return mysql_close($this->link);
	}


}