//Se encarga de mostrar la contraseña en el registro (funciona)
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

//Se encarga de mostrar la contraseña en el inicio de sesión (funciona)
function mostrarContraIn() {
    var contraIn = document.getElementById("contraIn");
    if (contraIn.type === "password") {
        contraIn.type = "text";
    } else {
        contraIn.type = "password";
    }
}

//Determina si el user es válido (funciona)
var isUsernameValid = true;

async function usuarioE() {
    var username = document.getElementById("nombreUsuarioRe").value;
    console.log ("Ayuda");
    try {
        const response = await fetch("../dynamics/php/validarRe.php", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `username=${username}`
        });
        console.log(response);
        if (response.status === 200) {
            const responseText = await response.text();
            console.log(responseText);
            if (responseText === "1") {
                isUsernameValid = false;
            } else {
                isUsernameValid = true;
            }
        } else {
            throw new Error("Error en la solicitud");
        }
    } catch (error) {
        console.log(error);
    }
}

//Valida datos de registro (funciona)
async function validarDatosRe(event) {
    event.preventDefault();

    await usuarioE();

    if (!isUsernameValid) {
        alert("Este nombre de usuario ya está en uso.");
        return false;
    }

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
    try {
        const response = await fetch("../dynamics/php/registroDatos.php", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `nombreRe=${nombreRe}&nombreUsuarioRe=${nombreUsuarioRe}&contraRe=${contraRe}&confirmarContraRe=${confirmarContraRe}`
        });

        if (response.status === 200) {
            const responseText = await response.text();
            // Aquí puedes manejar la respuesta del servidor, por ejemplo, redirigir a otra página si el registro fue exitoso
            window.location.href = "./seleccionarCasa.php";
        } else {
            throw new Error("Error en la solicitud");
        }
    } catch (error) {
        console.log(error);
    }
}

//Valida datos de inicio de sesión (funciona)
async function validarDatosIn(event) {
    event.preventDefault();

    var username = document.getElementById("nombreUsuarioIn").value;
    var password = document.getElementById("contraIn").value;

    try {
        const response = await fetch("../dynamics/php/validarInicioSesion.php", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `username=${username}&password=${password}`
        });

        if (response.status === 200) {
            const responseText = await response.text();
            if (responseText === "1") {
                window.location.href = "paginaInicio.html"; // O la página a la que quieras redirigir después del inicio de sesión exitoso
            } else {
                alert("Nombre de usuario o contraseña incorrectos.");
            }
        } else {
            throw new Error("Error en la solicitud");
        }
    } catch (error) {
        console.log(error);
    }
}


