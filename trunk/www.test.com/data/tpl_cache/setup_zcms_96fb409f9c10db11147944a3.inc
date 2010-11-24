<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#dbhost").formValidator({onshow:"请输入数据库地址",onfocus:"数据库地址不能为空"}).inputValidator({min:2,max:20,onerror:"数据库地址不能为空"});
	$("#dbuser").formValidator({onshow:"请输入数据库帐号",onfocus:"数据库帐号不能为空"}).inputValidator({min:2,onerror:"数据库帐号不能为空"});
	$("#dbname").formValidator({onshow:"请输入数据库名称",onfocus:"数据库名称不能为空"}).inputValidator({min:2,onerror:"数据库名称不能为空"});
	$("#cookievarpre").formValidator({onshow:"请输入数据表前缀",onfocus:"数据库前缀不能为空"}).inputValidator({min:2,onerror:"数据库前缀不能为空"});
	
	
})
//-->
</script>
<form action="?m=setup&c=info&a=init" method="post" id="myform">
<fieldset>
	<legend><?php echo $pagename; ?></legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="80">数据库地址：</th>
			<td class="y-bg"><input type="text" class="input-text" name="zcms_config[dbhost]" id="dbhost" value="<?php echo $dbhost; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>数据库帐号：</th>
			<td class="y-bg"><input type="text" class="input-text" name="zcms_config[dbuser]" id="dbuser" value="<?php echo $dbuser; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>数据库密码：</th>
			<td class="y-bg"><input type="password" class="input-text" name="zcms_config[dbpw]" id="dbpw" value="<?php echo $dbpw; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>数据库名称：</th>
			<td class="y-bg"><input type="text" class="input-text" name="zcms_config[dbname]" id="dbname" value="<?php echo $dbname; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>数据表前缀：</th>
			<td class="y-bg"><input type="text" class="input-text" name="zcms_config[cookievarpre]" id="cookievarpre" value="<?php echo $cookievarpre; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>分页显示数：</th>
			<td class="y-bg"><input type="text" class="input-text" name="zcms_config[perpagenum]" id="perpagenum" value="<?php echo $perpagenum; ?>" size="30" /></td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="filename" value="zcms_config"/>
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="提交" />
</form>


<?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>