<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#file1").formValidator({onshow:"��ѡ��Ҫ������ļ�",onfocus:"��ѡ��Ҫ������ļ�"}).inputValidator({min:2,onerror:"��ѡ��Ҫ������ļ�"});

	
})
//-->
</script>
<form action="?m=module&c=import_info&a=init" method="post" id="myform" enctype="multipart/form-data">
<fieldset>
	<legend><?php echo $pagename; ?></legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="100">ѡ�����ļ���</th>
			<td class="y-bg"><input type="file" name="file1" id="file1" /></td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="submit" class="button" id="dosubmit" name="dosubmit" value="����" />
</form>