<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#webname").formValidator({onshow:"������վ������",onfocus:"������վ������"}).inputValidator({min:1,onerror:"������վ����"});
	$("#logo").formValidator({onshow:"LOGOĬ�ϴ�ŵ�ַ/data/logo.gif",onfocus:"LOGOĬ�ϴ�ŵ�ַ/data/logo.gif"}).inputValidator({min:1,onerror:"LOGOĬ�ϴ�ŵ�ַ/data/logo.gif"});
	$("#weburl").formValidator({onshow:"����д��������ʽΪ��http://www.zcms.cn,ĩβ��Ҫ����/��",onfocus:"����д��������ʽΪ��http://www.zcms.cn,ĩβ��Ҫ����/��",tipcss:{width:'300px'},empty:false}).inputValidator({onerror:"����д��������ʽΪ��http://www.zcms.cn,ĩβ��Ҫ����/��"}).regexValidator({regexp:"http:\/\/(.+)$",onerror:"��ʽӦ��Ϊhttp://www.zcms.cn��ĩβ��Ҫ����/��"});

	
	
})
//-->
</script>
<form action="?m=setup&c=info&a=init" method="post" id="myform" enctype="multipart/form-data">
<fieldset>
	<legend><?php echo $pagename; ?></legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="150">��վ���ƣ�</th>
			<td class="y-bg"><input type="text" class="input-text" name="web_config[webname]" id="webname" value="<?php echo $webname; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>��վ������</th>
			<td class="y-bg"><input type="text" class="input-text" name="web_config[weburl]" id="weburl" value="<?php echo $weburl; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>��վLOGO��</th>
			<td class="y-bg">
			<input type="text" class="input-text" name="web_config[logo]" id="logo" value="<?php echo $logo; ?>" size="60" />
			</td>
		</tr>
		<tr>
			<th>��վ��Ȩ��</th>
			<td class="y-bg"><input type="text" class="input-text" name="web_config[powerby]" id="powerby" value="<?php echo $powerby; ?>" size="60" /></td>
		</tr>
		<tr>
			<th>������ţ�</th>
			<td class="y-bg"><input type="text" class="input-text" name="web_config[beian]" id="powerby" value="<?php echo $beian; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>���ú�̨����������־��</th>
			<td class="y-bg">
				<input name="web_config[admin_log]" value="1" type="radio" <?php if ($admin_log==1){echo ' checked';}?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="web_config[admin_log]" value="0" type="radio"  <?php if ($admin_log==0){echo ' checked';}?>> ��     
			</td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="filename" value="web_config"/>
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="�ύ" />
</form>


<?php include $this->CompilerInclude("/zcms/admin/template/admin/�ײ�.html");
 ?>