<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#title").formValidator({onshow:"�������ֻ����Ϊ����������Ŀ֮�ã�������ʾ�ڹ����",onfocus:"�������ֻ����Ϊ����������Ŀ֮�ã�������ʾ�ڹ����"}).inputValidator({min:2,onerror:"�������ֻ����Ϊ����������Ŀ֮�ã�������ʾ�ڹ����"});
	$("#type").formValidator({onshow:"(����ʱ,��������,������ձ����������)",onfocus:"(����ʱ,��������,������ձ����������)"}).inputValidator({min:1,onerror:"(����ʱ,��������,������ձ����������)"});
	
	$("#color").css('background',);
})
function ads(id,str)
{
	if (id == 1)
	{
		$("#"+str).html("<input name='count' type='text' id='count' size='60' value='<?php echo $info['count']; ?>'> ");
		$("#link").attr('disabled',false);
	}
	if (id == 2)
	{
		$("#"+str).html("<input name=\"count\" type=\"hidden\" id=\"count\"  size=\"60\" value=\"<?php echo $info['count']; ?>\" ><input type=\"file\" name=\"file1\" id=\"file1\"/>");
		$("#link").attr('disabled',false);
	}
	if (id == 3)
	{
		$("#"+str).html("<input name=\"count\" type=\"hidden\" id=\"count\"  size=\"60\" value=\"<?php echo $info['count']; ?>\" ><input type=\"file\" name=\"file1\" id=\"file1\" />");
		$("#link").attr('disabled',true);
	}
	if (id == 4)
	{
		$("#"+str).html("<textarea name=\"count\"  id=\"count\" style=\"width:99%; height:70px; overflow:auto;\" ><?php echo $info['count']; ?></textarea>");
		$("#link").attr('disabled',true);
	}
}
//-->
</script>

<form action="?m=ads&c=info&a=init" method="post" id="myform" enctype="multipart/form-data">
<fieldset>
	<legend><?php echo $pagename; ?></legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="80">�����⣺</th>
			<td colspan="5" class="y-bg"><input type="text" class="input-text" name="title" id="title" value="<?php echo $info['title']; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>������ͣ�</th>
			<td colspan="5" class="y-bg">
				<select name="type" id="type" onchange="ads(this.options[this.selectedIndex].value,'count_td')">
				<option value="">--��ѡ��������--</option>
				<option value="1" <?php if ($info['type'] ==1) echo 'selected' ?>>--���ֹ��--</option>
				<option value="2" <?php if ($info['type'] ==2) echo 'selected' ?>>--ͼƬ���--</option>
				<option value="3" <?php if ($info['type'] ==3) echo 'selected' ?>>--Flash--</option>
				<option value="4" <?php if ($info['type'] ==4) echo 'selected' ?>>--����--</option>
			</select>			</td>
		</tr>
		<tr>
		  <th>������ӣ�</th>
		  <td colspan="5">
			<input name="link" type="text" id="link" size="60" value="<?php echo $info['link']; ?>">		  </td>
		</tr>
		<tr>
		  <th>������ݣ�</th>
		  <td colspan="5" id="count_td"><?php echo $info['qiu']; ?></td>
		</tr>
		<tr > 
			<th>��״̬��</th>
			<td colspan="5">
			  <input type="radio" name="ismake" value="0" <?php if ($info['ismake'] ==0) echo 'checked' ?>/> ��
			  <input type="radio" name="ismake" value="1" <?php if ($info['ismake'] ==1) echo 'checked' ?>/> �ر�			</td>
		</tr>
	</table>

</fieldset>
<div class="bk15"></div>
<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
<input type="submit" class="button" id="dosubmit" name="dosubmit" value="�ύ" />
</form>