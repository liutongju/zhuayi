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
arr = new Array(<?php echo $id; ?>);
arrt = new Array(<?php echo $title; ?>);
var i=-1;
var regNum=/^\d*$/;
function generate()
{
	i++;
	j=1;
	if ( i < arr.length)
	{
		//------清屏
		if (i % 100 ==0)
		{
			$("#file").empty();
		}
		id = arr[i];
		title = arrt[i];
		$.get('/index.php?m=article&c=<?php echo $_REQUEST['act']; ?>&<?php echo $zfields; ?>='+arr[i]+'&generate=zcms',function(data){

			data = parseInt(data);
			if (regNum.test(data))
			{
				generate2(id)
			}
			else
			{
				$("#file").append('<li style="color:red">$ID:'+id+' -> '+title+' -> 生成失败...原因：'+data+' </li>');
			}			document.getElementById('update_tips').scrollTop = document.getElementById('update_tips').scrollHeight;
			//
		})
		
	}
	else
	{
		$("#file").append('<li style="color:red">生成完毕... </li>');
		document.getElementById('update_tips').scrollTop = document.getElementById('update_tips').scrollHeight;
	}
}

function generate2(id)
{
	
	$.get('/index.php?m=article&c=<?php echo $_REQUEST['act']; ?>&<?php echo $zfields; ?>='+id+'&generate=zcms&page='+j,function(data){
			data = parseInt(data);
			if (regNum.test(data))
			{
				$("#file").append('<li style="color:#009900">$ID:'+id+' -> '+title+'  【第'+(j-1)+'页】 -> 生成成功... </li>');
			}
			else
			{
				$("#file").append('<li style="color:red">$ID:'+id+' -> '+title+' 【第'+(j-1)+'页】 -> 生成失败...原因：'+data+' </li>');
			}
			document.getElementById('update_tips').scrollTop = document.getElementById('update_tips').scrollHeight;
			if (j <= data)
			{
				setTimeout('generate2('+id+')',100);
			}
			else
			{
				setTimeout('generate()',500);
			}
			
			
		})
	j++;
}
	if (arr.length==0){	alert('错误的数据来源..');}else{	generate()}
</script>