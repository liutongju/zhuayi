<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#title").formValidator({onshow:"��������������",onfocus:"�������Ʋ���Ϊ��"}).inputValidator({min:2,max:20,onerror:"�������Ʋ���Ϊ��"});
	$("#url").formValidator({onshow:"���������ӵ�ַ,������http://��ͷ",onfocus:"���������ӵ�ַ,������http://��ͷ"}).inputValidator({min:2,onerror:"���������ӵ�ַ,������http://��ͷ"});
	
})
//-->
</script>

<form action="?m=sitemaps&c=info&a=init" method="post" id="myform">
<fieldset>
	<legend>��������Դ</legend>
	<table width="100%"  class="table_form">
		<tr>
			<th width="80">����Դ��</th>
			<td class="y-bg">
				<textarea name="dbsource" id="dbsource" style="width:99%;height:50px;"><?php echo $dbsource; ?></textarea>
				<span><br>��ʽ������Դ1|����Դ2|����Դ3...</span>
			</td>
		</tr>
	</table>
</fieldset>
<div class="bk15"></div>
<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
<input type="submit" class="button" id="dosubmit" name="dosubmit" value="�ύ" />
</form>