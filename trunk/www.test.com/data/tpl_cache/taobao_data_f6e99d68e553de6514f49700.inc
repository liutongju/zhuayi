<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
				<td align='left'><?php echo siconv($val['title']); ?></td>
				<td ><?php echo $val['price']; ?> Ԫ</td>
				<td align='center'>
		</tbody>
	</table>
	<div class="btn">
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = '3960';
$atts['page'] = $_REQUEST['page'];
$atts['perpagenum'] = '40';
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>

 ?>