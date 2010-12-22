<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("头部.html");
 ?>
<link href="<?php echo $path; ?>style/channel.css" rel="stylesheet" type="text/css" />
<div class="w_960 location">
	当前位置：
	<a href="/">首页</a> > 
	<?php foreach ($info['position'] as $val){?>
	<a href="<?php echo $val['url']; ?>"><?php echo $val['classname']; ?></a> > 
	<?php }?>
	<a href="<?php echo $info['url']; ?>"><?php echo $info['title']; ?></a> 正文 
</div>
<div class="w_960 overflow channel">
	<div class="float_left channel_top_left">
		<div class="title zcms"><span class="float_left">本类推荐</span></div>
		<div class="article_list">
			<div class="pic_info">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '2';
$atts['flag'] = 'tuijian';
$atts['litpic'] = '1';
$atts['cid'] = $channelid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<a href="<?php echo $fields['url']; ?>" target="_blank"><img src="<?php echo litpic($fields['litpic'],135,90); ?>" width="135" height="90"/></a>
			<?php
}
}
?>
			</div>
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['start'] = '2';
$atts['titlelen'] = '36';
$atts['flag'] = 'tuijian';
$atts['cid'] = $channelid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<div class="tuijian">
				<h3><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></h3>
				<span><?php echo $fields['abstract']; ?>...<font><a href="<?php echo $fields['url']; ?>" target="_blank">[详细]</a></font></span>
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
$atts['limit'] = '3';
$atts['flag'] = 'tuijian';
$atts['start'] = '4';
$atts['cid'] = $channelid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li><a href="<?php echo $fields['classurl']; ?>" target="_blank">[<?php echo $fields['classname']; ?>]</a> <a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
			<?php
}
}
?>
			</ul>
		</div>
		<div class="title zcms"><span class="float_left">热门推荐</span></div>
		<div class="article_list rementj">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['start'] = '7';
$atts['titlelen'] = '36';
$atts['cid'] = $channelid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<div class="tuijian">
				<h3><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></h3>
				<span><?php echo $fields['abstract']; ?>...<font><a href="<?php echo $fields['url']; ?>" target="_blank">[详细]</a></font></span>
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
$atts['limit'] = '2';
$atts['flag'] = 'tuijian';
$atts['start'] = '8';
$atts['cid'] = $channelid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li><a href="<?php echo $fields['classurl']; ?>" target="_blank">[<?php echo $fields['classname']; ?>]</a> <a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
			<?php
}
}
?>
			</ul>
		</div>
	</div>
	<div class="float_left channel_top_cen">
		<div class="title zcms"><span class="float_left">最新信息</span></div>
		<div class="article_list">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['titlelen'] = '36';
$atts['cid'] = $channelid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<div class="tuijian">
				<h3><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></h3>
				<span><?php echo $fields['abstract']; ?>...<font><a href="<?php echo $fields['url']; ?>" target="_blank">[详细]</a></font></span>
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
$atts['limit'] = '8';
$atts['start'] = '1';
$atts['cid'] = $channelid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li><a href="<?php echo $fields['classurl']; ?>" target="_blank">[<?php echo $fields['classname']; ?>]</a> <a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
			<?php
}
}
?>
			</ul>
		</div>
		<div class="title zcms"><span class="float_left">最新信息</span></div>
		<div class="article_list">
			<ul>
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '6';
$atts['start'] = '9';
$atts['cid'] = $channelid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li><a href="<?php echo $fields['classurl']; ?>" target="_blank">[<?php echo $fields['classname']; ?>]</a> <a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
			<?php
}
}
?>
			</ul>
		</div>
	</div>
	<div class="float_right channel_top_right">
		<div class="title zcms"><span class="float_left">本周热榜</span></div>
		<div class="article_list">
			<ul>
				<li><B><a title='欧迪芬魅惑内衣，全场2.3折起' target='_blank' href='http://pc.heima8.com/index.php?p=118982711&c=118982461&sc=[subcode]&durl=107152441&a=106822221&cc=107159142' style="color:red">欧迪芬魅惑内衣，全场2.3折起</a></b></li>
			</ul>
			<ul class="zcms">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '10';
$atts['flag'] = 'remen';
$atts['cid'] = $channelid;
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
		<div class="article_list">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['litpic'] = '1';
