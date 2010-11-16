<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><form name="myform" action="/index.php?m=article&c=class_info&a=init" method="post"><div class="table-list">	<table width="100%" cellspacing="0" >		<thead>			<tr>				<th width="30"><input type="checkbox" name="checkbox" class="check"/></th>				<th width="30">序号</th>				<th align="left">标题</th>				<th align="left">所属栏目</th>				<th align="left">点击量</th>				<th align="left">更新时间</th>				<th width="180">操作</th>			</tr>		</thead>		<tbody>		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>			<tr>				<td align='center'><input type="checkbox" value="<?php echo $fields['id']; ?>" name="id[]" class="check"/></td>
				<td align='center'><?php echo $fields['id']; ?></td>
				<td ><?php echo $fields['title']; ?></td>				<td ><?php echo $fields['classname']; ?></td>				<td ><?php echo $fields['click']; ?></td>				<td ><?php echo dtime($fields['dtime']); ?></td>
				<td align='center' >					<a href="<?php echo $fields['url']; ?>" target="_blank">预览</a> | 					<a href="/index.php?m=article&c=edit&a=init&id=<?php echo $fields['id']; ?>">修改</a> | 					<a href="/index.php?m=article&c=del&a=init&id=<?php echo $fields['id']; ?>">删除</a>				</td>
			</tr>		<?php
}
}
?>
		</tbody>
	</table>
	<div class="btn">		<input type="submit" class="button" name="dosubmit" value="排序" onclick='$(".check").attr("checked",true)'/>	</div></div></form><?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>