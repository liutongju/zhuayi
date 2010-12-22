<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><div class="wrapper vmid">
    <!-- Container begin -->
    <div class="container">
<?php include $this->CompilerInclude("头部.html");
 ?>
    <!-- Content begin -->
<div class="content">
	<!-- Breadcrumb begin -->
    	<div class="breadcrumb">
  		当前位置：
		<a href="/">首页</a> > 
		<?php foreach ($info['position'] as $val){?>
		<a href="<?php echo $val['url']; ?>"><?php echo $val['classname']; ?></a> > 
		<?php }?>
		<a href="<?php echo $info['url']; ?>"><?php echo $info['title']; ?></a> 正文 
		</div>    <!-- Breadcrumb end -->
    <!-- SinglePost begin -->
	<div class="single">
			            <h1><?php echo $info['title']; ?></h1>
            <div class="meta singlemeta">
            	<span><?php echo dtime($info['dtime']); ?></span>
                <span>来源:<?php echo $info['source']; ?></span>
                <span>字号: <a href="javascript:void(0)" class="mfbig">大</a> <a href="javascript:void(0)" class="mfmid">中</a> <a href="javascript:void(0)" class="mfsml mfcurrent">小</a> </span> 
            </div>
            <!-- PostContent begin -->
            <div class="entry">
            	<p class="summary"><strong>摘要</strong>:<?php echo $info['abstract']; ?>　
                </p>
                <div class="entrycontent">

                <?php echo $info['body']; ?>
                <div class="dede_pages" style="margin-left:50px;">
				   <ul class="pagelist">
                       <?php
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $info['maxnum'];
$atts['page'] = $_REQUEST['page'];
$atts['html'] = $htmlfile;
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>

				   </ul>
                </div>
				<div class="ad_single ad_singlebtm ">
                
                
                
                 <!-- 内容页底部468 60广告 begin -->
                        <script src='/plus/ad_js.php?aid=4' language='javascript'></script>                 
                 <!-- 内容页底部468 60广告 end -->  
                
                
                
                  
                    <div class="clear"></div>
                    </div>
            	</div>
            </div>
            <!-- PostContent end -->
            <!-- PostFunction begin -->
			<!-- //顶踩 -->
          

			
                <div class="clear"></div>
                <strong>标签:</strong><?php echo $info['tags']; ?><br />
                <strong>版权所有:</strong> 非特殊声明均为本站原创文章，转载请注明出处： <a class="underline" href="<?php echo $weburl; ?>"><?php echo $webname; ?></a><br />

            </div>
            <!-- PostFunction end -->
            <!-- Related Content begin -->
            <div class="relatedrandom">
                <div class="related">
                    <h3>相关阅读</h3>
                    	<ul class="rltimg">
						  <?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '8';
$atts['cid'] = $info['cid'];
$atts['litpic'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
                          <li><A href="<?php echo $fields['url']; ?>" target=_blank><IMG class="border_green_2" alt="<?php echo $fields['title']; ?>" src="<?php echo litpic($fields['litpic'],146,100); ?>"></A><h4><a href="<?php echo $fields['url']; ?>" title="<?php echo $fields['title']; ?>"><?php echo $fields['title']; ?></a></h4></li>
                          <?php
}
}
?>
                        </ul>
                </div>  
                <div class="random">
                    <h3>随机推荐</h3>
                        <ul>
                        <?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '8';
$atts['cid'] = $info['cid'];
$atts['litpic'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
                           <li><a href="<?php echo $fields['url']; ?>" title="<?php echo $fields['title']; ?>"><?php echo $fields['title']; ?></a></li>
                        <?php
}
}
?>
                        </ul>
                </div> 
		</div>
		<!-- Related Content end -->
		<!-- PostTool begin -->
		
		<!-- PostTool end -->
		<!-- PageNavigation begin -->
		<div class="clear"></div>
		<div class="postnavi">
             <div class="previous_post">上一篇：<a href="<?php echo $info['pre']['url']; ?>"><?php echo $info['pre']['title']; ?></a></div>
            <div class="next_post">下一篇：<a href="<?php echo $info['next']['url']; ?>"><?php echo $info['next']['title']; ?></a></div>
		</div>
     <!-- PageNavigation end -->
	 </div>
     <!-- SinglePost end -->
     <!-- PostComment begin -->
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