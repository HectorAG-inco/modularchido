function confimar(e) {
    if (confirm("¿Estas seguro de que deseas eliminar el Registro?")) {
        return true;
    }
    else{
        e.preventDefault();
    }
}
let linkDelete = document.querySelectorAll(".table__item__link");

for(var i = 0; i < linkDelete; i++){
    linkDelete[i].addEventListener('click', confimar);
}