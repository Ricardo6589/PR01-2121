window.onload = function() {
    document.getElementById("element_2").onblur = validaTexto;
    document.getElementById("element_2_1").onblur = validaTexto;
    document.getElementById("element_2_2").onblur = validaTexto;
    document.getElementById("element_3").onblur = validaNum;
    document.getElementById("element_5").onblur = validaTexto;
    document.getElementById("element_4").onblur = validaEmail;

    document.getElementById("element_1").focus();
}