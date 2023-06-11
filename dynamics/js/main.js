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

var isUsernameValid = true;

function usuarioE() {
    var username = document.getElementById("nombreUsuarioRe").value;
    console.log ("Ayuda");
    fetch("../dynamics/php/usuarioE.php?username=" + username, {
        method: "GET"
    })
        .then(function (response) {
            console.log(response);
            if (response.status === 200) {
                return response.text();
            } else {
                throw new Error("Error en la solicitud");
            }
        }).catch(function (error){
            console.log(error);
    })
        .then(function (responseText) {
            console.log(responseText);
            if (responseText === "1") {
                isUsernameValid = false;
            } else {
                isUsernameValid = true;
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}


function validarDatosRe() {
    new Promise((resolve) => {
        usuarioE();
        setTimeout(() => {
            resolve();
        }, 1000)
    }).then(() => {
        if (!isUsernameValid) {
            alert("Este nombre de usuario ya está en uso.");
            return false;
        }
    })

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
    window.location.href="../dynamics/php/registroDatos.php"
    return true;
}


