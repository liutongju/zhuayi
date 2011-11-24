<?php
/**
 * --------------------------------
 * Zhuayi 网站名称
 * --------------------------------
 */ 
$config['web']['webname'] = 'Zhuayi';

/**
 * --------------------------------
 * Zhuayi 网站地址
 * --------------------------------
 */
$config['web']['weburl'] = 'http://zhuayi.net/';

/**
 * --------------------------------
 * Zhuayi 版权信息
 * --------------------------------
 */
$config['web']['powerby'] = 'powerby';

/**
 * --------------------------------
 * Zhuayi 备案信息
 * --------------------------------
 */
$config['web']['beian'] = 'beian';

/**
 * --------------------------------
 * Zhuayi 网站通用keywords
 * --------------------------------
 */

$config['web']['keywords'] = 'Zhuayi,框架,简单高效';

/**
 * --------------------------------
 * Zhuayi 网站通用description
 * --------------------------------
 */
$config['web']['description'] = 'Zhuayi框架是目前最简单,学习成本最低,高效的PHP开发框架!';

/**
 * --------------------------------
 * Zhuayi 是否debug模式 
 * --------------------------------
 */
$config['debug'] = true;

/**
 * --------------------------------
 * Zhuayi URL路由 默认控制器
 * --------------------------------
 */
$config['url_config']['default'] = 'index';

/**
 * --------------------------------
 * Zhuayi URL路由,键值支持正则
 * --------------------------------
 */
$config['url_config']['routing']['^\/myblog\/([0-9]*?\d)\/([0-9]*?\d)'] = '/myblog/show/$2';
$config['url_config']['routing']['^\/myblog\/([0-9]?\d)'] = '/myblog/index/$1';
$config['url_config']['routing']['^\/myblog\/$|^\/myblog$'] = '/myblog/index/5';

$config['url_config']['routing']['^\/plugin\/(\w*?\w)$'] = '/plugin/show/$1';
$config['url_config']['routing']['^\/plugin\/$'] = '/plugin/index';


/**
 * --------------------------------
 * Zhuayi memcache 
 * --------------------------------
 */
$config['cache']['server'] = '127.0.0.1';
$config['cache']['port'] = '11211';
$config['cache']['expire'] = "3600";
$config['cache']['power'] = false;

/**
 * --------------------------------
 * Zhuayi 文件写入存放地址,如果不设置则调用为当前域下
 * --------------------------------
 */
$config['file']['path']['litpic']['url'] = 'http://aweinan-litpic.stor.sinaapp.com';
$config['file']['path']['litpic']['root'] = 'saestor:://litpic';
$config['file']['path']['litpic2']['url'] = 'http://aweinan-litpic2.stor.sinaapp.com';
$config['file']['path']['litpic2']['root'] = 'saestor:://litpic2';

/**
 * --------------------------------
 * Zhuayi 是否开启页面缓存 
 * --------------------------------
 */

$config['cache_page']['root'] = ZHUAYI_ROOT.'/data/page_cache/';
$config['cache_page']['outtime'] = 3600;

?>