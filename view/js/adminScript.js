/* HIDE/SHOW PASSWORD */
function change(password, button) {
    var x = document.getElementById(password).type;
    
    if (x == 'password') {
        document.getElementById(password).type = 'text';
        document.getElementById(button).innerHTML = '<i class="far fa-eye-slash"></i>';
    } else {
        document.getElementById(password).type = 'password';
        document.getElementById(button).innerHTML = '<i class="far fa-eye"></i>';
    }
    
} 