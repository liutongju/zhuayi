<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#app_key").formValidator({onshow:"�������Լ������AppKey",onfocus:"�������Լ������AppKey"}).inputValidator({min:2,max:20,onerror:"�������Լ������AppKey"});
	$("#app_secret").formValidator({onshow:"�������Լ������appSecret",onfocus:"�������Լ������appSecret"}).inputValidator({min:2,onerror:"�������Լ������appSecret"});
	$("#taobao_cache_time").formValidator({onshow:"����д����,��λ��",onfocus:"����д����,��λ��"}).inputValidator({min:2,onerror:"����д����,��λ��"});
	
	
})
//-->
</script>
<form action="?m=taobao&c=config_info&a=init" method="post" id="myform">
<fieldset>
	<legend><?php echo $pagename; ?></legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="80">app key��</th>
			<td class="y-bg"><input type="text" class="input-text" name="taobao_config[app_key]" id="app_key" value="<?php echo $app_key; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>app secret��</th>
			<td class="y-bg"><input type="text" class="input-text" name="taobao_config[app_secret]" id="app_secret" value="<?php echo $app_secret; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>�Ա��ʺţ�</th>
			<td class="y-bg"><input type="text" class="input-text" name="taobao_config[app_nick]" id="nick" value="<?php echo $app_nick; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>ץȡʱ�䣺</th>
			<td class="y-bg"><input type="text" class="input-text" name="taobao_config[timeout]" id="app_secret" value="<?php echo $timeout; ?>" size="30" /></td>
		</tr>
		<tr>
			<th width="150">Ƶ��ҳ����Html��</th>
			<td class="y-bg">
				<input name="taobao_config[taobao_index_generate]" value="1" type="radio" <?php if ($taobao_index_generate==1){echo ' checked';}?> class="article_index_generate"> ��&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="taobao_config[taobao_index_generate]" value="0" type="radio"  <?php if ($taobao_index_generate==0){echo ' checked';}?> class="article_index_generate"> ��  
			</td>
		</tr>
		<tr class="article_index_url">
			<th width="150">��̬URL��ַ��</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="taobao_config[taobao_index_url]"  value="<?php echo $taobao_index_url; ?>" size="60" id="article_index_url">
			</td>
		</tr>
		<tr class="taobao_index_path">
			<th width="150">HTML��ŵ�ַ��</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="taobao_config[taobao_index_path]"  value="<?php echo $taobao_index_path; ?>" size="60" id="taobao_index_path"/>
			</td>
		</tr>
		<tr>
			<th width="150">������ʱ�䣺</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="taobao_config[taobao_cache_time]"  value="<?php echo $taobao_cache_time; ?>" size="10" id="taobao_cache_time"/>
			</td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="filename" value="taobao_config"/>
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="�ύ" />
</form>


<?php include $this->CompilerInclude("/zcms/admin/template/admin/�ײ�.html");
 ?>