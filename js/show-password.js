const showPasswordBtn = document.getElementById("show-password");
const password = document.getElementById("password");
const showPasswordPhrase = document.getElementById("shw-btn-phrs");

showPasswordBtn.addEventListener("click",function(){
    if(password.type === "password"){
        password.type = "text";
        showPasswordPhrase.textContent="Hide Password";
    }
    else{
        password.type = "password";
        showPasswordPhrase.textContent="Show Password";
        }  
})