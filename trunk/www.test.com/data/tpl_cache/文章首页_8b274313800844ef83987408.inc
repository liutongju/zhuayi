<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("头部.html");
 ?>
<div class="clearfix wrap layout-cols3">
	<div class="col1">
  <div class="ad-loop">    
<script language='javascript'>
linkarr = new Array();
picarr = new Array();
textarr = new Array();
var focus_width=278;
var focus_height=190;
var text_height=30;
var pics = "";
var links = "";
var texts = "";
var swf_height = focus_height+text_height;
var defJpeg = "http://www.011seo.com/plus/img/jpeg.jpg";
<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '5';
$atts['strlen'] = '40';
$atts['flag'] = 'huandengpian';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
linkarr[<?php echo $key; ?>] = "<?php echo $fields['url']; ?>";
picarr[<?php echo $key; ?>] = "<?php echo $fields['litpic']; ?>";
textarr[<?php echo $key; ?>] = "<?php echo $fields['title']; ?>";
<?php
}
}
?>

for(i=1;i<picarr.length;i++)
{	if(picarr[i].indexOf("jpg")==-1 && picarr[i].indexOf("JPG")==-1)	picarr[i] = defJpeg;
   if(pics=="") pics = picarr[i];
   else pics += "|"+picarr[i];
}
for(i=1;i<linkarr.length;i++)
{
   if(links=="") links = linkarr[i];
   else links += "|"+linkarr[i];
}
for(i=1;i<textarr.length;i++)
{
   if(texts=="") texts = textarr[i];
   else texts += "|"+textarr[i];
}
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="<?php echo $path; ?>images/2008/pixviewer.swf">');
document.write('<param name="quality" value="high"><param name="bgcolor" value="#ffffff">');
document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
document.write('<embed src="<?php echo $path; ?>images/2008/pixviewer.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" bgcolor="#ffffff" quality="high" width="'+ focus_width +'" height="'+ focus_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
document.write('</object>');
</script>
      </div>

  </div>

	<div class="search">
        <div class="menu"><a href="/plus/heightsearch.php" id="menu1" class="menu_gg" onclick="javascript:doClick_menu(this)">全站全文搜索</a></div>
<div>
<form action="{dede:field name='phpurl'/}/search.php" name="formsearch" method="post">
      <input name="keyword" type="text" class="input" /> <input  type="submit" class="input_pos" name="authorsearchbtn" value="1"  >
</form></div>
        <div class="hot_line"><b>热门搜索：</b>{dede:hotwords num='8' subday='30'/}</div>
  </div>
  
  <div class="col2">
  	<div class="topinfo">
	<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['strlen'] = '27';
$atts['litpic'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
    <h3><a href="<?php echo $fields['url']; ?>"><?php echo $fields['title']; ?></a></h3>
    <p><?php echo strlens($fields['abstract'],0,132); ?>...</p>
    <?php
}
}
?>
	</div>
  </div>
  
  <div class="col3">
  	<div class="recommendinfo">
		<h3><span>精彩推荐</span></h3>
	<ul>
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '4';
$atts['strlen'] = '28';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
        <li><span class="date">[<?php echo dtime($fields['dtime'],4); ?>日]</span><a href="<?php echo $fields['url']; ?>"><?php echo $fields['title']; ?></a></li>
        <?php
}
}
?>
      </ul>
    </div>
  </div>

</div>

<div class="clearfix wrap layout-col2ultra">
	<div class="col1">
<div class="box">
        <div class="box_title"><h3>最近更新</h3></div>
        <div class="box_1">
        <ul class="hot_box">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '6';
$atts['strlen'] = '34';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
            <li><span class="date">[<?php echo dtime($fields['dtime'],4); ?>日]</span>   <a href="<?php echo $fields['url']; ?>"><?php echo $fields['title']; ?></a></li>
            <?php
}
}
?>
        </ul>
        </div>
    </div>
    <div class="ad_left">
   <!--ad -->
    </div>
  	<div class="box">
        <div class="box_title"><h3>推荐文章</h3></div>
        <div class="box_1">
        <ul class="left_box">
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '16';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
        <li>· <a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
		<?php
}
}
?>
        </ul>
        </div>
    </div>
    <div class="ad_left"></div>
  	<div class="box">
        <div class="box_title"><h3>热点关注</h3></div>
        <div class="box_1">
            <ul class="left_box">
				<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '18';
$atts['strlen'] = '38';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
                	<li>· <a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
                <?php
}
}
?>
            </ul>
        </div>
    </div>
  	
    
    <div class="ad_left">
<script type='text/javascript'> 
cpro_client='wxhy_cpr';
cpro_at='text_image'; 
cpro_161=3; 
cpro_flush=4; 
cpro_w=250; 
cpro_h=250; 
cpro_template='text_default_250_250'; 
cpro_cbd='#FFFFFF'; 
cpro_cbg='#FFFFFF'; 
cpro_ctitle='#0000ff'; 
cpro_cdesc='#444444'; 
cpro_curl='#008000'; 
cpro_cflush='#e10900'; 
cpro_uap=1;
cpro_cad=1;
</script>
<script language='JavaScript' type='text/javascript' src='http://cpro.baidu.com/cpro/ui/cp.js'></script>
    </div>
  </div>
<div class="col2">

<!--内容 -->
<?php $i=1;
$atts = array();
$atts['tagname'] = 'article_class_list';
$atts['parent_id'] = '0';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{

$cid = '';
//$cid = parent_parent_id($fields['id']);
?>
<div class="col<?php if ($i%2 ==0){echo '2';}else{echo '1';}?>">
	<div class="box">
          <div class="box_title">
			<h3><a href="<?php echo $fields['url']; ?>"><?php echo $fields['classname']; ?></a></h3>
		  </div>
		  <?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '1';
$atts['strlen'] = '32';
$atts['cid'] = $cid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
          <div class="box_bt"><a href="<?php echo $fields['url']; ?>"><?php echo $fields['title']; ?></a></div>
          <div class="box_text"><?php echo strlens($fields['abstract'],0,80); ?>……</div>
		   <?php
}
}
?>
          <div class="box_1">
              <ul class="center_box">
			  <?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '13';
$atts['strlen'] = '38';
$atts['cid'] = $cid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
                  <li>· <a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
			  <?php
}
}
?>
			  </ul>
        </div>
    </div>
</div>
<?php $i++;
}
}
?> </div>

   
</div>
  <div class="box line">
<div class="box_title"><h3>合作伙伴/友情链接</h3></div>
	<div class="box_1">
    <ul class="box_line">
	<li class="bv">
	<?php
$atts = array();
$atts['tagname'] = 'link_list';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
		<a href="<?php echo $fields['url']; ?>"><?php echo $fields['title']; ?></a>
	<?php
}
}
?>
	</li>
    </ul>
    </div>
</div>
<?php include $this->CompilerInclude("底部.html");
 ?>
</body>
</html>