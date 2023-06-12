window.addEventListener ("load",()=>{

    fetch("http://localhost/php/ActCasacw/Templates/seleccionarCasa.php")
    .then(response => response.json() )
    .then(data => { console.log(data) } )
    .catch(err=>console.log(err))
});