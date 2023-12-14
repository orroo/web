function validateEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
    return emailRegex.test(email);
  }
function verif_register(){
    email=document.getElementById("email").value;
    password=document.getElementById("password").value;
    username=document.getElementById("username").value;
    if (validateEmail(email)) 
        {
            if (validatePassword(password))
                {
                    if (validateUsername(username)){
                        return true;
                    }
                    else{
                        changeColor("username");
                        return false;
                    }
                } 
            else
                {
                changeColor("password");
                return false;
                }
        }
    else
    {
        changeColor("email");
        return false;
    }
}
function validatePassword(password) {
    const minLength = 8;
    const hasUpperCase = /[A-Z]/.test(password);
    const hasLowerCase = /[a-z]/.test(password);
    const hasDigit = /\d/.test(password);
    if (
        password.length >= minLength &&
        hasUpperCase &&
        hasLowerCase &&
        hasDigit) {
        return true;
    } else {
        return false;
    }
}
function validateUsername(username) {
    const minLength = 4;
    const maxLength = 16;
    const validCharactersRegex = /^[a-zA-Z0-9_-]+$/;
    if (
        username.length >= minLength &&
        username.length <= maxLength &&
        validCharactersRegex.test(username)
    ) {
        return true;
    } else {
        return false;
    }
}
function changeColor(elementId) {
    document.getElementById(elementId).classList.add('error');
  }
  