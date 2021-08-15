function admin(e){
    e = e || window.event;
    e = e.target || e.srcElement;
    var get_admin_class = parseInt(e.className);

    if (isNaN(get_admin_class) === true)
    {

    }else
    {
        var admin_tag_class = get_admin_class + 0.0002;
        var mod_tag_class = get_admin_class + 0.00002;
        var user_tag_class = get_admin_class + 0.000002;
        var sql_role_class = get_admin_class + 0.0000000002;
        var sql_role = document.getElementsByClassName(sql_role_class)[0];
        var admin_tag = document.getElementsByClassName(admin_tag_class)[0];
        var mod_tag = document.getElementsByClassName(mod_tag_class)[0];
        var user_tag = document.getElementsByClassName(user_tag_class)[0];

        if (user_tag.value === "Administrator")
        {

        }else
        {
            admin_tag.style.display = "block"
            mod_tag.style.display = "none"
            user_tag.style.display = "none"
            sql_role.style.display = "none"

            $(document).ready(function(){
            
                var obj = {};
                obj.id = get_admin_class;
                obj.role = "administrator";
                
                $.ajax({
                    method: "post",
                    url: "../search/php/pick_role.php",
                    data: obj
                })
            });
        }
    }
}