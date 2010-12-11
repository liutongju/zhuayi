<?php
/**
 * admin_info.php     ZCMS 后台文章栏目入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

 


/* 读取上传的文件 */
if(!is_file($_FILES["file1"]["tmp_name"]))
{
	showmsg('您没有上传文件哦','-1');
}
else
{
	$filename = $_FILES["file1"]["tmp_name"];
	$string = file_get_contents($filename);
	$string = array_unique(explode(chr(13),trim($string)));
	/* 循环插入,插入前查看下是否有存在的记录 */
	$i=1;
	foreach ($string as $val)
	{
		$val = explode('|',$val);
		if ($query->maxnum("select count(*) from ".T."sms where sms ='".trim($val[0])."'")==0)
		{
			$query->query("insert into ".T."sms(cid,sms,username,dtime)values('".$_POST['cid']."','".trim($val[0])."','".trim($val[1])."','".time()."')");
			$i++;
		}
		
	}
	showmsg('导入成功,本次导入 '.$i." 个号码",ret_cookie("backurl"));
}
exit;
?>