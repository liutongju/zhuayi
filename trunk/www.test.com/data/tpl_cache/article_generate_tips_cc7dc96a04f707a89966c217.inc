<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?>
<form action="?m=<?php echo $_REQUEST['m']; ?>&c=<?php echo $_REQUEST['c']; ?>&a=init&act=<?php echo $_REQUEST['act']; ?>&ok=1" method="post" id="myform">
<fieldset>
	<legend>生成区间</legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="120">ID区间：</th>
			<td  class="y-bg">
				从 <input type="text" class="input-text" name="start" id="start"  value="0" size="10" /> - <input type="text" class="input-text" name="end" id="end"  size="10" value="0"/>
			</td>
		</tr>
	</table>
	<center><input type="submit" class="button" id="dosubmit" name="dosubmit" value="生成" /></center>
</fieldset>
</form>
<div class="bk15"></div>
<?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>