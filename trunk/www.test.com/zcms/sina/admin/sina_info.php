<?php



$info = $query->one_array("select * from ".T."sina_account where id=".$_REQUEST['id']);

if ($info['status'] == 0)
{
	$info['status'] = '<font color=red>δ����</font>';
}
else
{
	$info['status'] = '<font color=#009900>�Ѽ���</font>';
}


if ($info['gender'] == 1)
{
	$info['gender'] = '��';
}
elseif ($info['gender'] == 2)
{
	$info['gender'] = 'Ů';
}
else
{
	$info['gender'] = 'δ֪';
}

if (empty($info['cookie']))
{
	$info['login'] = '<font color=red>δ��¼</font>';
}
else
{
	$info['login'] = '<font color=#009900>�ѵ�¼</font>';
}
?>