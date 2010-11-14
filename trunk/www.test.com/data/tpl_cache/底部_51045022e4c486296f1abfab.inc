<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?></div>
<?php
$pageendtime = microtime(); 
$starttime = explode(" ",$pagestartime); 
$endtime = explode(" ",$pageendtime); 
$totaltime = $endtime[0]-$starttime[0]+$endtime[1]-$starttime[1]; 
$timecost = sprintf("%0.2f",$totaltime); 
?>
<strong class="copyright">
共执行<?php echo $query->querynum;; ?> 个查询，用时 <?php echo $timecost;; ?>秒 Gzip 已禁用，内存占用 <?php echo sprintf('%0.2f', memory_get_usage() / 1048576 );?> MB <br />
Powered By 
<a href="http://www.zcms.cc" target="_blank">Zcms</a>
2.0 &copy; 2007-2010 <a href="http://www.zcms.cc" title="zcms" target="_blank">Zhuayi</a> (zcms.cc) 版权所有
</strong>
</body>