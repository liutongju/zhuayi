<?php/** * admin_index.php     ZCMS 配置写入 *  * @copyright    (C) 2005 - 2010  ZCMS * @licenes      http://www.zcms.cc * @lastmodify   2010-10-28 * @author       zhuayi   * @QQ			 2179942 */$pagename = '直投配置';//---写入文件$conent = '<?php'."\r\n";foreach ($_POST[$_POST['filename']] as $key=>$val){	$conent .= '$'.$key.' = "'.$val.'";'."\r\n"; }$conent .= '?>';write(ZCMS_ROOT.'/zcms/direct/include/'.$_POST['filename'].'.php',$conent);//-------写入日志admin_log("direct",'','','直投配置');showmsg('恭喜您,操作成功...',ret_cookie("backurl"));?>