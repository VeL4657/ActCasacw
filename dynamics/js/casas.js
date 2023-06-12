window.addEventListener ("load",()=>{
    let btnaj = document.getElementById("btnaj");
    let btnha = document.getElementById("btnha");
    let btnte = document.getElementById("btnte");
    


    btnaj.addEventListener("click", (e)=>{
        e.preventDefault();
        document.cookie = "casa = 1; max-age=3600";
        window.location.href = "../dynamics/php/obtaincasa.php";
    });
    btnha.addEventListener("click", (e)=>{
        e.preventDefault();
        document.cookie = "casa = 2; max-age=3600";
        window.location.href = "../dynamics/php/obtaincasa.php";
    });
    btnte.addEventListener("click", (e)=>{
        e.preventDefault();
        document.cookie = "casa = 3; max-age=3600";
        window.location.href = "../dynamics/php/obtaincasa.php";
    });
});