<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("头部.html");
 ?>
<link href="<?php echo $path; ?>style/chinazv09style.css" type="text/css" rel="stylesheet" />

<!--站长之家中部代码开始-->
<div style="width:910px;margin:0px auto 10px;">

<!--站长之家中部左侧-->
<div class="zongkl">

<DIV class="col1" style="border:1px solid #99BBDD;width:278px;">
<DIV class=ad-loop>
<script type="text/javascript">
<!--
    
    var focus_width=278
    var focus_height=175
    var text_height=24
    var swf_height = focus_height+text_height
function clearText (str) {
    return str.substr(0, str.length - 1);
}
    
	
    var pics=clearText('http://www.chinaz.com/upimg/100629/_1J41IU.jpg|http://www.chinaz.com/upimg/100625/_121114120.jpg|http://www.chinaz.com/upimg/100624/100624/_1222404X.jpg|http://www.chinaz.com/upimg/100622/_143154107.jpg|http://www.chinaz.com/upimg/100604/_1P45DM.jpg|')
    var links=clearText('http://www.chinaz.com/Webmaster/Club/062911VE2010.html|http://www.chinaz.com/Webmaster/Club/062511S262010.html|http://www.chinaz.com/Webmaster/Club/062411Qa2010.html|http://www.chinaz.com/Webmaster/Club/062211O622010.html|http://www.chinaz.com/Webbiz/Exp/060411M592010.html|')
    var texts=clearText("谷歌退出造就“站长香饽饽”大佬都盼碗里有|王建硕：中国的互联网现状相当于美国的哪一年|新备案制度 个人站长何去何从 移民还是蹲守|“人民搜索”剑指百度 不走百度商业利益路线|深入解读Groupon 为代表的新型团购商业模式|")
	document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cabjavascript:void(0)version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'" align="left"  hspace="0">');
    document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="<?php echo $path; ?>images/pixviewer.swf"><param name="quality" value="high"><param name="bgcolor" value="#F0F0F0">');
    document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
    document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
    document.write('<embed src="<?php echo $path; ?>images/pixviewer.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" bgcolor="#F0F0F0" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
    document.write('</object>');
    
//-->
   </script>
</DIV></DIV>

<div class="col1" style="width:280px;margin-top:10px;"> 
   <div class="box">
        <div class="box_title"><h3>最近更新</h3></div>
        <div class="box_1">
        <ul class="hot_box">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '6';
$atts['strlen'] = '26';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
           <li><a href="<?php echo $fields['classurl']; ?>" target="_blank"><b>【<?php echo $fields['classname']; ?>】</b></a> <a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
			<?php
}
}
?>
        </ul>
        </div>
    </div>
</div>

<div class="ad_left"><script src='/plus/ad_js.php?aid=5' language='javascript'></script></div>

<div class="col1" style="width:280px;margin-top:10px;"> 
   <div class="box">
        <div class="box_title"><h3>推荐文章</h3></div>
        <div class="box_1">
       <ul class="left_box" style="line-height:180%;">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '16';
$atts['strlen'] = '46';
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

<div class="ad_left"><iframe id="A4" src="http://images.chinaz.com/newindex_images/A4.htm" frameborder="0" width="280" scrolling="no" height="100"></iframe></div>

      <div class="box">
         <div class="box_title"><h3>热点关注</h3></div>
        <div class="box_1">
       <ul class="left_box" style="line-height:180%;">
			<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '16';
$atts['strlen'] = '46';
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

 
   <div class="box">
        <div class="box_title"><h3><a href="http://www.chinaz.com/z/" target="_blank">站长Z周刊</a></h3></div>
        
    </div>

</div>

<!--右部-->

<div class="zongkr">

<div style="margin-bottom:10px;">

