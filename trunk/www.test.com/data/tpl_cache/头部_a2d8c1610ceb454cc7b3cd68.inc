<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><div class="clearfix header">
  <div class="brand">
  <h1 class="site-name"><?php echo $weburl; ?> - <?php echo $webname; ?></h1>
  <a class="site-logo" href="<?php echo $weburl; ?>" title="<?php echo $webname; ?>" rel="home"><img src="<?php echo $path; ?>images/logo.gif" alt="Chinaz logo" width="165" height="60" /></a>
  </div>
  
</div>

<div class="nav">
<div class="navinner">
  <ul class="navlist">
  <li><a href="/">首页</a></li>
  <?php
$atts = array();
$atts['tagname'] = 'article_class_list';
$atts['parent_id'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
  <li><a href="/html/News/Index.html" id="nav_1" onmouseover="showMenu('nav_1','subnav1')" class="current"><?php echo $fields['classname']; ?></a>
  </li>
  <?php
}
}
?>
  </ul>
</div>  
</div>

<div class="note"><span>
  <a href="http://www.chinaz.com/rss.php"><img src="<?php echo $path; ?>images/rss.gif" align="absbottom" /> RSS订阅</a></span>
  <b>站长资讯通告:</b><script language="javascript" src="http://www.chinaz.com/Js/Hot_Announce.js"></script>

</div>