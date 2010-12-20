<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><form name="myform" action="/index.php?m=single&c=index&a=init" method="post"><div class="explain-col">	标题：<input type="text" value="<?php echo $_REQUEST['title']; ?>" class="input-text" name="title" size='30'> 	<input type="submit" value="确定搜索" class="button" name="dosubmit"></div></form><div class="bk10"></div><form name="myform" action="/index.php?m=single&c=del&a=init" method="post"><div class="table-list">	<table width="100%" cellspacing="0" >		<thead>			<tr>				<th width="30">选择</th>				<th width="30">序号</th>				<th>标题</th>				<th width="150">添加时间</th>				<th width="100">操作</th>			</tr>		</thead>		<tbody>		<?php
$atts = array();
$atts['tagname'] = 'single_list';
$atts['page'] = $_REQUEST['page'];
$atts['title'] = $_REQUEST['title'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>			<tr>				<td align='center'><input type="checkbox" value="<?php echo $fields['id']; ?>" name="id[]" class="check" /></td>				<td align='center'><?php echo $fields['id']; ?></td>
				<td align='center'><?php echo $fields['title']; ?></td>				<td align="center"><?php echo dtime($fields['dtime']); ?></td>
				<td align='center' >					<a href="<?php echo $fields['url']; ?>" target="_blank">预览</a> | 					<a href="/index.php?m=single&c=edit&a=init&id=<?php echo $fields['id']; ?>">修改</a> | 					<a href="/index.php?m=single&c=del&a=init&id=<?php echo $fields['id']; ?>">删除</a>				</td>
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