<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/ͷ��.html");
 ?>
<script type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/select.js"></script>
<?php include_once ZCMS_CACHE.'article_class_cache.js';?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#cid").formValidator({onshow:"��ѡ����Ŀ����",onfocus:"��ѡ����Ŀ����"})
	$("#title").formValidator({onshow:"���������±���",onfocus:"���������±���"}).inputValidator({min:2,max:80,onerror:"���������±���,���ܳ���80���ַ�"});
	$("#tags").formValidator({onshow:"��ؼ���֮���ÿո���ߡ�,������",onfocus:"��ؼ���֮���ÿո���ߡ�,������"});
	$("#jump").formValidator({onshow:"����ת�����ӣ����ֱ����ת,���ԡ�http://����ͷ",onfocus:"����ת�����ӣ����ֱ����ת,���ԡ�http://����ͷ"});
	$("#related").formValidator({onshow:"����ؼ������� ��|�� ����",onfocus:"����ؼ������� ��|�� ����"});
	$("#parameter").attr('checked',true);
	Calendar.setup({inputField:"dtime",ifFormat:"%Y-%m-%d %H:%M:%S",showsTime:true,timeFormat:"24"});
	$("#file1").click(function(){
		$(this).width(450);
		$("#litpic").css('display','none')
	})
	$(".jumo_but").click(function(){
		if ($(this).attr("checked") == true)
		{
			$("#jump").attr('disabled',false);
		}
		else
		{
			$("#jump").attr('disabled',true);
		}
	})
	$("#sources").change(function(){
		$("#source").val($(this).val())
	})
})
//-->
</script>
<form action="?m=article&c=info&a=init" method="post" id="myform" enctype="multipart/form-data">
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
			<td width="321" rowspan="4" align="center">
			<img src="<?php echo $info['litpic']; ?>" width="<?php echo $article_width; ?>" height="<?php echo $article_height; ?>" class="litpic" />
			<span><br>�ߴ�<?php echo $article_width; ?>*<?php echo $article_height; ?>  <a href="<?php echo $info['litpic']; ?>" target="_blank"/>��ԭͼ</a></span>
			</td>
		</tr>
		<tr>
			<th>���±��⣺</th>
			<td width="863" class="y-bg">
				<input type="text" class="input-text" name="title" id="title" value="<?php echo $info['title']; ?>" size="60" />
				<input type="button" class="button"  value="����ظ�" />
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
			<th>ת�����ӣ�</th>
			<td class="y-bg">
				<input type="text" class="input-text" name="jump" id="jump" value="<?php echo $info['jump']; ?>" size="30" <?php if (empty($info['jump'])){echo 'disabled="disabled" ';}?>/>
				<input type="checkbox" class="jumo_but" <?php if (!empty($info['jump'])){echo 'checked="checked" ';}?>> <font color=red>ת������</font>
			</td>
	    </tr>
		<tr>
			<th>������Դ��</th>
			<td class="y-bg"  colspan="2">
				<input type="text" class="input-text" name="source" id="source" value="<?php echo $info['source']; ?>" size="40" />
				<select name="sources" id="sources">
					<option value="">==��ѡ��==</option>
					<?php foreach ( $source as $val){?>
					<option value="<?php echo $val; ?>" <?php if ($info['source'] == $val){echo 'selected';}?>><?php echo $val; ?></option>
					<?php }?>
				</select>
			</td>
	    </tr>
		<tr>
			<th>�������ͣ�</th>
			<td class="y-bg" colspan="2">
				<?php foreach ($flag as $val){
					$val = explode('|',$val);
				?>
				<input type="checkbox" name="flag[]" value="<?php echo $val[1]; ?>" <?php if(strpos('$$'.$info['flag'],$val[1])){ echo "checked='checked'";}?> /> <?php echo $val[0]; ?>&nbsp;
				<?php }?>
			</td>
	    </tr>
		<tr>
			<th>Tags��</th>
			<td class="y-bg" colspan="2">
				<input type="text" class="input-text" name="tags" id="tags" value="<?php echo $info['tags']; ?>" size="30" />
			</td>
	    </tr>
		<tr>
			<th>����ժҪ��</th>
			<td colspan="2" class="y-bg">
				<textarea name="abstract" id="abstract" style="width:99%;height:60px;"><?php echo $info['abstract']; ?></textarea>
			</td>
		</tr>
		<tr>
			<th>�������ݣ�</th>
			<td colspan="2" class="y-bg">
				<?php GetEditor('body',$info['body']);?>
			</td>
		</tr>
		<tr>
			<th>�������ۣ�</th>
			<td class="y-bg">
				<input name="comment" value="0" type="radio" <?php if ($info['comment']==0){echo ' checked';}?>> ��������&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="comment" value="1" type="radio" <?php if ($info['comment']==1){echo ' checked';}?>> ����������  
			</td>
		</tr>
		<tr>
			<th>����ʱ�䣺</th>
			<td colspan="2" class="y-bg">
				<input type="text" name="dtime" id="dtime" value="<?php echo dtime($info['dtime']); ?>" size="21" class="endDate" >
			</td>
		</tr>
		<tr>
			<th>������¹ؼ��ʣ�</th>
			<td colspan="2" class="y-bg">
				<input type="text" name="related" id="related" value="<?php echo $info['related']; ?>" size="50">
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