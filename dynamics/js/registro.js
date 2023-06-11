window.addEventListener ("load",()=>{


    let response = await fetch("./casas.js");

    if (response.ok) { // si el HTTP-status es 200-299
    // obtener cuerpo de la respuesta (método debajo)
      let json = await response.json();
    } else {
        alert("Error-HTTP: " + response.status);
    }

});