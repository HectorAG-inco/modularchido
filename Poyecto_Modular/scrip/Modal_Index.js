(function (){
	var scrAlerta = document.getElementById("modAlerta"),
		btnCerrar = document.getElementById("Cerrar"), 
		btnAddUser = document.getElementById("modal-addUs"),
		modal = document.getElementById("modal");
		// txtTexto = document.getElementById("txtTexto"),
		// liLista = document.getElementById("lista"),
		// btnAceptar = document.getElementById("Guardar");
		

	btnAddUser.addEventListener("click", mostrar);
	btnCerrar.addEventListener("click", ocultar);
	// btnAceptar.addEventListener("click", agregar);

	function mostrar(){
		scrAlerta.classList.remove("oculto");
		modal.classList.remove("oculto");

	}
	function ocultar(){
		scrAlerta.setAttribute("class", "Alerta oculto");
		modal.setAttribute("class", "oculto");
	}
	// function agregar(){
	// 	var item = txtTexto.value.trim(),
	// 		elemento = document.createElement("li"),
	// 			contenido = document.createTextNode(item);
	// 	if (item == ""){
	// 		txtTexto.setAttribute("placeholder", "Tarea NO Valida");
	// 	}
	// 	else{
	// 		elemento.appendChild(contenido);
	// 		liLista.appendChild(elemento);
	// 		txtTexto.setAttribute("placeholder", "Tarea NO Valida");
	// 		txtTexto.value = "";
	// 		addEvento();
	// 	}
	// }
	// function marcar(){
	// 	this.classList.toggle("hecho");
	// 	eliminar();
	// }
	// function addEvento(){
	// 	for (var i = 0; i < liLista.children.length; i++) {
	// 		liLista.children[i].addEventListener("click", marcar);
	// 	}
	// }
	
}());