<?php

function getedit($FCKeditor,$count='',$tables='',$width='100%',$height=300)
{

	echo '<script type="text/JavaScript" charset="utf-8" src="/keditor/kindeditor-min.js"></script>'."\n";
	echo '<script type="text/JavaScript" charset="utf-8" src="/keditor/lang/zh_CN.js"></script>'."\n";
	echo '<script>'."\n";
	echo 'var editor;'."\n";
	echo "	KindEditor.ready(function(K) {editor = K.create('#".$FCKeditor."',{themeType:'simple'})});\n";
	echo '</script>'."\n";
	echo '<textarea id="'.$FCKeditor.'" name="'.$FCKeditor.'" style="width:'.$width.'; height:'.$height.'px;">'.
$count.'</textarea>';
}
?>