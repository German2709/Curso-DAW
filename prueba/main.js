// esto es el contenedor de palabras
const palabras = [
    "loro",
    "pez",
    "vaca",
    "cangrejo"
]
// esto es para crear el contenedor donde iran las palabras, en este caso se llamará "displayPalabra"
let displayPalabra=document.getElementById('palabra');

// esto es donde se cogera los strings del array "palabras" de forma aleatoria
// se crea una variable donde "Math.random()" devuelve un nº entre 0 a <1 (por ejem. 0,1145 o 0,17236)
// palabras.length es el nº de palabras que tiene cada string del array palabras
// al multiplicarlos daria como resultado un numero decimal, pero para redondear se aplica "Math.floor" que daria un nº entero
// donde por ejm el nº 3 de la palabra vaca seria la ultima a y xq v es 0 
let random=Math.floor(Math.random()*palabras.length);

// la variable palabra almacenará cada string aleatoriamente 
let palabra=palabras[random];

// la variable cantidad almacena el numero de letras del string(palabra) elegido
let cantidad=palabra.length;

// la variable texto almacenara la letra si se acierta con la letra o guiones al comienzo y/o al no acertar 
let texto="";

// se crea un bucle donde se contara la cantidad de letras q alcenara el displayPalabra
for (let inicio = 0; inicio < cantidad; inicio++) {
    texto+="_"
}

// se imprimirá los guiones xq innerhtml es igual a texto si la cambio a palabra se imprime la palabra ramdon que seleccionó el sistema
displayPalabra.innerHTML=texto;

// se seleccionará los botones que estan dentro del contenedor div "botones"
const boton=document.getElementById('botones').childNodes;

// Despues que se hace un bucle para q recorra todos los botones se le va a añadir un "addEventListener"
// Event Listener es asignarle un elemento(en este caso seria como el "onclick")
for (let i = 0; i < boton.length; i++) {
    boton[i].addEventListener('click',juego)
}

// Declaramos una variable en la que iremos guardando los aciertos
let aciertos = [];

function juego(){
    let letra=this.innerHTML;
    letra=letra.toLowerCase();

    for (let i = 0; i < palabra.length; i++) {}

    // if (palabra[i]==letra) {
        
    //     aciertos[i]=letra;
    // }
    displayPalabra.innerHTML=letra;
}
