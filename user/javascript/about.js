var textarea = document.getElementById("about_write");
var save = document.getElementById("save");

save.addEventListener("click", function(){
    $(document).ready(function(){
            
        var obj = {};
        obj.text = textarea.value;
        
        $.ajax({
            method: "post",
            url: "../user/php/about.php",
            data: obj
        })
    });
});