<?php
/*
 * hello_modle.php     Zhuayi hello 数据模型
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */

 
class hello_modle extends zhuayi
{

	/**
	 * 更新hello
	 */
	function insert($array)
	{
		$array['dtime'] = time();
		return $this->db->insert('hello',$array);
	}

	/**
	 * 查询数据
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function lists($array = array(),$order = '',$limit = '0,30')
	{
	        $list = $this->db->fetch_row('hello',$array,$order,$limit);
			
		return $list;
	}


}
?>