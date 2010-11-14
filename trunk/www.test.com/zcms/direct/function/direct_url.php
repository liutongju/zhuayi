<?php
function direct_url($id)
{
	//-------тьхКеДжцнд╪Ч
	include_once ZCMS_ROOT.'/zcms/direct/include/direct_config.php';
	global $direct_url;
	return str_replace('{id}',$id,$direct_url);
}
?>