<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("/zcms/admin/template/admin/头部.html");
 ?><form name="myform" action="/index.php?m=article&c=class_info&a=init" method="post"><div class="table-list">	<table width="100%" cellspacing="0" >		<thead>			<tr>				<th width="30">序号</th>				<th width="30">排序</th>				<th align="left">栏目名称</th>				<th align="left">数据量</th>				<th width="220">操作</th>			</tr>		</thead>		<tbody>		<?php 		foreach ($list as $key=>$val){		?>			<tr>				<td align='center'><input type="checkbox" value="<?php echo $val['id']; ?>" name="id[]" class="check"/></td>
				<td align='center'><input name='orders[]' type='text' size='3' value='<?php echo $val['orders']; ?>' class='input-text-c'></td>
				<td ><?php echo $val['classname']; ?></td>				<td ><a href="/index.php?m=article&c=index&a=init&cid=<?php echo $val['id']; ?>"><?php echo $val['maxnum']; ?></a></td>
				<td align='center' >					<?php if ($article_generate == 1){?>					<a href="/index.php?m=article&c=generate&id[]=<?php echo $val['id']; ?>&a=init&act=class" target="_blank">生成</a> | 					<?php }?>					<a href="/index.php?m=article&c=class_edit&a=init&parent_id=<?php echo $val['id']; ?>">添加子栏目</a> | 					<a href="<?php echo $val['url']; ?>" target="_blank">预览</a> | 					<a href="/index.php?m=article&c=class_edit&a=init&id=<?php echo $val['id']; ?>">修改</a> | 					<a href="/index.php?m=article&c=class_del&a=init&id=<?php echo $val['id']; ?>">删除</a>				</td>
			</tr>		<?php }?>
		</tbody>
	</table>
	<div class="btn">		<input type="submit" class="button" name="dosubmit" value="排序" onclick='$(".check").attr("checked",true)'/>	</div></div></form><?php include $this->CompilerInclude("/zcms/admin/template/admin/底部.html");
 ?>