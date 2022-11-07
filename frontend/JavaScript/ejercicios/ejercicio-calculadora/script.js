function calcular() {
    // Tomamos los datos que ha introducido el usuario
    var cuenta = document.getElementById('gasto').value;
    // para obtener la propina hay que multiplicar el gasto por la calidad del servicio para obtener el correspondiente porcentaje y por tanto la propina total
    var calidad = document.getElementById('servicio').value;
    var propinaT = (cuenta * calidad);
    // seguidamente dividir la propina entre el número de comensales para obtener lo que debe pagar cada uno
    var personas = document.getElementById('personas').value;
    var total = (propinaT / personas);

    var parrafo=document.getElementById('pResultado');

    if(total > 0){
        // Lo muestro porque está oculto por defecto
        parrafo.style.visibility='visible';
        // Y lo relleno con el texto que quiero mostrar
        parrafo.innerHTML=total.toFixed(2) + " € por persona"
    }
    // Imprimimos los datos en la consola
    // console.log(total);
}


