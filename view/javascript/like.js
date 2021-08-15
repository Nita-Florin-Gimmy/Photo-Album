function like(e){
    e = e || window.event;
    e = e.target || e.srcElement;
    var get_def_class = parseInt(e.className);

    if (isNaN(get_def_class) === true)
    {

    }else
    {
        var def = document.getElementsByClassName(get_def_class)[0];
        var get_clicked = get_def_class + 0.1;
        var get_likes = get_def_class + 0.01;
        var get_default_icon = get_def_class + 0.001;
        var get_clicked_icon = get_def_class + 0.0001;
        var clicked = document.getElementsByClassName(get_clicked)[0];
        var likes_number = document.getElementsByClassName(get_likes)[0];
        var default_icon = document.getElementById(get_default_icon);
        var clicked_icon = document.getElementById(get_clicked_icon);
        var integer = parseInt(likes_number.innerHTML);

            clicked.style.display = "flex";
            clicked_icon.style.display = "flex";
            def.style.display = "none";
            default_icon.style.display = "none";
            integer += 1;
            likes_number.innerHTML = integer;

            $(document).ready(function(){
            
                var obj = {};
                obj.id = get_def_class;
                obj.like_val = "yes";
                
                $.ajax({
                    method: "post",
                    url: "../php/like.php",
                    data: obj
                })
            });
    }
}