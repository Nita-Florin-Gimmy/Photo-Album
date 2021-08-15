function ban(e){
    e = e || window.event;
    e = e.target || e.srcElement;
    var get_ban_class = parseInt(e.className);

    if (isNaN(get_ban_class) === true)
    {

    }else
    {
        var modify_role_class = get_ban_class + 0.02;
        var pick_role_class = get_ban_class + 0.002;
        var admin_tag_class = get_ban_class + 0.0002;
        var mod_tag_class = get_ban_class + 0.00002;
        var user_tag_class = get_ban_class + 0.000002;
        var banned_tag_class = get_ban_class + 0.00000000002;
        var get_unban_class = get_ban_class + 0.000000000002;
        var pick_role = document.getElementsByClassName(pick_role_class)[0];
        var ban = document.getElementsByClassName(get_ban_class)[0];
        var unban = document.getElementsByClassName(get_unban_class)[0];
        var modify_role = document.getElementsByClassName(modify_role_class)[0];
        var admin_tag = document.getElementsByClassName(admin_tag_class)[0];
        var mod_tag = document.getElementsByClassName(mod_tag_class)[0];
        var user_tag = document.getElementsByClassName(user_tag_class)[0];
        var sql_role_class = get_ban_class + 0.0000000002;
        var sql_role = document.getElementsByClassName(sql_role_class)[0];
        var banned_tag = document.getElementsByClassName(banned_tag_class)[0];
        var conf = confirm("Are you sure?");

        if (conf == true){

            pick_role.style.display = "none"
            ban.style.display = "none"
            unban.style.display = "block"
            modify_role.style.display = "none"
            banned_tag.style.display = "block"
            mod_tag.style.display = "none"
            user_tag.style.display = "none"
            admin_tag.style.display = "none"
            sql_role.style.display = "none"
        } 

        $(document).ready(function(){
                
            var obj = {};
            obj.id = get_ban_class;
            
            $.ajax({
                method: "post",
                url: "../search/php/ban.php",
                data: obj
            })
        });
    }
}