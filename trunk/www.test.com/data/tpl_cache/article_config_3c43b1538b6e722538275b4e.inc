<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#class_tpl").formValidator({onshow:"������Ĭ��ģ��,�����Ը�Ŀ¼��ʼ",onfocus:"������Ĭ��ģ��,�����Ը�Ŀ¼��ʼ"})
	$("#path").formValidator({onshow:"�����뾲̬ҳ��ŵ�ַ,����\"/\"��ͷ����\"/\"��β(�Ǳ���,�������򲻱���д)",onfocus:"�����뾲̬ҳ��ŵ�ַ(�Ǳ���,�������򲻱���д)"})
	$("#html").formValidator({onshow:"��ѡ���Ƿ�����HTML",onfocus:"��ѡ���Ƿ�����HTML"})
	$("#class_url").formValidator({onshow:"������Ĭ��URL,���ñ�ǩ{id},�滻ΪֱͶID",onfocus:"������Ĭ��URL,���ñ�ǩ{id}"}).inputValidator({min:2,onerror:"������Ĭ��URL,���ñ�ǩ{id}"});
	$("#article_generate_time").formValidator({onshow:"��̬ҳ�Զ����¼��ʱ�䣬��λ��",onfocus:"��̬ҳ�Զ����¼��ʱ�䣬��λ��"}).inputValidator({min:2,onerror:"��̬ҳ�Զ����¼��ʱ�䣬��λ��"});
	$("#article_index_path").formValidator({onshow:"���ԡ�/����ͷ��β�����������Ӻ�׺��ֻ��дĿ¼��",onfocus:"���ԡ�/����ͷ��β�����������Ӻ�׺��ֻ��дĿ¼��"}).inputValidator({min:2,onerror:"���ԡ�/����ͷ��β�����������Ӻ�׺��ֻ��дĿ¼��"});
	$("#article_index_url").formValidator({onshow:"����Ǹ�Ŀ¼��д��/�������������Ƶ�����Ǿ�д/aricle/,��β�Ա����ԡ�/����β",onfocus:"����Ǹ�Ŀ¼��д��/�������������Ƶ�����Ǿ�д/aricle/,��β�Ա����ԡ�/����β"}).inputValidator({min:1,onerror:"����Ǹ�Ŀ¼��д��/�������������Ƶ�����Ǿ�д/aricle/,��β�Ա����ԡ�/����β"});
	
	//----
	
	if ($("input[name='article_config[article_index_generate]']:checked").val()==0)
	{
		$(".article_index_path").css("display",'none');
		$(".article_index_url").css("display",'');
	}
	else
	{
		$(".article_index_path").css("display",'');
		$(".article_index_url").css("display",'none');
	}
	
	if ($("input[name='article_config[article_generate]']:checked").val()==0)
	{
		$(".article_generate_path").css("display",'none');
		$(".article_news_url").css("display",'');
	}
	else
	{
		$(".article_generate_path").css("display",'');
		$(".article_news_url").css("display",'none');
	}
	
	//----
	if ($("input[name='article_config[article_class_generate]']:checked").val()==0)
	{
		$(".article_class_path").css("display",'none');
		$(".article_class_url").css("display",'');
	}
	else
	{
		$(".article_class_path").css("display",'');
		$(".article_class_url").css("display",'none');
	}
	
	$(".article_generate").click(function(){
		if ($(this).val()==0)
		{
			$(".article_generate_path").fadeOut("slow",function(){
				$(".article_news_url").fadeIn("slow");
			});
			
		}
		else
		{
			
			$(".article_news_url").fadeOut("slow",function(){
				$(".article_generate_path").fadeIn("slow");
			});
		}
	})
	
	$(".article_class_generate").click(function(){
		if ($(this).val()==0)
		{
			$(".article_class_path").fadeOut("slow",function(){
				$(".article_class_url").fadeIn("slow");
			});
			
		}
		else
		{
			
			$(".article_class_url").fadeOut("slow",function(){
				$(".article_class_path").fadeIn("slow");
			});
		}
	})
	$(".article_index_generate").click(function(){
		if ($(this).val()==0)
		{
			$(".article_index_path").fadeOut("slow",function(){
				$(".article_index_url").fadeIn("slow");
			});
			
		}
		else
		{
			
			$(".article_index_url").fadeOut("slow",function(){
				$(".article_index_path").fadeIn("slow");
			});
		}
	})
	
	$("#article_index_url").blur(function(){
		$("#url").val($(this).val())
	})
	$("#url").blur(function(){
		$("#article_index_url").val($(this).val())
	})
	$("#parameter").attr('disabled',true);
	
	$(".key_highlight").click(function(){
		if ($(this).val()==0)
		{
			$("#key_highlight").fadeOut("slow")
		}
		else
		{
			$("#key_highlight").fadeIn("slow")
		}
	})
})
//-->
</script>
<form action="?m=article&c=config_info&a=init" method="post" id="myform">
<div class="col-tab">
	<ul class="tabBut cu-li">
		<li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',4,1);">��������</li>
		<li id="tab_setting_2" onclick="SwapTab('setting','on','',4,2);">������Ŀ����</li>
		<li id="tab_setting_3" onclick="SwapTab('setting','on','',4,3);">����ҳ����</li>
		<li id="tab_setting_4" onclick="SwapTab('setting','on','',4,4);">SEO����</li>
	</ul>

