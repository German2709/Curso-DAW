function colorChange(){
    // una fución es un bloque de codigo que se puede reutilizar
    // para cambiar el parrafo de color, lo primero es identificar y apuntar al parrafo
    document.getElementById('pColor').style.color='lightblue';
    document.getElementById('pColor').style.backgroundColor='rgb(60,60,60)';
}

function showDate(){
    document.getElementById('pDate').innerHTML=new Date();
    // Date() es un objeto predifinido de JS, contiene todos los datos referentes a la fecha actual( dia de la semana, fecha, hora, año...).
    // Cada vez que pulsamos al botón la hora se actualiza. Esto es gracias a la palabra "new" que genera un nuevo objeto fecha cada vez que se ejecuta
}

function hideShow(){
    var condition=document.getElementById('pHide').style.visibility;
    // condition es una variable , y guarda un dato. Es este caso guarda el valor de la visibilidad del parrafo. Puede ser 'hiden' o 'visible'
    // el simbolo igual significa que le estamos asignando un valor.
    if (condition =='hidden') {
        // si la condicion se cumple, el elemento que es invisible se ejecuta el codigo contenido en las llaves.
        document.getElementById('pHide').style.visibility='visible';
    }else{
        // si la condición de arriba no se cumple, es decir que el objeto es visible, el if es ignorado, y se ejecuta el else
        document.getElementById('pHide').style.visibility='hidden';
    }
}
// interruptor de luz
// daclaramos las variables y guardamos los datos
// esto ocurrirá cuando se cargue el documento en el navegador
var bombilla=document.getElementById('bulb');
var estado="apagada";
// estado me sirve para hacer un seguimiento del estado de la bombilla;
var encendida="../recursos/bombilla-encendida.gif";
var apagada="../recursos/bombilla-apagada.gif";
// estas dos variables guardan una cadena de texto para ahorrar tiempo

function bulbChange(){
    if (estado=="apagada") {
       bombilla.src=encendida;
       estado="encendida";
    }else{
        bombilla.src=apagada;
        estado="apagada";
    }
}