<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title><?php echo $seo['seo_title']; ?> - <?php echo $webname; ?></title>
<link href="<?php echo $path; ?>style/style.css" type="text/css" rel="stylesheet" />
<link rel="icon" href="favicon.gif" type="image/gif" >
<meta name="keywords" content="<?php echo $seo['seo_keywords']; ?>">
<meta name="description" content="<?php echo $seo['seo_description']; ?>">
<script src="<?php echo $path; ?>js/chinaz.js" type="text/javascript"></script>
<link href="<?php echo $path; ?>images/2008/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="container">

<div class="clearfix header">
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
$atts['parent_id'] = '0';
$atts['nav'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
  <li><a href="<?php echo $fields['url']; ?>" id="nav_<?php echo $key;?>" onmouseover="showMenu('nav_<?php echo $key;?>','subnav<?php echo $key;?>')" class=><?php echo $fields['classname']; ?></a>
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