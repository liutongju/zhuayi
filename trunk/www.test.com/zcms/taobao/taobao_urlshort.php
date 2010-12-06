<?php
/**
 * admin_edit.php     ZCMS ÌÔ±¦µØÖ·Ìø×ª
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

$_REQUEST['url'] = str_replace('zcms','/',$_REQUEST['url']);

header("Location:".base64_decode($_REQUEST['url'])); /* Ìø×ª */
exit;
 
 
 
 ?>