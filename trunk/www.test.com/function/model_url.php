<?php
/* -��ȡģ������URL */
function model_url($m,$c='index')
{
	if ($c!='')
	{
		$c .= '/';
	}
	return ZCMS_URL.'/zcms/'.$m.'/template/'.$c;
}

?>