<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><script type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/select.js"></script><?php include_once ZCMS_CACHE.'taobao_class_cache.js';?><script>$(function(){	$(".submit").click(function(){		$("#myform").attr('action',$(this).attr('title'));		if ($(this).val() == '生成页面')		{			$("#myform").attr('target','_blank');		}		$("#myform").submit();	})		$(".tuisong").change(function(){		$("#myform").attr('action',$(this).attr('title'));		$("#myform").submit();	})})</script><form name="myform" action="/index.php?m=taobao&c=index&a=init" method="post"><div class="explain-col">	商品标题：<input type="text" value="<?php echo $_REQUEST['title']; ?>" class="input-text" name="title" size='40'>	<span id=selBox> </span>	<input id="cid" name="cid" value="<?php echo $_REQUEST['cid']; ?>" type="hidden"/>	<script language="javascript">		var b = new sortMenu("cid","selBox",arrSorts);		b.newInit(<?php echo $_REQUEST['cid']; ?>,b);	</script>	<?php if ($article_generate == 1){?>	<select name="generate">		<option value="">==生成状态==</option>		<option value="1" <?php if ($_REQUEST['generate']==1){ echo 'selected';}?>>==已生成==</option>		<option value="0" <?php if ($_REQUEST['generate']!='' && $_REQUEST['generate']==0){ echo 'selected';}?>>==未生成==</option>	</select>	<?php } foreach ($flag as $val){		$val = explode('|',$val);	?>	&nbsp;<input type="checkbox" name="flag[]" value="<?php echo $val[1]; ?>" <?php if(strpos('$$'.$_REQUEST['flag'],$val[1])){ echo "checked='checked'";}?> /> <?php echo $val[0]; ?>&nbsp;	<?php }?>	<input type="submit" value="确定搜索" class="button" name="dosubmit"></div></form><div class="bk15"></div><form name="myform" action="/index.php?m=taobao&c=index&a=init" method="post" id="myform"><div class="table-list">	<table width="100%" cellspacing="0" >		<thead>			<tr>				<th width="30"><input type="checkbox" name="checkbox" class="check"/></th>				<th width="30">序号</th>				<th align="left">标题</th>				<th align="left">所属栏目</th>				<th align="left">点击量</th>				<th align="left">更新时间</th>				<th width="180">操作</th>			</tr>		</thead>		<tbody>		<?php
$atts = array();
$atts['tagname'] = 'taobao_list';
$atts['page'] = $_REQUEST['page'];
$atts['title'] = $_REQUEST['title'];
$atts['cid'] = $_REQUEST['cid'];
$atts['generate'] = $_REQUEST['generate'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>			<tr>				<td align='center'><input type="checkbox" value="<?php echo $fields['id']; ?>" name="id[]" class="check"/></td>
				<td align='center'><?php echo $fields['id']; ?></td>
				<td ><?php echo $fields['title']; ?></td>				<td ><?php echo $fields['classname']; ?></td>				<td ><?php echo $fields['click']; ?></td>				<td ><?php echo dtime($fields['dtime']); ?></td>
				<td align='center'>					<?php if ($article_generate == 1){?>					<a href="/index.php?m=taobao&c=generate&id[]=<?php echo $fields['id']; ?>&a=init&act=show" target="_blank">生成</a> | 					<?php }?>					<a href="<?php echo $fields['url']; ?>" target="_blank">预览</a> | 					<a href="/index.php?m=taobao&c=edit&a=init&id=<?php echo $fields['id']; ?>">修改</a> | 					<a href="/index.php?m=taobao&c=del&a=init&id=<?php echo $fields['id']; ?>">删除</a>				</td>
			</tr>		<?php
}
}
?>
		</tbody>
	</table>
	<div class="btn">		<div style="float:left">			<a href="javascript:" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">全选</a>/<a href="javascript:" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">取消</a>			<input type="button" class="button submit" name="dosubmit" value="删除选中" title="/index.php?m=taobao&c=del&a=init"/>			<?php if ($article_generate == 1){?>			<input type="button" class="button submit" name="dosubmit" value="生成页面" title="/index.php?m=taobao&c=generate&a=init&act=show"/>			<?php }?>			<select class="tuisong" name="tuisong" title="/index.php?m=taobao&c=update&a=init&action=flag">				<option value="">快速推送</option>				<?php foreach ($flag as $val){					$val = explode('|',$val);				?>				<option value="<?php echo trim($val[1]); ?>">推送到-><?php echo $val[0]; ?></option>				<?php }?>			</select>			<select class="tuisong" name="yidong" title="/index.php?m=taobao&c=update&a=init&action=cid">				<option value="">快速移动</option>				<?php foreach ($classlist as $val){				?>				<option value="<?php echo $val['id']; ?>">移动到-><?php echo $val['classname']; ?></option>				<?php }?>			</select>		</div>		<?php
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $maxnum;
$atts['page'] = $_REQUEST['page'];
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>
	</div></div></form><?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>