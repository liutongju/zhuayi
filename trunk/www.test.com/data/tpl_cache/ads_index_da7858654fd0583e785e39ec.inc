<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><div class="bk10"></div><form name="myform" action="/index.php?m=ads&c=del&a=init" method="post"><div class="table-list">	<table width="100%" cellspacing="0" >		<thead>			<tr>				<th width="30">序号</th>				<th>广告名称</th>				<th align="left">广告类型</th>				<th align="left">状态</th>				<th align="left">点击次数</th>				<th width="150">添加时间</th>				<th width="100">操作</th>			</tr>		</thead>		<tbody>		<?php
$atts = array();
$atts['tagname'] = 'ads_list';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>			<tr>				<td align='center'><input type="checkbox" value="<?php echo $fields['id']; ?>" name="id[]" class="check" /></td>
				<td><?php echo $fields['title']; ?></td>				<td><?php echo $fields['type']; ?></td>				<td><?php echo $fields['ismake']; ?></td>				<td><?php echo $fields['click']; ?></td>				<td align="center"><?php echo dtime($fields['dtime']); ?></td>
				<td align='center' >					<a href="/index.php?m=ads&c=code&a=init&id=<?php echo $fields['id']; ?>">调用</a> | 					<a href="/index.php?m=ads&c=edit&a=init&id=<?php echo $fields['id']; ?>&height=400&width=730" class="thickbox">修改</a> | 					<a href="/index.php?m=ads&c=del&a=init&id=<?php echo $fields['id']; ?>">删除</a>				</td>
			</tr>		<?php
}
}
?>
		</tbody>
	</table>
	<div class="btn">		<div style="float:left">			<a href="javascript:" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">全选</a>/<a href="javascript:" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">取消</a>			<input type="submit" class="button" name="dosubmit" value="删除选中"/>		</div>		<?php
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $maxnum;
$atts['page'] = $_REQUEST['page'];
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>
	</div></div></form><?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>