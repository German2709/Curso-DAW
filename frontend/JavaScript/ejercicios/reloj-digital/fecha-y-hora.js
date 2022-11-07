let fecha = new Date();
document.getElementById('testFecha').innerHTML=fecha;

// Creando objetos fechas
// Con un string:
let fechaString=new Date('February 07,1999 04:15:00');
let fechaStringShort= new Date('1999-02-07 04:15:00');

document.getElementById('dateString').innerHTML=fechaStringShort;

// Con número
let fechaNum=new Date(2001, 06, 23);

document.getElementById('dateNumber').innerHTML=fechaNum;

// con milisegundos:
setInterval(() => {
    document.getElementById('fechaMs').innerHTML=new Date().getTime();    
}, 1);

document.getElementById('fechaMs2').innerHTML=new Date('1965-07-04').getTime();


// Imprimir fechas
// Con DateString
document.getElementById('fechaDateString').innerHTML=new Date().toDateString();

// metodos GET
// Construir un string para imprimir la fecha como queramos
// Hoy es lunes, 07 de noviembre del año 2022

function getFecha(){
    let fecha=new Date();
    let diaSemana=fecha.getDay();  //Esto me va a dar el dia de 0 a 6, por ejemplo si hoy es martes nos dara un 2, ya q cuenta desde el domingo
    let mesAño=fecha.getMonth();

    // if (diaSemana=0){
    //     diaSemana='Domingo';
    // }
    // if (diaSemana=1){
    //     diaSemana='Lunes';
    // }
    // if (diaSemana=2){
    //     diaSemana='Martes';
    // }
    // Esto no es recomendable porque habria q poner un if por cada dia de la semana
    // El metodo ideal para hacer esto es usando un array []
    // un array es un tipo especial de variables que puede guardar varios tipos de datos y que los clasifica usando un indece
    // Vamos a crear un array con los dias de la semana: 

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
    // cada elemento de la array pertenece a una posición del indice. Los indices de los array empiezan a contar desde 0.

    document.getElementById('fechaGet').innerHTML=dias[diaSemana];
    document.getElementById('mesGet').innerHTML=meses[mesAño];
}
getFecha();

function fechaGet(){
    let fecha=new Date();
    let diaSem=fecha.getDay();
    let diaMes=fecha.getDate();
    let mesYear=fecha.getMonth();
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

    document.getElementById('diaSem').innerHTML=dias[diaSem];
    document.getElementById('diaMes').innerHTML=diaMes;
    document.getElementById('mesAño').innerHTML=meses[mesYear];
    document.getElementById('año').innerHTML=year;
}

fechaGet();