function del(e){
    e = e || window.event;
    e = e.target || e.srcElement;
    var del_class = parseInt(e.className);

    if (isNaN(del_class) === true)
    {

    }else
    {
        
        var sent_class = del_class + 0.000002;
        var sent = document.getElementsByClassName(sent_class)[0];
        var select_h4 = document.getElementById("write_section");
        var h4 = select_h4.querySelector("h4");
        var cancel  = document.getElementById("cancel");
        var com = document.getElementsByClassName("comment")[0];
        var com_edit = document.getElementsByClassName("comment_edit")[0];
        var conf = confirm("Are you sure?");

        var dots_i_class = del_class + 0.2;
        var options_close_i_class = del_class + 0.02;
        var options_class = del_class + 0.002;
        var dots_i = document.getElementById(dots_i_class);
        var options_close_i = document.getElementById(options_close_i_class);
        var options = document.getElementsByClassName(options_class)[0];

        options_close_i.style.display="none";
        options.style.display="none";
        dots_i.style.display="inline-block";

        if (conf == true){

            sent.remove();
        
            cancel.style.display="none";
            h4.style.display="none";
            com_edit.style.display="none";    
            com.style.display="block";
            com.textContent = "";
            com_edit.textContent = "";

            $(document).ready(function(){
                                                                    
                var obj = {};
                obj.id = del_class;
                
                    $.ajax({
                        method: "post",
                        url: "../php/delete.php",
                        data: obj
                    })
            });
        }

    }
}