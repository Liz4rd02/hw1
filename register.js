function contieneCarattereSpeciale(stringa) {
    const caratteriSpeciali = "!£/=?!@#$%^&*()-+'^\|.;,:_°[]<>";
    for (let i = 0; i < stringa.length; i++) {
        if (caratteriSpeciali.indexOf(stringa[i]) !== -1) {
            return true;
        }
    }
    return false;
}

function contieneCarattereNumerico(stringa) {
    const caratteriNumerici = "0123456789";
    for (let i = 0; i < stringa.length; i++) {
        if (caratteriNumerici.indexOf(stringa[i]) !== -1) {
            return true;
        }
    }
    return false;
}

async function usernameAvaible(event){
    const response = await fetch("http://127.0.0.1/usedUsername.php?username=" + form.username.value);
    const result = await response.text();
    if(result == "0") {
        return true;
    }
    else {
        return false;
    }
}

async function verifyUsername(event){
    const usernameInput = event.currentTarget;
    if(usernameInput.value.length == 0){
        document.querySelector(".invalid_data.username").textContent="Compilare il campo username!";
        inv_data2 = document.querySelector(".inv2");
        if(inv_data2 !== null) inv_data2.remove();
        document.querySelector(".invalid_data.username").classList.remove("hidden");
        error_username = true;
    }
    else if(usernameInput.value.length > 16){
        document.querySelector(".invalid_data.username").textContent="lunghezza max username/password: 16 caratteri.";
        inv_data2 = document.querySelector(".inv2");
        if(inv_data2 !== null) inv_data2.remove();
        document.querySelector(".invalid_data.username").classList.remove("hidden");
        error_username = true;
    }  
    else if(await usernameAvaible(event) == false){
        document.querySelector(".invalid_data.username").textContent="username già in uso";
        inv_data2 = document.querySelector(".inv2");
        if(inv_data2 !== null) inv_data2.remove();
        document.querySelector(".invalid_data.username").classList.remove("hidden"); 
        error_username = true;
    }

    else {
        error_username = false;
        document.querySelector(".invalid_data.username").classList.add("hidden");
    }
}

function verifyPassword(event){
    const passwordInput = event.currentTarget;

    if(passwordInput.value.length == 0){
        document.querySelector(".invalid_data.password").textContent="Compilare il campo password!";
        inv_data2 = document.querySelector(".inv2");
        if(inv_data2 !== null) inv_data2.remove();
        document.querySelector(".invalid_data.password").classList.remove("hidden");
        error_password = true;
    }
    else if(passwordInput.value.length > 16){
        document.querySelector(".invalid_data.password").textContent="lunghezza max username/password: 16 caratteri.";
        inv_data2 = document.querySelector(".inv2");
        if(inv_data2 !== null) inv_data2.remove();
        document.querySelector(".invalid_data.password").classList.remove("hidden");
        error_password = true;
    } 
    else if(!contieneCarattereSpeciale(passwordInput.value) || !contieneCarattereNumerico(passwordInput.value)){
        document.querySelector(".invalid_data.password").textContent="la password richiede almeno 1 carattere speciale e numerico.";
        inv_data2 = document.querySelector(".inv2");
        if(inv_data2 !== null) inv_data2.remove();
        document.querySelector(".invalid_data.password").classList.remove("hidden");
        error_password = true;
    }  
    else{
        error_password = false;
        document.querySelector(".invalid_data.password").classList.add("hidden");
    }     
}

function verifyClientSide(event){
    console.log(error_username);
    console.log(error_password);
    if(error_password == true || error_username == true) event.preventDefault();  
}

let error_username = false;
let error_password = false;
const form = document.forms['login_form'];
form.username.addEventListener('blur', verifyUsername);
form.password.addEventListener('blur', verifyPassword);
form.addEventListener('submit', verifyClientSide);