<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#upload_path").formValidator({onshow:"�����ԡ�/����ͷ",onfocus:"�����ԡ�/����ͷ"}).inputValidator({min:2,onerror:"�����ԡ�/����ͷ"});
	$("#watermark_img").formValidator({onshow:"ˮӡ���·��:/data/water.png",onfocus:"ˮӡ���·��:/data/water.png"}).inputValidator({min:2,onerror:"ˮӡ���·��:/dataĿ¼��"});
	$("#watermark_pct").formValidator({onshow:" ������Ϊ0-100֮������֣�0������ȫ͸����100������͸��",onfocus:" ������Ϊ0-100֮������֣�0������ȫ͸����100������͸��"}).inputValidator({min:2,onerror:" ������Ϊ0-100֮������֣�0������ȫ͸����100������͸��"});
	$("#watermark_quality").formValidator({onshow:"ˮӡ����������Ϊ0-100֮�������,���� jpg ��ʽͼƬ������",onfocus:"ˮӡ����������Ϊ0-100֮�������,���� jpg ��ʽͼƬ������"}).inputValidator({min:2,onerror:"ˮӡ����������Ϊ0-100֮�������,���� jpg ��ʽͼƬ������"});
	$("#upload_allowext").formValidator({onshow:"��������������ԡ�|������",onfocus:"��������������ԡ�|������"}).inputValidator({min:2,onerror:"��������������ԡ�|������"});
	
	
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
			<th width="120">�����ϴ�������С��</th>
			<td class="y-bg"><input type="text" class="input-text" name="annex_config[upload_maxsize]" id="upload_maxsize" value="<?php echo $upload_maxsize; ?>" size="10" /> KB</td>
		</tr>
		<tr>
			<th width="120">�������·����</th>
			<td class="y-bg"><input type="text" class="input-text" name="annex_config[upload_path]" id="upload_path" value="<?php echo $upload_path; ?>" size="10" /></td>
		</tr>
		<tr>
			<th>�����ϴ��������ͣ�</th>
			<td class="y-bg"><input type="text" class="input-text" name="annex_config[upload_allowext]" id="upload_allowext" value="<?php echo $upload_allowext; ?>" size="50" /></td>
		</tr>
		<tr>
			<th>�Ƿ���ͼƬˮӡ��</th>
			<td class="y-bg">
				<input class="radio_style" name="annex_config[watermark_enable]" value="1" <?php if ($watermark_enable == 1){echo 'checked="checked"';}?> type="radio"> ����&nbsp;&nbsp;&nbsp;&nbsp;
				<input class="radio_style" name="annex_config[watermark_enable]" value="0" <?php if ($watermark_enable == 0){echo 'checked="checked"';}?> type="radio"> �ر�
			</td>
		</tr>
		<tr>
			<th>ˮӡͼƬ��</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="annex_config[watermark_img]" id="watermark_img" value="<?php echo $watermark_img; ?>" size="30" />
			</td>
		</tr>
		<tr>
			<th>ˮӡ͸���ȣ�</th>
			<td class="y-bg"><input type="text" class="input-text" name="annex_config[watermark_pct]" id="watermark_pct" value="<?php echo $watermark_pct; ?>" size="30" /></td>
		</tr>
		<tr>
			<th>JPEG ˮӡ������</th>
			<td class="y-bg"><input type="text" class="input-text" name="annex_config[watermark_quality]" id="watermark_quality" value="<?php echo $watermark_quality; ?>" size="30" /></td>
		</tr>
		<tr>
			<th  valign="top">ˮӡλ�ã�</th>
				<td>
					<table width="50%" class="radio-label">
						<tr>
							<td rowspan="3"><input class="radio_style" name="annex_config[watermark_pos]" value="" type="radio" <?php if ($watermark_pos == ''){echo 'checked="checked"';}?>> ���λ��</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="1" type="radio" <?php if ($watermark_pos == 1){echo 'checked="checked"';}?>> ��������</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="2" type="radio" <?php if ($watermark_pos == 2){echo 'checked="checked"';}?>> ��������</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="3" type="radio" <?php if ($watermark_pos == 3){echo 'checked="checked"';}?>> ��������</td>
						</tr>
						<tr>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="4" type="radio" <?php if ($watermark_pos == 4){echo 'checked="checked"';}?>> �󲿾���</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="5" type="radio" <?php if ($watermark_pos == 5){echo 'checked="checked"';}?>> �󲿾���</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="6" type="radio" <?php if ($watermark_pos == 6){echo 'checked="checked"';}?>> �󲿾���</td>
						</tr>
						<tr>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="7" type="radio" <?php if ($watermark_pos == 7){echo 'checked="checked"';}?>> �ײ�����</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="8" type="radio" <?php if ($watermark_pos == 8){echo 'checked="checked"';}?>> �ײ�����</td>
							<td><input class="radio_style" name="annex_config[watermark_pos]" value="9" type="radio" <?php if ($watermark_pos == 9){echo 'checked="checked"';}?>> �ײ�����</td>
						</tr>
					</table>
				</td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="filename" value="annex_config"/>
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="�ύ" />
</form>
<?php include $this->CompilerInclude("/zcms/admin/template/admin/�ײ�.html");
 ?>