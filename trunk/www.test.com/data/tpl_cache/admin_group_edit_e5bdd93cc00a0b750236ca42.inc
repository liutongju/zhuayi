<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><script type="text/javascript"><!--$(function(){	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});	$("#groupname").formValidator({empty:true,onshow:"请填写角色名",onfocus:"请填写角色名"}).inputValidator({min:6,max:20,onerror:"请填写角色名"});	$(".purview").click(function(){		$("."+$(this).attr('id')).attr('checked',$(this).attr('checked'));	})	$(".purview2").click(function(){		$("."+$(this).attr('id')).attr('checked',$(this).attr('checked'));	})})//--></script><form action="/index.php?m=admin&c=group_info&a=init" method="post" id="myform"><fieldset id="fieldset">	<legend>修改管理角色</legend>	<table width="100%"  class="table_form">		<tr>			<th width="80">角色名：</th>			<td class="y-bg"><input type="text" class="input-text" name="groupname" id="groupname" value="<?php echo $info['groupname']; ?>"  /></td>		</tr>	</table></fieldset><div class="bk15"></div><?php $parent_id = '';
$atts = array();
$atts['tagname'] = 'menu_list';
$atts['parent_id'] = '0';
$atts['limit'] = '999';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
 $parent_id = $fields['id'];?><fieldset id="fieldset">	<legend>		<label>			<input type="checkbox" name="purview[]" id="abcd_<?php echo $fields['id']; ?>" value="<?php echo $fields['id']; ?>" class="purview" <?php if (strpos('%,'.$info['purview'].',',','.$fields['id'].',')){ echo 'checked="checked"';}?>/> <?php echo $fields['title']; ?>：		</label>	</legend>	<table width="100%"  class="table_form">	<?php
$atts = array();
$atts['tagname'] = 'menu_list';
$atts['parent_id'] = $fields['id'];
$atts['limit'] = '999';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>		<tr>			<th width="80" style="text-align:left;">				<label>					<input type="checkbox" name="purview[]" value="<?php echo $fields['id']; ?>" class="abcd_<?php echo $parent_id; ?> purview2" <?php if (strpos('%,'.$info['purview'].',',','.$fields['id'].',')){ echo 'checked="checked"';}?> id="efg_<?php echo $fields['id']; ?>"/>						<?php echo $fields['title']; ?>				</label>			</th>			<td class="y-bg">					<?php
$atts = array();
$atts['tagname'] = 'menu_list';
$atts['parent_id'] = $fields['id'];
$atts['limit'] = '999';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>						<div style="width:150px;float:left;line-height:28px;">						<label><input type="checkbox" name="purview[]" value="<?php echo $fields['id']; ?>" class="abcd_<?php echo $parent_id; ?> efg_<?php echo $fields['parent_id']; ?>" <?php if (strpos('%,'.$info['purview'].',',','.$fields['id'].',')){ echo 'checked="checked"';}?>/>						<?php echo $fields['title']; ?></label>					</div>					<?php
}
}
?>				</td>		</tr>	<?php
}
}
?>		</table></fieldset><div class="bk15"></div><?php
}
}
?><input type="hidden" name="id" value="<?php echo $info['id']; ?>"><input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="提交" /></form><?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>