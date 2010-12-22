<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#app_key").formValidator({onshow:"请输入自己申请的AppKey",onfocus:"请输入自己申请的AppKey"}).inputValidator({min:2,max:20,onerror:"请输入自己申请的AppKey"});
	$("#app_secret").formValidator({onshow:"请输入自己申请的appSecret",onfocus:"请输入自己申请的appSecret"}).inputValidator({min:2,onerror:"请输入自己申请的appSecret"});
	$("#taobao_cache_time").formValidator({onshow:"请填写数字,单位秒",onfocus:"请填写数字,单位秒"}).inputValidator({min:2,onerror:"请填写数字,单位秒"});
	
	
})
//-->
</script>
<form action="?m=taobao&c=config_info&a=init" method="post" id="myform">
<fieldset>
	<legend><?php echo $pagename; ?></legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="80">app key：</th>
			<td class="y-bg"><input type="text" class="input-text" name="taobao_config[app_key]" id="app_key" value="<?php echo $app_key; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>app secret：</th>
			<td class="y-bg"><input type="text" class="input-text" name="taobao_config[app_secret]" id="app_secret" value="<?php echo $app_secret; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>淘宝帐号：</th>
			<td class="y-bg"><input type="text" class="input-text" name="taobao_config[app_nick]" id="nick" value="<?php echo $app_nick; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>抓取时间：</th>
			<td class="y-bg"><input type="text" class="input-text" name="taobao_config[timeout]" id="app_secret" value="<?php echo $timeout; ?>" size="30" /></td>
		</tr>
		<tr>
			<th width="150">频道页生成Html：</th>
			<td class="y-bg">
				<input name="taobao_config[taobao_index_generate]" value="1" type="radio" <?php if ($taobao_index_generate==1){echo ' checked';}?> class="article_index_generate"> 是&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="taobao_config[taobao_index_generate]" value="0" type="radio"  <?php if ($taobao_index_generate==0){echo ' checked';}?> class="article_index_generate"> 否  
			</td>
		</tr>
		<tr class="article_index_url">
			<th width="150">动态URL地址：</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="taobao_config[taobao_index_url]"  value="<?php echo $taobao_index_url; ?>" size="60" id="article_index_url">
			</td>
		</tr>
		<tr class="taobao_index_path">
			<th width="150">HTML存放地址：</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="taobao_config[taobao_index_path]"  value="<?php echo $taobao_index_path; ?>" size="60" id="taobao_index_path"/>
			</td>
		</tr>
		<tr>
			<th width="150">缓存存活时间：</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="taobao_config[taobao_cache_time]"  value="<?php echo $taobao_cache_time; ?>" size="10" id="taobao_cache_time"/>
			</td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="filename" value="taobao_config"/>
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="提交" />
</form>


<?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>