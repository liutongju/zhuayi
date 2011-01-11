<?php



$info = $query->one_array("select * from ".T."sina_account where id=".$_REQUEST['id']);

if ($info['status'] == 0)
{
	$info['status'] = '<font color=red>Î´¼¤»î</font>';
}
else
{
	$info['status'] = '<font color=#009900>ÒÑ¼¤»î</font>';
}


if ($info['gender'] == 1)
{
	$info['gender'] = 'ÄÐ';
}
elseif ($info['gender'] == 2)
{
	$info['gender'] = 'Å®';
}
else
{
	$info['gender'] = 'Î´Öª';
}

if (empty($info['cookie']))
{
	$info['login'] = '<font color=red>Î´µÇÂ¼</font>';
}
else
{
	$info['login'] = '<font color=#009900>ÒÑµÇÂ¼</font>';
}
?>