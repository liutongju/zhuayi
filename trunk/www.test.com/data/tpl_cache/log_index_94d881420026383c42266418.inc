<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
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
?>
				<td align='center'><?php echo $fields['username']; ?></td>
				<td><?php echo $fields['log']; ?></td>
				<td align='center' >
			</tr>
}
}
?>
		</tbody>
	</table>
	<div class="btn">
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $maxnum;
$atts['page'] = $_REQUEST['page'];
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>

 ?>