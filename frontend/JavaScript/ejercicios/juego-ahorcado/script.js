//Creamos un array con las distintas palabras del juego
const palabras = [
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
let displayPalabra = document.getElementById('palabra');

//Elegimos una palabra del array
//Escoger un numero al azar
let random = Math.floor(Math.random() * palabras.length);  //0-6 (segun la cantidad de items, en este caso son 7 pero donde se cuenta desde 0) sin decimales

// Cada vez que se carga la pagina se seleccionará un item del array con el indice aleatorio
let palabra = palabras[random];

// Imprimimos la palabra
// Contamos la longitud de la palabra(número de letras que tiene)
let longitud = palabra.length;
// console.log(longitud);

let texto = "";
for (let indice = 0; indice < longitud; indice++) {
    // guardo un guion en la variable por cada letra que tiene nuestra palabra
    texto += "_";
}
// Se imprimen los guiones ocultando la palabra del juego
displayPalabra.innerHTML = texto;

// BOTONES  
// Vamos a asignar el elemento click a cada boton desde js
// Así nos ahorramos tener que escribir en cada boton en html un "onclick"

// Con clases
// Seleccionamos todos los elementos que tengan una clase
// Al guardar elementos por clase, me los devuelve en un ARRAY
// const botones = document.getElementsByClassName('btn');

// Seleccionamos los hijos del div "tablero". los hijos son los botonos que tiene el div
const botones = document.getElementById('tablero').childNodes;

// Vamos a añadir un Event Listener a cada boton
// Event Listener es asignarle un elemento al html que ejecutará un bloque de codigo cuando el evento se cumpla, por ejemplo al hacer click a un boton o cuando pasemos en raton o cursor por encima (hover)

for (let i = 0; i < botones.length; i++) {
    botones[i].addEventListener("click", juego);
}

// Declaramos una variable en la que iremos guardando los aciertos
let aciertos = [];
// Contador de aciertos
let contador = 0;

// vidas del usuario
let vidas=5;

// Digamos que tenemos la palabra "perro" y pulsamos a O
// Queremos guardar aquellas letras que hemos acertado
let ejemplo = [
    "_",  //p
    "_",  //e
    "_",  //r
    "_",  //r
    "o"
]
// Entonces, seguimos mostando al usuario el cambio en pantalla podemos imrprimir el contenido del array
// "_ _ _ _ o"

// Si luego pulsamos la "r" el resultado quedaria:
ejemplo = [
    "_",  //p
    "_",  //e
    "r",
    "r",
    "o"
]
// Y si imprimimos los cambios el resultado seria "_ _ r r o"

function juego() {
    console.log("has pulsado un boton")
    // Tomamos el contexto del boton con "this"
    // Guardamos la letra que contiene el boton en una variable
    let letra = this.innerHTML;
    // Transformo la letra en minuscula
    letra = letra.toLowerCase();

    // Contamos los éxitos cada vez que pulsamos un botón, si no hay, restamos una vida
    let exitos=0;

    // Recorremos la palabra caracter a caracter en busca de coicidencias con la letra pulsada
    for (let i = 0; i < palabra.length; i++) {
        console.log(palabra[i]);

        // Comprobamos si la letra de la palabra coicide con la letra del boton
        if (palabra[i] == letra) {
            console.log('hay una coicidencia')
            // Guardamos la letra acertada en el array de aciertos en la misma posición que tiene en la palabra
            aciertos[i] = letra;

            // Cada vez que hay un acierto, el contador aumenta igual los exitos
            contador++;
            exitos++;
        } else if (!aciertos[i]) {
            // Si entra en el else, es q no han habido coincidencias
            // La condicion if solo se cumple cuando la posicion i de la array no tiene ningun valor
            aciertos[i] = "_";

        }
    }
    // Si no hay éxitos al pulsar el botón me resto una vida
    if (exitos == 0) {
        vidas--;
        this.style.backgroundColor = 'red';
    } else {
        this.style.backgroundColor = 'green';
    }
    // Creamos el string para imprimir en pantalla y le quitamos las comas del array
    // Sin el join las palabras se verian con una coma seguida de la letra
    texto = aciertos.join("")
    displayPalabra.innerHTML = texto;
    console.log(letra);

    // al final comprobamos si hemos ganado
    ganar();
}

// Creamos una función donde comprobemos si hemos ganado la partida y en ese caso, mostrar un mensaje
function ganar() {
    // Comprobar que el número de aciertos es igual a la longitud de la palabra.
    if (contador == palabra.length) {
        // mensaje de has ganado
        setTimeout(function () {
            // Le pones un retardo para que se pueda visualizar el resultado antes de mostrar el mensaje
            // window.alert('Has Ganado');
            // location.reload();
        }, 500);

    }

    // Comprobar que ya no hay guines en el array aciertos.
    // contador de guiones
    let guiones = 0;

    // Recorremos el array de aciertos en busca de guiones
    for (let i = 0; i < aciertos.length; i++) {
        if (aciertos[i]== "_") {
            guiones++;
        }

    }
    // Si hemos contado los guiones y no hay, es que la palabra esta completa y por tanto hemos ganado
    if (guiones == 0) {
        setTimeout(function () {
            window.alert('Has Ganado');
            location.reload();
        }, 500);
    }

}