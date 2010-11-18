<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><script type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/select.js"></script><?php include_once ZCMS_CACHE.'article_class_cache.js';?><form name="myform" action="/index.php?m=article&c=index&a=init" method="post"><div class="explain-col">	文章标题：<input type="text" value="<?php echo $_REQUEST['title']; ?>" class="input-text" name="title" size='40'>	<span id=selBox> </span>	<input id="cid" name="cid" value="<?php echo $_REQUEST['cid']; ?>" type="hidden"/>	<script language="javascript">		var b = new sortMenu("cid","selBox",arrSorts);		b.newInit(<?php echo $_REQUEST['cid']; ?>,b);	</script>	<?php foreach ($flag as $val){		$val = explode('|',$val);	?>	&nbsp;<input type="checkbox" name="flag[]" value="<?php echo $val[1]; ?>" <?php if(strpos('$$'.$_REQUEST['flag'],$val[1])){ echo "checked='checked'";}?> /> <?php echo $val[0]; ?>&nbsp;	<?php }?>	<input type="submit" value="确定搜索" class="button" name="dosubmit"></div></form><div class="bk15"></div><form name="myform" action="/index.php?m=article&c=class_info&a=init" method="post"><div class="table-list">	<table width="100%" cellspacing="0" >		<thead>			<tr>				<th width="30"><input type="checkbox" name="checkbox" class="check"/></th>				<th width="30">序号</th>				<th align="left">标题</th>				<th align="left">所属栏目</th>				<th align="left">点击量</th>				<th align="left">更新时间</th>				<th width="180">操作</th>			</tr>		</thead>		<tbody>		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['page'] = $_REQUEST['page'];
$atts['title'] = $_REQUEST['title'];
$atts['cid'] = $_REQUEST['cid'];
$atts['flag'] = $_REQUEST['flag'];
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
	<div class="btn">		<div style="float:left">			<a href="javascript:" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">全选</a>/<a href="javascript:" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">取消</a>			<input type="submit" class="button" name="dosubmit" value="删除选中"/>		</div>		<?php
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $maxnum;
$atts['page'] = $_REQUEST['page'];
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>
	</div></div></form><?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>