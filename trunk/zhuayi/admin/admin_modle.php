<?php
/*
 * admin_modle.php     Zhuayi 管理员数据模型
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */

 
class admin_modle extends zhuayi
{

	/**
	 * 查询帐号
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function admin($array = array(),$order = '',$limit = '1')
	{

		if ($limit == '1')
		{
			$list =  $this->db->fetch('admin',$array,$order);
		}
		else
		{
			$list = $this->db->fetch_row('admin',$array,$order,$limit);
		}
		return $list;
	}

	/**
	 * 更新帐号表
	 *
	 */
	function admin_update($array)
	{
		if (!empty($array['id']))
		{
			return $this->db->update('admin',$array,' id ='.$array['id']);
		}
		else
		{
			return $this->db->insert('admin',$array);
		}
	}

	/**
	 * 查询菜单
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function admin_menu_list($array,$order = ' orders asc')
	{
		return $this->db->fetch_row('admin_menu',$array,$order);
	}

	/**
	 * 查询菜单
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function admin_menu($array)
	{
		return $this->db->fetch('admin_menu',$array);
	}

	/**
	 * 更新菜单表
	 *
	 */
	function admin_menu_update($array,$where)
	{
		if (!empty($array['id']))
		{
			return $this->db->update('admin_menu',$array,' id ='.$array['id']);
		}
		else
		{
			return $this->db->insert('admin_menu',$array);
		}
	}

	/** 删除菜单 **/
	function admin_menu_delete($id)
	{
		return $this->db->delete('admin_menu', '  id ='.$id);
	}

	/** 删除管理员 **/
	function admin_delete($id)
	{
		if (is_array($id))
		{
			$id = implode(',',$id);
		}
	
		if (empty($id))
		{
			return '-1';
		}

		$this->db->delete('admin', ' id  in ('.$id.')');
		
		return $id;
	}

	function user_update($array)
	{
		if (!empty($array['id']))
		{
			return $this->db->update('admin',$array,' id ='.$array['id']);
		}
		else
		{
			return $this->db->insert('admin',$array);
		}
	}
	
	/**
	 * 管理员总数
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function admin_maxnum($array = array())
	{
		return $this->db->maxnum("admin",$array);
	}
}
?>