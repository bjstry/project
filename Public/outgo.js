$(function(){
	$('.ajaxbt').click(function(){
		var my_data = new Array();
		my_data[0]='baijinsong';
		my_data[1]='25';
		$.ajax({
			url:"/codiad/workspace/project/index.php/Index/testajax",
			type:"POST",
			data:{trans_data:my_data},
			error:function(){
				alert('Error loading XML.document');
			},
			success:function(data,status){
				alert(data);
			}
		});	
	});
	
});