<DIV class=search>
        <div class="menu">全站搜索</div>

        <div class="menu_1" style="display:block;" id="menu_con1"></div>
     
        <div><input name="keyword" type="text" class="input float_left" /> <img src="<?php echo $path; ?>images/btn.gif" style="cursor: hand;" onclick="doClick_submit()" /></div>
        <div class="hot_line"><b>热门搜索：</b>　<a href='/plus/search.php?searchtype=titlekeyword&keyword=实名认证'>实名认证</a> 　<a href='/plus/search.php?searchtype=titlekeyword&keyword=.cn'>.CN</a> 　<a href='/plus/search.php?searchtype=titlekeyword&keyword=停止解析'>停止解析</a> 　<a href='/plus/search.php?keyword=Alexa&searchtype=titlekeyword'>Alexa</a> 　<a href='/plus/search.php?keyword=%C3%E2%B7%D1&searchtype=titlekeyword'>免费</a> 　<a href='/plus/search.php?keyword=%C1%AA%C3%CB&searchtype=titlekeyword'>联盟</a> 　<a href='/plus/search.php?keyword=%BD%A8%D5%BE&searchtype=titlekeyword'>建站</a> 　<a href='/plus/search.php?keyword=%B9%E3%B8%E6&searchtype=titlekeyword'>广告</a> 　<a href='http://usa.idc123.com' target="_blank">国外空间</a> 　<a href='http://usa.idc123.com' target="_blank">美国空间</a></div>
  </div>

</div>

<!--站长之家右部左部-->
<div class="zongkrl">

<div style="border:1px solid #99BBDC;padding:1px;">
<div class="topnk">
{dede:arclist row='1' flag='h'}
<div class="z1" align="center"><a target="_blank" href="[field:arcurl/]" style="color:#000196;" target="_blank">[field:title/]</a></div>
<div class="z2">
<span style="color:#666666;">[field:description function='html2text(@me)'/]...<a href="[field:arcurl/]" style="color:#CD3132;" target="_blank">阅读全文>></a></span>
<div style="clear:both"></div>
</div>
{/dede:arclist}

<div>
<div style="clear:both"></div></div>
<div class="nlistzi" style="margin:10px 0px 0px 0px;"><ul>
<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '8';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
<li><a href="<?php echo $fields['url']; ?>" target="_blank">· <?php echo $fields['title']; ?></a></li>
<?php
}
}
?>
</ul></div>
</div>
</div>

<div class="box" style="margin-top:10px;">
<div class="box_title">
<span style="float:right;margin-right:10px;"><a href="/News/">更多</a></span>
</span>
<h3>行业资讯</h3>
</div>
<div style="padding:10px;">
{dede:arclist row='1' typeid='1' flag='h'}
<div class="topnkz3"><a href="[field:arcurl/]" style="color:#285B92" target="_blank">[field:title/]</a></div>
<div class="topnkz4">[field:description/]...</div>
{/dede:arclist}

<div class="nlistzi" style="margin:10px 0px 0px 0px;"><ul>
<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '10';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
<li><a href="<?php echo $fields['url']; ?>" target="_blank">· <?php echo $fields['title']; ?></a></li>
<?php
}
}
?>
</ul></div>
</div>
</div>



</div>

<!--站长之家右部右部-->
<div class="zongkrr">

<div class="box"><div class="box_title"><h3><a href="/zt/" target="_blank">站长之家精彩专题</a></h3></div>
<div style="padding:10px 5px 10px 5px;">
<div class="jczttu">
<a href="/ztzt/201006/28-118522.html" target="_blank"><img src="/templets/chinaz/images/_102Kc35.jpg" width="110" height="100"></a></div>
<span style="color:#666666;line-height:18px;">当大洋彼岸的Groupon让团购火了，再经王兴的美团网启蒙，转眼间在国内就一窝蜂的出现了数百家一...</span>
<div style="clear:both;"></div>
<div class="jcztzi"><a href="/ztzt/201006/28-118522.html" target="_blank" style="color:#013577">专题：团购网站淘金浪潮 乱象丛生</a></div>
<div class="nlistzi" style="padding:10px 0px 0px 10px;"><ul>
<li><a title="专题：团购网站淘金浪潮 乱象丛生" target="_blank" href="/ztzt/201006/28-118522.html">专题：团购网站淘金浪潮 乱象丛生</a></li><li><a title="专题：2010年端午节素材下载" target="_blank" href="/Announce/060311M062010.html">专题：2010年端午节素材下载</a></li><li><a title="专题：2010年第五届中国站长年会" target="_blank" href="/ztzt/201005/31-117102.html">专题：2010年第五届中国站长年会</a></li><li><a title="专题：2010六一儿童节素材下载" target="_blank" href="/Announce/0521115Z92010.html">专题：2010六一儿童节素材下载</a></li>
</ul></div>
</div></div>

