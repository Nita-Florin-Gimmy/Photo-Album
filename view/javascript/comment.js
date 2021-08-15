var comment_there = document.getElementById("comment_there");
var enter = document.getElementById("enter");

var com = document.getElementsByClassName("comment")[0];
var com_text = com.textContent;
var select_row = document.querySelector("#frame");
var img_class = select_row.className;
var img_id = parseInt(img_class);

var obj = {};
obj.id = img_id;
obj.text = com_text;

i = 0;
++i;

enter.addEventListener("click", function(){

    var com = document.getElementsByClassName("comment")[0];
    var com_text = com.textContent;
    if (com_text.length === 0)
    {
    
    }else
    {
        var select_row = document.querySelector("#frame");
        var img_class = select_row.className;
        var img_id = parseInt(img_class);

        $(document).ready(function(){
            
            var obj = {};
            obj.id = img_id;
            obj.text = com_text;

            $.ajax({
                method: "post",
                url: "../php/comments.php",
                data: obj,
                success:function(){
                    $("#comment_list").load("../php/comments_load.php", {
                        id: obj.id
                    })
                    com.textContent = "";
                }
            })
        }); 
    }
});
setInterval(function(){
    $("#comment_list").load("../php/comments_load.php", {
        id: obj.id
    })
    }, 20000);
