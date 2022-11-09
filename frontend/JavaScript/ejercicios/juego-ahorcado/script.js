//Creamos un array con las distintas palabras del juego
const palabras=[
    "perro",
    "conejo",
    "gato",
    "oso",
    "pollo",
    "langostino",
    "murcielago"
]
//Imprimir la palabra en pantalla
//Guardo el contenedor donde la vamos a mostrar
let displayPalabra=document.getElementById('palabra');

//Elegimos una palabra del array
//Escoger un numero al azar
let random=Math.floor(Math.random()*palabras.length);  //0-5 sin decimales
// console.log(random);
// Cada vez que se carga la pagina se seleccionará un item del array con el indice aleatorio
let palabra=palabras[random];

// Imprimimos la palabra
// Contamos la longitud de la palabra(número de letras que tiene)
let longitud=palabra.length;
// console.log(longitud);

let texto="";
for (let indice = 0; indice < longitud; indice++) {
    // guardo un guion en la variable por cada letra que tiene nuestra palabra
    texto+="_";
}
// Se imprimen los guiones ocultando la palabra del juego
displayPalabra.innerHTML=palabra;

// BOTONES  
// Vamos a asignar el elemento click a cada boton desde js
// Así nos ahorramos tener que escribir en cada boton en html un "onclick"

// Con clases
// Seleccionamos todos los elementos que tengan una clase
// Al guardar elementos por clase, me los devuelve en un ARRAY
// const botones = document.getElementsByClassName('btn');

// Seleccionamos los hijos del div "tablero". los hijos son los botonos que tiene el div
const botones=document.getElementById('tablero').childNodes;

// Vamos a añadir un Event Listener a cada boton
// Event Listener es asignarle un elemento al html que ejecutará un bloque de codigo cuando el evento se cumpla, por ejemplo al hacer click a un boton o cuando pasemos en raton o cursor por encima (hover)

for (let i = 0; i < botones.length; i++) {
    botones[i].addEventListener("click",test);
}
function test(){
    console.log("has pulsado un boton")
    // tomamos el contexto del boton con "this"
    // Guardamos la letra que contiene el boton en una variable
    let letra=this.innerHTML;
    // Transformo la letra en minuscula
    letra=letra.toLowerCase();

    let texto = "";
    // Recorremos la palabra caracter a caracter en busca de coicidencias con la letra pulsada
    for (let i = 0; i < palabra.length; i++) {
        console.log(palabra[i]);  

        // Comprobamos si la letra de la palabra coicide con la letra del boton
        if(palabra[i]==letra){
            console.log('hay una coicidencia')
            texto+=letra;
        } else{
            // Si entra en el else, es q no han habido coincidencias
            texto+="_";
        }
    }
    displayPalabra.innerHTML=texto;
    console.log(letra);
}