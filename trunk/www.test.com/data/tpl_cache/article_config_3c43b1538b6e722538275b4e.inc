<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#class_tpl").formValidator({onshow:"请输入默认模版,必须以根目录开始",onfocus:"请输入默认模版,必须以根目录开始"})
	$("#path").formValidator({onshow:"请输入静态页存放地址,请以\"/\"开头、以\"/\"结尾(非必须,不生成则不必填写)",onfocus:"请输入静态页存放地址(非必须,不生成则不必填写)"})
	$("#html").formValidator({onshow:"请选择是否生成HTML",onfocus:"请选择是否生成HTML"})
	$("#class_url").formValidator({onshow:"请输入默认URL,可用标签{id},替换为直投ID",onfocus:"请输入默认URL,可用标签{id}"}).inputValidator({min:2,onerror:"请输入默认URL,可用标签{id}"});
	$("#article_generate_time").formValidator({onshow:"静态页自动更新间隔时间，单位秒",onfocus:"静态页自动更新间隔时间，单位秒"}).inputValidator({min:2,onerror:"静态页自动更新间隔时间，单位秒"});
	$("#article_index_path").formValidator({onshow:"请以“/”开头结尾，不允许添加后缀，只填写目录名",onfocus:"请以“/”开头结尾，不允许添加后缀，只填写目录名"}).inputValidator({min:2,onerror:"请以“/”开头结尾，不允许添加后缀，只填写目录名"});
	$("#article_index_url").formValidator({onshow:"系统强制此功能和自定义URL一样",onfocus:"系统强制此功能和自定义URL一样"}).inputValidator({min:2,onerror:"系统强制此功能和自定义URL一样"});
	
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
		<li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',4,1);">基本配置</li>
		<li id="tab_setting_2" onclick="SwapTab('setting','on','',4,2);">文章栏目配置</li>
		<li id="tab_setting_3" onclick="SwapTab('setting','on','',4,3);">内容页配置</li>
		<li id="tab_setting_4" onclick="SwapTab('setting','on','',4,4);">SEO设置</li>
	</ul>

