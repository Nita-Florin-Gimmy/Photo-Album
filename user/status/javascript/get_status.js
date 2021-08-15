function getUserStatus(){
    $.ajax({
        url:'../../../user/status/get_status.php',
        success:function(result){
            $('#online_users').html(result);
        }
    });
}

setInterval(function(){
    getUserStatus();
},7000);