<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#class_tpl").formValidator({onshow:"������Ĭ��ģ��,�����Ը�Ŀ¼��ʼ",onfocus:"������Ĭ��ģ��,�����Ը�Ŀ¼��ʼ"})
	$("#path").formValidator({onshow:"�����뾲̬ҳ��ŵ�ַ,����\"/\"��ͷ����\"/\"��β(�Ǳ���,�������򲻱���д)",onfocus:"�����뾲̬ҳ��ŵ�ַ(�Ǳ���,�������򲻱���д)"})
	$("#html").formValidator({onshow:"��ѡ���Ƿ�����HTML",onfocus:"��ѡ���Ƿ�����HTML"})
	$("#class_url").formValidator({onshow:"������Ĭ��URL,���ñ�ǩ{id},�滻ΪֱͶID",onfocus:"������Ĭ��URL,���ñ�ǩ{id}"}).inputValidator({min:2,onerror:"������Ĭ��URL,���ñ�ǩ{id}"});
})
//-->
</script>
<form action="?m=article&c=config_info&a=init" method="post" id="myform">
<fieldset>
	<legend>��������</legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="150">��̬ҳ��ŵ�ַ��</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[path]" id="path" value="<?php echo $path; ?>" size="30" /> 
			</td>
		</tr>
	</table>
</fieldset>
<fieldset>
	<legend>������Ŀ����</legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="150">Ĭ����Ŀ����Html��</th>
			<td class="y-bg">
				<input name="article_config[html]" value="1" type="radio" <?php if ($html==1){echo ' checked';}?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[html]" value="0" type="radio"  <?php if ($html==0){echo ' checked';}?>> ��  
			</td>
		</tr>
		<tr>
			<th width="150">Ĭ��ģ�棺��</th>
			<td class="y-bg"><input type="text" class="input-text" name="article_config[class_tpl]" id="class_tpl" value="<?php echo $class_tpl; ?>" size="30" /></td>
		</tr>
		<tr>
			<th width="150">Ĭ��URL��ַ��</th>
			<td class="y-bg"><input type="text" class="input-text" name="article_config[class_url]" id="class_url" value="<?php echo $class_url; ?>" size="30" /></td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="filename" value="article_config"/>
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="�ύ" />
</form>


<?php include $this->CompilerInclude("/zcms/admin/template/admin/�ײ�.html");
 ?>