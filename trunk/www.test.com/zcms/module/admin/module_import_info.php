<?php
/**
 * admin_info.php     ZCMS ��̨ģ�鵼�� ������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* �ж��Ƿ�װ�ļ� */

$file = $_FILES['file1'];
$h = trim(substr(strrchr($file['name'],'.'),1,100)); /* ȡ���ϴ��ļ��ĺ�׺ */
$filename = ZCMS_ROOT.'/data/install_cache/';
if (!file_exists($filename)){	mkdir($filename,777,true);}
$filename .= md5(time()).'.'.$h;
if ($h!='zcms')
{
	showmsg('��ѡ��Ĳ���ģ�鰲װ�ļ�..','-1');
}
if (!copy($file['tmp_name'],$filename)){	showmsg('�ϴ��ļ�����..','-1');}
/* ���ϴ����ļ� */
$con = file_get_contents($filename);
$con = unserialize($con);
/* ��ѯ�Ƿ��д��ڴ�ģ�� */
if ($query->maxnum("select count(*) from ".T."module where title='".$con['title']."' and mark='".$con['mark']."'")>0)
{
	showmsg('�Ѿ����ڴ�ģ�飬������װ',-1);
}
/* �жϰ�װ�ļ��Ƿ���ȷ */
if (empty($con['title']) && empty($con['mark']))
{
	showmsg('��װ�ļ�����,������װ',-1);
}
/* ������� */
$_POST['id'] = $query->save('module',$con);
/* д����־ */
admin_log("module",$_POST['id'],'title','����ģ�鰲װ�ļ�');
showmsg('����ɹ�..',ret_cookie('backurl'));
exit;
?>