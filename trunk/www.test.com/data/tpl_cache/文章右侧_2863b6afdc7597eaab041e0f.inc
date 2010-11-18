<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?>
	<div class="right_box right_bot f14">
		<div class="right_title">推荐文章</div>
		<ul>
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '15';
$atts['flag'] = 'tuijian';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
		<li><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
		<?php
}
}
?>
		</ul>
	</div>
	<div class="right_box right_bot f14">
			<div class="right_title">热门文章</div>
			<ul>
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '15';
$atts['flag'] = 'remen';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
			<?php
}
}
?>
			</ul>
	</div>

	<div class="right_box right_bot f14">
		<div class="right_title">最新更新</div>
		<ul>
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '15';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<li><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
		<?php
}
}
?>
		</ul>
	</div>