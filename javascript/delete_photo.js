function which_del(e){
    e = e || window.event;
    e = e.target || e.srcElement;
    var get_del_class = e.className;

    if (isNaN(get_del_class) === true)
    {

    }else
    {
    
        var picture_class_int = parseInt(get_del_class);
        var picture_class = picture_class_int + 0.000001;
        var get_picture = document.getElementsByClassName(picture_class)[0];

        var conf = confirm("Are you sure?");

        if (conf == true){

            $(document).ready(function(){
                                                                    
                var obj = {};
                obj.id = parseInt(get_del_class);
                
                    $.ajax({
                        method: "post",
                        url: "../php/delete_photo.php",
                        data: obj,
                        success:function()
                        {
                            get_picture.remove();
                        }
                    })
            });
        }
    }
}