<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Zcms即将发布~！</title>
<script language="javascript" type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/jquery.min.js"></script>
<style>
body{background:#000;}
.logo{margin:0 auto;width:550px;}
</style>
<script>
$(function(){
	heights = ($(window).height()-400)/2;
	//alert(heights);
	$(".logo").css("margin-top",heights)
})
</script>
</head>
<body>
<div class="logo">
	<embed src="<?php echo model_url('index',''); ?>images/logo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="550" height="400" wmode="transparent"></embed>
</div>
</div>
</body>
</html>