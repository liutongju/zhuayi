<?php
	/*---SEO ---*/
function seo($table,$aid,$action='')
{
	global $query;
	$_POST['tables'] = $table;
	$_POST['aid'] = $aid;
	$_POST['url'] = str_replace('{id}',$aid,$_POST['url']);
	//----���Ϊ�������
	if ($action=='')
	{
		
		if ($query->maxnum("select count(*) from ".T."seo where tables ='".$table."' and aid=".$aid)==0)
		{

			if (empty($_POST['request_url']))
			return;
			$query->save("seo",$_POST);
		}
		else
		{
			if (empty($_POST['parameter']))
			$_POST['parameter'] =0 ;
			$query->save("seo",$_POST," aid =".$aid." and tables ='".$table."'");
		}
	}
	//-----ɾ������
	elseif ($action == 'delete')
	{
		$query->delete("seo"," tables = '".$table."' and aid=".$aid);
	}
}

?>