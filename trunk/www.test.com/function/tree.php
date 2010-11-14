<?php
/**
 * --------------------------------------
 * tree.php     ZCMS ����������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 * --------------------------------------
 * @array        Ҫת��������
 * @parent       �Ƚϼ�ֵ,һ��Ϊ����ID
 * @f            ���ĳ�ʼ��
 * @gap          ��֦�����һ����ȫ�ǿո���棬�������ҳ�������趨
 * @branches     ��辣����������
 */
function tree($array,$parent,$f=0,$gap='��',$branches='����')
{
	$ge = '����';
	//-----�������ͨ�������ô�����м��������Ϊ��
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