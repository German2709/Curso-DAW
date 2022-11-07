// Queremos tomar la hora actual y para ello nos vamos a servir de el objeto fecha Date()
// Date() es un objeto predefinido en JavaScript que contiene todos los datos de fecha y hora actualizados. 
// De este objeto podemos obtener, por ejemplo, la hora actual de cualquier zona horaria y el dia de la semana en la que estamos, ect.

function clock() {
    // Creamos una copia del objeto fecha
    let fecha = new Date();

    // Obtenemos la hora actual
    let hora = fecha.getHours();  // Esto nos dara un resultado de 0 a 23
    let minutos = fecha.getMinutes();  // de 0 a 59
    let segundos = fecha.getSeconds();   // de 0 59
    let contexto='AM';

    let reloj = document.getElementById('pantallaReloj');

    // Damos formato a los números
    // formato 12h
    if (hora > 12){
        hora=hora-12;  // Si la hora es 13 me cambiará a 1
        contexto='PM';
    }

    if (hora < 10) {
        hora = "0" + hora;
    }
    if (minutos < 10) {
        minutos = "0" + minutos;
    }
    if (segundos < 10) {
        segundos = "0" + segundos;
    }

    let texto = hora + ':' + minutos + ':' + segundos+' '+contexto;

    reloj.innerHTML = texto;

    // Le damos a la funcion la posibilidad de que se ejecute en bucle.
    setTimeout(clock, 1000);
    // El timeup ejecuta la funcion indicada despues de una pausa de los milisegundos indicados.
    // Al final de la función clock se va a ejecutar asi misma tras una pausa de un segundo o 1000 milisegundos, creando asi un bucle.
}
// Inicializar la funcion 
clock();

function fechaHoy(){
    let fecha=new Date();
    let dia=fecha.getDay();
    let numero=fecha.getDate();
    let mes=fecha.getMonth();
    let year=fecha.getFullYear();

    const dias=[
        "domingo",
        "lunes",
        "martes",
        "miercoles",
        "jueves",
        "viernes",
        "sabado"
    ]
    const meses=[
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre"
    ]

    document.getElementById('nomDia').innerHTML=dias[dia]; 
    document.getElementById('diaMes').innerHTML=numero; 
    document.getElementById('mes').innerHTML=meses[mes]; 
    document.getElementById('year').innerHTML=year; 
}
fechaHoy();