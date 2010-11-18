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
	<?php
$atts = array();
$atts['tagname'] = 'article_class_list';
$atts['parent_id'] = $info['id'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
        <div id="news_sort">
			<div class="news_title"><span><a href="<?php echo $fields['url']; ?>">更多</a>>></span><?php echo $fields['classname']; ?></div>
			<ul>
				<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '10';
$atts['cid'] = $fields['id'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
				<li><span><?php echo dtime($fields['dtime'],3); ?></span><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
				<?php
}
}
?>
			</ul>
        </div>
	<?php
}
}
?>
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