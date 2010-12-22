<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("头部.html");
 ?>
<link href="<?php echo $path; ?>style/article.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo $path; ?>js/zcms.js"></script>
<div class="w_960 location">
	当前位置：
	<a href="<?php echo $weburl; ?>">首页</a> > 
	<?php foreach ($info['position'] as $val){?>
	<a href="<?php echo $val['url']; ?>"><?php echo $val['classname']; ?></a> > 
	<?php }?>
</div>
<div class="w_960 overflow">
	<div class="float_left article_list_class">
		<h1><a href="<?php echo $info['url']; ?>"><?php echo $info['classname']; ?></a></h1>
		<?php
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $info['maxnum'];
$atts['page'] = $_REQUEST['page'];
$atts['html'] = $htmlfile;
 echo  MakePublicTag($atts,$this->refObj,$fields); 

$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '15';
$atts['cid'] = $cid;
$atts['page'] = $_REQUEST['page'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
		<ul>
			<li class="list_title"><span><?php echo dtime($fields['dtime']); ?></span><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
			<li class="text">
			<?php if (!empty($fields['litpic'])){?>
			<a href="<?php echo $fields['url']; ?>" target="_blank"><img src="<?php echo litpic($fields['litpic'],0,70); ?>" height="70"/></a>
			<?php } echo $fields['abstract']; ?>....     <a href="<?php echo $fields['url']; ?>" target="_blank">[阅读全文]</a></li>
		</ul>
		<?php
}
}

$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $info['maxnum'];
$atts['page'] = $_REQUEST['page'];
$atts['html'] = $htmlfile;
$atts['perpagenum'] = '15';
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>

	</div>
	<?php include $this->CompilerInclude("右边.html");
 ?>
</div>
<script src="<?php echo model_url('article',''); ?>js/article.js" type="text/javascript"></script>
<script type="text/javascript">article_generate('class','<?php echo $info['id']; ?>','<?php echo $_REQUEST['page']; ?>');</script>
<?php include $this->CompilerInclude("底部.html");
 ?>