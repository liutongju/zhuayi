<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
$atts = array();
$atts['tagname'] = 'article_list';
$atts['page'] = $_REQUEST['page'];
$atts['title'] = $_REQUEST['title'];
$atts['cid'] = $_REQUEST['cid'];
$atts['flag'] = $_REQUEST['flag'];
$atts['generate'] = $_REQUEST['generate'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<td align='center'><?php echo $fields['id']; ?></td>
				<td ><?php echo $fields['title']; ?></td>
				<td align='center'>
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