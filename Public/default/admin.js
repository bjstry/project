$(function(){
	var i=0;
	$('a.de_extend').click(
		function(){
			i++;
			$("div.putextend").after("<div class='col col-12'><div class='row'><div class='col col-3'>功能名称：<input type='text' name='key_"+i+"'></a></div> <div class='col col-3'>功能链接：<input type='text' name='val_"+i+"'></div> <div class='col col-3'>功能描述：<input type='text' name='info_"+i+"'></div><div class='col col-3'><a class='ex_dele button small danger'>删除</a></div></div></div>");
		}
	);
});