<div class="box" style="padding: 0; border: 0;">
<script language="javascript" src="/images/bd/vote.js"></script>
</div>

<div class="box"><div class="box_title"><h3>站长俱乐部</h3></div>
<div style="padding:10px;">
<div class="nlistzix"><ul>
<li>· <a href="/Bbs/Club/063011X592010.html" target="_blank">SEO多年的体会 用心做站回报网民</a></li><li>· <a href="/Bbs/Club/062911W302010.html" target="_blank">告别做站之路</a></li><li>· <a href="/Bbs/Club/062911W212010.html" target="_blank"><font color='#FF0000'>你认为谷歌能申请成功ICP牌照吗？ </font></a></li><li>· <a href="/Bbs/Club/062Q1V032010.html" target="_blank">Discuz和Phpwind哪个好用些？</a></li><li>· <a href="/Bbs/Club/062Q1V012010.html" target="_blank">晒晒我已建两年的网站总IP量</a></li><li>· <a href="/Bbs/Club/062Q1Ub2010.html" target="_blank">关于网站301永久重定向批量设置的问</a></li><li>· <a href="/Bbs/Club/062Q1UQ2010.html" target="_blank">一个落魄站长的简陋办公环境</a></li><li>· <a href="/Bbs/Club/062511SN2010.html" target="_blank">扯谈，大家看看我的工作环境！</a></li><li>· <a href="/Bbs/Club/062411R112010.html" target="_blank">互联网创业，这些门槛你达到了吗？ </a></li><li>· <a href="/Bbs/Club/062311Q402010.html" target="_blank">还是个单身 希望能有个站长征婚频道</a></li><li>· <a href="/Bbs/Club/062311Q392010.html" target="_blank">广告代码被360列入黑名单 我们很无辜</a></li><li>· <a href="/Bbs/Club/062211OK2010.html" target="_blank">有个域名想建站 向各位征求建议</a></li><li>· <a href="/Bbs/Club/060411N052010.html" target="_blank">崩塌的6月 网站3天破产记录</a></li><li>· <a href="/Bbs/Club/060411Mc2010.html" target="_blank">正规站被腾讯屏蔽一直未解封</a></li>
</ul></div>
</div>
</div>

<div class="ad_left"><script src='/plus/ad_js.php?aid=6' language='javascript'></script></div>

<div class="box">
        <div class="box_title">
           <span style="float:right;font-weight:normal;font-size:12px;margin-right:10px;"><a href="http://bbs.chinaz.com/goodsite/list-1.html" target="_blank">申请推荐</a></span>
           <h3><a href="http://chinaz.com/Announce/1221101S02009.html" target="_blank">联盟好站推荐</a></h3>
        </div>
        <div class="box_1">
        <ul class="tj_box" style="overflow:hidden;">
  <li><span class="jczttu"><a href="/Webmaster/RecSite/063011X502010.html" target="_blank"><img src="/templets/chinaz/images/143331B2H.jpg" width="110" height="100"></a></span><a href="/Webmaster/RecSite/063011X502010.html" target="_blank">
<b style="color:#529A15">SEMWatch</b><br /></a>
是专注搜索引擎营销（SEM）的群体博客，关注 SEM / SEO 领域的最新行业动</li><li><span class="jczttu"><a href="/Webmaster/RecSite/051Q155002010.html" target="_blank"><img src="/templets/chinaz/images/213K4C127.gif" width="110" height="100"></a></span><a href="/Webmaster/RecSite/051Q155002010.html" target="_blank">
<b style="color:#529A15">豆果网</b><br /></a>
是国内专业的发现、分享、交流美食的互动平台，目前已经发展成为国内以及</li>

        </ul>
        </div>
    </div>

