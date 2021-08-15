function modify_role(e){
    e = e || window.event;
    e = e.target || e.srcElement;
    var get_btn_class = parseInt(e.className);

    if (isNaN(get_btn_class) === true)
    {

    }else
    {
        var pick_role_class = get_btn_class + 0.002;
        var pick_role = document.getElementsByClassName(pick_role_class)[0];

        if (pick_role.offsetHeight === 0)
        {
            pick_role.style.display = "block";
        }else
        {
            pick_role.style.display = "none";
        }
    }
}