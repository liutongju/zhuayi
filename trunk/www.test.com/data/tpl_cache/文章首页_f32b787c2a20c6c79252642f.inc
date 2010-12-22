<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("头部.html");
 ?>
<link href="<?php echo $path; ?>style/index.css" rel="stylesheet" type="text/css" />
<div class="w_960 overflow">
	<div class="index_top_left float_left">
		<div class="flash">
			<script type="text/javascript">
<!--
var focus_width=296
var focus_height=225
var text_height=24
linkarr = new Array();
picarr = new Array();
textarr = new Array();
var files = "";
var links = "";
var texts = "";

<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '5';
$atts['litpic'] = '1';
$atts['flag'] = 'huandengpian';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
linkarr[<?php echo $key; ?>] = "<?php echo $fields['url']; ?>";
picarr[<?php echo $key; ?>]  = "<?php echo litpic($fields['litpic'],296,225); ?>";
textarr[<?php echo $key; ?>]  = '<?php echo $fields['title']; ?>';
<?php
}
}
?>
for(i=0;i<picarr.length;i++){
  if(files=="") files = picarr[i];
  else files += "|"+picarr[i];
}
for(i=0;i<linkarr.length;i++){
  if(links=="") links = linkarr[i];
  else links += "|"+linkarr[i];
}
for(i=0;i<textarr.length;i++){
  if(texts=="") texts = textarr[i];
  else texts += "|"+textarr[i];
}


var swf_height = focus_height+text_height
function clearText(str)
{
	return str.substr(0, str.length - 1);
}
var pics=clearText(files+'|')
var links=clearText(links+'|')
var texts=clearText(texts+'|')
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cabjavascript:void(0)version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'"  hspace="0">');
document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="<?php echo $path; ?>/images/pixviewer.swf"><param name="quality" value="high"><param name="bgcolor" value="#ffffff">');
document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
document.write('<embed src="<?php echo $path; ?>/images/pixviewer.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" bgcolor="#ffffff" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
document.write('</object>');					
//-->
 </script>

		</div>

		<div class="title zcms">
			<span class="float_left">最新热门</span>
		</div>
		<div class="article_list">
			<ul class="zcms">
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
	</div>
	<div class="index_top_cen float_left">
	<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['start'] = '1';
$atts['titlelen'] = '38';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
		<div class="tuijian zcms">
			<h2><a href="<?php echo $fields['url']; ?>"><?php echo $fields['title']; ?></a></h2>
			<span><?php echo $fields['abstract']; ?></span>
		</div>
	<?php
}
}
?>
		<div class="title">
			<span class="float_left">最新资讯</span>
		</div>
		<div class="article_list">
			<ul>
			<?php $i=1;
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '10';
$atts['start'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a><span>(<?php echo dtime($fields['dtime'],'m月d日'); ?>)</span></li>
			<?php $i++;
			if ($i%6 ==0){echo '</ul><ul>';}
			
}
}
?>
			</ul>
		</div>
		<div class="title">
			<span class="float_left">最新关注</span>
		</div>
		<div class="article_list">
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['start'] = '11';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<h2><a href="<?php echo $fields['url']; ?>"><?php echo $fields['title']; ?></a></h2>
		<?php
}
}
?>
			<ul>
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '4';
$atts['start'] = '12';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li>
					<a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a>
					<span><?php echo dtime($fields['dtime'],'m月d日'); ?></span>
				</li>
			<?php
}
}
?>
			</ul>
		</div>
	</div>
	<div class="index_top_right float_right">
		<div class="title zcms">
			<span class="float_left">推荐资讯</span>
		</div>
		<div class="article_list">
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['litpic'] = '1';
$atts['flag'] = 'tuijian';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<div class="article_pic overflow">
				<a href="<?php echo $fields['url']; ?>"  target="_blank"><img src="<?php echo litpic($fields['litpic'],62,62); ?>" width="62" /></a>
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
		
		<div class="title zcms">
			<span class="float_left">最新推荐</span>
		</div>
		<div class="article_list">
			<ul>
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '9';
$atts['start'] = '9';
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

