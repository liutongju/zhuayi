<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#upload_path").formValidator({onshow:"必须以“/”开头",onfocus:"必须以“/”开头"}).inputValidator({min:2,onerror:"必须以“/”开头"});
	$("#watermark_img").formValidator({onshow:"水印存放路径:/data/water.png",onfocus:"水印存放路径:/data/water.png"}).inputValidator({min:2,onerror:"水印存放路径:/data目录下"});
	$("#watermark_pct").formValidator({onshow:" 请设置为0-100之间的数字，0代表完全透明，100代表不透明",onfocus:" 请设置为0-100之间的数字，0代表完全透明，100代表不透明"}).inputValidator({min:2,onerror:" 请设置为0-100之间的数字，0代表完全透明，100代表不透明"});
	$("#watermark_quality").formValidator({onshow:"水印质量请设置为0-100之间的数字,决定 jpg 格式图片的质量",onfocus:"水印质量请设置为0-100之间的数字,决定 jpg 格式图片的质量"}).inputValidator({min:2,onerror:"水印质量请设置为0-100之间的数字,决定 jpg 格式图片的质量"});
	
	
})
//-->
</script>
<style type="text/css">
.radio-label{ border-top:1px solid #e4e2e2; border-left:1px solid #e4e2e2}
.radio-label td{ border-right:1px solid #e4e2e2; border-bottom:1px solid #e4e2e2;background:#f6f9fd}
</style>
<form action="?m=setup&c=info&a=init" method="post" id="myform">
<fieldset>
	<legend><?php echo $pagename; ?></legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="120">允许上传附件大小：</th>
			<td class="y-bg"><input type="text" class="input-text" name="annex_config[upload_maxsize]" id="upload_maxsize" value="<?php echo $upload_maxsize; ?>" size="10" /> KB</td>
		</tr>
		<tr>
			<th width="120">附件存放路径：</th>
			<td class="y-bg"><input type="text" class="input-text" name="annex_config[upload_path]" id="upload_path" value="<?php echo $upload_path; ?>" size="10" /></td>
		</tr>
		<tr>
			<th>允许上传附件类型：</th>
			<td class="y-bg"><input type="text" class="input-text" name="annex_config[upload_allowext]" id="upload_allowext" value="<?php echo $upload_allowext; ?>" size="50" /></td>
		</tr>
		<tr>
			<th>是否开启图片水印：</th>
			<td class="y-bg">
				<input class="radio_style" name="annex_config[watermark_enable]" value="1" <?php if ($watermark_enable == 1){echo 'checked="checked"';}?> type="radio"> 启用&nbsp;&nbsp;&nbsp;&nbsp;
				<input class="radio_style" name="annex_config[watermark_enable]" value="0" <?php if ($watermark_enable == 0){echo 'checked="checked"';}?> type="radio"> 关闭
			</td>
		</tr>
		<tr>
			<th>水印图片：</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="annex_config[watermark_img]" id="watermark_img" value="<?php echo $watermark_img; ?>" size="30" />
			</td>
		</tr>
		<tr>
			<th>水印透明度：</th>
			<td class="y-bg"><input type="text" class="input-text" name="annex_config[watermark_pct]" id="watermark_pct" value="<?php echo $watermark_pct; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>JPEG 水印质量：</th>
			<td class="y-bg"><input type="text" class="input-text" name="annex_config[watermark_quality]" id="watermark_quality" value="<?php echo $watermark_quality; ?>" size="30" /></td>
		</tr>
		<tr>
			<th  valign="top">水印位置：</th>
				<td>
					<table width="50%" class="radio-label">
						<tr>
							<td rowspan="3"><input class="radio_style" name="annex_config[watermark_pos]" value="" type="radio" <?php if ($watermark_pos == ''){echo 'checked="checked"';}?>> 随机位置</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="1" type="radio" <?php if ($watermark_pos == 1){echo 'checked="checked"';}?>> 顶部居左</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="2" type="radio" <?php if ($watermark_pos == 2){echo 'checked="checked"';}?>> 顶部居中</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="3" type="radio" <?php if ($watermark_pos == 3){echo 'checked="checked"';}?>> 顶部居右</td>
						</tr>
						<tr>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="4" type="radio" <?php if ($watermark_pos == 4){echo 'checked="checked"';}?>> 左部居中</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="5" type="radio" <?php if ($watermark_pos == 5){echo 'checked="checked"';}?>> 左部居左</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="6" type="radio" <?php if ($watermark_pos == 6){echo 'checked="checked"';}?>> 左部居右</td>
						</tr>
						<tr>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="7" type="radio" <?php if ($watermark_pos == 7){echo 'checked="checked"';}?>> 底部居左</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="8" type="radio" <?php if ($watermark_pos == 8){echo 'checked="checked"';}?>> 底部居中</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="9" type="radio" <?php if ($watermark_pos == 9){echo 'checked="checked"';}?>> 底部居右</td>
						</tr>
					</table>
				</td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="filename" value="annex_config"/>
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="提交" />
</form>
<?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>