<?php
//-----------����ת��
function siconv($string,$outEncoding ='gb2312')     
{     
    //$encoding = "utf-8";
	//$string = urlencode($); 
	$encoding='';
    for($i=0;$i<strlen($string);$i++)     
    {     
        if(ord($string{$i})<128)     
            continue;     
    
        if((ord($string{$i})&224)==224)     
        {     
            //��һ���ֽ��ж�ͨ��     
            $char = $string{++$i};     
            if((ord($char)&128)==128)     
            {     
                //�ڶ����ֽ��ж�ͨ��     
                $char = $string{++$i};     
                if((ord($char)&128)==128)     
                {     
                    $encoding = "UTF-8";     
                    break;     
                }     
            }     
        }     
        if((ord($string{$i})&192)==192)     
        {     
            //��һ���ֽ��ж�ͨ��     
            $char = $string{++$i};     
            if((ord($char)&128)==128)     
            {     
                // �ڶ����ֽ��ж�ͨ��     
                $encoding = "GB2312";     
                break;     
            }     
        }     
    }     
         
    if(strtoupper($encoding) == strtoupper($outEncoding))     
        return $string;     
    else    
        return iconv($encoding,$outEncoding,$string);     
}
?>