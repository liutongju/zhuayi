<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
$atts = array();
$atts['tagname'] = 'linkage_list';
$atts['page'] = $_REQUEST['page'];
$atts['parent_id'] = $_REQUEST['parent_id'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<td align='left'><input name='orders[]' type='text' size='3' value='<?php echo $fields['orders']; ?>' class='input-text-c'></td>
				<td ><?php echo $fields['title']; ?></td>
			</tr>
}
}
?>
		</tbody>
	</table>
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $maxnum;
$atts['page'] = $_REQUEST['page'];
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>

 ?>