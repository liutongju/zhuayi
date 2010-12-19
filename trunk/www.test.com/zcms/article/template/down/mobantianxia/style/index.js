var mbtx={
	init:function(){
		
		var elms = document.getElementsByName("sliding");

		for(var g=0; g<elms.length; g++){
			
			var lielms = elms[g].getElementsByTagName('LI');
			
			for(var i=0; i<lielms.length; i++){
				
				lielms[i].onmousedown = function(){
					
					var pnobj = this.parentNode.parentNode.nextSibling.tagName == "DIV" ? this.parentNode.parentNode.nextSibling : this.parentNode.parentNode.nextSibling.nextSibling;
					var objsx = pnobj.getElementsByTagName('UL');
					var elmsx = this.parentNode.getElementsByTagName('LI');
					var thisx = 0;
					
					for(var j=0; j<elmsx.length; j++){
						if(elmsx[j] == this) thisx = j;
						elmsx[j].className="";
						objsx[j].style.display="none";
					}
					
					this.className='on';
					objsx[thisx].style.display="";
					}}}}}

//flink
function doflink(o){
	 o.className="onn";
	 var j;
	 var id;
	 var e;
	 for(var i=1;i<=3;i++){
	   id ="fn"+i;
	   j = document.getElementById(id);
	   e = document.getElementById("fl"+i);
	   if(id != o.id){
	   	 j.className="no";
	   	 e.style.display = "none";
	   }else{
			e.style.display = "block";
	   }
	 }
	 }	 
//搜索JS

function _GoNewsSearch() {
		var obj = document.getElementById('_SearchSelectedCond');
		var formObj = document.getElementById('NewsSearchForm');
		formObj.submit();
	}
	
	function _SelectSearchCond(value) {
		if (value) {
			var obj = document.getElementById('_SearchSelectedCond');
			if (obj) {
				obj.innerHTML = '<a href="javascript:_SelectSearchCond();">'+value+'</a>';
				var formObj = document.getElementById('NewsSearchForm');
				if (formObj && formObj['mbtx']) formObj['mbtx'].select();
				if (formObj && formObj['mbtx']) {
					switch(value) {
						case '网页模板' : 
								formObj['mbtx'].value = '1';
								formObj['channeltype'].value = '66';
								break;
						case '程序模板' : 
								formObj['mbtx'].value = '2';
								formObj['channeltype'].value = '33';
								break;
					 	case '建站教程' : 
								formObj['mbtx'].value = '3';
								formObj['channeltype'].value = '1';
								break;
						case '图标素材' : 
								formObj['mbtx'].value = '4';
								formObj['channeltype'].value = '18';
								break;
						case '广告代码' : 
								formObj['mbtx'].value = '5';
								formObj['channeltype'].value = '17';
								break;
					}
					
				}
				_SelectSearchCond();
			}
		} else {
			var obj = document.getElementById('_SearchCondList');
			if (obj && obj.style) {
				if (obj.style.display == 'none') {
					obj.style.display = '';	
				} else {
					obj.style.display = 'none';
				}
			}	
		}
	}


