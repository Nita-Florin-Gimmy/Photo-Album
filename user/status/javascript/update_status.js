function updateUserStatus(){
	$.ajax({
		url:'../../../user/php/update_status.php',
		success:function(){
			
		}
	});
}
setInterval(function(){
	updateUserStatus();
},3000);