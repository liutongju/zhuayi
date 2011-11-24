<?php

/**
 * --------------------------------
 * 加载主配置文件
 * --------------------------------
 */
require ZHUAYI_ROOT.'/config.php';

/**
 * --------------------------------
 * 加载URL路由
 * --------------------------------
 */
require PLUGINS_ROOT.'/core/url.class.php';

/**
 * --------------------------------
 * 加载主框架文件
 * --------------------------------
 */
require PLUGINS_ROOT.'/core/zhuayi.class.php';

/**
 * --------------------------------
 * 加载缓存文件
 * --------------------------------
 */
require_once PLUGINS_ROOT.'/core/cache.class.php';

/**
 * --------------------------------
 * 默认实例化类
 * --------------------------------
 */
spl_autoload_register(array('zhuayi', '_load_class'));

/**
 * --------------------------------
 * 开启cache缓存
 * --------------------------------
 */
$cache = new cache($config['cache']);


require_once PLUGINS_ROOT.'/core/file.class.php';
/**
 * --------------------------------
 * 加载文件操作
 * --------------------------------
 */

$file = new file($config['file']);


/**
 * --------------------------------
 * 强制关闭转义
 * --------------------------------
 */
ini_set("magic_quotes_runtime", 0);

//处理被 get_magic_quotes_gpc 自动转义的数据,转换为HTML实体
$in = array(& $_GET, & $_POST, & $_COOKIE, & $_REQUEST);
while (list ($k, $v) = each($in))
{
    foreach ($v as $key => $val)
    {
        if (! is_array($val))
        {
            $in[$k][$key] = htmlspecialchars(stripslashes($val));
            continue;
        }
        $in[] = & $in[$k][$key];
    }
}
unset($in);


?>