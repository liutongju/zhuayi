<?php
/*
 * blog_modle.php     Zhuayi 博客数据模型
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */

 
class blog_modle extends zhuayi
{

	/**
	 * 查询分类
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function category($array = array(),$order = '',$limit = '1')
	{
		if ($limit == '1')
		{
			$list =  $this->db->fetch('blog_category',$array,$order);
		}
		else
		{
			$list = $this->db->fetch_row('blog_category',$array,$order,$limit);
		}
		return $list;
	}

	/**
	 * 更新博客分类
	 *
	 */
	function category_update($array)
	{
		if (!empty($array['id']))
		{
			return $this->db->update('blog_category',$array,' id ='.$array['id']);
		}
		else
		{
			return $this->db->insert('blog_category',$array);
		}
	}


	/** 删除分类 **/
	function category_delete($id)
	{
		if (is_array($id))
		{
			$id = implode(',',$id);
		}
	
		if (empty($id))
		{
			return '-1';
		}

		$this->db->query('delete from '.T.'blog where  id  in ('.$id.')');
		$this->db->delete('blog_category', ' id  in ('.$id.')');
		
		return $id;
	}

	/**
	 * 查询博客
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function blog($array = array(),$order = '',$limit = '1')
	{
		if ($limit == '1')
		{
			$list =  $this->db->fetch('blog',$array,$order);
		}
		else
		{
			$list = $this->db->fetch_row('blog',$array,$order,$limit);
		}
		return $list;
	}

	/**
	 * 联合查询博客
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function blog_join($array = array(),$order = '',$limit = '1')
	{
		if ($limit == 1)
		{
			$list = self::blog($array,$order,$limit);
			$list['category'] = self::category(array('id'=>$list['cid']));
		}
		else
		{
			$list = $this->db->fetch_page('blog',$array,$order,$limit);
		
			foreach ($list['list'] as $key=>$val)
			{
				$list['list'][$key]['category'] = self::category(array('id'=>$val['cid']));
			}
		}
		return $list;
	}

	/**
	 * 更新博客
	 *
	 */
	function blog_update($array)
	{
		if (!empty($array['id']))
		{
			return $this->db->update('blog',$array,' id ='.$array['id']);
		}
		else
		{
			$array['dtime'] = time();
			return $this->db->insert('blog',$array);
		}
	}


	/** 删除博客 **/
	function blog_delete($id)
	{
		if (is_array($id))
		{
			$id = implode(',',$id);
		}
	
		if (empty($id))
		{
			return '-1';
		}

		$this->db->delete('blog', ' id  in ('.$id.')');
		
		return $id;
	}

	/**
	 * 博客总数
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function blog_maxnum($array = array())
	{
		return $this->db->maxnum("blog",$array);
	}

	/**
	 * 文章分类
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function blog_class()
	{
		$list = $this->db->fetch_row('blog_category',array(),'id desc','0 , 30');
		return $list;
	}

	/**
	 * 每日更新
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function blog_new_list()
	{
		$list = self::blog_join('cid = 6','id desc','0 , 10');
		return  $list['list'];

	}

	/**
	 * 热门博客
	 * @param find $array 查询条件，数组形式
	 * @param int $time 过期时间
	 */
	function blog_hot_list()
	{
		$list = self::blog_join('cid = 8',' id asc','0 , 10');
		return  $list['list'];
	}


}
?>