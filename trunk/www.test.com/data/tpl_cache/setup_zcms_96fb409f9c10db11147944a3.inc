<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#dbhost").formValidator({onshow:"���������ݿ��ַ",onfocus:"���ݿ��ַ����Ϊ��"}).inputValidator({min:2,max:20,onerror:"���ݿ��ַ����Ϊ��"});
	$("#dbuser").formValidator({onshow:"���������ݿ��ʺ�",onfocus:"���ݿ��ʺŲ���Ϊ��"}).inputValidator({min:2,onerror:"���ݿ��ʺŲ���Ϊ��"});
	$("#dbname").formValidator({onshow:"���������ݿ�����",onfocus:"���ݿ����Ʋ���Ϊ��"}).inputValidator({min:2,onerror:"���ݿ����Ʋ���Ϊ��"});
	$("#cookievarpre").formValidator({onshow:"���������ݱ�ǰ׺",onfocus:"���ݿ�ǰ׺����Ϊ��"}).inputValidator({min:2,onerror:"���ݿ�ǰ׺����Ϊ��"});
	
	
})
//-->
</script>
<form action="?m=setup&c=info&a=init" method="post" id="myform">
<fieldset>
	<legend><?php echo $pagename; ?></legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="80">���ݿ��ַ��</th>
			<td class="y-bg"><input type="text" class="input-text" name="zcms_config[dbhost]" id="dbhost" value="<?php echo $dbhost; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>���ݿ��ʺţ�</th>
			<td class="y-bg"><input type="text" class="input-text" name="zcms_config[dbuser]" id="dbuser" value="<?php echo $dbuser; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>���ݿ����룺</th>
			<td class="y-bg"><input type="password" class="input-text" name="zcms_config[dbpw]" id="dbpw" value="<?php echo $dbpw; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>���ݿ����ƣ�</th>
			<td class="y-bg"><input type="text" class="input-text" name="zcms_config[dbname]" id="dbname" value="<?php echo $dbname; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>���ݱ�ǰ׺��</th>
			<td class="y-bg"><input type="text" class="input-text" name="zcms_config[cookievarpre]" id="cookievarpre" value="<?php echo $cookievarpre; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>��ҳ��ʾ����</th>
			<td class="y-bg"><input type="text" class="input-text" name="zcms_config[perpagenum]" id="perpagenum" value="<?php echo $perpagenum; ?>" size="30" /></td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="filename" value="zcms_config"/>
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="�ύ" />
</form>


<?php include $this->CompilerInclude("/zcms/admin/template/admin/�ײ�.html");
 ?>