$atts['start'] = '8';
$atts['flag'] = 'remen';
$atts['titlelen'] = '34';
$atts['cid'] = $channelid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<div class="article_pic_230">
				<a href="<?php echo $fields['url']; ?>" target="_blank"><img src="<?php echo litpic($fields['litpic'],230,125); ?>" width="230" height="125"/></a>
				<a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a>
			</div>
			<?php
}
}
?>
		</div>
	</div>
</div>

<div class="w_960 overflow">
	<div class="index_top_pic_list float_left">
		<div class="title zcms">
			<span class="float_left">精彩瞬间</span>
		</div>
		<div class="article_pic_list overflow zcms">
			<a href="#" class="pic_left float_left zcms">点击左滑动</a>
			<ul class="float_left">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '5';
$atts['litpic'] = '1';
$atts['titlelen'] = '26';
$atts['cid'] = $channelid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li <?php if ($key == 5){echo 'margin-right:0px;';}?>><a href="<?php echo $fields['url']; ?>"><img src="<?php echo litpic($fields['litpic'],'160',120); ?>" height="120" /></a><br><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
			<?php
}
}
?>
			</ul>
			<a href="#" class="pic_right float_left zcms">点击左滑动</a>
		</div>
	</div>
</div>
<?php
$atts = array();
$atts['tagname'] = 'article_class_list';
$atts['parent_id'] = $info['id'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
 $cid = $fields['id'];?>
<div class="w_960 channel_list overflow">
	<div class="title zcms autotitle">
			<span class="float_left"><a href="<?php echo $fields['url']; ?>"><?php echo $fields['classname']; ?></a></span>
			<span class="float_right"><a href="<?php echo $fields['url']; ?>"> 更多>> </a></span>
	</div>
	<div class="channel_list_left float_left">
		<div class="title zcms"><span class="float_left">本类推荐</span></div>
		<div class="article_list">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '2';
$atts['litpic'] = '1';
$atts['cid'] = $cid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<div class="article_pic overflow">
				<a href="<?php echo $fields['url']; ?>"  target="_blank"><img src="<?php echo litpic($fields['litpic'],96,62); ?>" width="62" /></a>
				<div class="float_left">
					<h3><a href="<?php echo $fields['url']; ?>"  target="_blank"><?php echo $fields['title']; ?></a></h3>
					<?php echo strlens($fields['abstract'],0,40); ?>...<a href="<?php echo $fields['url']; ?>" target="_blank">更多>></a>
				</div>
			</div>
			<div class="jiange zcms"></div>
			<?php
}
}
?>
			<ul>
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '6';
$atts['start'] = '2';
$atts['cid'] = $cid;
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
	</div>
	<div class="channel_list_cen float_left">
		<div class="title zcms"><span class="float_left">最新信息</span></div>
		<div class="article_list">
			<ul>
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '5';
$atts['cid'] = $cid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a>
				<span><?php echo dtime($fields['dtime'],'m月d日'); ?></span>
				</li>
			<?php
}
}
?>
			</ul>
		</div>
		<div class="title zcms"><span class="float_left">最新热门</span></div>
		<div class="article_list">
			<ul>
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '5';
$atts['start'] = '5';
$atts['cid'] = $cid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a>
				<span><?php echo dtime($fields['dtime'],'m月d日'); ?></span>
				</li>
			<?php
}
}
?>
			</ul>
		</div>
	</div>
	<div class="channel_list_right float_right">
		<div class="title zcms"><span class="float_left">热门信息</span></div>
		<div class="article_list">
			<div class="pic_info overflow">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '2';
$atts['flag'] = 'remen';
$atts['litpic'] = '1';
$atts['cid'] = $cid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<div class="float_left">
					<a href="<?php echo $fields['url']; ?>" target="_blank"><img src="<?php echo litpic($fields['litpic'],96,64); ?>" width="96" height="64"/></a>
					<a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a>
				</div>
			<?php
}
}
?>
			</div>
			<div class="jiange zcms"></div>
			<ul>
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '6';
$atts['flag'] = 'remen';
$atts['start'] = '2';
$atts['cid'] = $cid;
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
	</div>
</div>
<?php
}
}
 include $this->CompilerInclude("底部.html");
 ?>