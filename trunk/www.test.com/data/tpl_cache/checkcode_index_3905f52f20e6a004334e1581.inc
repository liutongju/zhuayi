<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><form name="myform" action="/index.php?m=menu&c=info&a=init" method="post"><div class="table-list">	<table width="100%" cellspacing="0" >		<thead>			<tr>				<th align='left'>名称名称</th>				<th align='left'>调用地址</th>				<th>管理操作</th>			</tr>		</thead>		<tbody>		<?php
$atts = array();
$atts['tagname'] = 'checkcode_list';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>			<tr>				<td><?php echo $fields['title']; ?></td>				<td ><?php echo $fields['url']; ?></td>
				<td align='center' >					<a href="/index.php?m=checkcode&c=edit&id=<?php echo $fields['id']; ?>" class="thickbox">修改</a> | 					<a href="/index.php?m=checkcode&c=del&id=<?php echo $fields['id']; ?>">删除</a>				</td>
			</tr>		<?php
}
}
?>
		</tbody>
	</table></div></form><?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>