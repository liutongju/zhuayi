<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><script>

$(function(){
	//-----左侧点击隐藏显示
	$(".switchs").click(function(){
		switchs($(this))
	})
	var regEx = '/<[^>]*>/g';
	//------左侧子级菜单点击样式
	$(".sub_menu").click(function(){
		return click_color($(this));
	})
})
</script>
<?php
	if (empty($_REQUEST['parent_id']))
	{
		$_REQUEST['parent_id']=-1;
	}

$atts = array();
$atts['tagname'] = 'menu_list';
$atts['limit'] = '999';
$atts['parent_id'] = $_REQUEST['id'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
	<div>
		<h3 class="f14">
			<span class="switchs on cu" title="展开与收缩"></span><?php echo $fields['title']; ?>
		</h3>
		<ul style="display: block; ">
			<?php
$atts = array();
$atts['tagname'] = 'menu_list';
$atts['limit'] = '20';
$atts['parent_id'] = $fields['id'];
$atts['id'] = $info['purview'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<li id="_MP972" class="sub_menu ">
				<a href="<?php echo $fields['url']; ?>" hidefocus="true" style="outline:none;"><?php echo $fields['title']; ?></a>
			</li>
			<?php
}
}
?>
		</ul>
	</div>
<?php
}
}
?>