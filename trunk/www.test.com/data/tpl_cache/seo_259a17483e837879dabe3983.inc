<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><div class="bk15"></div>
<fieldset>
	<legend>SEO����</legend>
	<table width="100%"  class="table_form">
		<tr id="seo_url">
			<th width="100">�Զ���URL��</th>
			<td class="y-bg">
			<input type="text" class="input-text" name="url" id="url" value="<?php echo $seo['url']; ?>" size="60" />
			<input name="parameter" id="parameter" value="1" size="35" type="checkbox" <?php if ($seo['parameter']==1){echo 'checked';};?> /> ģ��ƥ��
			<span><br>�������������ԡ�http://����ͷ,��������������'/'��ͷ�����ⲻ�ظ��ַ���,��β��Ҫ��"/"��ģ��ƥ�乴ѡ�����Զ���URL����ټ���������,��:/page/2/
			<br><font color="red">���ñ�ǩ��{id}-->���Զ��滻����ϢID</font></span>
			</td>
		</tr>
		<tr>
			<th  width="100">SEO���⣺</th>
			<td class="y-bg">
			<input type="text" name="seo_title" id="seo_title" value="<?php echo $seo['seo_title']; ?>" size="30"/></td>
		</tr>
		<tr>
			<th>SEO�ؼ��ʣ�</th>
			<td>
			<input type="text" name="seo_keywords" id="seo_keywords" value="<?php echo $seo['seo_keywords']; ?>" size="60"/>
			<span><br />��ʽ: �ؼ���1,�ؼ���2,�ؼ���3(���100���ַ�)</span>
			</td>
		</tr>
		<tr>
			<th>SEO������</th>
			<td>
			<textarea name="seo_description" cols="60" class="t" tabindex="1" style="width:99%;height:50px"><?php echo $seo['seo_description']; ?></textarea>
			<span><br />�ı���ʽ,���250���ַ�</span>
			</td>
		</tr>
	</table>
</fieldset>