</div>

<div style="clear:both;"></div>
</div>


<div class="span2" style="margin-bottom:10px;float:left;">
<script src='/plus/ad_js.php?aid=7' language='javascript'></script>
</div>

<div class="zongkrl">

<div class="box">
<div class="box_title"><h3>网页设计</h3></div>
<div style="padding:10px;">
{dede:arclist row='1' flag='h' typeid='28'}
<div class="topnkz3"><a href="[field:arcurl/]" target="_blank"  style="color:#285B92">[field:title/]</a></div>
<div class="topnkz4">[field:description/]...</div>
{/dede:arclist}
<div class="nlistzi" style="margin:10px 0px 0px 0px;"><ul>
{dede:arclist row='10' typeid='28'}
<li><a href="[field:arcurl/]" target="_blank">[field:title/]</a></li>
{/dede:arclist}
</ul></div>
</div>
</div>

<div class="box">
<div class="box_title"><h3>网络编程</h3></div>
<div style="padding:10px;">
{dede:arclist row='1' flag='h' typeid='5'}
<div class="topnkz3"><a href="[field:arcurl/]" target="_blank"  style="color:#285B92">[field:title/]</a></div>
<div class="topnkz4">[field:description/]...</div>
{/dede:arclist}
<div class="nlistzi" style="margin:10px 0px 0px 0px;"><ul>
{dede:arclist row='8' typeif='5'}
<li><a href="[field:arcurl/]">· [field:title/]</a></li>
{/dede:arclist}
</ul></div>
</div>
</div>

</div>

<div class="zongkrr">

<div class="box"><div class="box_title"><h3>用户精彩评论</h3></div>
<div style="padding-bottom:8px; padding-left:10px; padding-right:10px; padding-top:8px;">
<!--精彩评论标签
<script type="text/javascript" src="http://www.chinaz.com/Simple/Get_FeedBack.php"></script>
-->
{dede:feedback row='8' infolen='60'}
<ul>
<div class="yhplk"><div><a href="plus/feedback.php?aid=[field:aid/]" class='fbmsg'>[field:msg /]....</a></div><div style="margin-top:11px;"><span style="color:#CCCCCC">[field:username function="(@me=='guest' ? '游客' : @me)"/] 对 <a href="[field:arcurl/]" target=_blank>[field:title/]</a> 的评论：</div></div>
</ul>
{/dede:feedback}
</div>
</div>

</div>

<div class="span2" style="margin-bottom:10px;float:left;"><script src='/plus/ad_js.php?aid=8' language='javascript'></script></div>

<div class="zongkrl">

<div class="box infopublish">
<div class="box_title"><h3>主机网 - 最新动态</h3></div>
<div style="padding:15px 10px 16px 10px;">
<div class="nlistzi"><ul>
<script src=" http://www.cnidc.com/js.php?t=chinaz_js" charset="utf-8"></script>
</ul></div>
</div>
</div>

</div>

<div class="zongkrr">

<div class="box">
<div class="box_title"><h3>联盟资讯</h3></div>
<div style="padding:5px 10px 5px 10px;">
<div class="nlistzix"><ul>

{dede:arclist row='5' typeid='6' flag='c'}
<li>· <a href="[field:arcurl/]" target="_blank">[field:title/]</a></li>
{/dede:arclist}

</ul></div>
</div>
</div>

<div class="ad_left"><script src='/plus/ad_js.php?aid=9' language='javascript'></script></div>

</div>


<div style="clear:both;"></div>
</div>
<!--中部end-->

<div class="box line">
<div class="box_title"><h3><a href="plus/flink.php">所有链接</a> | <a href="plus/flink_add.php">申请加入</a></h3></div>
 <div class="box_1">
    <ul class="box_line">
 <li class="bv">
{dede:flink row='24' type='textall'/}
</li>
<li>
{dede:flink row='24' type='image'/}
</li>
    </ul>
    </div>
</div>

<?php include $this->CompilerInclude("底部.html");
 ?>
<!-- /footer -->
</body>
</html>