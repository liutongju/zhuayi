<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
<form name="myform" action="/index.php?m=link&c=del&a=init" method="post">
<div class="table-list">
	<table width="100%" cellspacing="0" >
		<thead>
			<tr>
				<th width="30">���</th>
				<th>ģ������</th>
				<th align="left">��ʶ��</th>
				<th align="left">����</th>
				<th align="left">�汾</th>
				<th align="left">����</th>
				<th width="150">��װʱ��</th>
				<th width="100">����</th>
			</tr>
		</thead>
		<tbody>
		<?php
$atts = array();
$atts['tagname'] = 'module_list';
$atts['page'] = $_REQUEST['page'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<tr>
				<td align='center'><input type="checkbox" value="<?php echo $fields['id']; ?>" name="id[]" class="check" /></td>
				<td align='center'><?php echo $fields['title']; ?></td>
				<td><?php echo $fields['mark']; ?></td>
				<td><?php echo $fields['author']; ?></td>
				<td><?php echo $fields['version']; ?></td>
				<td><?php echo $fields['type']; ?></td>
				<td align="center"><?php echo $fields['dtime']; ?></td>
				<td align='center' >
					<?php echo $fields['install']; ?>
				</td>
			</tr>
		<?php
}
}
?>
		</tbody>
	</table>
</div>
</form>
<?php include $this->CompilerInclude("/zcms/admin/template/admin/�ײ�.html");
 ?>