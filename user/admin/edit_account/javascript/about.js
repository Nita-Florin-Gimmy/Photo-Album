var textarea = document.getElementById("about_write");
var save = document.getElementById("save");

save.addEventListener("click", function(){
    $(document).ready(function(){
            
        var obj = {};
        obj.text = textarea.value;
        
        $.ajax({
            method: "post",
            url: "../edit_account/php/about.php",
            data: obj
        })
    });
});