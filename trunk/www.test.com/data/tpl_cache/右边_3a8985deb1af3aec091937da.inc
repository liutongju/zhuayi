<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><div class="article_right float_right overflow">
	<div class="images">
		<script type="text/javascript" src="http://www.153k.com/index.php?m=ads&c=show&id=15"></script>
	</div>
	<div class="title zcms">
		<span class="float_left">最新资讯</span>
	</div>
	<div class="article_list">
	<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['litpic'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
		<div class="article_pic overflow">
			<img src="<?php echo litpic($fields['litpic'],62,62); ?>" width="62" />
			<div class="float_left">
				<h3><a href="<?php echo $fields['url']; ?>"  target="_blank"><?php echo $fields['title']; ?></a></h3>
				<?php echo strlens($fields['abstract'],0,40); ?>...<a href="<?php echo $fields['url']; ?>" target="_blank">更多>></a>
			</div>
		</div>
	<?php
}
}
?>
		<div class="jiange zcms"></div>
		<ul>
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '7';
$atts['start'] = '1';
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
	<div class="title zcms">
		<span class="float_left">最新热门</span>
	</div>
	<div class="article_list">
		<ul style="padding-top:10px;">
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '10';
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
	<div class="images" style="margin-top:5px;">
		<script type="text/javascript" src="http://www.153k.com/index.php?m=ads&c=show&id=16"></script>
	</div>
	<div class="title zcms">
		<span class="float_left">精彩推荐</span>
	</div>
	<div class="article_list">
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['litpic'] = '1';
$atts['start'] = '8';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
		<div class="article_pic overflow">
			<img src="<?php echo litpic($fields['litpic'],62,62); ?>" width="62" />
			<div class="float_left">
				<h3><a href="<?php echo $fields['url']; ?>"  target="_blank"><?php echo $fields['title']; ?></a></h3>
				<?php echo strlens($fields['abstract'],0,40); ?>...<a href="<?php echo $fields['url']; ?>" target="_blank">更多>></a>
			</div>
		</div>
		<?php
}
}
?>
		<div class="jiange zcms"></div>
		<ul>
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '7';
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
	<div class="images" style="margin-top:10px;">
		<script type="text/javascript" src="http://www.153k.com/index.php?m=ads&c=show&id=17"></script>
	</div>
</div>