<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
$atts = array();
$atts['tagname'] = 'menu_list';
$atts['parent_id'] = '0';
$atts['limit'] = '999';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
 $parent_id = $fields['id'];?>
$atts = array();
$atts['tagname'] = 'menu_list';
$atts['parent_id'] = $fields['id'];
$atts['limit'] = '999';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
$atts = array();
$atts['tagname'] = 'menu_list';
$atts['parent_id'] = $fields['id'];
$atts['limit'] = '999';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
}
}
?>	
}
}
?>	
}
}
?>
 ?>