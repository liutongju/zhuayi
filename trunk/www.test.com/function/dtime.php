<?php

//-----ת��ʱ��
function dtime($dtime,$num='0')
{
	switch ($num)
	{
		case "0";
		return date("Y-m-d G:i:m",$dtime);
		break;
		case "1";
		return date("Y��m��d��",$dtime);
		break;
		case "2";
			$time = time() - $dtime;
			if ($time < 86400)
			{
				if ($time <60 )
				return $time.'��ǰ';
				if ($time <3600 && $time >60)
				return intval($time/60).'����ǰ';
				if ($time >3600 && $time <86400)
				return intval($time/3600).'Сʱǰ';
			}
			return date("Y��m��d��",$dtime);
		break;
		case "3";
		return date("Y-m-d",$dtime);
		case "4";
		return date("d",$dtime);
		case "5";
		{
			 $day = array("������","����һ","���ڶ�","������","������","������","������",);
			 $time = date("w",$dtime);
			return $day[$time];
		}
	}
}



?>