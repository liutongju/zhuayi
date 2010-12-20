<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><style>
.record_swf{width:480px;margin:10px auto 0px auto;}
.dtime{text-align:right;padding-right:10px;}
</style>
<div class="record_swf">
	<embed src="<?php echo $info['resolve']; ?>" quality="high" width="480" height="400" align="middle" allowScriptAccess="always" allowfullscreen="true" type="application/x-shockwave-flash">
	</embed>
	<p class="dtime">¼ÇÂ¼ÓÚ<?php echo dtime($info[dtime],2); ?></p>
</div>