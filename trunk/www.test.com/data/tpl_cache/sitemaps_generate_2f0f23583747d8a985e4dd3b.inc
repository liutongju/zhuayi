<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?>
<style>
.sbs{}
.sbul{margin:10px;}
.sbul li{line-height:30px;}
.button{margin-top:20px;}

</style>	<div class="col-2">

	<h6>提示区：</h6>
	<div class="sbs" id="update_tips" style="height:360px; overflow:auto;">

		<ul id="file" class="sbul">
			
		</ul>

	</div>
	</div><?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>
<script>
var i=1;
var regNum=/^\d*$/;j=1;

function generate()
{
	i++;
	
	url = '/index.php?m=sitemaps&c=show&a=init&path=<?php echo $_REQUEST['path']; ?>&filename=<?php echo $_REQUEST['filename']; ?>&tpl=<?php echo $_REQUEST['tpl']; ?>&num=<?php echo $_REQUEST['num']; ?>&dbsource=<?php echo $_REQUEST['dbsource']; ?>&content_changefreq=<?php echo $_REQUEST['content_changefreq']; ?>&content_priority=<?php echo $_REQUEST['content_priority']; ?>&page='+j;
	
	if ( j <= i)
	{
		//------清屏
		if (i % 100 ==0)
		{
			$("#file").empty();
		}
		$.get(url,function(data){
			error = data
			data = parseInt(data);
			if (regNum.test(data))
			{
				$("#file").append('<li style="color:#009900">Sitemaps:<?php echo $_REQUEST['filename']; ?> ->   【第'+j+'页】 -> 生成成功... </li>');
				i = data;
			}
			else
			{
				$("#file").append('<li style="color:red">Sitemaps:<?php echo $_REQUEST['filename']; ?> -> 生成失败...原因：'+error+' </li>');
			}			document.getElementById('update_tips').scrollTop = document.getElementById('update_tips').scrollHeight;
			j ++;
			setTimeout('generate()',500);
		})
		
	}
	else
	{
		$("#file").append('<li style="color:red">生成完毕... </li>');
		$("#file").append('<li style="color:red">总计生成 '+j+' 个... </li>');
		document.getElementById('update_tips').scrollTop = document.getElementById('update_tips').scrollHeight;
	}
}


generate()
</script>