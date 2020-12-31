/* HIDE/SHOW PASSWORD */
function change(password) {
    var x = document.getElementById(password).type;

    if (x == 'password') {
        document.getElementById(password).type = 'text';
        document.getElementById('mybutton').innerHTML = '<i class="far fa-eye-slash"></i>';
    } else {
        document.getElementById(password).type = 'password';
        document.getElementById('mybutton').innerHTML = '<i class="far fa-eye"></i>';
    }
}
// function openContent(obj, idContentContainer) {
//     var i, x, tablinks;

//     x = document.getElementsByClassName("tabs");
//     for (i = 0; i < x.length; i++) {
//         x[i].style.display = "none";
//     }

//     tablinks = document.getElementsByClassName("tablink");
//     for (i = 0; i < x.length; i++) {
//         tablinks[i].className = tablinks[i].className.replace(" border-bottom border-primary border-5", "");
//     }

//     document.getElementById(idContentContainer).style.display = "block";
//     obj.className += " border-bottom border-primary border-5";
// }