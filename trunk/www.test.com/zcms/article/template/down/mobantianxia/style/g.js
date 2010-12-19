// JavaScript Document

var tablink_idname = new Array("newsmenu","sitemenu", "rank1menu", "rank2menu", "rank3menu")
var tabcontent_idname = new Array("newscontent","sitecontent", "rank1content", "rank2content", "rank3content")
var tabcount = new Array("3","2","3","3","3")
var loadtabs = new Array("1","1","1","1","1")

function easytabs(menunr, active) {
menunr = menunr-1;
for (i=1; i <= tabcount[menunr]; i++)
{
document.getElementById(tablink_idname[menunr]+i).className='tab'+i;
document.getElementById(tabcontent_idname[menunr]+i).style.display = 'none';
}
document.getElementById(tablink_idname[menunr]+active).className='active';
document.getElementById(tabcontent_idname[menunr]+active).style.display = 'block';
}
window.onload=function(){
var menucount=loadtabs.length; var a = 0; var b = 1; do {easytabs(b, loadtabs[a]); a++; b++;}while (b<=menucount);
}

function addBookmark(title,url) {
if (window.sidebar) { 
window.sidebar.addPanel(title, url,""); 
} else if( document.all ) {
window.external.AddFavorite( url, title);
} else if( window.opera && window.print ) {
return true;
}
}


function setHomepage(url)
{
 if (document.all)
    {
        document.body.style.behavior='url(#default#homepage)';
  document.body.setHomePage('http://www.mobantianxia.cn/');
 
    }
    else if (window.sidebar)
    {
    if(window.netscape)
    {
         try
   { 
            netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect"); 
         } 
         catch (e) 
         { 
    alert( "ëÜ?Àà?Áq??ð¤??Ãsã«??ßõžŒ¨§?? about:config,??? signed.applets.codebase_principal_support ?Ì¥?ue" ); 
         }
    }
    var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
    prefs.setCharPref('browser.startup.homepage','http://www.mobantianxia.cn/');
 }
}
 