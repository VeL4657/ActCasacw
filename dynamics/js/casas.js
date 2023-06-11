window.addEventListener ("load",()=>{
    let btnaj = document.getElementById("btnaj");
    let btnha = document.getElementById("btnha");
    let btnte = document.getElementById("btnte");

    btnaj.addEventListener("click", ()=>{
        document.cookie = "casa = 1; max-age=3600";
        // alert(document.cookie);
    });
    btnha.addEventListener("click", ()=>{
        document.cookie = "casa = 2; max-age=3600";
        // alert(document.cookie);
    });
    btnte.addEventListener("click", ()=>{
        document.cookie = "casa = 3; max-age=3600";
        // alert(document.cookie);
    });

  

});