<div id="div_setting_1" class="contentList pad-10">
	<table width="100%"  class="table_form">
		<tr>
			<th width="150">Ƶ��ҳ����Html��</th>
			<td class="y-bg">
				<input name="article_config[article_index_generate]" value="1" type="radio" <?php if ($article_index_generate==1){echo ' checked';}?> class="article_index_generate"> ��&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[article_index_generate]" value="0" type="radio"  <?php if ($article_index_generate==0){echo ' checked';}?> class="article_index_generate"> ��  
			</td>
		</tr>
		<tr class="article_index_url">
			<th width="150">��̬URL��ַ��</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_index_url]"  value="<?php echo $article_index_url; ?>" size="60" id="article_index_url">
			</td>
		</tr>
		<tr class="article_index_path">
			<th width="150">HTML��ŵ�ַ��</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_index_path]"  value="<?php echo $article_index_path; ?>" size="60" id="article_index_path"/>
			</td>
		</tr>
		<tr>
			<th>����λ��</th>
			<td colspan="2" class="y-bg">
				<textarea name="article_config[flag]" id="flag" style="width:50%;height:50px;"><?php echo implode(chr(13),$flag); ?></textarea>
				<span><br>��ʽ������λ��|��ʶ�� ���磺�Ƽ�|tuijian (һ��һ��,�ɶ��)</span>
			</td>
		</tr>
		<tr>
			<th>������Դ��</th>
			<td colspan="2" class="y-bg">
				<textarea name="article_config[source]" id="source" style="width:50%;height:50px;"><?php echo $source; ?></textarea>
				<span><br>��ʽ����Դ����1|��Դ����2|��Դ����3...</span>
			</td>
		</tr>
		<tr>
			<th width="150">ģ����</th>
			<td class="y-bg">
				<table width="90%" class="radio-label">
					<tr>
					<?php foreach ($tpllist as $key=>$val){
					?>
						<td align="center">
							<img src="<?php echo str_replace(ZCMS_ROOT,'',$val); ?>/preview.png"/><br>
							<input class="radio_style" name="article_config[article_tpl]" value="<?php echo $val; ?>" type="radio" <?php if ($article_tpl == $val){echo 'checked="checked"';}?>>
						</td>
					<?php }?>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
<div id="div_setting_2" class="contentList pad-10 hidden">
	<table width="100%"  class="table_form">
		<tr>
			<th width="150">��Ŀ����Html��</th>
			<td class="y-bg">
				<input name="article_config[article_class_generate]" value="1" type="radio" <?php if ($article_class_generate==1){echo ' checked';}?> class="article_class_generate"> ��&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[article_class_generate]" value="0" type="radio"  <?php if ($article_class_generate==0){echo ' checked';}?> class="article_class_generate"> ��  
			</td>
		</tr>
		<tr class="article_class_url">
			<th width="150">��̬URL����</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_class_url]"  value="<?php echo $article_class_url; ?>" size="60" />
				<span><br>���ñ�ǩ{id}==>��ĿID</span>
			</td>
		</tr>
		<tr class="article_class_path">
			<th width="150">HTML��ŵ�ַ��</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_class_path]"  value="<?php echo $article_class_path; ?>" size="60" />
				<span><br>���ñ�ǩ{catdir}==>��Ŀ·����{Y}==>�ꡢ{M}==>�¡�{D}==>�ա�{id}==>��ĿID</span>
			</td>
		</tr>
		<tr class="article_class_path">
			<th width="150">�Զ����¼����</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_class_time]"  value="<?php echo $article_class_time; ?>" id="article_generate_time" size="20" />
			</td>
		</tr>
	</table>
