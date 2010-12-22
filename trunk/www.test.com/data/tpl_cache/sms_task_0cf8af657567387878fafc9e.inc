<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><form name="myform" action="/index.php?m=sms&c=task&a=init" method="post"><div class="explain-col">	任务标题：<input type="text" value="<?php echo $_REQUEST['title']; ?>" class="input-text" name="title" size='40'>	<input type="submit" value="确定搜索" class="button" name="dosubmit"></div></form><div class="bk15"></div><form name="myform" action="/index.php?m=sms&c=task_del&a=init" method="post" id="myform"><div class="table-list">	<table width="100%" cellspacing="0" >		<thead>			<tr>				<th width="30"><input type="checkbox" name="checkbox" class="check"/></th>				<th width="30">序号</th>				<th align="left">任务标题</th>				<th align="left">成功/失败</th>				<th align="left">最后执行时间</th>				<th width="180">操作</th>			</tr>		</thead>		<tbody>		<?php
$atts = array();
$atts['tagname'] = 'sms_task_list';
$atts['page'] = $_REQUEST['page'];
$atts['title'] = $_REQUEST['title'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>			<tr>				<td align='center'><input type="checkbox" value="<?php echo $fields['id']; ?>" name="id[]" class="check"/></td>
				<td align='center'><?php echo $fields['id']; ?></td>
				<td ><?php echo $fields['title']; ?></td>				<td ><?php echo $fields['ok']; ?>/<?php echo $fields['error']; ?></td>				<td ><?php echo dtime($fields['dtime']); ?></td>
				<td align='center'>					<a href="/index.php?m=sms&c=task_play&a=init&id=<?php echo $fields['id']; ?>" onclick="return confirm('执行任务会清空上次统计记录')">执行</a> | 					<a href="/index.php?m=sms&c=task_edit&a=init&id=<?php echo $fields['id']; ?>">修改</a> | 					<a href="/index.php?m=sms&c=task_del&a=init&id=<?php echo $fields['id']; ?>">删除</a>				</td>
			</tr>		<?php
}
}
?>
		</tbody>
	</table>
	<div class="btn">		<div style="float:left">			<a href="javascript:" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">全选</a>/<a href="javascript:" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">取消</a>			<input type="submit" class="button " name="dosubmit" value="删除选中"/>		</div>		<?php
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $maxnum;
$atts['page'] = $_REQUEST['page'];
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>
	</div></div></form><?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>