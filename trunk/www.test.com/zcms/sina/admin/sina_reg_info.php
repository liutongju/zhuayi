<?php
/**
 * index.php     ZCMS ����ļ�
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */


$snoopy->proxy_host = ret_cookie('agent_ip');
$snoopy->proxy_port = ret_cookie('agent_port');

/* ��ʼע�� ģ�������ͷ*/

$snoopy->cookies["ULOGIN_IMG"] = ret_cookie('sina_code');

/* ��ʼģ��� */
$form['act'] =2;
$form['entry'] ='sso';
$form['returnURL'] ='';
$form['username'] = $_POST['username'];
$form['corp'] = '';
$form['mcheck'] = '';
$form['referer'] = '294646374f03c04109139b1f8a9c7af9http://login.sina.com.cn/signup/signup.php?entry=s';
$form['from'] = 'regmail';
$form['user_name'] = $_POST['username'];
$form['mailType'] = 'cn';
$form['notifyType'] = '4';
$form['password'] = $_POST['pass'];
$form['password2'] = $_POST['pass'];
$form['selectQid'] = '����';
$form['otherQid'] = '7758521';
$form['pwdA'] = '198698';
$form['nick'] = siconv($_POST['nick']);
$form['door'] = trim($_POST['code']);
$form['after'] ='on';
$form['pass'] = $_POST['pass'];
$form['dtime'] = time();
/* ��ȡIP */
$form['ip'] = ret_cookie();

/* ����һ���ֻ����� */
$mobile = $query->one_array("select * from ".T."sina_mobile order by rand() limit 0,1");
$form['mobile'] = $mobile['mobile'];


/* ����ԱID */
$form['myid'] = ret_cookie('admin_userid');
/* ���ݲ���ԱID ����һ������ */
$cid = $query->one_array("select * from ".T."sina_account_class where aid=".ret_cookie('admin_userid'));
$form['cid'] = $cid['id'];
if (empty($form['cid']))
{
	echo 'û�а󶨷���,����ע��..';
	exit;
}
/* ���һ��ʡ�� */
$province = $query->one_array("select * from ".T."linkage where parent_id = 1 order by rand() limit 0,1");
$form['province'] = $province['id'];
$province = $query->one_array("select * from ".T."linkage where parent_id = '".$province['id']."' order by rand() limit 0,1");
$form['province'] .= ','.$province['orders'];

/* ���һ���Ա� */
$form['gender'] = rand(1,2);

//echo '1103';
//exit;
/* �ύ�� */
$snoopy->submit($url,$form);
$return = $snoopy->results;

if (strpos($return,'��֤��������������������')>0)
{
	echo '-1';
}
elseif (strpos($return,'��ϲ�������˻�Աע��ɹ�!')>0)
{
	$form['username'] .= '@sina.cn';

	$t = new sina();
	$t->username = $form['username'];
	$t->password = $form['pass'];
	$reset = $t->login();

	$form['cookie'] = $reset['cookie'];
	$form['uid'] = $reset['uid'];
	/* д�뵽���ݿ� */
	$query->save('sina_account',$form);
	set_cookie('code_num',ret_cookie('code_num')+1);
	echo '1';

}
elseif (strpos($return,'�ܱ�Ǹ�����ʺű���ע����ѡ�������ʺ�')>0)
{
	echo '-2';
}
elseif (strpos($return,'��Ǹ�����ǻ������ж���ע������ɣ����Ժ����ԣ�')>0)
{
	echo '-3';
}
else
{
	echo $return;
}
exit;



?>