</fieldset>
</div>
<div id="div_setting_3" class="contentList pad-10 hidden">
	<table width="100%"  class="table_form">
		<tr>
			<th width="150">�Զ���ȡ����ժҪ��</th>
			<td class="y-bg">
				<input name="article_config[abstract]" value="1" type="radio" <?php if ($abstract==1){echo ' checked';}?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[abstract]" value="0" type="radio"  <?php if ($abstract==0){echo ' checked';}?>> ��  
			</td>
		</tr>
		<tr>
			<th width="150">�Զ���������ͼƬ��</th>
			<td class="y-bg">
				<input name="article_config[downfile]" value="1" type="radio" <?php if ($downfile==1){echo ' checked';}?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[downfile]" value="0" type="radio"  <?php if ($downfile==0){echo ' checked';}?>> ��  
			</td>
		</tr>
		<tr>
			<th width="150">�Զ��������ݹؼ������ӣ�</th>
			<td class="y-bg">
				<input name="article_config[key_highlight]" value="1" type="radio" class="key_highlight" <?php if ($key_highlight==1){echo ' checked';}?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[key_highlight]" value="0" type="radio" class="key_highlight" <?php if ($key_highlight==0){echo ' checked';}?>> �� 
				
				<span id="key_highlight">&nbsp;&nbsp;&nbsp;&nbsp;�滻������<input type="text" class="input-text" name="article_config[replace_times]" id="replace_times" value="<?php echo $replace_times; ?>" size="5" /> 
				�Զ����ӵ����ӻ����highlight_key��ʽ�����ڶ�Ӧģ��������
				</span>
			</td>
		</tr>
		<tr>
			<th width="150">�Զ���ҳ�ַ�����</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_page_len]" id="article_page_len" value="<?php echo $article_page_len; ?>" size="10" />�ַ���������HTML��ǣ�������дż����5000
			</td>
		</tr>
		
		<tr>
			<th width="150">�Ƿ�����HTML��</th>
			<td class="y-bg">
				<input name="article_config[article_generate]" value="1" type="radio" class="article_generate" <?php if ($article_generate==1){echo ' checked';}?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[article_generate]" value="0" type="radio" class="article_generate" <?php if ($article_generate==0){echo ' checked';}?>> ��  
			</td>
		</tr>
		<tr class="article_news_url">
			<th width="150">��̬URL����</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_news_url]"  value="<?php echo $article_news_url; ?>" size="60" />
				<span><br>���ñ�ǩ{id}==>����ID</span>
			</td>
		</tr>
		<tr class="article_generate_path">
			<th width="150">HTML��ŵ�ַ��</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_generate_path]"  value="<?php echo $article_generate_path; ?>" size="60" />
				<span><br>���ñ�ǩ{catdir}==>��Ŀ·����{Y}==>�ꡢ{M}==>�¡�{D}==>�ա�{id}==>����ID</span>
			</td>
		</tr>
		<tr class="article_generate_path">
			<th width="150">���¼����</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_generate_time]"  value="<?php echo $article_generate_time; ?>" id="article_generate_time" size="20" />
			</td>
		</tr>
	</table>
</div>
<div id="div_setting_4" class="contentList pad-10 hidden">
	<table width="100%"  class="table_form">
		<tr style="display:none">
			<th width="150">�Զ���URL��</th>
			<td class="y-bg">
			<input type="text" class="input-text" name="url" id="url" value="<?php echo $seo['url']; ?>" size="60" />
			<input name="parameter" id="parameter" value="1" size="35" type="checkbox" <?php if ($seo['parameter']==1){echo 'checked';};?> /> ģ��ƥ��
			</td>
		</tr>
		<tr>
			<th width="150">SEO���⣺</th>
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
</div>
<div class="bk15"></div>
<input type="hidden" name="filename" value="article_config"/>
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="�ύ" />
</form>
<script>
function SwapTab(name,cls_show,cls_hide,cnt,cur)
{
    for(i=1;i<=cnt;i++){
		if(i==cur){
			 $('#div_'+name+'_'+i).show();
			 $('#tab_'+name+'_'+i).attr('class',cls_show);
		}else{
			 $('#div_'+name+'_'+i).hide();
			 $('#tab_'+name+'_'+i).attr('class',cls_hide);
		}
	}
}
</script>

<?php include $this->CompilerInclude("/zcms/admin/template/admin/�ײ�.html");
 ?>