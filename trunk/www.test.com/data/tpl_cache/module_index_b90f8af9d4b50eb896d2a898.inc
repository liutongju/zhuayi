<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?>
<form name="myform" action="/index.php?m=link&c=del&a=init" method="post">
<div class="table-list">
	<table width="100%" cellspacing="0" >
		<thead>
			<tr>
				<th width="30">序号</th>
				<th>模块名称</th>
				<th align="left">标识符</th>
				<th align="left">作者</th>
				<th align="left">版本</th>
				<th align="left">类型</th>
				<th width="150">安装时间</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php
$atts = array();
$atts['tagname'] = 'module_list';
$atts['page'] = $_REQUEST['page'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<tr>
				<td align='center'><input type="checkbox" value="<?php echo $fields['id']; ?>" name="id[]" class="check" /></td>
				<td align='center'><?php echo $fields['title']; ?></td>
				<td><?php echo $fields['mark']; ?></td>
				<td><?php echo $fields['author']; ?></td>
				<td><?php echo $fields['version']; ?></td>
				<td><?php echo $fields['type']; ?></td>
				<td align="center"><?php echo $fields['dtime']; ?></td>
				<td align='center' >
					<?php echo $fields['install']; ?>
				</td>
			</tr>
		<?php
}
}
?>
		</tbody>
	</table>
</div>
</form>
<?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>