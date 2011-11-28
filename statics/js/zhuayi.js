/* 获取关键词 */
function api_tags(obj,out,title)
{
	$(obj).attr('title',$(obj).val()).val('正在获取...')
	$.get('/api/tags/'+$("#"+title).val(),function(data){
		$('#'+out).val(data);
		$(obj).val($(obj).attr('title'))
	})
}