<div id="div_setting_1" class="contentList pad-10">
	<table width="100%"  class="table_form">
		<tr>
			<th width="150">频道页生成Html：</th>
			<td class="y-bg">
				<input name="article_config[article_index_generate]" value="1" type="radio" <?php if ($article_index_generate==1){echo ' checked';}?> class="article_index_generate"> 是&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[article_index_generate]" value="0" type="radio"  <?php if ($article_index_generate==0){echo ' checked';}?> class="article_index_generate"> 否  
			</td>
		</tr>
		<tr class="article_index_url">
			<th width="150">动态URL地址：</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_index_url]"  value="<?php echo $article_index_url; ?>" size="60" id="article_index_url">
			</td>
		</tr>
		<tr class="article_index_path">
			<th width="150">HTML存放地址：</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_index_path]"  value="<?php echo $article_index_path; ?>" size="60" id="article_index_path"/>
			</td>
		</tr>
		<tr>
			<th>推送位：</th>
			<td colspan="2" class="y-bg">
				<textarea name="article_config[flag]" id="flag" style="width:50%;height:50px;"><?php echo implode(chr(13),$flag); ?></textarea>
				<span><br>格式：推送位名|标识符 例如：推荐|tuijian (一行一个,可多个)</span>
			</td>
		</tr>
		<tr>
			<th>文章来源：</th>
			<td colspan="2" class="y-bg">
				<textarea name="article_config[source]" id="source" style="width:50%;height:50px;"><?php echo $source; ?></textarea>
				<span><br>格式：来源名称1|来源名称2|来源名称3...</span>
			</td>
		</tr>
		<tr>
			<th width="150">模版风格：</th>
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
			<th width="150">栏目生成Html：</th>
			<td class="y-bg">
				<input name="article_config[article_class_generate]" value="1" type="radio" <?php if ($article_class_generate==1){echo ' checked';}?> class="article_class_generate"> 是&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[article_class_generate]" value="0" type="radio"  <?php if ($article_class_generate==0){echo ' checked';}?> class="article_class_generate"> 否  
			</td>
		</tr>
		<tr class="article_class_url">
			<th width="150">动态URL规则：</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_class_url]"  value="<?php echo $article_class_url; ?>" size="60" />
				<span><br>可用标签{id}==>栏目ID</span>
			</td>
		</tr>
		<tr class="article_class_path">
			<th width="150">HTML存放地址：</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_class_path]"  value="<?php echo $article_class_path; ?>" size="60" />
				<span><br>可用标签{catdir}==>栏目路径、{Y}==>年、{M}==>月、{D}==>日、{id}==>栏目ID</span>
			</td>
		</tr>
		<tr class="article_class_path">
			<th width="150">自动更新间隔：</th>
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
			<th width="150">自动提取文章摘要：</th>
			<td class="y-bg">
				<input name="article_config[abstract]" value="1" type="radio" <?php if ($abstract==1){echo ' checked';}?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[abstract]" value="0" type="radio"  <?php if ($abstract==0){echo ' checked';}?>> 否  
			</td>
		</tr>
		<tr>
			<th width="150">自动下载文章图片：</th>
			<td class="y-bg">
				<input name="article_config[downfile]" value="1" type="radio" <?php if ($downfile==1){echo ' checked';}?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[downfile]" value="0" type="radio"  <?php if ($downfile==0){echo ' checked';}?>> 否  
			</td>
		</tr>
		<tr>
			<th width="150">自动添加内容关键词链接：</th>
			<td class="y-bg">
				<input name="article_config[key_highlight]" value="1" type="radio" class="key_highlight" <?php if ($key_highlight==1){echo ' checked';}?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[key_highlight]" value="0" type="radio" class="key_highlight" <?php if ($key_highlight==0){echo ' checked';}?>> 否 
				
				<span id="key_highlight">&nbsp;&nbsp;&nbsp;&nbsp;替换次数：<input type="text" class="input-text" name="article_config[replace_times]" id="replace_times" value="<?php echo $replace_times; ?>" size="5" /> 
				自动添加的链接会加上highlight_key样式，请在对应模版中设置
				</span>
			</td>
		</tr>
		<tr>
			<th width="150">自动分页字符数：</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_page_len]" id="article_page_len" value="<?php echo $article_page_len; ?>" size="10" />字符数（包含HTML标记）建议填写偶数如5000
			</td>
		</tr>
		
		<tr>
			<th width="150">是否生成HTML：</th>
			<td class="y-bg">
				<input name="article_config[article_generate]" value="1" type="radio" class="article_generate" <?php if ($article_generate==1){echo ' checked';}?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="article_config[article_generate]" value="0" type="radio" class="article_generate" <?php if ($article_generate==0){echo ' checked';}?>> 否  
			</td>
		</tr>
		<tr class="article_news_url">
			<th width="150">动态URL规则：</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_news_url]"  value="<?php echo $article_news_url; ?>" size="60" />
				<span><br>可用标签{id}==>文章ID</span>
			</td>
		</tr>
		<tr class="article_generate_path">
			<th width="150">HTML存放地址：</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_generate_path]"  value="<?php echo $article_generate_path; ?>" size="60" />
				<span><br>可用标签{catdir}==>栏目路径、{Y}==>年、{M}==>月、{D}==>日、{id}==>文章ID</span>
			</td>
		</tr>
		<tr class="article_generate_path">
			<th width="150">更新间隔：</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="article_config[article_generate_time]"  value="<?php echo $article_generate_time; ?>" id="article_generate_time" size="20" />
			</td>
		</tr>
	</table>
</div>
<div id="div_setting_4" class="contentList pad-10 hidden">
	<table width="100%"  class="table_form">
		<tr style="display:none">
			<th width="150">自定义URL：</th>
			<td class="y-bg">
			<input type="text" class="input-text" name="url" id="url" value="<?php echo $seo['url']; ?>" size="60" />
			<input name="parameter" id="parameter" value="1" size="35" type="checkbox" <?php if ($seo['parameter']==1){echo 'checked';};?> /> 模糊匹配
			</td>
		</tr>
		<tr>
			<th width="150">SEO标题：</th>
			<td class="y-bg">
			<input type="text" name="seo_title" id="seo_title" value="<?php echo $seo['seo_title']; ?>" size="30"/></td>
		</tr>
		<tr>
			<th>SEO关键词：</th>
			<td>
			<input type="text" name="seo_keywords" id="seo_keywords" value="<?php echo $seo['seo_keywords']; ?>" size="60"/>
			<span><br />格式: 关键词1,关键词2,关键词3(最多100个字符)</span>
			</td>
		</tr>
		<tr>
			<th>SEO描述：</th>
			<td>
			<textarea name="seo_description" cols="60" class="t" tabindex="1" style="width:99%;height:50px"><?php echo $seo['seo_description']; ?></textarea>
			<span><br />文本格式,最多250个字符</span>
			</td>
		</tr>
	</table>
</div>
<div class="bk15"></div>
<input type="hidden" name="filename" value="article_config"/>
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="提交" />
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

<?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>