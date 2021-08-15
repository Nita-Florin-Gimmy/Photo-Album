var about_write  = document.getElementById("about_write");
about_write.addEventListener('input', function(){

    var save_button = document.getElementById("save");
    var count_text = document.getElementById("about_write").value.length;  
    var count_lines = document.getElementById("about_write").value.split("\n").length;
    var null_lines = count_text - count_lines;

    if (count_text <= 100 && count_lines <= 3 || null_lines === -1)
    {
        save_button.style.backgroundColor="blue";
        save_button.innerText = "Save";
        save_button.disabled = false;
    }else
    {
        save_button.style.backgroundColor="red";
        save_button.innerText = "Save";      
        save_button.disabled = true;  
    }

    save_button.addEventListener('click',function(){

        if (null_lines === -1)
        {
            save_button.style.backgroundColor="green";
            save_button.innerText = "Saved";  
        }else
        {
            save_button.style.backgroundColor="green";
            save_button.innerText = "Saved";  
        }
    });
});