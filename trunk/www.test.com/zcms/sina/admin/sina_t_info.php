<?php
/**
 * index.php     ZCMS ����΢��
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */


if (empty($_REQUEST['id']))
{
	echo 'û��Ҫ���͵��ʺ�';
}

/* �ж��Ƿ���Ҫ���ץȡ */
if (!empty($_REQUEST['zhuaqu']))
{
	/* ��ȡ���ݿ� */
	if (!empty($_REQUEST['cid']))
	{
		$search .= " and cid in (".$_REQUEST['cid'].")";
	}
	if (!empty($_REQUEST['title']))
	{
		$search .= " and body like '%".urldecode($_REQUEST['title'])."%'";
	}

	$body = $query->one_array("select * from ".T."sina_content where status = 0 ".$search." order by rand() limit 0,1");
}
else
{
	$collect = array('163','sohu','qq');
	$key = array_rand($collect);
	$function = 'collect_'.$collect[$key];
	$body = $function();
}

//$body['body'] = '��������ڵ������½���ʾ�㰮�˵�����';
//$body['pic'] = 'http://s1.t.itc.cn/mblog/pic/201101/11/1/m_12946808077474.jpg';
if (!empty($body['pic']))
{
	$snoopy->referer = 'http://t.'.$collect[$key].'.com/';
	$snoopy->fetch($body['pic']);
	$pic = ZCMS_ROOT.'/data/sina_pic/'.date("Y-m-d").'/'.md5($body['pic'].time()).'.jpg';
	write($pic,$snoopy->results);
}

/* ��ѯ��Ա */
$info = $query->one_array("select * from ".T."sina_account where id = ".$_REQUEST['id']);
/* ȥ��¼����΢�� */

$t = new sina();
$t->username = $info['username'];
$t->password = $info['pass'];
$t->cookies =  $info['cookie'];
$return = $t->t_info($body['body'],$pic,$info['uid']);
if ($return == '1')
{
	/* ���ø���Ϣ�ѷ��� */
	//$query->query("update ".T."sina_content set status = 1 where id =".$body['id']);
	echo '����΢���ɹ�.';
}
else
{
	echo '����΢��ʧ��:<font color=red>'.$return['error'].'</font>';
}
exit;

?>