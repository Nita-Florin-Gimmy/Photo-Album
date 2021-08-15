function edit(e){
    e = e || window.event;
    e = e.target || e.srcElement;
    var edit_class = parseInt(e.className);

    if (isNaN(edit_class) === true)
    {

    }else
    {

        var select_h4 = document.getElementById("write_section");
        var h4 = select_h4.querySelector("h4");
        var cancel  = document.getElementById("cancel");
        var com = document.getElementsByClassName("comment")[0];
        var com_edit = document.getElementsByClassName("comment_edit")[0];
        var p_class = edit_class + 0.0000002;
        var select_p = document.getElementsByClassName(p_class)[0];
        
        var dots_i_class = edit_class + 0.2;
        var options_close_i_class = edit_class + 0.02;
        var options_class = edit_class + 0.002;
        var dots_i = document.getElementById(dots_i_class);
        var options_close_i = document.getElementById(options_close_i_class);
        var options = document.getElementsByClassName(options_class)[0];
    
        options_close_i.style.display="none";
        options.style.display="none";
        dots_i.style.display="inline-block";
        com.style.display="none";
        com_edit.style.display="block";
        cancel.style.display="block";
        h4.style.display="block";
        com_edit.textContent = select_p.innerText;

        cancel.addEventListener('click',function(){

            com.style.display="block";
            com_edit.textContent = "";
            com.textContent = "";
            com_edit.style.display="none";
            cancel.style.display="none";
            h4.style.display="none"; 
    
            document.getElementById("enter").disabled = true;
        });

        document.getElementById("enter").disabled = false;

        com_edit.addEventListener('input', function(){
        
            if(com_edit.textContent.length > 400)
            {
                document.getElementById("enter").style.backgroundColor="red";
                document.getElementById("enter").disabled = true;
            }
            else
            {
                document.getElementById("enter").style.backgroundColor="blue";
                document.getElementById("enter").disabled = false;
            }
        });

        document.getElementById("enter").addEventListener('click',function(){

        var p_class = edit_class + 0.0000002;
        var select_p = document.getElementsByClassName(p_class)[0];


            if(com_edit.textContent.length != 0){

                com.style.display="block";
                com.textContent = "";
                com_edit.style.display="none";
                cancel.style.display="none";
                h4.style.display="none"; 
                select_p.innerText = com_edit.textContent; 

                
                $(document).ready(function(){
                                                                    
                    var obj = {};
                    obj.id = edit_class;
                    obj.text = com_edit.textContent; 
                    
                        $.ajax({
                            method: "post",
                            url: "../php/edit.php",
                            data: obj
                        })
                });
            }   
            com_edit.textContent = "";

        });   
    }
}