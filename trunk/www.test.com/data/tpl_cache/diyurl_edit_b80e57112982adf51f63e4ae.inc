<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#url").formValidator({onshow:"���������ӵ�ַ,������http://��ͷ",onfocus:"���������ӵ�ַ,������http://��ͷ"}).inputValidator({min:2,onerror:"���������ӵ�ַ,������http://��ͷ"});
	
})
//-->
</script>

<form action="?m=diyurl&c=info&a=init" method="post" id="myform">
<fieldset>
	<legend><?php echo $pagename; ?></legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="80">URL��</th>
			<td class="y-bg"><input type="text" class="input-text" name="url" id="url" value="<?php echo $info['url']; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>ӳ���ַ��</th>
			<td class="y-bg"><input type="text" class="input-text" name="request_url" id="request_url" value="<?php echo $info['request_url']; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>ģ��ƥ�䣺</th>
			<td class="y-bg">
				<input name="parameter" value="1" type="radio" <?php if ($info['parameter']==1){echo ' checked';}?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="parameter" value="0" type="radio"  <?php if ($info['parameter']==0){echo ' checked';}?>> ��     
			</td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
<input type="submit" class="button" id="dosubmit" name="dosubmit" value="�ύ" />
</form>