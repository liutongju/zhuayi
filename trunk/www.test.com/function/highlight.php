<?php
function highlight($string, $words, $hrefs='',$pretext='', $step='')
{
	global $replace_times,$highlight_array;
	//后两个变量为系统继承变量，不可指定
	if($step != 'me')
	{
		return preg_replace('/(^|>)([^<]+)(?=<|$)/sUe', "highlight('\\2',\$words, \$hrefs, '\\1', 'me')", $string);
    }
    if(is_array($words))
	{
		$string = str_replace('\"', '"', $string);       
		foreach($words as $k => $word)
		{                 
			if(empty($hrefs[$k]))
			{
				$string = preg_replace('/(^|>)([^<]+)(?=<|$)/sUe', "highlight('\\2',\$word, '', '\\1', 'me')", $string);
			}
			else
			{                    
				$string = preg_replace('/(^|>)([^<]+)(?=<|$)/sUe', "highlight('\\2',\$word, \$hrefs[\$k], '\\1', 'me')", $string);
			}            
		}
        return $pretext.$string;
    }
	else
	{
		if($hrefs == '')
		{
			$string = str_replace($words,'<strong><font color="#ff0000">'.$words.'</font></strong>',$string);
		}
		else
		{              
			$keyword_pos=strpos($string, $words);            
			if(($keyword_pos!== false))
			{
				if ((empty($highlight_array[$words]))||(!isset($highlight_array[$words])))
				{
					$highlight_array[$words]=1;                            
				}                    
				if ($highlight_array[$words]<=$replace_times)
				{
					$highlight_array[$words]++;
					$string = str_replace($words, '<a href="'.$hrefs.'" class="highlight_key">'.$words.'</a>', $string);
				}                   
			}   
		}
		return $pretext.$string;
    }
}
?>