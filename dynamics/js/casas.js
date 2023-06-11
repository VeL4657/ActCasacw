window.addEventListener ("load",()=>{
    let btnaj = document.getElementById("btnaj");
    let btnha = document.getElementById("btnha");
    let btnte = document.getElementById("btnte");

    document.cookie = "casachida = null; max-age=3600";

    btnaj.addEventListener("click", ()=>{
        document.cookie = "casachida = 1; max-age=3600";
        // alert(document.cookie);
    });
    btnha.addEventListener("click", ()=>{
        document.cookie = "casachida = 2; max-age=3600";
        // alert(document.cookie);
    });
    btnte.addEventListener("click", ()=>{
        document.cookie = "casachida = 3; max-age=3600";
        // alert(document.cookie);
    });
});