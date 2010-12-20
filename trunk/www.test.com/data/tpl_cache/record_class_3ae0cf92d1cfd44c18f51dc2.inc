<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?>
<form name="myform" action="/index.php?m=record&c=class_info&a=init" method="post">
<div class="table-list">
	<table width="100%" cellspacing="0" >
		<thead>
			<tr>
				<th width="30">序号</th>
				<th width="30">排序</th>
				<th align="left">分类名称</th>
				<th align="left">所属会员</th>
				<th align="left">记录数</th>
				<th align="left">是否共享</th>
				<th width="220">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php
$atts = array();
$atts['tagname'] = 'record_class_list';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<tr>
				<td align='center'><input type="checkbox" value="<?php echo $fields['id']; ?>" name="id[]" class="check"/></td>
				<td align='center'><input name='orders[]' type='text' size='3' value='<?php echo $fields['orders']; ?>' class='input-text-c'></td>
				<td ><?php echo $fields['classname']; ?></td>
				<td ><a href="/index.php?m=record&c=index&a=init&uid=<?php echo $fields['id']; ?>"><?php echo $fields['username']; ?></a></td>
				<td ><?php echo $fields['record_num']; ?></td>
				<?php if ($fields['share'] == 0){ $fields['share']='共享';}else{$fields['share']='私有';}?>
				<td ><?php echo $fields['share']; ?></td>
				<td align='center' >
					<a href="<?php echo $fields['url']; ?>" target="_blank">预览</a> | 
					<a href="/index.php?m=record&c=class_edit&a=init&id=<?php echo $fields['id']; ?>" class="thickbox" title="编辑桌面">修改</a> | 
					<a href="/index.php?m=record&c=class_del&a=init&id=<?php echo $fields['id']; ?>">删除</a>
				</td>

			</tr>
		<?php
}
}
?>

		</tbody>

	</table>

	<div class="btn">
		<input type="submit" class="button" name="dosubmit" value="排序" onclick='$(".check").attr("checked",true)'/>
	</div>
</div>
</form>
<?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>