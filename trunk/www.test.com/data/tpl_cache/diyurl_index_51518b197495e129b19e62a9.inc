<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><form name="myform" action="/index.php?m=diyurl&c=index&a=init" method="post"><div class="explain-col">	url：<input type="text" value="<?php echo $_REQUEST['url']; ?>" class="input-text" name="url" size='40'>	<span id=selBox> </span>	<input id="cid" name="cid" value="<?php echo $info['cid']; ?>" type="hidden"/>	<script language="javascript">		var b = new sortMenu("cid","selBox",arrSorts);		b.newInit(<?php echo $info['cid']; ?>,b);	</script>	<input type="submit" value="确定搜索" class="button" name="dosubmit"></div></form><div class="bk10"></div><form name="myform" action="/index.php?m=link&c=del&a=init" method="post"><div class="table-list">	<table width="100%" cellspacing="0" >		<thead>			<tr>				<th width="30">序号</th>				<th>连接地址</th>				<th align="left">映射地址</th>				<th width="150">模糊匹配</th>				<th width="100">操作</th>			</tr>		</thead>		<tbody>		<?php
$atts = array();
$atts['tagname'] = 'diyurl_list';
$atts['page'] = $_REQUEST['page'];
$atts['url'] = $_REQUEST['url'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>			<tr>				<td align='center'><input type="checkbox" value="<?php echo $fields['id']; ?>" name="id[]" class="check" /></td>
				<td align='center'><?php echo $fields['url']; ?></td>
				<td><?php echo $fields['request_url']; ?></td>				<td align="center"><?php echo $fields['parameter']; ?></td>
				<td align='center' >					<a href="/index.php?m=diyurl&c=edit&a=init&id=<?php echo $fields['id']; ?>&height=220" class="thickbox">修改</a> | 					<a href="/index.php?m=diyurl&c=del&a=init&id=<?php echo $fields['id']; ?>">删除</a>				</td>
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