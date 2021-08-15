var email = document.getElementById("new_email");
var password = document.getElementById("password");
var submit = document.getElementById("submit");
var error = document.getElementById("error");

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

email.addEventListener('input', function(){
    var email_value = document.getElementById("new_email").value.trim();
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
    
    var count_email = email.value.length;
    var count_password = password.value.length;
    var password_value = document.getElementById("password").value;

    if (count_email > 0 && count_password === 0)
    {
        event.preventDefault();
        error.innerHTML = "Please complete the Password!";

        email.style.border = "solid 0.1vw grey";
        password.style.border = "solid 0.1vw red";

    }else
    {
        if (count_email === 0 && count_password > 0)
        {
            event.preventDefault();
            error.innerHTML = "Please complete the E-Mail!";

            email.style.border = "solid 0.1vw red";
            password.style.border = "solid 0.1vw grey";

        }else
        {
            if (count_email === 0 && count_password)
            {
                event.preventDefault();
                error.innerHTML = "Please complete the Form!";
                
                email.style.border = "solid 0.1vw red";
                password.style.border = "solid 0.1vw red";
            }else
            {
                if (!uppercase(password_value) || !lowercase(password_value) || !number(password_value))
                {
                    event.preventDefault();
                    error.innerHTML = "Please complete the Password correctly!";
                
                    password.style.border = "solid 0.1vw red";
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
