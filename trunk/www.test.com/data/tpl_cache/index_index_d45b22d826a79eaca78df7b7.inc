<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Zcms��������~��</title>
<script language="javascript" type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/jquery.min.js"></script>
<style>
body{background:#000;}
.logo{margin:0 auto;width:550px;}
</style>
<script>
$(function(){
	heights = ($(window).height()-400-75)/2;
	//alert(heights);
	$(".logo").css("margin-top",heights)
})
</script>
</head>
<body>
<div class="logo">
	<embed src="<?php echo model_url('index',''); ?>images/logo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="550" height="400" wmode="transparent"></embed>
</div>
<style>
.bizmail_loginpanel{font-size:12px;width:300px;height:auto;border:1px solid #cccccc;color:#fff;margin:0 auto;}
.bizmail_loginpanel a{color:#fff;}
.bizmail_LoginBox{padding:10px 15px;}
.bizmail_loginpanel h3{padding-bottom:5px;margin:0 0 5px 0;border-bottom:1px solid #cccccc;font-size:14px;}
.bizmail_loginpanel form{margin:0;padding:0;}
.bizmail_loginpanel input.text{font-size:12px;width:100px;height:20px;margin:0 2px;border:1px solid #C3C3C3;border-color:#7C7C7C #C3C3C3 #C3C3C3 #9A9A9A;}
.bizmail_loginpanel .bizmail_column{height:28px;}
.bizmail_loginpanel .bizmail_column label{display:block;float:left;width:30px;height:24px;line-height:24px;font-size:12px;}
.bizmail_loginpanel .bizmail_column .bizmail_inputArea{float:left;width:240px;}
.bizmail_loginpanel .bizmail_column span{font-size:12px;word-wrap:break-word;margin-left: 2px;line-height:200%;}
.bizmail_loginpanel .bizmail_SubmitArea{margin-left:30px;clear:both;}
.bizmail_loginpanel .bizmail_SubmitArea a{font-size:12px;margin-left:5px;}
.bizmail_loginpanel select{width:110px;height:20px;margin:0 2px;}
</style>
<script type="text/javascript" src="http://exmail.qq.com/zh_CN/htmledition/js_biz/outerlogin.js"  charset="gb18030"></script>
<script type="text/javascript">
writeLoginPanel({domainlist:"zcms.cc", mode:"horizontal"});
</script>

</div>
</body>
</html>