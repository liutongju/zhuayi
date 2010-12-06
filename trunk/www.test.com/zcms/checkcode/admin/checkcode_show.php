<?php
/**
 * checkcode.php     ZCMS 插件--验证码,
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* -------验证码字符串长度 */
if (isset($_GET['code_len']) && intval($_GET['code_len']))
{
	$checkcode->code_len = intval($_GET['code_len']);
}
/*------验证码字符串字体大小 */
if (isset($_GET['font_size']) && intval($_GET['font_size']))
{
	$checkcode->font_size = intval($_GET['font_size']);
}
/* ------验证码图形宽度 */
if (isset($_GET['width']) && intval($_GET['width']))
{	$checkcode->width = intval($_GET['width']);
}
/* ------验证码图形高度 */
if (isset($_GET['height']) && intval($_GET['height']))
{
	$checkcode->height = intval($_GET['height']);
}
/* ------验证码字符颜色16 */
if (isset($_GET['font_color']) && trim(urldecode($_GET['font_color'])) && preg_match('/(^#[a-z0-9]{6}$)/im', trim(urldecode($_GET['font_color']))))
{
	$checkcode->font_color = trim(urldecode($_GET['font_color']));
}
/* -----显示图片 */
set_cookie('checkcode',$checkcode->get_code());
$checkcode->doimage();
exit;
?>