<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="off">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo $webname; ?> - ��̨��������</title>
<link href="<?php echo model_url('admin','admin'); ?>css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo model_url('admin','admin'); ?>css/system.css" rel="stylesheet" type="text/css" />
<link href="<?php echo model_url('admin','admin'); ?>css/table_form.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo model_url('admin','admin'); ?>css/styles2.css" title="styles1" media="screen" />
<script language="javascript" type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/admin_common.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/styleswitch.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/formvalidatorregex.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/thickbox/thickbox.js"></script>
<link href="<?php echo model_url('admin','admin'); ?>js/thickbox/thickbox.css" rel="stylesheet" type="text/css" />
</head>

<body scroll="no" style="overflow-y:hidden;">
<div id="dvLockScreen" class="ScreenLock" <?php if (empty($admin_lock)){ echo 'style="display:none"';}?>>

    <div id="dvLockScreenWin" class="inputpwd">

    <h5><b class="ico ico-info"></b><span id="lock_tips">����״̬���������������</span></h5>

    <div class="input">

    	<label class="lb">���룺</label><input type="password" id="lock_password" class="input-text" size="24">

        <input type="submit" class="submit" value="&nbsp;" name="dosubmit" onclick="check_screenlock();return false;">

    </div></div>

</div>

<div class="header">

	<div class="logo lf"><a href="<?php echo $weburl; ?>" target="_blank"><span class="invisible"><?php echo $webname; ?></span></a></div>

    <div class="rt">

    	<div class="tab_style white cut_line text-r">
			<a href="javascript:;" onclick="lock_screen()">
				<img src="<?php echo $_REQUEST['app_url']; ?>images/icon/lockscreen.png"> ����</a><span>|</span>
			<a href="http://www.zcms.cc" target="_blank">�ٷ���վ</a><span>|</span>
			<a href="http://www.zcms.cc/bbs" target="_blank">֧����̳</a><span>|</span>
			<a href="http://www.zcms.cc" target="_blank">������</a>
        </div>
        <div class="style_but"></div>

    </div>

    <div class="col-auto" style="overflow: visible">

    	<div class="log white cut_line">
			���ã�<?php echo $info['username']; ?>
			[<?php echo $info['groupname']; ?>]
			<span>|</span>
			<a href="/?m=admin&c=logout&a=init">[�˳�]</a>
			<span>|</span>
    		<a href="/" target="_blank" id="site_homepage">վ����ҳ</a><span>|</span>
			��¼ʱ��: <?php echo dtime($info['login_time']); ?>
    	</div>

        <ul class="nav white">
		<?php
$atts = array();
$atts['tagname'] = 'menu_list';
$atts['parent_id'] = '0';
$atts['limit'] = '999';
$atts['id'] = $info['purview'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
			<li id="_M10" class="<?php if ($key==0){echo 'on ';}?>top_menu">
				<a href="/index.php?m=admin&c=menu&a=init&id=<?php echo $fields['id']; ?>" hidefocus="true" style="outline:none;"><?php echo $fields['title']; ?></a>
			</li>
		<?php
}
}
?>
        </ul>

    </div>

</div>

<div id="content">
	<div class="col-left left_menu">

    	<div id="leftMain"></div>
        <a href="javascript:;" id="openClose" style="outline-style: none; outline-color: invert; outline-width: medium;" hideFocus="hidefocus" class="open" title="չ����ر�"><span class="hidden">չ��</span></a>
		</div>


    <div class="col-auto mr8">

		<div class="crumbs">

			<div class="shortcut cu-span">
				<a href="/index.php?m=admin&c=del_cache&a=init" target="right"><span>���»���</span></a>
				<a href="/index.php?m=admin&c=my&a=init&height=210" class="thickbox"><span>�޸ĸ�����Ϣ</span></a>
			</div>

			��ǰλ�ã�<span id="current_pos1"><a id="zcms"/>ZCMS</a> > <span id="current_pos"></span>
		</div>

    	<div class="col-1">
				<iframe name="right" id="rightMain" src="http://www.18194.com" frameborder="false" scrolling="auto" style="overflow-x:hidden;border:none; " width="100%" height="auto" allowtransparency="true"></iframe>
        </div>

    </div>

</div>
<script type="text/javascript"> 

//clientHeight-0; �հ�ֵ iframe����Ӧ�߶�

function windowW(){

	if($(window).width()<980){

			$('.header').css('width',980+'px');

			$('#content').css('width',980+'px');

			$('body').attr('scroll','');

			$('body').css('overflow','');
			
			$
	}

}

windowW();

$(window).resize(function(){

	if($(window).width()<980){

		windowW();

	}else{

		$('.header').css('width','auto');

		$('#content').css('width','auto');

		$('body').attr('scroll','no');

		$('body').css('overflow','hidden');
	}

});



$(function(){
	
	//------
	heights = $(window).height()-$(".crumbs").height()-$(".header").height();
	$("#rightMain").height(heights-20);
	var openClose = $("#rightMain").height()+39;
	
	$("#openClose").height(openClose+30);	
	//------��������
	
	$(".top_menu > a").click(function(){
		$(this).parent().addClass('on').siblings().removeClass('on');
		$("#zcms").html($(this).html());
		$.get($(this).attr('href'),function(data){				
				$("#leftMain").empty();
				$("#leftMain").append(data)
		})
		return false;
	})
	
	//��࿪��
	$("#openClose").click(function(){

	if($(this).data('clicknum')==1) {

		$("html").removeClass("on");

		$(".left_menu").removeClass("left_menu_on");

		$(this).removeClass("close");

		$(this).data('clicknum', 0);

	} else {

		$(".left_menu").addClass("left_menu_on");

		$(this).addClass("close");

		$("html").addClass("on");

		$(this).data('clicknum', 1);

	}

	return false;

});

})

function switchs(obj)
{
	//-----ȡ���ϼ�ͬ���Ľ�����һ��Ԫ��
	var parent = $(obj).parent().next('ul')
	if ($(parent).css('display')=='block')
	{
		$(obj).addClass('cu').removeClass('on');
		$(parent).css('display','none');
	}
	else
	{
		$(obj).addClass('on');
		$(parent).css('display','block');
	}
}

function click_color(obj)
{
	$(".sub_menu").removeClass('on fb blue')
	$(obj).addClass('on fb blue');
	str = $(obj).parent().parent().children("h3").html().replace(/<[^>]*>/g,'');
	$("#current_pos").html(str +' > '+ $(obj).children("a").html());
	//--------
	$("#rightMain").attr("src",$(obj).children("a").attr("href"));
	
	return false;
}

function lock_screen()
{
	$("#dvLockScreen").css('display','block');
	$("#lock_password").val('');
	$.post('/index.php?m=admin&c=lock&a=init&lock=1',{'l':'1'},function(data){
		//alert(data);
	})
}

function check_screenlock()
{
	$.post('/index.php?m=admin&c=lock&a=init',{'password':$("#lock_password").val()},function(data){
		if (data == '-1')
		{
			alert('����¼��ʱ�ˣ������µ�¼');
			window.location.href = '/index.php?m=admin&c=login&a=init';
			return false;
		}
		if (data == '-2')
		{
			alert('�������,��������¼..');
			return false;
		}
		$("#dvLockScreen").css('display','none');
	})
}
</script>

</body>

</html>