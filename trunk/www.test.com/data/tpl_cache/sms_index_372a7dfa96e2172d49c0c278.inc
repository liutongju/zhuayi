<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><form name="myform" action="/index.php?m=sms&c=index&a=init" method="post"><div class="explain-col">	姓名或电话号码：<input type="text" value="<?php echo $_REQUEST['username']; ?>" class="input-text" name="username" size='40'>	所属分类：<select name="cid" id="cid">		<option>==选择分类==</option>		<?php
$atts = array();
$atts['tagname'] = 'sms_class_list';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>		<option value="<?php echo $fields['id']; ?>" <?php if ($info['cid'] = $fields['id']){echo 'selected';}?>><?php echo $fields['classname']; ?></option>		<?php
}
}
?>	</select>	<input type="submit" value="确定搜索" class="button" name="dosubmit"></div></form><div class="bk15"></div><form name="myform" action="/index.php?m=sms&c=del&a=init" method="post" id="myform"><div class="table-list">	<table width="100%" cellspacing="0" >		<thead>			<tr>				<th width="30"><input type="checkbox" name="checkbox" class="check"/></th>				<th width="30">序号</th>				<th align="left">号码</th>				<th align="left">所属栏目</th>				<th align="left">姓名</th>				<th align="left">更新时间</th>				<th width="180">操作</th>			</tr>		</thead>		<tbody>		<?php
$atts = array();
$atts['tagname'] = 'sms_list';
$atts['page'] = $_REQUEST['page'];
$atts['username'] = $_REQUEST['username'];
$atts['cid'] = $_REQUEST['cid'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>			<tr>				<td align='center'><input type="checkbox" value="<?php echo $fields['id']; ?>" name="id[]" class="check"/></td>
				<td align='center'><?php echo $fields['id']; ?></td>
				<td ><?php echo $fields['sms']; ?></td>				<td ><?php echo $fields['classname']; ?></td>				<td ><?php echo $fields['username']; ?></td>				<td ><?php echo dtime($fields['dtime']); ?></td>
				<td align='center'>					<a href="/index.php?m=sms&c=edit&a=init&id=<?php echo $fields['id']; ?>&height=230" class="thickbox">修改</a> | 					<a href="/index.php?m=sms&c=del&a=init&id=<?php echo $fields['id']; ?>">删除</a>				</td>
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