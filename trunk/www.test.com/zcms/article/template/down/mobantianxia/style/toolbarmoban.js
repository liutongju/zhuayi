var thisd_v2;
function d_v2(id){
	return document.getElementById(id);
}

function box_v2(d){
	if(thisd_v2)cls_v2(thisd_v2);
	d.firstChild.className+=" hover";//��ʽ
	d.firstChild.nextSibling.style.display="";//�򿪵�ǰ�˵�
	thisd_v2=d;
}
function cls_v2(d){
		d.firstChild.className=thisd_v2.firstChild.className.replace(" hover","");//ȥ����ʽ
		d.firstChild.nextSibling.style.display="none";//�򿪵�ǰ�˵�
}
document.writeln("<!--toolbar begin-->");
document.writeln("<div class=\"mbtx_toolbar\">");
document.writeln("<div class=\"toolbar_content\">");
document.writeln("<ul class=\"user_state\" id=\"loginstatus2\"><li><span>����,��ӭ����ģ������!<\/span><\/li><li><span>�л����<\/span><\/li>");
document.writeln("<\/ul>");
document.writeln("    <div id=\"skin\"><ul><li id=\"skin_blue\" title=\"\">��ɫ<\/li>");
document.writeln("    <li id=\"skin_red\" class=\"selected\" title=\"\">��ɫ<\/li>");
document.writeln("    <li id=\"skin_green\" title=\"\">��ɫ<\/li>");
document.writeln("    <li id=\"skin_gray\"  title=\"\">��ɫ<\/li><\/ul><\/div>")
document.writeln("<ul class=\"top_menu\">");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/\" target=\"_blank\" class=\"my_bj\">ģ��������ҳ<\/a><\/li>");
document.writeln("<li id=\"add_task\"  onmousemove=\"box_v2(this);\" onmouseout=\"cls_v2(this);\"><a class=\"add_task\" href=\"http:\/\/www.mobantianxia.cn\/member\">����ģ��<\/a><ul class=\"navmenu_box\" style=\"display:none;\">");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/member\" target=\"_blank\">��Ҫ��ģ��<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/member\" target=\"_blank\">��Ҫ���̳�<\/a><\/li>");
document.writeln("<\/ul>");
document.writeln("");
document.writeln("<\/li>");
document.writeln("<li id=\"make_money\"  onmousemove=\"box_v2(this);\" onmouseout=\"cls_v2(this);\"><a class=\"make_money\" href=\"http:\/\/www.mobantianxia.cn\/member\/\">��Ҫ׬Ǯ<\/a><ul class=\"navmenu_box\" style=\"display:none;\">");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/member\/\" target=\"_blank\">�ϴ�ģ��<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/member\/\" target=\"_blank\">ģ���������<\/a><\/li>");
document.writeln("<li class=\"hr\"><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/member\/\" target=\"_blank\">���Ƹ�������<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/u.mobantianxia.cn\/member\/\" target=\"_blank\">�ϴ���Ʒ<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/member\/\" target=\"_blank\">ģ����Ʊ���<\/a><\/li>");
document.writeln("<\/ul>");
document.writeln("<\/li>");
document.writeln("");
document.writeln("");
document.writeln("<li class=\"w_menu\" id=\"more_serv\"  onmousemove=\"box_v2(this);\" onmouseout=\"cls_v2(this);\"><a class=\"more_serv\">�������<\/a><ul class=\"navmenu_box\" style=\"display:none;\">");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\/member\/\" target=\"_blank\">��վ����<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\/\" target=\"_blank\">ģ������<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\/search_talent.php\" target=\"_blank\">ģ�����<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/u.mobantianxia.cn\" target=\"_blank\">�ҵ�ģ��<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/bbs.mobantianxia.cn\" target=\"_blank\">ģ������<\/a><\/li>");
document.writeln("");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/moban\/\" target=\"_blank\">CMSģ��<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/\cms\/\" target=\"_blank\">CMS�̳�<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/plus\/guestbook.php\" target=\"_blank\">��������<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\/\" target=\"_blank\">��ϵ����<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\/\" target=\"_blank\">������<\/a><\/li>");
document.writeln("<\/ul>");
document.writeln("");
document.writeln("<\/li>");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\" class=\"service_auth\" target=\"_blank\">��վ�ͷ�����<\/a><\/li>");
document.writeln("<li id=\"help\"  onmousemove=\"box_v2(this);\" onmouseout=\"cls_v2(this);\"><a class=\"help\" href=\"http:\/\/a.mobantianxia.cn\/\">��������<\/a><ul class=\"navmenu_box\" style=\"display:none;\">");
document.writeln("<li><a href=\"http:\/\/a.mobantianxia.cn\/\" target=\"_blank\">��������<\/a><\/li>");
document.writeln("<li><a href=\"http:\/\/www.mobantianxia.cn\/plus\/guestbook.php\" target=\"_blank\">��������<\/a><\/li>");
document.writeln("<\/ul>");
document.writeln("<\/li>");
document.writeln("<!--�����˵�end-->");
document.writeln("<\/ul>");
document.writeln("<\/div>");
document.writeln("<\/div>");
document.writeln("<!--toolbar end-->")