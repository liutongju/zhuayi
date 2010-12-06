<?php
/* -获取模型虚拟URL */
function model_url($m,$c='index')
{
	if ($c!='')
	{
		$c .= '/';
	}
	return ZCMS_URL.'/zcms/'.$m.'/template/'.$c;
}

?>