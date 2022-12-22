let select = document.getElementById("select");
let txt_ville = document.getElementById("txt_ville");

select.addEventListener("change", function(e){
    if(select.options[select.selectedIndex].innerText=="Autre"){
        txt_ville.disabled = false;
        txt_ville.placeholder = "merci d'insérer votre ville";
    }
})