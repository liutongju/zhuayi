<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?>
<script type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/select.js"></script>
<?php include_once ZCMS_CACHE.'article_class_cache.js';?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#cid").formValidator({onshow:"请选择栏目名称",onfocus:"请选择栏目名称"})
	$("#title").formValidator({onshow:"请输入商品标题",onfocus:"请输入商品标题"}).inputValidator({min:2,max:80,onerror:"请输入商品标题,不能超过80个字符"});
	$("#parameter").attr('checked',true);
	Calendar.setup({inputField:"dtime",ifFormat:"%Y-%m-%d %H:%M:%S",showsTime:true,timeFormat:"24"});
	$("#file1").click(function(){
		$(this).width(450);
		$("#litpic").css('display','none')
	})
	
	$(".banner").click(function(){
		tb_show('制作banner','/index.php?m=taobao&c=banner&a=init');
		return false;
	})

})

//-->
</script>
<form action="?m=taobao&c=special_info&a=init" method="post" id="myform" enctype="multipart/form-data">
<fieldset>
	<legend>基本信息</legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="120">所属栏目：</th>
			<td  class="y-bg">
				<span id=selBox> </span>
				<input id="cid" name="cid" value="<?php echo $info['cid']; ?>" type="hidden"/>
				<script language="javascript">
						var b = new sortMenu("cid","selBox",arrSorts);
						b.newInit(<?php echo $info['cid']; ?>,b);
				</script>
			</td>
			<td width="321" rowspan="3" align="center">
			<img src="<?php echo $info['litpic']; ?>" width="135"  class="litpic" />
			<span><br> <a href="<?php echo $info['litpic']; ?>" target="_blank"/>看原图</a></span>
			</td>
		</tr>
		<tr>
			<th>专题标题：</th>
			<td width="863" class="y-bg">
				<input type="text" class="input-text" name="title" id="title" value="<?php echo $info['title']; ?>" size="60" />
			</td>
		</tr>
		<tr>
			<th width="80">主标题：</th>
			<td  class="y-bg">
				<input type="text" class="input-text" name="banner[title]" id="title" value="<?php echo $info['banner']['title']; ?>" size="60" />
				<span><br>最多11个字</span>
			</td>
		</tr>
		<tr>
			<th>副标题：</th>
			<td class="y-bg" colspan="2">
				<input type="text" class="input-text" name="banner[ftitle]" id="title" value="<?php echo $info['banner']['ftitle']; ?>" size="60" />
			</td>
		</tr>
		<tr>
			<th>说明文字：</th>
			<td class="y-bg" colspan="2">
				<input name="banner[body]" type="text" id="body" value="<?php echo $info['banner']['body']; ?>" size="60" class="input-text" >
			</td>
	    </tr>
		<tr>
			<th>banner模版：</th>
			<td class="y-bg" colspan="2">
				<input name="banner[tpl]" type="text" id="tpl" value="<?php echo $info['banner']['tpl']; ?>" size="60" class="input-text" >
				<button class="button banner">选择banner</button>
			</td>
		</tr>
		<tr>
			<th>大Banner：</th>
			<td class="y-bg" colspan="2">
				<input name="litpic" type="text" id="litpic" value="<?php echo $info['litpic']; ?>" size="60">
			</td>
	    </tr>
		<tr>
			<th>商品定制：</th>
			<td class="y-bg" colspan="2">
				关键字：<input type="text" value="<?php echo $info['customize']['keyword']; ?>" class="input-text" name="taobao[keyword]" size='10'>
				单价区间：<input type="text" value="<?php echo $info['customize']['start_price']; ?>" class="input-text" name="taobao[start_price]" size='3'> -
				<input type="text" value="<?php echo $info['customize']['end_price']; ?>" class="input-text" name="taobao[end_price]" size='3'>
				佣金区间：<input type="text" value="<?php echo $info['customize']['start_commissionRate']; ?>" class="input-text" name="taobao[start_commissionRate]" size='3' title="如：1234表示12.34%"> -
				<input type="text" value="<?php echo $info['customize']['end_commissionRate']; ?>" class="input-text" name="taobao[end_commissionRate]" size='3' title="如：1234表示12.34%">
				<select name="taobao[start_credit]">
					<option value="">卖家信誉</option>
					<?php foreach ($start_credit as $val){?>
					<option value="<?php echo $val['value']; ?>" <?php if ($info['customize']['start_credit'] == $val['value']){echo 'selected';}?>><?php echo $val['title']; ?></option>
					<?php }?>
				</select>
				<select name="taobao[sort]">
					<option value="">默认排序</option>
					<?php foreach ($sort as $val){?>
					<option value="<?php echo $val['value']; ?>" <?php if ($info['customize']['sort'] == $val['value']){echo 'selected';}?>><?php echo $val['title']; ?></option>
					<?php }?>
				</select>
				调用数：<input type="text" value="<?php echo $info['customize']['page_size']; ?>" class="input-text" name="taobao[page_size]" size='10'>
			</td>
	    </tr>
		<tr>
			<th>发布时间：</th>
			<td colspan="2" class="y-bg">
				<input type="text" name="dtime" id="dtime" value="<?php echo dtime($info['dtime']); ?>" size="21" class="endDate" >
			</td>
		</tr>
	</table>
</fieldset>
<?php include $this->CompilerInclude("/zcms/admin/template/admin/seo.html");
 ?>
<div class="bk15"></div>
<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="提交" />
</form>
<?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>