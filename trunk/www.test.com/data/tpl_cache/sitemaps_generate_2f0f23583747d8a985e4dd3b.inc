<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
<style>
.sbs{}
.sbul{margin:10px;}
.sbul li{line-height:30px;}
.button{margin-top:20px;}

</style>

	<h6>��ʾ����</h6>
	<div class="sbs" id="update_tips" style="height:360px; overflow:auto;">

		<ul id="file" class="sbul">
			
		</ul>

	</div>
	</div>
 ?>
<script>
var i=1;
var regNum=/^\d*$/;

function generate()
{
	i++;
	
	url = '/index.php?m=sitemaps&c=show&a=init&path=<?php echo $_REQUEST['path']; ?>&filename=<?php echo $_REQUEST['filename']; ?>&tpl=<?php echo $_REQUEST['tpl']; ?>&num=<?php echo $_REQUEST['num']; ?>&dbsource=<?php echo $_REQUEST['dbsource']; ?>&content_changefreq=<?php echo $_REQUEST['content_changefreq']; ?>&content_priority=<?php echo $_REQUEST['content_priority']; ?>&page='+j;
	
	if ( j <= i)
	{
		//------����
		if (i % 100 ==0)
		{
			$("#file").empty();
		}
		$.get(url,function(data){
			error = data
			data = parseInt(data);
			if (regNum.test(data))
			{
				$("#file").append('<li style="color:#009900">Sitemaps:<?php echo $_REQUEST['filename']; ?> ->   ����'+j+'ҳ�� -> ���ɳɹ�... </li>');
				i = data;
			}
			else
			{
				$("#file").append('<li style="color:red">Sitemaps:<?php echo $_REQUEST['filename']; ?> -> ����ʧ��...ԭ��'+error+' </li>');
			}
			j ++;
			setTimeout('generate()',500);
		})
		
	}
	else
	{
		$("#file").append('<li style="color:red">�������... </li>');
		$("#file").append('<li style="color:red">�ܼ����� '+j+' ��... </li>');
		document.getElementById('update_tips').scrollTop = document.getElementById('update_tips').scrollHeight;
	}
}


generate()
</script>