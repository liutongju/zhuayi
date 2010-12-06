<?php
/*自动匹配补齐未关闭的HTML标签*/
function closetags($html){
/*截取最后一个 < 之前的内容，确保字符串中所有HTML标签都以 > 结束*/
$html=preg_replace("~<[^<>]+?$~i", "", $html);
/*自动匹配补齐未关闭的HTML标签*/
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
			/* 转换$标签为小写 */
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