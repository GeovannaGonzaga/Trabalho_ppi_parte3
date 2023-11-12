function setCookie(cname, cvalue, exdays) {
}

function getCookie(cname) {
}

var cookieName = "aceitouTermos";
var aceitouTermos = getCookie(cookieName);

if (aceitouTermos !== "true") {
    if (confirm("Você concorda com nossos termos e condições?")) {
        setCookie(cookieName, "true", 365); 
    } else {
        window.location.href = "pagina_de_recusa.html"; 
    }
}