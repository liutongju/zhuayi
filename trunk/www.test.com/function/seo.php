<?php
	/*---SEO ---*/
function seo($table,$aid,$action='')
{
	global $query,$weburl,$_POST;
	$_POST['tables'] = $table;
	$_POST['aid'] = $aid;
	$_POST['url'] = str_replace('{id}',$aid,$_POST['url']);
	/* �滻��ǰ��վURL��ʹ��֧��'/***'�����Զ���URL */
	$_POST['url'] = str_replace($weburl,'',$_POST['url']);

	/* ���Ϊ������� */
	if ($action=='')
	{

		if ($query->maxnum("select count(*) from ".T."seo where tables ='".$table."' and aid=".$aid)==0)
		{

			if (empty($_POST['request_url']) && empty($_POST['seo_description']) && empty($_POST['seo_keywords']) && empty($_POST['seo_title']))
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
	/* ɾ������ */
	elseif ($action == 'delete')
	{
		$query->delete("seo"," tables = '".$table."' and aid in(".$aid.")");
	}
}

?>