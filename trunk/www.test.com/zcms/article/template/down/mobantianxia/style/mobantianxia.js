//Header - UserLoginForm
$(document).ready(function(){				   
	$('.user_log').focus(function() {if($(this).val() == '�û���') {$(this).val('').css({color:"#333"});}}).blur(function(){if($(this).val() == '') { $(this).val('�û���').css({color:"#666"}); } } );
	$('.user_pwd').focus(function() {if($(this).val() == '������������') {$(this).val('').css({color:"#333"});}}).blur(function(){if($(this).val() == '') { $(this).val('������������').css({color:"#666"}); } } ); }
	);
// SubNavigation
$(function() {
	$(".navi ul").css({display: "none"}); // Opera Fix
	$(".navi li").hover(function(){
		$(this).find('ul:first').slideDown("fast").css({visibility: "visible",display: "block"});
	},function(){
		$(this).find('ul:first').slideUp("fast").css({visibility: "hidden"});
	});
});

// Menu First li nb
$(function() {
	$(".navi li:first").addClass("nl"); // HeaderMenu First li no border
	$(".footpage li:first").addClass("nb"); // FooterMenu First li no border
});
// Print
$(document).ready(function() {
	$(".print").click(function() {
		window.print();
		return false;
	});
});
//Tabs
$(function(){
    var $title = $(".mostviews h3 span");
    var $content = $(".mostviews ul");
    $title.mousemove(function(){
        var index = $title.index($(this));
		$(this).addClass("mon").siblings().removeClass("mon");
        $content.hide();
        $($content.get(index)).show();
        return false;
    });
});
//SwitchFont
$(document).ready(function(){
	$(".mfbig").click( function(){$('.entrycontent').addClass('fontbig').removeClass("fontmid fontsml"); $(this).addClass('mfcurrent').siblings().removeClass("mfcurrent");})
	$(".mfmid").click( function(){$('.entrycontent').addClass('fontmid').removeClass("fontbig fontsml"); $(this).addClass('mfcurrent').siblings().removeClass("mfcurrent");})
	$(".mfsml").click( function(){$('.entrycontent').addClass('fontsml').removeClass("fontbig fontmid"); $(this).addClass('mfcurrent').siblings().removeClass("mfcurrent");})

});
//CopyURL
function copyLink(text) {
  if (window.clipboardData) {
    window.clipboardData.setData("Text", text)
	alert("�Ѿ��ɹ����Ƶ������壡");
  } else {
	var x=prompt('�����������ܲ�֧���Զ�����\n�����ֶ���������ĵ�ַ��',text);
  }
}