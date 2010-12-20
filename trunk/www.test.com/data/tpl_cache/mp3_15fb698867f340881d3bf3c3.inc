<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><style>
.record_swf{width:300px;margin:10px auto 0px auto;}
.record_litpic{border:1px #ccc solid;width:300px;text-align:center;margin-bottom:10px;padding-top:10px;}
.record_litpic img{padding:2px;width:248px;border:1px #ccc solid;}
.dtime{text-align:right;padding-right:10px;}
</style>
<div class="record_swf">
	<div class="record_litpic">
		<img src="<?php echo $info['icon']; ?>" width="250"/>
		<object data="/zcms/record/template/images/dewplayer-bubble.swf" width="250" height="65" name="dewplayer" id="dewplayer" type="application/x-shockwave-flash">
		<param name="movie" value="/zcms/record/template/images/dewplayer-bubble.swf" />
		<param name="flashvars" value="mp3=<?php echo $info['resolve']; ?>" />
		<param name="wmode" value="transparent" />
		</object>
		<p class="dtime">¼ÇÂ¼ÓÚ<?php echo dtime($info[dtime],2); ?></p>
	</div>
</div>