var btn = document.getElementById("search_change");
btn.addEventListener("click", function(){
    
    var submit = document.getElementById("search_submit");
    var input = document.getElementById("search_input");
    var left_arrow = document.getElementById("search_left_arrow");
    var right_arrow = document.getElementById("search_right_arrow");
    var name = input.getAttribute("name");

    if (name == 'search_user_input')
    {
        submit.setAttribute("name", "search_photo_button")
        input.setAttribute("name", "search_photo_input")
        input.placeholder = "Search a photo...";
        right_arrow.style.display = "none";
        left_arrow.style.display = "block";
        input.value = "";
    }else
    {
        if (name == 'search_photo_input')
        {
            submit.setAttribute("name", "search_user_button")
            input.setAttribute("name", "search_user_input")
            input.placeholder = "Search an user...";
            right_arrow.style.display = "block";
            left_arrow.style.display = "none";
            input.value = "";
        }
    }
});