<div class="w_960 overflow" style="margin-top:10px;">
	<div class="float_left"><script type="text/javascript" src="http://www.153k.com/index.php?m=ads&c=show&id=19"></script></div>
	<div class="float_right"><script type="text/javascript" src="http://www.153k.com/index.php?m=ads&c=show&id=20"></script></div>
</div>

<?php
$atts = array();
$atts['tagname'] = 'article_class_list';
$atts['parent_id'] = '0';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
 $cid = $fields['id'];?>
<div class="w_960 channl zcms">
	<h2 class="float_left"><a href="<?php echo $fields['url']; ?>"><?php echo $fields['classname']; ?></a></h2>
	<span class="float_right">
	<?php
$atts = array();
$atts['tagname'] = 'article_class_list';
$atts['parent_id'] = $fields['id'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
 $cid .= ','.$fields['id'];?>
		<a href="<?php echo $fields['url']; ?>"><?php echo $fields['classname']; ?></a> |
	<?php
}
}
?>
	</span>
</div>
<div class="w_960 index_center">
	<div class="index_center_left float_left">
		<div class="title zcms">
			<span class="float_left">热门资讯</span>
		</div>
		<div class="article_list">
			<div class="pic_info">
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
$atts['flag'] = 'remen';
$atts['litpic'] = '1';
$atts['start'] = '1';
$atts['cid'] = $cid;
$atts['titlelen'] = '36';
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
$atts['limit'] = '5';
$atts['start'] = '3';
$atts['flag'] = 'remen';
$atts['cid'] = $cid;
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
		<div class="title zcms">
			<span class="float_left">热门排行</span>
		</div>
		<div class="article_list">
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['flag'] = 'remen';
$atts['litpic'] = '1';
$atts['start'] = '9';
$atts['cid'] = $cid;
$atts['titlelen'] = '36';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<div class="tuijian tops">
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
$atts['limit'] = '5';
$atts['start'] = '10';
$atts['flag'] = 'remen';
$atts['cid'] = $cid;
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
	<div class="index_center_cen float_left">
		<div class="title">
			<span class="float_left">最新资讯</span>
		</div>
		<div class="article_list">
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['cid'] = $cid;
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
			<?php $i=1;
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '20';
$atts['start'] = '1';
$atts['cid'] = $cid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li><a href="<?php echo $fields['classurl']; ?>" target="_blank">[<?php echo $fields['classname']; ?>]</a> <a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a><span><?php echo dtime($fields['dtime'],'m月d日'); ?></span></li>
			<?php $i++;
			if ($i%6 ==0){echo '</ul><ul>';}
			
}
}
?>
			</ul>
		</div>
	</div>
	<div class="index_center_right float_right">
		<div class="title zcms">
			<span class="float_left">热门推荐</span>
		</div>
		<div class="article_list">
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['litpic'] = '1';
$atts['cid'] = $cid;
$atts['flag'] = 'tuijian';
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
$atts['cid'] = $cid;
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
		<div class="title zcms">
			<span class="float_left">最新推荐</span>
		</div>
		<div class="article_list">
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['litpic'] = '1';
$atts['start'] = '8';
$atts['cid'] = $cid;
$atts['flag'] = 'tuijian';
$atts['titlelen'] = '36';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<div class="article_pic_230">
				<a href="<?php echo $fields['url']; ?>" target="_blank"><img src="<?php echo litpic($fields['litpic'],230,147); ?>" width="230" height="147"/></a>
				<a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a>
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
$atts['limit'] = '4';
$atts['start'] = '9';
$atts['cid'] = $cid;
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
	</div>
</div>
<div class="clear"></div>
<?php
}
}
?>
<div class="links w_960">
	<div class="title zcms">
		<span class="float_left">友情链接</span>
	</div>
	<ul>
	<?php
$atts = array();
$atts['tagname'] = 'link_list';
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
<?php include $this->CompilerInclude("底部.html");
 ?>