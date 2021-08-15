var username = document.getElementById("username");
var email = document.getElementById("email");
var password = document.getElementById("password");
var conf = document.getElementById("confirm");
var submit = document.getElementById("submit");
var error = document.getElementById("error");

password.addEventListener('input', function(){
        
    var count_password = password.value.length;
    var count_conf = conf.value.length;
    var password_value = document.getElementById("password").value;
    var conf_value = document.getElementById("confirm").value;

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
                if (count_conf > 0 && password_value !== conf_value)
                {
                    error.innerHTML = "Passwords don't match!";
                    conf.style.border = "solid 0.1vw red";
                    password.style.border = "solid 0.1vw grey";
                    submit.disabled = true;
                }else
                {
                    if (count_conf > 0 && password_value === conf_value)
                    {
                        error.innerHTML = "";
                        conf.style.border = "solid 0.1vw green";
                        submit.disabled = false;
                    }

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

conf.addEventListener('input', function(){
    var conf_value = document.getElementById("confirm").value;
    var count_conf = conf.value.length;
    var password_value = document.getElementById("password").value;
    var count_password = password.value.length;


    if (count_conf === 0)
    {
        error.innerHTML = "";
        conf.style.border = "solid 0.1vw grey";
        submit.disabled = false;
    }else
    {
        if (conf_value !== password_value)
        {
            error.innerHTML = "Passwords don't match!";
            conf.style.border = "solid 0.1vw red";
            submit.disabled = true;
    
        }else
        {
            if (uppercase(password_value) && lowercase(password_value) && number(password_value) && conf_value === password_value && count_password >= 8 && count_password <= 20) 
            {
                error.innerHTML = "";
                conf.style.border = "solid 0.1vw green";
                password.style.border = "solid 0.1vw green";
                submit.disabled = false;
            }
        }

        if (count_password === 0)
        {
            error.innerHTML = "";
            password.style.border = "solid 0.1vw grey";
            submit.disabled = false;
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
                    conf.style.border = "solid 0.1vw grey";
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
email.addEventListener('input', function(){
    var email_value = document.getElementById("email").value.trim();
    var count_email = email.value.length;

    if (count_email === 0) 
    {
        error.innerHTML = "";
        submit.disabled = false;
        email.style.border = "solid 0.1vw grey";
    }else
    {
        if (!email_verify(email_value))
        {
            error.innerHTML = "Invalid E-Mail address!";
            email.style.border = "solid 0.1vw red";
            submit.disabled = true;
        }else
        {
            error.innerHTML = "";
            email.style.border = "solid 0.1vw green";
            submit.disabled = false;
        }
    }

    function email_verify(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    };
});

submit.addEventListener('click',function(event){
    
    var count_username = username.value.length;
    var count_email = email.value.length;
    var count_password = password.value.length;
    var count_conf = conf.value.length;
    var password_value = document.getElementById("password").value;
    var conf_value = document.getElementById("confirm").value;

    if (count_username === 0 && count_email > 0 && count_password > 0 && count_conf > 0)
    {
        event.preventDefault();
        error.innerHTML = "Please complete the Username!";

        username.style.border = "solid 0.1vw red";
        email.style.border = "solid 0.1vw grey";
        password.style.border = "solid 0.1vw grey";
        conf.style.border = "solid 0.1vw grey";

    }else
    {
        if (count_username > 0 && count_email === 0 && count_password > 0 && count_conf > 0)
        {
            event.preventDefault();
            error.innerHTML = "Please complete the E-Mail!";

            username.style.border = "solid 0.1vw grey";
            email.style.border = "solid 0.1vw red";
            password.style.border = "solid 0.1vw grey";
            conf.style.border = "solid 0.1vw grey";

        }else
        {
            if (count_username > 0 && count_email > 0 && count_password === 0 && count_conf > 0)
            {
                event.preventDefault();
                error.innerHTML = "Please complete the Password!";

                username.style.border = "solid 0.1vw grey";
                email.style.border = "solid 0.1vw grey";
                password.style.border = "solid 0.1vw red";
                conf.style.border = "solid 0.1vw grey";
            }else
            {
                if (count_username > 0 && count_email > 0 && count_password > 0 && count_conf === 0)
                {
                    event.preventDefault();
                    error.innerHTML = "Please confirm the Password!";

                    username.style.border = "solid 0.1vw grey";
                    email.style.border = "solid 0.1vw grey";
                    password.style.border = "solid 0.1vw grey";
                    conf.style.border = "solid 0.1vw red";
                }
                else
                {
                    if (count_username === 0 && count_email === 0 && count_password > 0 && count_conf > 0)
                    {
                        event.preventDefault();
                        error.innerHTML = "Please complete the Username and the E-Mail!";

                        username.style.border = "solid 0.1vw red";
                        email.style.border = "solid 0.1vw red";
                        password.style.border = "solid 0.1vw grey";
                        conf.style.border = "solid 0.1vw grey";
                    }else
                    {
                        if (count_username > 0 && count_email === 0 && count_password === 0 && count_conf > 0)
                        {
                            event.preventDefault();
                            error.innerHTML = "Please complete the E-mail and the Password!";

                            username.style.border = "solid 0.1vw grey";
                            email.style.border = "solid 0.1vw red";
                            password.style.border = "solid 0.1vw red";
                            conf.style.border = "solid 0.1vw grey";
                        }else
                        {
                            if (count_username > 0 && count_email > 0 && count_password === 0 && count_conf === 0)
                            {
                                event.preventDefault();
                                error.innerHTML = "Please complete the Password and the Password Confirmation!";

                                username.style.border = "solid 0.1vw grey";
                                email.style.border = "solid 0.1vw grey";
                                password.style.border = "solid 0.1vw red";
                                conf.style.border = "solid 0.1vw red";
                            }else
                            {
                                if (count_username === 0 && count_email > 0 && count_password === 0 && count_conf > 0)
                                {
                                    event.preventDefault();
                                    error.innerHTML = "Please complete the Username and the Password!";
                                    
                                    username.style.border = "solid 0.1vw red";
                                    email.style.border = "solid 0.1vw grey";
                                    password.style.border = "solid 0.1vw red";
                                    conf.style.border = "solid 0.1vw grey";
                                }else
                                {
                                    if (count_username > 0 && count_email === 0 && count_password > 0 && count_conf === 0)
                                    {
                                        event.preventDefault();
                                        error.innerHTML = "Please complete the E-Mail and the Password Confirmation!";
                                        
                                        username.style.border = "solid 0.1vw grey";
                                        email.style.border = "solid 0.1vw red";
                                        password.style.border = "solid 0.1vw grey";
                                        conf.style.border = "solid 0.1vw red";
                                    }else
                                    {
                                        if (count_username === 0 && count_email > 0 && count_password > 0 && count_conf === 0)
                                        {
                                            event.preventDefault();
                                            error.innerHTML = "Please complete the Username and the Password Confirmation";
                                            
                                            username.style.border = "solid 0.1vw red";
                                            email.style.border = "solid 0.1vw grey";
                                            password.style.border = "solid 0.1vw grey";
                                            conf.style.border = "solid 0.1vw red";
                                        }else
                                        {
                                            if (count_username === 0 && count_email === 0 && count_password === 0 && count_conf > 0)
                                            {
                                                event.preventDefault();
                                                error.innerHTML = "Please complete the Username, the E-Mail and the Password";
                                                
                                                username.style.border = "solid 0.1vw red";
                                                email.style.border = "solid 0.1vw red";
                                                password.style.border = "solid 0.1vw red";
                                                conf.style.border = "solid 0.1vw grey";
                                            }else
                                            {
                                                if (count_username > 0 && count_email === 0 && count_password === 0 && count_conf === 0)
                                                {
                                                    event.preventDefault();
                                                    error.innerHTML = "Please complete the E-mail, the Password and the Password Confirmation";
                                                    
                                                    username.style.border = "solid 0.1vw grey";
                                                    email.style.border = "solid 0.1vw red";
                                                    password.style.border = "solid 0.1vw red";
                                                    conf.style.border = "solid 0.1vw red";
                                                }else
                                                {
                                                    if (count_username === 0 && count_email > 0 && count_password === 0 && count_conf === 0)
                                                    {
                                                        event.preventDefault();
                                                        error.innerHTML = "Please complete the Username, the Password and the Password Confirmation";
                                                        
                                                        username.style.border = "solid 0.1vw red";
                                                        email.style.border = "solid 0.1vw grey";
                                                        password.style.border = "solid 0.1vw red";
                                                        conf.style.border = "solid 0.1vw red";
                                                    }else
                                                    {
                                                        if (count_username === 0 && count_email === 0 && count_password > 0 && count_conf === 0)
                                                        {
                                                            event.preventDefault();
                                                            error.innerHTML = "Please complete the Username, the E-Mail and the Password Confirmation";
                                                            
                                                            username.style.border = "solid 0.1vw red";
                                                            email.style.border = "solid 0.1vw red";
                                                            password.style.border = "solid 0.1vw grey";
                                                            conf.style.border = "solid 0.1vw red";
                                                        }else
                                                        {
                                                            if (count_username === 0 && count_email === 0 && count_password === 0 && count_conf === 0)
                                                            {
                                                                event.preventDefault();
                                                                error.innerHTML = "Please complete the Form!";
                                                                
                                                                username.style.border = "solid 0.1vw red";
                                                                email.style.border = "solid 0.1vw red";
                                                                password.style.border = "solid 0.1vw red";
                                                                conf.style.border = "solid 0.1vw red";
                                                            }else
                                                            {
                                                                if (!uppercase(password_value) || !lowercase(password_value) || !number(password_value))
                                                                {
                                                                    event.preventDefault();
                                                                    error.innerHTML = "Please complete the Password correctly!";
                                                                
                                                                    password.style.border = "solid 0.1vw red";
                                                                }else
                                                                {
                                                                    if (conf_value !== password_value)
                                                                    {
                                                                        event.preventDefault();
                                                                        error.innerHTML = "Passwords don't match!";

                                                                        conf.style.border = "solid 0.1vw red";
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
