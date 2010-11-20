<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#title").formValidator({onshow:"请输入连接名称",onfocus:"连接名称不能为空"}).inputValidator({min:2,max:20,onerror:"连接名称不能为空"});
	$("#url").formValidator({onshow:"请输入连接地址,必须以http://开头",onfocus:"请输入连接地址,必须以http://开头"}).inputValidator({min:2,onerror:"请输入连接地址,必须以http://开头"});
	
})
//-->
</script>

<form action="?m=link&c=info&a=init" method="post" id="myform">
<fieldset>
	<legend><?php echo $pagename; ?></legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="80">连接名称：</th>
			<td class="y-bg"><input type="text" class="input-text" name="title" id="title" value="<?php echo $info['title']; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>连接地址：</th>
			<td class="y-bg"><input type="text" class="input-text" name="url" id="url" value="<?php echo $info['url']; ?>" size="30" /></td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
<input type="submit" class="button" id="dosubmit" name="dosubmit" value="提交" />
</form>