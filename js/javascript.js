

function animacionLogo() {
	var logo = document.querySelector('.logo__intro').style;
	logo.transform = 'rotate(360deg)';
	logo.opacity = 1;
	setTimeout(function() {
		logo.opacity = 0;
	},2000);
	setTimeout(function() {
		logo.display = 'none';
		document.querySelector('.carrusel__contenedor').style.opacity = 1;
	},4000);
	
}



$(document).ready(function(){

  /*keyup.. cuando se levante una tecla ejecuateremos una funcion*/
  $('#busqueda').on('keyup', function(){
    var search = $('#busqueda').val()
    $.ajax({
      type: 'POST',
      url: 'includes/search.php',
      data: {'search': search}
    })
    .done(function(resultado){
      $('.galeria__inicial').html(resultado)
    })
    .fail(function(){
      alert('Hubo un error :(')
    })
  })
})

function carruselDer() {
	var carr1 = document.querySelector('.carrusel0');
	var carr2 = document.querySelector('.carrusel1');
	var carr3 = document.querySelector('.carrusel2');

	carr3.classList.replace('carrusel2', 'carrusel3');
	carr2.classList.replace('carrusel1', 'carrusel2');
	carr1.classList.replace('carrusel0', 'carrusel1');
	carr3.classList.replace('carrusel3', 'carrusel0');

}

function carruselIzq() {
	var carr1 = document.querySelector('.carrusel0');
	var carr2 = document.querySelector('.carrusel1');
	var carr3 = document.querySelector('.carrusel2');

	carr1.classList.replace('carrusel0', 'carrusel3');
	carr2.classList.replace('carrusel1', 'carrusel0');
	carr3.classList.replace('carrusel2', 'carrusel1');
	carr1.classList.replace('carrusel3', 'carrusel2');

}
			

	var titulosForm = document.querySelectorAll('.titulo__formulario');
	var initSesion = document.querySelector('.usuario__entrar');
	var regUser = document.querySelector('.usuario__registrar');
	var formularioUser = document.querySelector('.usuario__formulario');
	var menuUser = document.querySelector('.usuario__menu');


function abrirFormulario() {
		menuUser.classList.toggle('usuario__formulario__abierto');
		formularioUser.classList.toggle('usuario__formulario__abierto');
}

function activarFormUsuario(x) {
	
	if(x.id == 'entrar_usuario') {
		initSesion.style.width = '100%';
		regUser.style.width = '0%';
	}else if(x.id == 'registro_usuario') {
		initSesion.style.width = '0%';
		regUser.style.width = '100%';
	}

	for(y in titulosForm) {
		console.log(titulosForm[y].classList);
		console.log(y);
		titulosForm[y].classList.toggle('active');
	}
}

function buscarPublicaciones() {
	var busqueda = document.querySelector('.menu__buscar').value;
	window.location = 'index.php?busqueda='+busqueda+'#galeria__ancla';
}

function filtrarMedio() {
	var medio = document.querySelector('.med').value;
	window.location='index.php?medio='+medio+'#galeria__ancla';
}

function filtrarCategoria() {
	var categoria = document.querySelector('.cat').value;
	window.location='index.php?categoria='+categoria+'#galeria__ancla';
}
