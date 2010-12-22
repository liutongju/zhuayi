<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><div class="wrapper vmid">
    <!-- Container begin -->
    <div class="container">
<?php include $this->CompilerInclude("头部.html");
 ?>
<!-- /header -->    
<!-- Content begin -->
       <div class="content">
	   <!-- Breadcrumb begin -->
    	 <div class="breadcrumb">
  			当前位置：
			<a href="<?php echo $weburl; ?>">首页</a> > 
			<?php foreach ($info['position'] as $val){?>
			<a href="<?php echo $val['url']; ?>"><?php echo $val['classname']; ?></a> > 
			<?php }?>
    	 </div>
    	 <!-- ArticleList begin -->
		<div class="listbox">
			<ul class="e2">
				<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '15';
$atts['cid'] = $info['channelid'];
$atts['page'] = $_REQUEST['page'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li>
					<?php if (!empty($fields['litpic'])){?>
      				<a href='<?php echo $fields['url']; ?>' class='preview'><img src='<?php echo litpic($fields['litpic'],82,66); ?>'/ ></a>
					<?php }?>
					[<a href="<?php echo $fields['classurl']; ?>" class="title" target="_blank"><?php echo $fields['classname']; ?></a>]
					<a href="<?php echo $fields['url']; ?>" class="title" target="_blank"><?php echo $fields['title']; ?></a>
					<span class="info">
                        <img src='<?php echo $path; ?>images/tag.jpg'/><small>日期：</small><?php echo dtime($fields['dtime'],"m-d"); ?>&nbsp;
						<img src='<?php echo $path; ?>images/view.jpg'/><small>点击：</small><font color="#E19c77"><?php echo $fields['click']; ?></font>
					</span>
					<p class="intro">
						<font color="#999999"><?php echo $fields['abstract']; ?>...</font>
					</p>
				</li>
			<?php
}
}
?>
			</ul>
		</div><!-- /listbox -->
    	 <!-- ArticleList end -->
    	 <!-- Page Navigation begin -->
    	 <div class="clear"></div>
		 <div class="dede_pages">
			<ul><?php
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $info['maxnum'];
$atts['page'] = $_REQUEST['page'];
$atts['html'] = $htmlfile;
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>
</ul>
		 </div>
    	 <!-- Page Navigation end -->
    </div>   
    <!-- Content end --> 
    <!-- Sidebar begin -->
    
	   
	<?php include $this->CompilerInclude("右边.html");
 ?>
    <!-- Sidebar end -->
	</div>
    <!-- Container end -->
<?php include $this->CompilerInclude("底部.html");
 ?>
<!-- /footer -->
</body>
</html>