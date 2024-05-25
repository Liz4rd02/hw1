function verifyClientSide(event){
    if(form.username.value.length == 0 || form.password.value.length == 0){
        event.preventDefault();
        document.querySelector(".invalid_data").textContent="Compilare tutti i campi!";
        inv_data2 = document.querySelector("#credenziali_errate");
        if(inv_data2 !== null) inv_data2.remove();
        document.querySelector(".invalid_data").classList.remove("hidden");
    }  
}

const form = document.forms['login_form'];
form.addEventListener('submit', verifyClientSide);

