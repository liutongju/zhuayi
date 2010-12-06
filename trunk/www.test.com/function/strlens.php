<?php

/* НиШЁ */
function strlens($str,$start,$len,$tags='') {
if (empty($tags))
$str = strip_tags($str);
$tmpstr = "";
$strlen = $start + $len;
for($i = $start; $i < $strlen; $i++) {
       if(ord(substr($str, $i, 1)) > 0xa0) {
         $tmpstr .= substr($str, $i, 2);
         $i++;
       } else
         $tmpstr .= substr($str, $i, 1);
}
return $tmpstr;
}
?>