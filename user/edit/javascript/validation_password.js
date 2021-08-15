var password = document.getElementById("current_password");
var new_password = document.getElementById("new_password");
var conf = document.getElementById("confirm_password");
var submit = document.getElementById("submit");
var error = document.getElementById("error");

password.addEventListener('input', function(){
        
    var count_password = password.value.length;
    var password_value = document.getElementById("current_password").value;
    var new_password_value = document.getElementById("new_password").value;

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
                                    if (!uppercase(password_value) && !lowercase(password_value) && !number(password_value))
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
                                            if (new_password_value === password_value)
                                            {
                                                error.innerHTML = "Passwords cannot be the same!";
                                                submit.disabled = true;

                                                new_password.style.border = "solid 0.1vw red";
                                                password.style.border = "solid 0.1vw grey";
                                                conf.style.border = "solid 0.1vw grey";
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

new_password.addEventListener('input', function(){
        
    var count_new_password = new_password.value.length;
    var count_conf = conf.value.length;
    var new_password_value = document.getElementById("new_password").value;
    var password_value = document.getElementById("current_password").value;
    var conf_value = document.getElementById("confirm_password").value;

    if (count_new_password === 0)
    {
        error.innerHTML = "";
        new_password.style.border = "solid 0.1vw grey";
        submit.disabled = false;
    }else
    {
        if (count_new_password < 8)
        {
            error.innerHTML = "Your new password must be at least 8 characters long!";
            new_password.style.border = "solid 0.1vw red";
            submit.disabled = true;
        }else
        {
            if (count_new_password > 20)
            {
                error.innerHTML = "Your new password must be less than 20 characters long!";
                new_password.style.border = "solid 0.1vw red";
                submit.disabled = true;
            }else
            {
                if (new_password_value === password_value)
                {
                    error.innerHTML = "Passwords cannot be the same!";
                    submit.disabled = true;

                    new_password.style.border = "solid 0.1vw red";
                    password.style.border = "solid 0.1vw grey";
                    conf.style.border = "solid 0.1vw grey";
                }else
                {
                    if (count_conf > 0 && new_password_value !== conf_value)
                    {
                        error.innerHTML = "Passwords don't match!";
                        conf.style.border = "solid 0.1vw red";
                        new_password.style.border = "solid 0.1vw grey";
                        submit.disabled = true;
                    }else
                    {
                        if (count_conf > 0 && new_password_value === conf_value)
                        {
                            error.innerHTML = "";
                            conf.style.border = "solid 0.1vw green";
                            submit.disabled = false;
                        }

                            if (!uppercase(new_password_value) && !lowercase(new_password_value) && !number(new_password_value)) 
                            {
                                error.innerHTML = "Your new password must contain at least one upper case character, one lower case character and one number!";
                                new_password.style.border = "solid 0.1vw red";
                                submit.disabled = true;
                            }else
                            {
                                if (uppercase(new_password_value) && !lowercase(new_password_value) && !number(new_password_value)) 
                                {
                                    error.innerHTML = "Your new password must contain at least one lower case character and one number!";
                                    new_password.style.border = "solid 0.1vw red";
                                    submit.disabled = true;
                                }else
                                {
                                    if (!uppercase(new_password_value) && lowercase(new_password_value) && !number(new_password_value)) 
                                    {
                                        error.innerHTML = "Your new password must contain at least one upper case character and one number!";
                                        new_password.style.border = "solid 0.1vw red";
                                        submit.disabled = true;
                                    }else
                                    {
                                        if (!uppercase(new_password_value) && !lowercase(new_password_value) && number(new_password_value)) 
                                        {
                                            error.innerHTML = "Your new password must contain at least one upper case character and one lower case character!";
                                            new_password.style.border = "solid 0.1vw red";
                                            submit.disabled = true;
                                        }else
                                        {
                                            if (!uppercase(new_password_value) && lowercase(new_password_value) && number(new_password_value)) 
                                            {
                                                error.innerHTML = "Your new password must contain at least one upper case character!";
                                                new_password.style.border = "solid 0.1vw red";
                                                submit.disabled = true;
                                            }else
                                            {
                                                if (uppercase(new_password_value) && !lowercase(new_password_value) && number(new_password_value)) 
                                                {
                                                    error.innerHTML = "Your new password must contain at least one lower case character!";
                                                    new_password.style.border = "solid 0.1vw red";
                                                    submit.disabled = true;
                                                }else
                                                {
                                                    if (uppercase(new_password_value) && lowercase(new_password_value) && !number(new_password_value)) 
                                                    {
                                                        error.innerHTML = "Your new password must contain at least one number!";
                                                        new_password.style.border = "solid 0.1vw red";
                                                        submit.disabled = true;
                                                    }else
                                                    {
                                                        error.innerHTML = "";
                                                        new_password.style.border = "solid 0.1vw green";
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
    }

    function uppercase (new_password) {
        return /[A-Z]/.test(new_password)
    };
    function lowercase (new_password) {
        return /[a-z]/.test(new_password)
    };
    function number (new_password) {
        return /[0-9]/.test(new_password)
    };
});

conf.addEventListener('input', function(){
    var conf_value = document.getElementById("confirm_password").value;
    var count_conf = conf.value.length;
    var new_password_value = document.getElementById("new_password").value;
    var count_new_password = new_password.value.length;
    var password_value = document.getElementById("current_password").value;


    if (count_conf === 0)
    {
        error.innerHTML = "";
        conf.style.border = "solid 0.1vw grey";
        submit.disabled = false;
    }else
    {
        if (conf_value !== new_password_value)
        {
            error.innerHTML = "Passwords don't match!";
            conf.style.border = "solid 0.1vw red";
            submit.disabled = true;
    
        }else
        {
            if (uppercase(new_password_value) && lowercase(new_password_value) && number(new_password_value) && conf_value === new_password_value && count_new_password >= 8 && count_new_password <= 20) 
            {
                error.innerHTML = "";
                conf.style.border = "solid 0.1vw green";
                new_password.style.border = "solid 0.1vw green";
                submit.disabled = false;
            }
        }

        if (count_new_password === 0)
        {
            error.innerHTML = "";
            new_password.style.border = "solid 0.1vw grey";
            submit.disabled = false;
        }else
        {
            if (!uppercase(new_password_value) && !lowercase(new_password_value) && !number(new_password_value)) 
            {
                error.innerHTML = "Your new password must contain at least one upper case character, one lower case character and one number!";
                new_password.style.border = "solid 0.1vw red";
                submit.disabled = true;
            }else
            {
                if (uppercase(new_password_value) && !lowercase(new_password_value) && !number(new_password_value)) 
                {
                    error.innerHTML = "Your new password must contain at least one lower case character and one number!";
                    new_password.style.border = "solid 0.1vw red";
                    submit.disabled = true;
                }else
                {
                    if (!uppercase(new_password_value) && lowercase(new_password_value) && !number(new_password_value)) 
                    {
                        error.innerHTML = "Your new password must contain at least one upper case character and one number!";
                        new_password.style.border = "solid 0.1vw red";
                        submit.disabled = true;
                    }else
                    {
                        if (!uppercase(new_password_value) && !lowercase(new_password_value) && number(new_password_value)) 
                        {
                            error.innerHTML = "Your new password must contain at least one upper case character and one lower case character!";
                            new_password.style.border = "solid 0.1vw red";
                            submit.disabled = true;
                        }else
                        {
                            if (!uppercase(new_password_value) && lowercase(new_password_value) && number(new_password_value)) 
                            {
                                error.innerHTML = "Your new password must contain at least one upper case character!";
                                new_password.style.border = "solid 0.1vw red";
                                submit.disabled = true;
                            }else
                            {
                                if (uppercase(new_password_value) && !lowercase(new_password_value) && number(new_password_value)) 
                                {
                                    error.innerHTML = "Your new password must contain at least one lower case character!";
                                    new_password.style.border = "solid 0.1vw red";
                                    submit.disabled = true;
                                }else
                                {
                                    if (uppercase(new_password_value) && lowercase(new_password_value) && !number(new_password_value)) 
                                    {
                                        error.innerHTML = "Your new password must contain at least one number!";
                                        new_password.style.border = "solid 0.1vw red";
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

    function uppercase (new_password) {
        return /[A-Z]/.test(new_password)
    };
    function lowercase (new_password) {
        return /[a-z]/.test(new_password)
    };
    function number (new_password) {
        return /[0-9]/.test(new_password)
    };
});

submit.addEventListener('click',function(event){
    
    var count_password = password.value.length;
    var count_new_password = new_password.value.length;
    var count_conf = conf.value.length;
    var new_password_value = document.getElementById("new_password").value;
    var password_value = document.getElementById("current_password").value;
    var conf_value = document.getElementById("confirm_password").value;


        if (count_new_password === 0 && count_password > 0 && count_conf > 0)
        {
            event.preventDefault();
            error.innerHTML = "Please complete the New Password!";

            password.style.border = "solid 0.1vw grey";
            new_password.style.border = "solid 0.1vw red";
            conf.style.border = "solid 0.1vw grey";
        }else
        {
            if (count_new_password > 0 && count_password === 0 && count_conf > 0)
            {
                event.preventDefault();
                error.innerHTML = "Please complete the Password!";

                new_password.style.border = "solid 0.1vw grey";
                password.style.border = "solid 0.1vw red";
                conf.style.border = "solid 0.1vw grey";
            }else
            {
                if (count_new_password > 0 && count_password > 0 && count_conf === 0)
                {
                    event.preventDefault();
                    error.innerHTML = "Please confirm the New Password!";

                    password.style.border = "solid 0.1vw grey";
                    new_password.style.border = "solid 0.1vw grey";
                    conf.style.border = "solid 0.1vw red";
                }else
                {                    
                    if (count_new_password === 0 && count_password === 0 && count_conf > 0)
                    {
                        event.preventDefault();
                        error.innerHTML = "Please complete the Password and the New Password !";

                        new_password.style.border = "solid 0.1vw red";
                        password.style.border = "solid 0.1vw red";
                        conf.style.border = "solid 0.1vw grey";
                    }else
                    {
                        if (count_new_password === 0 && count_password > 0 && count_conf === 0)
                        {
                            event.preventDefault();
                            error.innerHTML = "Please complete the New Password and the Password Confirmation!";

                            new_password.style.border = "solid 0.1vw red";
                            password.style.border = "solid 0.1vw grey";
                            conf.style.border = "solid 0.1vw red";
                        }else
                        {
                            if (count_new_password > 0 && count_password === 0 && count_conf === 0)
                            {
                                event.preventDefault();
                                error.innerHTML = "Please complete the Password and the Password Confirmation!";

                                new_password.style.border = "solid 0.1vw grey";
                                password.style.border = "solid 0.1vw red";
                                conf.style.border = "solid 0.1vw red";
                            }else
                            {
                                if (count_new_password === 0 && count_password === 0 && count_conf === 0)
                                {
                                    event.preventDefault();
                                    error.innerHTML = "Please complete the Form!";
                                                                        
                                    new_password.style.border = "solid 0.1vw red";
                                    password.style.border = "solid 0.1vw red";
                                    conf.style.border = "solid 0.1vw red";
                                }else
                                {
                                    if (!uppercase(new_password) || !lowercase(new_password) || !number(new_password))
                                    {
                                        event.preventDefault();
                                        error.innerHTML = "Please complete the New Password correctly!";
                                                                        
                                        new_password.style.border = "solid 0.1vw red";
                                        password.style.border = "solid 0.1vw grey";
                                        conf.style.border = "solid 0.1vw grey";
                                    }else
                                    {
                                        if (!uppercase(password_value) || !lowercase(password_value) || !number(password_value))
                                        {
                                            event.preventDefault();
                                            error.innerHTML = "Please complete the Password correctly!";
                                                                            
                                            new_password.style.border = "solid 0.1vw grey";
                                            password.style.border = "solid 0.1vw red";
                                            conf.style.border = "solid 0.1vw grey";
                                        }else
                                        {
                                            if (conf_value !== new_password_value)
                                            {
                                                event.preventDefault();
                                                error.innerHTML = "Passwords don't match!";

                                                new_password.style.border = "solid 0.1vw grey";
                                                password.style.border = "solid 0.1vw grey";
                                                conf.style.border = "solid 0.1vw red";
                                            }else
                                            {                
                                                if (new_password_value === password_value)
                                                {
                                                    error.innerHTML = "Passwords cannot be the same!";
                                                    submit.disabled = true;
                                
                                                    new_password.style.border = "solid 0.1vw red";
                                                    password.style.border = "solid 0.1vw grey";
                                                    conf.style.border = "solid 0.1vw grey";
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
    function uppercase (new_password) {
        return /[A-Z]/.test(new_password)
    };
    function lowercase (new_password) {
        return /[a-z]/.test(new_password)
    };
    function number (new_password) {
        return /[0-9]/.test(new_password)
    };
});
