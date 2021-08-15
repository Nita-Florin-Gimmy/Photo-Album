function dislike(e){
    e = e || window.event;
    e = e.target || e.srcElement;
    var get_clicked_class = e.className;

    if (isNaN(get_clicked_class) === true)
    {

    }else
    {
        var clicked = document.getElementsByClassName(get_clicked_class)[0];
        var get_def_class = parseInt(get_clicked_class);
        var def = document.getElementsByClassName(get_def_class)[0];
        var get_likes = get_def_class + 0.01;
        var get_default_icon = get_def_class + 0.001;
        var get_clicked_icon = get_def_class + 0.0001;
        var likes_number = document.getElementsByClassName(get_likes)[0];
        var default_icon = document.getElementById(get_default_icon);
        var clicked_icon = document.getElementById(get_clicked_icon);
        var integer = parseInt(likes_number.innerHTML);


            clicked.style.display = "none";
            clicked_icon.style.display = "none";
            def.style.display = "flex";
            default_icon.style.display = "flex";
            integer -= 1;
            likes_number.innerHTML = integer;

            $(document).ready(function(){
            
                var obj = {};
                obj.id = get_def_class;
                obj.like_val = "no";
                
                $.ajax({
                    method: "post",
                    url: "../php/dislike.php",
                    data: obj
                })
            });
    }
}