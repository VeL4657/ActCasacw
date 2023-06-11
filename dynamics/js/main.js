function mostrarContraRe() {
    var contraRe = document.getElementById("contraRe");
    var confirmarContraRe = document.getElementById("confirmarContraRe");
    if (contraRe.type === "password" || confirmarContraRe.type === "password") {
        contraRe.type = "text";
        confirmarContraRe.type = "text";
    } else {
        contraRe.type = "password";
        confirmarContraRe.type = "password";
    }
}

function mostrarContraIn() {
    var contraIn = document.getElementById("contraIn");
    if (contraIn.type === "password") {
        contraIn.type = "text";
    } else {
        contraIn.type = "password";
    }
}

function validarContrasena() {
    var contraRe = document.getElementById("contraRe").value;
    var confirmarContraRe = document.getElementById("confirmarContraRe").value;

    if (contraRe.length < 8) {
        alert("La contraseña debe tener al menos 8 caracteres");
        return false;
    }
    if (contraRe.length > 20) {
        alert("La contraseña debe tener máximo 20 caracteres");
        return false;
    }

    if (contraRe !== confirmarContraRe) {
        alert("Las contraseñas no coinciden");
        return false;
    }
    var tieneNumero = false;
    var tieneCaracterEspecial = false;
    for (var i = 0; i < contraRe.length; i++) {
        if (!isNaN(contraRe[i])) {
            tieneNumero = true;
        }
        if (/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(contraRe[i])) {
            tieneCaracterEspecial = true;
        }
    }

    if (!tieneNumero || !tieneCaracterEspecial) {
        alert("La contraseña debe tener al menos un número y un carácter especial");
        return false;
    }

    return true;
}

function guardarCasa(seleccionCasa) {
    localStorage.setItem('casaSeleccionada', seleccionCasa);
    console.log('Casa seleccionada:', seleccionCasa);
}
