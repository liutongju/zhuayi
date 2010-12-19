// IE 6 background image cache
if (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.split(";")[1].replace(/[ ]/g, "") == "MSIE6.0") {
    document.execCommand("BackgroundImageCache", false, true);
}

// Topbar dropdown menu
var chinazTopBarMenu = {
    create: function (target, menucontents) {
        if (!document.getElementById(menucontents)) {
            return;
        }
        var contents_wrap = document.getElementById(menucontents);
        var contents = contents_wrap.innerHTML;
        target.className += " hover";
        var dropdownmenu_wrap = document.createElement("div");
        dropdownmenu_wrap.className = "dropdownmenu-wrap";
        var dropdownmenu = document.createElement("div");
        dropdownmenu.className = "dropdownmenu";
        dropdownmenu.style.width = "auto";
        var dropdownmenu_inner = document.createElement("div");
        dropdownmenu_inner.className = "dropdownmenu-inner";
        dropdownmenu_wrap.appendChild(dropdownmenu);
        dropdownmenu.appendChild(dropdownmenu_inner);
        dropdownmenu_inner.innerHTML = contents;
        if (target.getElementsByTagName("div").length == 0) {
            target.appendChild(dropdownmenu_wrap);
        }
    },
    clear: function (target) {
        target.className = target.className.replace("hover", "");
    }
}















jq = jQuery.noConflict();

jq(function () {


    jq(".tabber>li>a:first").addClass("current");
    jq(".tabber>li>a").mouseover(function () {
        jq(".tabber>li>a").removeClass("current");
        jq(this).addClass("current");
        jq(".toprecommend-list>ul").eq(jq('.tabber li a').index(this)).show().siblings().hide();
    });

    jq(".tab>li>a:first").addClass("current");
    jq(".tab>li>a").mouseover(function () {
        jq(".tab>li>a").removeClass("current");
        jq(this).addClass("current");
        jq(".panel-body .datalist").eq(jq('.tab li a').index(this)).show().siblings().hide();
    });


    jq(".commenttab>a:first").addClass("current");
    jq(".commenttab>a").mouseover(function () {
        jq(".commenttab>a").removeClass("current");
        jq(this).addClass("current");
        jq(".comment_con>div").eq(jq('.commenttab a').index(this)).show().siblings().hide();
    });
    jq(".commenttab>a").click(function () {
        return false;
    });


    jq(".trigger").click(function () {
        jq(".selector ul").toggleClass("block");
    })
    jq(".selector").hover(function () { },
function () {
    jq("ul", this).removeClass("block");
})
    jq(".selector li a").click(function () {
        jq(".category").text(jq(this).text());
        jq(".selector ul").removeClass("block");
        document.forms["searchform"]["search_code"].value = jq(this).attr("id");
    })


    jq(".addFavorites").click(function () {
        var ctrl = (navigator.userAgent.toLowerCase()).indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL';
        if (document.all) {
            window.external.addFavorite(location.href, jq("title").html());
        } else if (window.sidebar) {
            window.sidebar.addPanel(jq("title").html(), location.href, "");
        } else {
            alert('您可以尝试通过快捷键' + ctrl + ' + D 加入到收藏夹~');
        }
    });


    var k = jq(".logo-list a").length;
    i = 0;
    if (k > 8) {
        jq(".coopration .pre").click(function () {
            if (i > 0) {
                jq(".list-inner").animate({ marginLeft: -(i - 1) * 110 + "px" }, 1000);
                i = i - 1;
            }
        })
        jq(".coopration .next").click(function () {
            if (i < k - 8) {
                jq(".list-inner").animate({ marginLeft: -(i + 1) * 110 + "px" }, 1000);
                i = i + 1;
            }
        })
    }


    var outer_width = jq("#software_screenshot").width();
    var item_width = jq("#software_screenshot_inner a").width() + 16;
    var width = jq("#software_screenshot_inner a").length * item_width;
    jq("#software_screenshot_inner").css("width", width + "px");
    var a = 0;
    var b = jq("#software_screenshot_inner a").length;
    if (width > outer_width) {
        jq("#screenshot_left").click(function () {
            if (a > 0) {
                jq("#software_screenshot_inner").animate({ marginLeft: -(a - 1) * item_width + "px" }, 1000);
                a = a - 1;
            }
        });
        jq("#screenshot_right").click(function () {
            if (a < b - 4) {
                jq("#software_screenshot_inner").animate({ marginLeft: -(a + 1) * item_width + "px" }, 1000);
                a = a + 1;
            }
        });
    }


    date = new Date();
    m = date.getMonth() + 1;
    d = date.getDate();
    dd = (m > 9 ? m : "0" + m) + "-" + (d > 9 ? d : "0" + d);
    jq(".leastdownload-list .date").each(function () {
        if (jq(this).text() == dd) {
            jq(this).css("color", "#c80000");
        }
    });
    jq(".codelist .date").each(function () {
        if (jq(this).text() == dd) {
            jq(this).css("color", "#c80000");
        }
    });


}); 


function dprate(entrytype,value,entryid){
var sPostdata = "";
if (entrytype=="soft"){
	sPostdata = 'SoftID='+entryid+'&RateValue='+value
}
else{
	sPostdata = 'ArticleID='+entryid+'&RateValue='+value
}
var ratescore = 0;
if (isNaN(parseInt(jQuery("#rate"+value+"value").html()))){
	ratescore = 0;
}
else{
	ratescore = parseInt(jQuery("#rate"+value+"value").html());
}
jQuery.ajax({
url: '/rate.asp?action=ajaxrate',
type: 'get',
dataType: 'html',
data: sPostdata,
beforeSend: function() {
	//jQuery("#ratetitle").text("提交中..");
},
error: function(){
alert('通讯错误!');
},
success: function(data){
	if(data=="true"){
		jQuery("#rate"+value+"value").html(ratescore+1);
	}
	ratecallback(data);
}
});
}
function ratecallback(value){
switch (value) {
case "true":
	alert("感谢您的评价!");
	break;
case "invalidvalue":
	alert("抱歉,出现错误,请刷新页面后再试!");
	break;
case "repeated" :
	alert("您已经评价过了,请不要重复提交!");
	break;
default:
	alert("网络错误!我们会尽快修复,抱歉!");
}
document.getElementById("rate1").onclick="";
document.getElementById("rate2").onclick="";
}