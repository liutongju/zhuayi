<?php
/**
 * admin_info.php     ZCMS ��̨������Ŀ������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

 


/* ��ȡ�ϴ����ļ� */
if(!is_file($_FILES["file1"]["tmp_name"]))
{
	showmsg('��û���ϴ��ļ�Ŷ','-1');
}
else
{
	$filename = $_FILES["file1"]["tmp_name"];
	$string = file_get_contents($filename);
	$string = array_unique(explode(chr(13),trim($string)));
	/* ѭ������,����ǰ�鿴���Ƿ��д��ڵļ�¼ */
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
	showmsg('����ɹ�,���ε��� '.$i." ������",ret_cookie("backurl"));
}
exit;
?>