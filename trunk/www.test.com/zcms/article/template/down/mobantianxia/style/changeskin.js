$(function(){
	$('#skin li').click(function(){
		$("#"+this.id).addClass("selected").siblings().removeClass("selected");
		$('#skinCss').attr("href","/templets/mobantianxia/"+(this.id)+".css");
		});
	})
