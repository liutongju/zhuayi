<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gbk" /> 
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /> 
<title>��̨��¼ -  Powered by ZCMS!</title> 
<style type="text/css">
body{background:#333333;}
div{overflow:hidden; *display:inline-block;}
div{*display:block;}
.login_box{background:url(<?php echo $_REQUEST['app_url']; ?>images/login_bg.jpg) no-repeat; width:603px; height:416px; overflow:hidden; position:absolute; left:50%; top:50%; margin-left:-301px; margin-top:-208px;}
.login_iptbox{bottom:90px;_bottom:72px;color:#FFFFFF;font-size:12px;height:30px;left:50%;
margin-left:-280px;position:absolute;width:560px; overflow:visible;}
.login_iptbox .ipt{height:24px; width:110px; margin-right:22px; color:#fff; background:url(<?php echo $_REQUEST['app_url']; ?>images/ipt_bg.jpg) repeat-x; *line-height:24px; border:none; color:#000; overflow:hidden;}
.login_iptbox label{ *position:relative; *top:-6px;}
.login_iptbox .ipt_reg{margin-left:0px;width:46px; margin-right:16px; background:url(<?php echo $_REQUEST['app_url']; ?>images/ipt_bg.jpg) repeat-x; *overflow:hidden;text-align:left;padding:2px 0 2px 5px;font-size:16px;font-weight:bold;}
.login_tj_btn{ background:url(<?php echo $_REQUEST['app_url']; ?>images/login_dl_btn.jpg) no-repeat 0px 0px; width:52px; height:24px; margin-left:0px; border:none; cursor:pointer; padding:0px; float:right;}
.yzm{position:absolute; background:url(<?php echo $_REQUEST['app_url']; ?>images/login_ts140x89.gif) no-repeat; width:140px; height:89px;right:40px;top:-96px; text-align:center; font-size:12px; display:none;}
.yzm a:link,.yzm a:visited{color:#036;text-decoration:none;}
.yzm a:hover{color:#C30;}
.yzm img{cursor:pointer; margin:4px auto 7px; width:130px; height:50px; border:1px solid #fff;}
.cr{font-size:12px;font-style:inherit;text-align:center;color:#ccc;width:100%; position:absolute; bottom:58px;}
.cr a{color:#ccc;text-decoration:none;}
</style> 
</head> 
 
<body onload="javascript:document.myform.username.focus();">
<div id="login_bg" class="login_box"> 
	<div class="login_iptbox">
   	 <form action="/index.php?m=admin&c=login_info&a=init" method="post" name="myform">
		<input name="dosubmit" value="" type="submit" class="login_tj_btn" /><label>�û�����</label>
		<input name="username" type="text" class="ipt" />
		<label>���룺</label>
		<input name="password" type="password" class="ipt" value="" />
		<label>��֤�룺</label>
		<input name="code" type="text" class="ipt ipt_reg" onfocus="document.getElementById('yzm').style.display='block'" /> 
		<div id="yzm" class="yzm">
			<img id='code_img' onclick='this.src=this.src+"&"+Math.random()' src='/index.php?m=checkcode&c=show&a=init'><br />
			<a href="javascript:document.getElementById('code_img').src='/index.php?m=checkcode&c=show&a=init&time='+Math.random();void(0);">����������֤��</a>
		</div>

     </form> 
    </div> 
    <div class="cr">CopyRight 2006-2010  <a href="http://www.zcms.cc" target="_blank">ZCMS TEAM</a> </div> 
</div>

</body> 
</html>