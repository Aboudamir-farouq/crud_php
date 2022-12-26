let select = document.getElementById("select");
let txt_ville = document.getElementById("txt_ville");
let form = document.getElementById("form");
let id = document.getElementById("id");

select.addEventListener("change", function(e){
    if(select.options[select.selectedIndex].innerText=="Autre"){
        txt_ville.disabled = false;
        txt_ville.placeholder = "merci d'insérer votre ville";
    }
});

form.addEventListener("submit", function(e){
    e.preventDefault();
    id.disabled = false;
    form.submit()
}, true)
