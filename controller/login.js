function validateEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
    return emailRegex.test(email);
  }
function verif_login(){
    email=document.getElementById("email").value;
    password=document.getElementById("password").value;
    if (validateEmail(email)) 
        {
            if (validatePassword(password))
                {
                return true;
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
    const minLength = 6;
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

function changeColor(elementId) {
    document.getElementById(elementId).classList.add('error');
  }