<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
<script type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/select.js"></script>
<?php include_once ZCMS_CACHE.'taobao_class_cache.js';?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#cid").formValidator({onshow:"��ѡ����Ŀ����",onfocus:"��ѡ����Ŀ����"})
	$("#title").formValidator({onshow:"��������Ʒ����",onfocus:"��������Ʒ����"}).inputValidator({min:2,max:80,onerror:"��������Ʒ����,���ܳ���80���ַ�"});
	$("#parameter").attr('checked',true);
	Calendar.setup({inputField:"dtime",ifFormat:"%Y-%m-%d %H:%M:%S",showsTime:true,timeFormat:"24"});
	$("#file1").click(function(){
		$(this).width(450);
		$("#litpic").css('display','none')
	})


})

//-->
</script>
<form action="?m=taobao&c=info&a=init" method="post" id="myform" enctype="multipart/form-data">
<fieldset>
	<legend>������Ϣ</legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="120">�ϼ���Ŀ��</th>
			<td  class="y-bg">
				<span id=selBox> </span>
				<input id="cid" name="cid" value="<?php echo $info['cid']; ?>" type="hidden"/>
				<script language="javascript">
						var b = new sortMenu("cid","selBox",arrSorts);
						b.newInit(<?php echo $info['cid']; ?>,b);
				</script>
			</td>
			<td width="321" rowspan="3" align="center">
			<img src="<?php echo $info['litpic']; ?>" width="<?php echo $article_width; ?>" height="<?php echo $article_height; ?>" class="litpic" />
			<span><br>�ߴ�<?php echo $article_width; ?>*<?php echo $article_height; ?>  <a href="<?php echo $info['litpic']; ?>" target="_blank"/>��ԭͼ</a></span>
			</td>
		</tr>
		<tr>
			<th>��Ʒ���⣺</th>
			<td width="863" class="y-bg">
				<input type="text" class="input-text" name="title" id="title" value="<?php echo $info['title']; ?>" size="60" />
			</td>
		</tr>
		<tr>
			<th>����ͼ��</th>
			<td class="y-bg">
				<input name="litpic" type="text" id="litpic" value="<?php echo $info['litpic']; ?>" size="60">
				<input type="file" name="file1" id="file1"  style="width:63px;"/>
			</td>
	    </tr>
		<tr>
			<th>��Ʒ���ܣ�</th>
			<td colspan="2" class="y-bg">
				<?php GetEditor('body',$info['body']);?>
			</td>
		</tr>
		<tr>
			<th>����ʱ�䣺</th>
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
<input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="�ύ" />
</form>
<?php include $this->CompilerInclude("/zcms/admin/template/admin/�ײ�.html");
 ?>