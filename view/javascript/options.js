function options(e){
    e = e || window.event;
    e = e.target || e.srcElement;
    var dots_class = parseInt(e.className);

    if (isNaN(dots_class) === true)
    {

    }else
    {

        var dots_i_class = dots_class + 0.2;
        var options_close_i_class = dots_class + 0.02;
        var options_class = dots_class + 0.002;
        var dots_i = document.getElementById(dots_i_class);
        var options_close_i = document.getElementById(options_close_i_class);
        var options = document.getElementsByClassName(options_class)[0];


        if (options_close_i.offsetHeight === 0){
            options_close_i.style.display="inline-block";
            options.style.display="inline-block";
            dots_i.style.display="none";
        }else
        {
            options_close_i.style.display="none";
            options.style.display="none";
            dots_i.style.display="inline-block";
        }
    }
}