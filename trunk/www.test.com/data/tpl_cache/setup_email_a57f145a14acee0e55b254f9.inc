<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
<script>

$(function(){
	
	$(".ceshi").click(function(){
		if ($("#mail_to").val()=='')
		{
			alert('Ҫ���Ե��ʼ�û����дŶ..');
			return false;
		}
		$.post('/index.php?m=setup&c=email_test&a=init',$("#myform").serialize(),function(data){
			if (data == 'ok')
			{
				alert('���ͳɹ�..');
			}
			else
			{
				alert(data);
			}
		})
	})
	
})
</script>
<form action="?m=setup&c=info&a=init" method="post" id="myform">
<fieldset>
	<legend><?php echo $pagename; ?></legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="100">�ʼ���������</th>
			<td class="y-bg"><input type="text" class="input-text" name="email_config[mail_server]" id="mail_server" value="<?php echo $mail_server; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>�ʼ����Ͷ˿ڣ�</th>
			<td class="y-bg"><input type="text" class="input-text" name="email_config[mail_port]" id="mail_port" value="<?php echo $mail_port; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>�����˵�ַ��</th>
			<td class="y-bg"><input type="text" class="input-text" name="email_config[mail_from]" id="send_name" value="<?php echo $mail_from; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>SLL��֤��</th>
			<td class="y-bg"><input name="email_config[mail_auth]" id="mail_auth" value="1" type="radio" <?php if ($mail_auth==1){echo ' checked';}?>> ����	<input name="email_config[mail_auth]" id="mail_auth" value="0" type="radio" <?php if ($mail_auth==0){echo ' checked';}?>> �ر�</td>
		</tr>
		<tr>
			<th>��֤�û�����</th>
			<td class="y-bg"><input type="text" class="input-text" name="email_config[mail_user]" id="mail_user" value="<?php echo $mail_user; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>��֤���룺</th>
			<td class="y-bg"><input type="text" class="input-text" name="email_config[mail_password]" id="mail_password" value="<?php echo $mail_password; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>�ʼ����ò��ԣ�</th>
			<td class="y-bg"><input type="text" class="input-text" name="mail_to" id="mail_to" size="30" value=""/> <input type="button" class="button ceshi"  value="���Է���"></td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="filename" value="email_config"/>
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="�ύ" />
</form>


<?php include $this->CompilerInclude("/zcms/admin/template/admin/�ײ�.html");
 ?>