<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><script type="text/javascript" src="<?php echo model_url('admin','admin'); ?>js/select.js"></script><?php include_once ZCMS_CACHE.'menu_cache.js';?><script type="text/javascript"><!--$(function(){	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});	$("#pass").formValidator({empty:true,onshow:"不修改密码请留空。",onfocus:"密码应该为6-20位之间"}).inputValidator({min:6,max:20,onerror:"密码应该为6-20位之间"});	$("#pwdconfirm").formValidator({empty:true,onshow:"不修改密码请留空。",onfocus:"请输入两次密码不同。",oncorrect:"密码输入一致"}).compareValidator({desid:"pass",operateor:"=",onerror:"请输入两次密码不同。"});		$("#dosubmit").click(function(){		$.post($("#myform").attr('action'),$("#myform").serialize(),function(data){			$(".table_form,#dosubmit").remove();			if (data==1)			{								$("#fieldset").append('<center style="color:red">修改完毕</center>');			}			else			{				$("#fieldset").append('<center style="color:red">'+data+'</center>');			}			return false;		})		return false;	})	})//--></script><form action="/index.php?m=admin&c=info&a=init" method="post" id="myform"><fieldset id="fieldset">	<legend>修改个人信息</legend>	<table width="100%"  class="table_form">		<tr>			<th width="80">管理帐号：</th>			<td class="y-bg"><input type="text" class="input-text" name="username" id="username" value="<?php echo $info['username']; ?>" /></td>		</tr>		<tr>			<th>登录密码：</th>			<td class="y-bg"><input type="password" class="input-text" name="pass" id="pass"  /></td>		</tr>		<tr>			<th>确认密码：</th>			<td class="y-bg"><input type="password" name="pwdconfirm" id="pwdconfirm" class="input-text"></td>		</tr>		<tr>			<th>所属角色</th>			<td>				<select name="gid" id="gid">					<option value="">==管理角色==</option>					<?php
$atts = array();
$atts['tagname'] = 'admin_group_list';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>					<option value="<?php echo $fields['id']; ?>" <?php if($info['gid'] == $fields['id']){echo ' selected="selected"';}?>><?php echo $fields['groupname']; ?></option>					<?php
}
}
?>				</select>			</td>		</tr>	</table></fieldset><div class="bk15"></div><input type="hidden" name="id" value="<?php echo $info['id']; ?>"><input type="submit" class="button ajaxform" id="dosubmit" name="dosubmit" value="提交" /></form>