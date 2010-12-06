<?php
/*�Զ�ƥ�䲹��δ�رյ�HTML��ǩ*/
function closetags($html){
/*��ȡ���һ�� < ֮ǰ�����ݣ�ȷ���ַ���������HTML��ǩ���� > ����*/
$html=preg_replace("~<[^<>]+?$~i", "", $html);
/*�Զ�ƥ�䲹��δ�رյ�HTML��ǩ*/
/* put all opened tags into an array */
preg_match_all("#<([a-z]+)( .*[^/])?(?!/)>#iU",$html,$result);
$openedtags=$result[1];
/* put all closed tags into an array */
preg_match_all("#</([a-z]+)>#iU",$html,$result);
$closedtags=$result[1];
$len_opened = count($openedtags);
/*  all tags are closed */
if(count($closedtags) == $len_opened){
  return $html;
}
$openedtags = array_reverse($openedtags);
/* close tags */
	for($i=0;$i<$len_opened;$i++)
	{
		if (!in_array($openedtags[$i],$closedtags))
		{
			/* ת��$��ǩΪСд */
			$openedtags[$i] = strtolower($openedtags[$i]);
			if ($openedtags[$i]!='br' && $openedtags[$i]!='img')
			$html .= '</'.$openedtags[$i].'>';
		}
		else
		{
			unset($closedtags[array_search($openedtags[$i],$closedtags)]);
		}
	}
return $html;
}
?>