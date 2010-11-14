<?php
/**
 * --------------------------------------
 * tree.php     ZCMS 数组生成树
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 * --------------------------------------
 * @array        要转换的数组
 * @parent       比较键值,一般为父类ID
 * @f            树的初始数
 * @gap          树枝间隔，一般用全角空格代替，这个根据页面自行设定
 * @branches     树杈，这个好理解吧
 */
function tree($array,$parent,$f=0,$gap='　',$branches='├─')
{
	$ge = '└─';
	//-----如果传入通配符，那么把所有间隔负设置为空
	if ($gap == '^')
	{
		$gap ='';
	}
	if ($branches == '^')
	{
		$branches ='';
		$ge = '^';
	}
	
	$tree = '';
	foreach ($array as $key=>$val)
	{
		if ($val[$parent] == $f)
		{
			$val['title'] = $gap.$branches.$val['title'];
			$tree[] = $val;			
			$tree_f = tree($array,$parent,$val['id'],$gap.$gap,$ge);
			if (is_array($tree_f))
			{
				foreach ($tree_f as $vals)
				{
					$tree[] = $vals;
				}
			}
		}
	}
	return $tree;
}


?>