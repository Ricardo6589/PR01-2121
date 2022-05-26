window.onload = function() {
    document.getElementById("element_1").onblur = validaTexto;
    document.getElementById("element_2").onblur = validaEmail;
    document.getElementById("element_3").onblur = validaTexto;

    document.getElementById("element_1").focus();
}