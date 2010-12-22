<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><div style="float:right;width:302px; overflow:hidden;">
          <div class="col2">
            <div class="panel panel-aside-green">
                <div class="panel-head"><div class="inner">
                    <h3 class="panel-head title">本站分类</h3>
                </div></div>
                <div class="panel-body">
                    <ul class="hotrecommend">
						<?php if(strpos($channelid,',')==0){$channelid=0;}else{$channelid = $info['id'];}
						
						
$atts = array();
$atts['tagname'] = 'article_class_list';
$atts['parent_id'] = $channelid;
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
                        <li><a href='<?php echo $fields['url']; ?>' target="_blank"><img src="<?php echo $path; ?>style/left_lanmu_nav.gif" /><?php echo $fields['classname']; ?></a></li>
                        <?php
}
}
?>
                    </ul>
                </div>
                <div class="panel-foot"><div></div></div>
            </div>
            
            
            
            <div class="toprecommend">
                <ul class="tabber">
                    <li><a href="#" class="current">热门信息推荐</a></li>
                </ul>
                <div class="toprecommend-list">
                   <ul>
					  <?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '8';
$atts['titlelen'] = '30';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
                      <li><a href="<?php echo $fields['url']; ?>" title="<?php echo $fields['title']; ?>" target="_blank" style="height:63px;">
                          <img src="<?php echo litpic($fields['litpic'],60,40); ?>" alt="<?php echo $fields['title']; ?>" style="height:60px;width:40px;" />
                          <strong><?php echo $fields['title']; ?></strong>
                          <?php echo $fields['abstract']; ?>
                          </a>
                      </li>
                      <?php
}
}
?>
                   </ul>
                </div>
            </div>
            
            
            
            <div class="panel panel-aside-red">
                <div class="panel-head"><div class="inner">
                    <h3 class="panel-head title">阅读排行</h3>
                </div></div>
                <div class="panel-body">
                    <ul class="toprank">
						<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '10';
$atts['titlelen'] = '45';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
                        <li><em class="t-<?php echo $key; ?>"></em> <a href="<?php echo $fields['url']; ?>" title="<?php echo $fields['title']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
                        <?php
}
}
?>
                        
                    </ul>
                </div>
                <div class="panel-foot"><div></div></div>
            </div>

            <div class="panel panel-aside-green">
                <div class="panel-head"><div class="inner">
                    <h3 class="panel-head title">本类推荐</h3>
                </div></div>
                <div class="panel-body">
                    <ul class="mobanlist">
                        
                        <?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['limit'] = '10';
$atts['titlelen'] = '45';
$atts['flag'] = 'tuijian';
$atts['cid'] = $info['cid'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
                        <li><em class="t-<?php echo $key; ?>"></em> <a href="<?php echo $fields['url']; ?>" title="<?php echo $fields['title']; ?>" target="_blank"><?php echo $fields['title']; ?></a></li>
                        <?php
}
}
?>
                        
                        
                    </ul>
                </div>
                <div class="panel-foot"><div></div></div></div></div>