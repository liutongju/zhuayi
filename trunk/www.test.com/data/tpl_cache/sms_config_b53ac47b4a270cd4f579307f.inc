<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#gateway").formValidator({onshow:"请填写亿美短信接口网关地址",onfocus:"请填写亿美短信接口网关地址"}).inputValidator({min:1,onerror:"请填写亿美短信接口网关地址"});
	$("#serial").formValidator({onshow:"请通过亿美销售人员获取",onfocus:"请通过亿美销售人员获取"})
	$("#password").formValidator({onshow:"请通过亿美销售人员获取",onfocus:"请通过亿美销售人员获取"})
	$("#outtime").formValidator({onshow:"请通过亿美销售人员获取",onfocus:"请通过亿美销售人员获取"})
	
	
})
//-->
</script>
<form action="?m=sms&c=config_info&a=init" method="post" id="myform" enctype="multipart/form-data">
<fieldset>
	<legend><?php echo $pagename; ?></legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="150">网关地址：</th>
			<td class="y-bg">
			<input type="text" class="input-text" name="sms_config[gateway]" id="gateway" value="<?php echo $gateway; ?>" size="60" />
			</td>
		</tr>
		<tr>
			<th>序列号：</th>
			<td class="y-bg"><input type="text" class="input-text" name="sms_config[serial]" id="serial" value="<?php echo $serial; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>密码：</th>
			<td class="y-bg">
			<input type="text" class="input-text" name="sms_config[password]" id="password" value="<?php echo $password; ?>" size="60" />
			</td>
		</tr>
		<tr>
			<th>超时时间：</th>
			<td class="y-bg"><input type="text" class="input-text" name="sms_config[outtime]" id="outtime" value="<?php echo $outtime; ?>" size="60" /></td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="filename" value="sms_config"/>
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="提交" />
</form>


<?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>