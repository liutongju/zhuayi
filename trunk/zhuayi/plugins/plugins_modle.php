<?php
/*
 * plugins_modle.php     Zhuayi 插件库数据模型
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */

 
class plugins_modle extends zhuayi
{

	/**
	 * 查询插件库
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function plugins($array = array(),$order = '',$limit = '1')
	{
		if ($limit == '1')
		{
			$list =  $this->db->fetch('plugins',$array,$order);
		}
		else
		{
			$list = $this->db->fetch_row('plugins',$array,$order,$limit);
		}
		return $list;
	}

	/**
	 * 更新插件库
	 *
	 */
	function plugins_update($array)
	{
		$array['dtime'] = time();

		if (!empty($array['id']))
		{
			return $this->db->update('plugins',$array,' id ='.$array['id']);
		}
		else
		{
			return $this->db->insert('plugins',$array);
		}
	}


	/** 删除插件库 **/
	function plugins_delete($id)
	{
		if (is_array($id))
		{
			$id = implode(',',$id);
		}
	
		if (empty($id))
		{
			return '-1';
		}

		$this->db->delete('plugins', ' id  in ('.$id.')');
		
		return $id;
	}

	/**
	 * 插件总数
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function plugins_maxnum($array = array())
	{
		return $this->db->maxnum("plugins",$array);
	}

	/**
	 * 查询方法
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function fun_list($array = array(),$order = '',$limit = '1')
	{
		if ($limit == '1')
		{
			$list =  $this->db->fetch('plugins_fun',$array,$order);
		}
		else
		{
			$list = $this->db->fetch_row('plugins_fun',$array,$order,$limit);
		}
		return $list;
	}

	/**
	 * 方法总数
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function fun_maxnum($array = array())
	{
		return $this->db->maxnum("plugins_fun",$array);
	}

	/**
	 * 更新方法
	 *
	 */
	function fun_update($array)
	{
		$array['dtime'] = time();

		if (!empty($array['id']))
		{
			return $this->db->update('plugins_fun',$array,' id ='.$array['id']);
		}
		else
		{
			return $this->db->insert('plugins_fun',$array);
		}
	}
	
	/** 删除方法 **/
	function fun_delete($id)
	{
		if (is_array($id))
		{
			$id = implode(',',$id);
		}
	
		if (empty($id))
		{
			return '-1';
		}

		$this->db->delete('plugins_fun', ' id  in ('.$id.')');
		
		return $id;
	}

}
?>