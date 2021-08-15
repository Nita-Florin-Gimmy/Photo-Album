var username = document.getElementById("new_username");
var password = document.getElementById("password");
var submit = document.getElementById("submit");
var error = document.getElementById("error");
var form = document.getElementById("form");

password.addEventListener('input', function(){
        
    var count_password = password.value.length;
    var password_value = document.getElementById("password").value;

    if (count_password === 0)
    {
        error.innerHTML = "";
        password.style.border = "solid 0.1vw grey";
        submit.disabled = false;
    }else
    {
        if (count_password < 8)
        {
            error.innerHTML = "Your password must be at least 8 characters long!";
            password.style.border = "solid 0.1vw red";
            submit.disabled = true;
        }else
        {
            if (count_password > 20)
            {
                error.innerHTML = "Your password must be less than 20 characters long!";
                password.style.border = "solid 0.1vw red";
                submit.disabled = true;

            }else
            {
                if (!uppercase(password_value) && !lowercase(password_value) && !number(password_value)) 
                {
                    error.innerHTML = "Your password must contain at least one upper case character, one lower case character and one number!";
                    password.style.border = "solid 0.1vw red";
                    submit.disabled = true;
                }else
                {
                    if (uppercase(password_value) && !lowercase(password_value) && !number(password_value)) 
                    {
                        error.innerHTML = "Your password must contain at least one lower case character and one number!";
                        password.style.border = "solid 0.1vw red";
                        submit.disabled = true;
                    }else
                    {
                        if (!uppercase(password_value) && lowercase(password_value) && !number(password_value)) 
                        {
                            error.innerHTML = "Your password must contain at least one upper case character and one number!";
                            password.style.border = "solid 0.1vw red";
                            submit.disabled = true;
                        }else
                        {
                            if (!uppercase(password_value) && !lowercase(password_value) && number(password_value)) 
                            {
                                error.innerHTML = "Your password must contain at least one upper case character and one lower case character!";
                                password.style.border = "solid 0.1vw red";
                                submit.disabled = true;
                            }else
                            {
                                if (!uppercase(password_value) && lowercase(password_value) && number(password_value)) 
                                {
                                    error.innerHTML = "Your password must contain at least one upper case character!";
                                    password.style.border = "solid 0.1vw red";
                                    submit.disabled = true;
                                }else
                                {
                                    if (uppercase(password_value) && !lowercase(password_value) && number(password_value)) 
                                    {
                                        error.innerHTML = "Your password must contain at least one lower case character!";
                                        password.style.border = "solid 0.1vw red";
                                        submit.disabled = true;
                                    }else
                                    {
                                        if (uppercase(password_value) && lowercase(password_value) && !number(password_value)) 
                                        {
                                            error.innerHTML = "Your password must contain at least one number!";
                                            password.style.border = "solid 0.1vw red";
                                            submit.disabled = true;
                                        }else
                                        {
                                            error.innerHTML = "";
                                            password.style.border = "solid 0.1vw green";
                                            submit.disabled = false;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    function uppercase (password) {
        return /[A-Z]/.test(password)
    };
    function lowercase (password) {
        return /[a-z]/.test(password)
    };
    function number (password) {
        return /[0-9]/.test(password)
    };
});

username.addEventListener('input', function(){

    submit.disabled = false;
    username.style.border = "solid 0.1vw grey";

    $(document).ready(function(){
            
    var obj = {};
    obj.username = username.value;
    
        $.ajax({
            method: "post",
            url: "../../login/php/username.php",
            data: obj,
            success:function(result){

                if (result == "")
                {
                    error.innerHTML = "";
                    submit.disabled = false;
                }else
                {
                    $("#error").html(result);
                    submit.disabled = true;
                }
            }
        })
    });
});
submit.addEventListener('click',function(event){
    
    var count_username = username.value.length;
    var count_password = password.value.length;
    var password_value = document.getElementById("password").value;

    if (count_username > 0 && count_password === 0)
    {
        event.preventDefault();
        error.innerHTML = "Please complete the Password!";

        username.style.border = "solid 0.1vw grey";
        password.style.border = "solid 0.1vw red";

    }else
    {
        if (count_username === 0 && count_password > 0)
        {
            event.preventDefault();
            error.innerHTML = "Please complete the Username!";
    
            username.style.border = "solid 0.1vw red";
            password.style.border = "solid 0.1vw grey";
    
        }else
        {
            if (count_username === 0 && count_password)
            {
                event.preventDefault();
                error.innerHTML = "Please complete the Form!";
                
                username.style.border = "solid 0.1vw red";
                password.style.border = "solid 0.1vw red";
            }else
            {
                if (!uppercase(password_value) || !lowercase(password_value) || !number(password_value))
                {
                    event.preventDefault();
                    error.innerHTML = "Please complete the Password correctly!";
                
                    password.style.border = "solid 0.1vw red";
                }else
                {

                    function getData(){   

                    $(document).ready(function(){
            
                        var obj = {};
                        obj.username = username.value;
                        
                            $.ajax({
                                method: "post",
                                url: "../../login/php/username.php",
                                data: obj,
                                success:function(result){
                    
                                    if (result == "")
                                    {
                                        error.innerHTML = "";
                                        var success = "true";
                                        checkData(success);
                                    }else
                                    {
                                        $("#error").html(result);
                                        var success = "false";
                                        checkData(success);
                                    }
                                }
                            })
                        });
                    }
                    getData();
                    function checkData(success)
                    {
                        if (success == "true")
                        {
                            HTMLFormElement.prototype.submit.call(form);
                        }else
                        {
                        }
                    }
                    event.preventDefault();
                }
            }     
        }
    }

    function uppercase (password) {
        return /[A-Z]/.test(password)
    };
    function lowercase (password) {
        return /[a-z]/.test(password)
    };
    function number (password) {
        return /[0-9]/.test(password)
    };
});
