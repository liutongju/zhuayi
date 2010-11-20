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

<form action="?m=sitemaps&c=info&a=init" method="post" id="myform">
<fieldset>
	<legend>管理数据源</legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="80">数据源：</th>
			<td class="y-bg">
				<textarea name="dbsource" id="dbsource" style="width:99%;height:50px;"><?php echo $dbsource; ?></textarea>
				<span><br>格式：数据源1|数据源2|数据源3...</span>
			</td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
<input type="submit" class="button" id="dosubmit" name="dosubmit" value="提交" />
</form>