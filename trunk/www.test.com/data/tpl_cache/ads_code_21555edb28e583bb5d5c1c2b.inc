<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?>
<div class="bk10"></div>
<script type="text/JavaScript">
function copyUrl(obj) 
{ 
	var Url2=document.getElementById(obj);
	Url2.select(); 
	document.execCommand("Copy"); //执行浏览器复制命令 
	alert("复制成功,直接在放置在模板中即可."); 
} 
</script>
<fieldset>
	<legend><?php echo $pagename; ?></legend>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr> 
			   <th>广告标题：</th>
			  <td height="28" class="STYLE6">
			  <input name="title" type="text" id="title" size="40" value="<?php echo $info['title']; ?>" disabled="disabled">
			  <span>广告名称只是作为辨别多个广告条目之用，并不显示在广告中</span>
			  </td>
			</tr>
			<tr>
			  <th>广告内容：</th>
			  <td height="28" class="STYLE6" id="count_td"><textarea name="count"  id="count" style="width:99%; height:70px; overflow:auto;" ><?php echo $info['count']; ?></textarea></td>
			</tr>
			<tr>
				 <th>广告预览：</th>
				<td align="center" style="padding-top:5px;"><?php echo $info['count']; ?></td>
			</tr>
		</table>
</fieldset>
<div class="bk15"></div>
<input type="submit" class="button" id="dosubmit" name="dosubmit" value="复制JS代码" onclick="copyUrl('count');"/>