function user_blank(e){
    e = e || window.event;
    e = e.target || e.srcElement;
    var get_def_class = parseInt(e.className);

    if (isNaN(get_def_class) === true)
    {

    }else
    {
        window.location.href = "login/"
    }
}