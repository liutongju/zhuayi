<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
<div class="bk10"></div>
<script type="text/JavaScript">
function copyUrl(obj) 
{ 
	var Url2=document.getElementById(obj);
	Url2.select(); 
	document.execCommand("Copy"); //ִ��������������� 
	alert("���Ƴɹ�,ֱ���ڷ�����ģ���м���."); 
} 
</script>
<fieldset>
	<legend><?php echo $pagename; ?></legend>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr> 
			   <th>�����⣺</th>
			  <td height="28" class="STYLE6">
			  <input name="title" type="text" id="title" size="40" value="<?php echo $info['title']; ?>" disabled="disabled">
			  <span>�������ֻ����Ϊ����������Ŀ֮�ã�������ʾ�ڹ����</span>
			  </td>
			</tr>
			<tr>
			  <th>������ݣ�</th>
			  <td height="28" class="STYLE6" id="count_td"><textarea name="count"  id="count" style="width:99%; height:70px; overflow:auto;" ><?php echo $info['count']; ?></textarea></td>
			</tr>
			<tr>
				 <th>���Ԥ����</th>
				<td align="center" style="padding-top:5px;"><?php echo $info['count']; ?></td>
			</tr>
		</table>
</fieldset>
<div class="bk15"></div>
<input type="submit" class="button" id="dosubmit" name="dosubmit" value="����JS����" onclick="copyUrl('count');"/>