<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("头部.html");
 ?>
<!-- /header -->
	<div class="weizhi">
		<b>您的位置</b>：
		<?php foreach ($info['position'] as $val){?>
		<a href="<?php echo $val['url']; ?>"><?php echo $val['classname']; ?></a> > 
		<?php }?>
		阅读资讯：<?php echo $info['title']; ?>
	</div>
<!-- Digg-->


<div class="clearfix wrap layout-cols2">
	<div class="col1">
		<div id="news">
			<h1><?php echo $info['title']; ?></h1>
			<div class="times">
			<?php echo dtime($info['dtime'],2); ?>    
			来源:<?php echo $info['source']; ?>
			【<a href="javascript:doZoom(16)">大</a> <a href="javascript:doZoom(14)">中</a> <a href="javascript:doZoom(12)">小</a>】
			<a href="#">收藏本文</a> <a href="javascript:void((function(s,d,e,r,l,p,t,z,c){var%20f='http://v.t.sina.com.cn/share/share.php?appkey=2173988749',u=z||d.location,p=['&url=',e(u),'&title=',e(t||d.title),'&source=',e(r),'&sourceUrl=',e(l),'&content=',c||'gb2312','&pic=',e(p||'')].join('');function%20a(){if(!window.open([f,p].join(''),'mb',['toolbar=0,status=0,resizable=1,width=440,height=430,left=',(s.width-440)/2,',top=',(s.height-430)/2].join('')))u.href=[f,p].join('');};if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();})(screen,document,encodeURIComponent,'','','','{dede:field.title/}','',''));">分享至微博</a>
			</div>

			<div class="content" id="textbody">
				<?php echo $info['body']; ?>
			</div>
			<?php
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['maxnum'] = $maxnum;
$atts['page'] = $_REQUEST['page'];
$atts['html'] = $htmlfile;
 echo  MakePublicTag($atts,$this->refObj,$fields); 
?>

			<div class="text_tag">
				<h5>Tags：<b><?php echo $info['tags']; ?></b> &nbsp;</h5>
				<span>责任编辑：Zcms官方测试站</span>
				<li style="display:none;"></li>
			</div>

			<div class="xg">
				<li style="white-space:nowrap;text-overflow:ellipsis;overflow: hidden;float:right;"> 上一篇：<a href="<?php echo $info['pre']['url']; ?>"><?php echo $info['pre']['title']; ?></a></li>

				<li style="white-space:nowrap;text-overflow:ellipsis;overflow: hidden;float:left;">下一篇：<a href="<?php echo $info['next']['url']; ?>"><?php echo $info['next']['title']; ?></a></li>
			</div>
			
			<div class="box_xg">
				<div class="title_xg">相关文章列表</div>
				<ul>
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
			
		</div>
	</div>
	<div class="col2">
		<?php include $this->CompilerInclude("文章右侧.html");
 ?>
	</div>
</div>
<?php include $this->CompilerInclude("底部.html");
 ?>
<script src="<?php echo model_url('admin','admin'); ?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo model_url('article',''); ?>js/article.js" type="text/javascript"></script>
<script type="text/javascript">article_generate('show','<?php echo $info['id']; ?>','<?php echo $_REQUEST['page']; ?>');</script>
</body>
</html>