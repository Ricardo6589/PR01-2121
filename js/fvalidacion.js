var validaFormulario = function() {


}

var validaTexto = function(evento) {
    //console.log(evento.target.name);
    var valor = evento.target.value;
    if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
        document.getElementById(evento.target.id + "_msg").innerHTML = evento.target.name + " no puede estar vacio";
        evento.target.style.borderColor = "red";
        evento.target.style.borderWidth = "5px";
        evento.target.focus();
        return false;
    } else {
        document.getElementById(evento.target.id + "_msg").innerHTML = "";
        evento.target.style.borderColor = "black";
        evento.target.style.borderWidth = "1px";
    }
}
var validaDNI = function(evento) {
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

    if (!(/^\d{8}[A-Z]$/.test(evento.target.value))) {
        document.getElementById(evento.target.id + "_msg").innerHTML = evento.target.name + " no es correcto";
        console.log(evento.target.id);
        evento.target.style.borderColor = "red";
        evento.target.style.borderWidth = "5px";
        evento.target.focus();
        return false;
    } else {
        document.getElementById(evento.target.id + "_msg").innerHTML = "";
        evento.target.style.borderColor = "black";
        evento.target.style.borderWidth = "1px";
    }

    if (valor.charAt(8) != letras[(evento.target.value.substring(0, 8)) % 23]) {
        document.getElementById(evento.target.id + "_msg").innerHTML = evento.target.name + " no es correcto";
        evento.target.style.borderColor = "red";
        evento.target.style.borderWidth = "5px";
        evento.target.focus();
        return false;

    } else {
        document.getElementById(evento.target.id + "_msg").innerHTML = "";
        evento.target.style.borderColor = "black";
        evento.target.style.borderWidth = "1px";
    }

}
var validaEmail = function(evento) {
    var valor = evento.target.value
    if (!(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(valor))) {
        document.getElementById(evento.target.id + "_msg").innerHTML = evento.target.name + " no es válido";
        evento.target.style.borderColor = "red";
        evento.target.style.borderWidth = "5px";
        evento.target.focus();
        return false;
    } else {
        document.getElementById(evento.target.id + "_msg").innerHTML = "";
        evento.target.style.borderColor = "black";
        evento.target.style.borderWidth = "1px";
        document.getElementById('saveForm').style.display = 'block';

    }

}
var validaNum = function(evento) {
    var valor = evento.target.value;
    if (!(/^\d{9}$/.test(valor))) {
        document.getElementById(evento.target.id + "_msg").innerHTML = evento.target.name + " ha de contener 9 números";
        evento.target.style.borderColor = "red";
        evento.target.style.borderWidth = "5px";
        evento.target.focus();
        return false;
    } else {
        document.getElementById(evento.target.id + "_msg").innerHTML = "";
        evento.target.style.borderColor = "black";
        evento.target.style.borderWidth = "1px";
    }



}