var thisd_v2;
function d_v2(id){
	return document.getElementById(id);
}

function box_v2(d){
	if(thisd_v2)cls_v2(thisd_v2);
	d.firstChild.className+=" hover";//样式
	d.firstChild.nextSibling.style.display="";//打开当前菜单
	thisd_v2=d;
}
function cls_v2(d){
		d.firstChild.className=thisd_v2.firstChild.className.replace(" hover","");//去掉样式
		d.firstChild.nextSibling.style.display="none";//打开当前菜单
}
document.writeln("<!--toolbar begin-->");
document.writeln("<div class=\"mbtx_toolbar\">");
document.writeln("<div class=\"toolbar_content\">");
document.writeln("<ul class=\"user_state\" id=\"loginstatus2\"><li><span>您好,欢迎来到模板天下!<\/span><\/li><li><span>切换风格：<\/span><\/li>");
document.writeln("<\/ul>");
document.writeln("    <div id=\"skin\"><ul><li id=\"skin_blue\" title=\"\">蓝色<\/li>");
document.writeln("    <li id=\"skin_red\" class=\"selected\" title=\"\">红色<\/li>");
document.writeln("    <li id=\"skin_green\" title=\"\">绿色<\/li>");
document.writeln("    <li id=\"skin_gray\"  title=\"\">灰色<\/li><\/ul><\/div>")
document.writeln("<ul class=\"top_menu\">");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/\" target=\"_blank\" class=\"my_bj\">模板天下首页<\/a><\/li>");
document.writeln("<li id=\"add_task\"  onmousemove=\"box_v2(this);\" onmouseout=\"cls_v2(this);\"><a class=\"add_task\" href=\"http:\/\/www.mobantianxia.cn\/member\">发布模板<\/a><ul class=\"navmenu_box\" style=\"display:none;\">");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/member\" target=\"_blank\">我要发模板<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/member\" target=\"_blank\">我要发教程<\/a><\/li>");
document.writeln("<\/ul>");
document.writeln("");
document.writeln("<\/li>");
document.writeln("<li id=\"make_money\"  onmousemove=\"box_v2(this);\" onmouseout=\"cls_v2(this);\"><a class=\"make_money\" href=\"http:\/\/www.mobantianxia.cn\/member\/\">我要赚钱<\/a><ul class=\"navmenu_box\" style=\"display:none;\">");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/member\/\" target=\"_blank\">上传模板<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/member\/\" target=\"_blank\">模板设计任务<\/a><\/li>");
document.writeln("<li class=\"hr\"><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/member\/\" target=\"_blank\">完善个人资料<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/u.mobantianxia.cn\/member\/\" target=\"_blank\">上传作品<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/member\/\" target=\"_blank\">模板设计报价<\/a><\/li>");
document.writeln("<\/ul>");
document.writeln("<\/li>");
document.writeln("");
document.writeln("");
document.writeln("<li class=\"w_menu\" id=\"more_serv\"  onmousemove=\"box_v2(this);\" onmouseout=\"cls_v2(this);\"><a class=\"more_serv\">更多服务<\/a><ul class=\"navmenu_box\" style=\"display:none;\">");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\/member\/\" target=\"_blank\">网站建设<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\/\" target=\"_blank\">模板制作<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\/search_talent.php\" target=\"_blank\">模板仿制<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/u.mobantianxia.cn\" target=\"_blank\">我的模客<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/bbs.mobantianxia.cn\" target=\"_blank\">模客社区<\/a><\/li>");
document.writeln("");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/moban\/\" target=\"_blank\">CMS模板<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/\cms\/\" target=\"_blank\">CMS教程<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/plus\/guestbook.php\" target=\"_blank\">在线留言<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\/\" target=\"_blank\">联系我们<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\/\" target=\"_blank\">广告合作<\/a><\/li>");
document.writeln("<\/ul>");
document.writeln("");
document.writeln("<\/li>");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\" class=\"service_auth\" target=\"_blank\">本站客服中心<\/a><\/li>");
document.writeln("<li id=\"help\"  onmousemove=\"box_v2(this);\" onmouseout=\"cls_v2(this);\"><a class=\"help\" href=\"http:\/\/a.mobantianxia.cn\/\">帮助留言<\/a><ul class=\"navmenu_box\" style=\"display:none;\">");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\/\" target=\"_blank\">帮助中心<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/plus\/guestbook.php\" target=\"_blank\">在线留言<\/a><\/li>");
document.writeln("<\/ul>");
document.writeln("<\/li>");
document.writeln("<!--弹出菜单end-->");
document.writeln("<\/ul>");
document.writeln("<\/div>");
document.writeln("<\/div>");
document.writeln("<!--toolbar end-->")