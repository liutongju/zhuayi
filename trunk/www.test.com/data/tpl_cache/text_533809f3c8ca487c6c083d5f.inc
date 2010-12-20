<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><style>
.record_swf{width:480px;margin:10px auto 0px auto;}
.record_swf h1{text-align:center;padding:20px;border-bottom:1px #ccc solid;}
.record_swf p{margin-top:10px;}
.dtime{text-align:right;padding-right:10px;}
</style>
<div class="record_swf">
	<h1><?php echo $info['title']; ?></h1>
	<p><?php echo $info['record']; ?></p>
	<p class="dtime">¼ÇÂ¼ÓÚ<?php echo dtime($info[dtime],2); ?></p>
</div>