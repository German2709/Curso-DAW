// Esta linea hace que el codigo espere a que el documento termine de cargar antes de ejecutarse.
$(document).ready(function(){
    //El codigo de JQuery va aqui

    // selector de JQuery
    $('#test').text('He cambiado el texto con JQuery');

    const p=$('#test');
    p.css('color','blue');

    // Crear una array a partir de numerosos elementos;
    const parrafos=$('p');
    parrafos.css('fontSize','30px')

    // Ejemplo de evento
    $('#btn').click(function(){
        $('#div').toggleClass('big')
    })
})

// Aqui podemos escribir vanilla JS
// DOM vanilla
// document.getElementById('test').style.color='red';
