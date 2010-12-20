<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><style>
.record_swf{width:400px;margin:10px auto 0px auto;}
.record_swf img{padding:2px;border:1px #ccc solid;}
.dtime{text-align:right;padding-right:10px;}
</style>
<div class="record_swf">
	<img src="<?php echo $info['icon']; ?>" width="400"/>
	<p class="dtime">¼ÇÂ¼ÓÚ<?php echo dtime($info[dtime],2); ?></p>
</div>