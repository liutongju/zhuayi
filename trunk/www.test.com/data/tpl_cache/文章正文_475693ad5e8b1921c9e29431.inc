<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("头部.html");
 ?>
<link href="<?php echo $path; ?>style/article.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo $path; ?>js/zcms.js"></script>
<div class="w_960 location">
	当前位置：
	<a href="/">首页</a> > 
	<?php foreach ($info['position'] as $val){?>
	<a href="<?php echo $val['url']; ?>"><?php echo $val['classname']; ?></a> > 
	<?php }?>
	<a href="<?php echo $info['url']; ?>"><?php echo $info['title']; ?></a> 正文 
</div>
<div class="w_960 overflow">
	<div class="float_left article_left">
		<h1><?php echo $info['title']; ?></h1>
		<div class="share overflow  border-bottom">
			<a href="<?php echo $weburl; ?>"><?php echo $weburl; ?></a>　
			<?php echo dtime($info['dtime']); ?>　
			来源：<?php echo $info['source']; ?>　
			字体大小：<a href="javascript:fontsize('body','12')">T</a> 
			<a href="javascript:fontsize('body','14')"><font style="font-size:14px;font-weight:bold;color:#064599">T</font></a>
			<a href="javascript:fontsize('body','18')"><font style="font-size:18px;font-weight:bold;color:#064599">T</font></a>
			<!-- JiaThis Button BEGIN -->
			<div id="ckepop">
				<a href="http://www.jiathis.com/share/" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank">分享到：</a>
				<a class="jiathis_button_tsina">新浪微博</a>
				<a class="jiathis_button_qzone">QQ空间</a>
				<a class="jiathis_button_t163">网易微博</a>
				<a class="jiathis_button_renren">人人网</a>
				<a class="jiathis_button_hi">百度空间</a>
				<a class="jiathis_button_tsohu">搜狐微博</a>
				<a class="jiathis_button_tqq">腾讯微博</a>
				<a class="jiathis_button_kaixin001">开心网</a>
			</div>
			<!-- JiaThis Button END -->
		</div>
		<div class="both"></div>
		<div id="body">
			<?php echo $info['body']; 
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $maxnum;
$atts['page'] = $_REQUEST['page'];
$atts['html'] = $htmlfile;
$atts['perpagenum'] = $article_page_len;
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>

		</div>
		<div class="tags">
			Tags: <?php echo $info['tags']; ?>
		</div>
		<div class="infonext">
			<li class="float_left">上一篇：<a href="<?php echo $info['pre']['url']; ?>"><?php echo $info['pre']['title']; ?></a></li>
			<li class="float_right">下一篇：<a href="<?php echo $info['next']['url']; ?>"><?php echo $info['next']['title']; ?></a></li>
		</div>
		<div class="jiange zcms"></div>
		<div class="interrelated overflow">
			<span class="float_left">相关文章：</span>
		</div>
		<div class="interrelated_list">
			<ul class="overflow">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '8';
$atts['related'] = $info['related'];
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
		<div class="jiange zcms"></div>
		<div class="interrelated overflow">
			<span class="float_left">同类文章：</span>
			<div class="float_right">
				<a title='内有隐情' target='_blank' href='http://pc.heima8.com/index.php?p=118982661&c=118982461&sc=[subcode]&durl=110986611&a=110815931&cc=110986622'>非家长陪护不可以点击</a>
				<a title='凡客购物精品折扣' target='_blank' href='http://pc.heima8.com/index.php?p=118982661&c=118982461&sc=[subcode]&durl=110986611&a=110815931&cc=110986622'>凡客购物精品折扣</a>
				<a title='品味生活，精美“表”情，卡西欧飞亚达多款名表239元起' target='_blank' href='http://pc.heima8.com/index.php?p=118982701&c=118982461&sc=[subcode]&durl=112297201&a=106822221&cc=112297212'>品味生活，精美“表”情，卡西欧飞亚达多款名表239元起</a>
			</div>
		</div>
		<div class="bright overflow">
			<div>
				<script type="text/javascript" src="http://www.153k.com/index.php?m=ads&c=show&id=18"></script>
			</div>
			<ul>
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '8';
$atts['cid'] = $info['cid'];
$atts['start'] = '9';
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
	<?php include $this->CompilerInclude("右边.html");
 ?>
</div>
<script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>
<script src="<?php echo model_url('article',''); ?>js/article.js" type="text/javascript"></script>
<script type="text/javascript">article_generate('show','<?php echo $info['id']; ?>','<?php echo $_REQUEST['page']; ?>');</script>
<?php include $this->CompilerInclude("底部.html");
 ?>