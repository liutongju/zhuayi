<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><link rel="stylesheet" type="text/css" href="<?php echo model_url('admin','admin'); ?>js/calendar/calendar-blue.css"/><script type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/calendar/calendar.js"></script>			 <form name="myform" action="/index.php?m=log&c=index&a=init" method="post"><div class="explain-col">	用户名：<input type="text" value="<?php echo $_REQUEST['username']; ?>" class="input-text" name="username" size='10'> 	时间：<input type="text" name="start_time" id="start_time" value="<?php echo $_REQUEST['start_time']; ?>" size="21" class="endDate" >&nbsp;	<input type="text" name="end_time" id="end_time" value="<?php echo $_REQUEST['end_time']; ?>" size="21" class="endDate" >	<input type="submit" value="确定搜索" class="button" name="dosubmit"></div></form><script>	Calendar.setup({inputField:"start_time",ifFormat:"%Y-%m-%d %H:%M:%S",showsTime:true,timeFormat:"24"});	Calendar.setup({inputField:"end_time",ifFormat:"%Y-%m-%d %H:%M:%S",showsTime:true,timeFormat:"24"});</script><div class="bk10"></div><form name="myform" action="/index.php?m=log&c=del&a=init" method="post"><div class="table-list">	<table width="100%" cellspacing="0" >		<thead>			<tr>				<th width="30">序号</th>				<th width="80">会员名</th>				<th>操作日志</th>				<th>操作IP</th>				<th width="100">操作时间</th>				<th width="50">操作</th>			</tr>		</thead>		<tbody>		<?php
$atts = array();
$atts['tagname'] = 'log_list';
$atts['page'] = $_REQUEST['page'];
$atts['username'] = $_REQUEST['username'];
$atts['start_time'] = $_REQUEST['start_time'];
$atts['end_time'] = $_REQUEST['end_time'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>			<tr>				<td align='center'><input type="checkbox" value="<?php echo $fields['id']; ?>" name="id[]" class="check" /></td>
				<td align='center'><?php echo $fields['username']; ?></td>
				<td><?php echo $fields['log']; ?></td>				<td align="center"><?php echo $fields['ip']; ?></td>				<td align="center"><?php echo dtime($fields['dtime'],2); ?></td>
				<td align='center' >					<a href="/index.php?m=log&c=del&a=init&id[]=<?php echo $fields['id']; ?>">删除</a>				</td>
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