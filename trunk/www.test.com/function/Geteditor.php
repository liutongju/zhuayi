<?php

function GetEditor($FCKeditor,$count='',$tables='',$width='100%',$height=300)
{
	global $admin_path;
	
	echo '  <script type="text/JavaScript" charset="utf-8" src="/keditor/kindeditor.js"></script>';
	echo '  <script>';
	echo '  KE.show({
				id : \''.$FCKeditor.'\'
			});';

	echo '</script>';


	echo '<textarea id="'.$FCKeditor.'" name="'.$FCKeditor.'" style="width:'.$width.'; height:'.$height.'px;">'.$count.'</textarea>';
}
?>