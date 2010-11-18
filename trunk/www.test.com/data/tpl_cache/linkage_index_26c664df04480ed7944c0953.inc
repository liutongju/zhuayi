<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><form name="myform" action="/index.php?m=linkage&c=info&a=init" method="post"><div class="table-list">	<table width="100%" cellspacing="0" >		<thead>			<tr>				<th width="10%">序号</th>				<th width="20%" align="left">排序</th>				<th width="30%" align="left">菜单名称</th>				<th width="20%">管理操作</th>			</tr>		</thead>		<tbody>		<?php
$atts = array();
$atts['tagname'] = 'linkage_list';
$atts['page'] = $_REQUEST['page'];
$atts['parent_id'] = $_REQUEST['parent_id'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>			<tr>				<td align='center'><input type="checkbox" value="<?php echo $fields['id']; ?>" name="id[]" class="check"/></td>
				<td align='left'><input name='orders[]' type='text' size='3' value='<?php echo $fields['orders']; ?>' class='input-text-c'></td>
				<td ><?php echo $fields['title']; ?></td>				<td align='center' >				<?php if (empty($_REQUEST['parent_id'])){?>					<a href="/index.php?m=linkage&c=cache&a=init&id=<?php echo $fields['id']; ?>">更新缓存</a> | 				<?php }?>					<a href="/index.php?m=linkage&c=index&a=init&parent_id=<?php echo $fields['id']; ?>">管理子菜单</a> | 					<a href="/index.php?m=linkage&c=edit&a=init&parent_id=<?php echo $fields['id']; ?>&height=220" class="thickbox">添加子菜单</a> | 					<a href="/index.php?m=linkage&c=edit&a=init&id=<?php echo $fields['id']; ?>&parent_id=<?php echo $fields['parent_id']; ?>&height=220" class="thickbox">修改</a> | 					<a href="/index.php?m=linkage&c=del&a=init&id=<?php echo $fields['id']; ?>">删除</a>				</td>
			</tr>		<?php
}
}
?>
		</tbody>
	</table>	<div class="btn">		<div style="float:left">			<a href="javascript:" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">全选</a>/<a href="javascript:" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">取消</a>			<input type="submit" class="button" name="dosubmit" value="删除选中"/>		</div>		<?php
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $maxnum;
$atts['page'] = $_REQUEST['page'];
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>
	</div></div></form><?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>