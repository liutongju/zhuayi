<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("头部.html");
 ?>
<!-- /header -->
  <form action="/plus/search.php" name="formsearch">
<div class="weizhi"><span><b>搜索:</b>
				<input type="hidden" name="kwtype" value="0" /> <input class="searchtxt" id="keyword" name="keyword" /> <select id="searchtype" name="select">
				<option value="titlekeyword">智能搜索</option>
				<option value="title" selected="selected">搜索标题</option>
				</select> <input type="image" src="<?php echo $path; ?>images/topsearch_submit.gif" />
			</span><b>您的位置</b>：
			<?php foreach ($info['position'] as $val){?>
			<a href="<?php echo $val['url']; ?>"><?php echo $val['classname']; ?></a> > 
			<?php }?>
			</div>
</form>

<!--列表左边:开始-->
<div class="clearfix wrap layout-cols2">
	<div class="col1">
    <div id="news">
        <div class="news_list">
		<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '15';
$atts['cid'] = $cid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<ul>
				<li class="list_title"><span><?php echo dtime($fields['dtime']); ?></span><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
				<li class="text"><?php echo $fields['abstract']; ?>....     <a href="<?php echo $fields['url']; ?>" target="_blank">[阅读全文]</a></li>
				<li class="ot"><span>来源：<?php echo $fields['source']; ?></span><span>&nbsp;&nbsp;点击：<?php echo $fields['click']; ?></span></li>
			</ul>
		 <?php
}
}
?>
        </div>
		
		<?php
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $info['maxnum'];
$atts['page'] = $_REQUEST['page'];
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>

		<!-- /pages -->
		
         <div class="pages"></div>
    </div>
  </div>
<!--列表左边:结束-->
<!--列表右边:开始--> 
	<div class="col2">
		<?php include $this->CompilerInclude("文章右侧.html");
 ?>
	</div>
</div>
<?php include $this->CompilerInclude("底部.html");
 ?>
</body>
</html>