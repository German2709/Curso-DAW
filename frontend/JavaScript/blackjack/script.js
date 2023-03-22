// variables para imprimir en pantalla
let casa=document.getElementById('cartasCasa');
let jugador=document.getElementById('cartasJugador');
let puntosC=document.getElementById('puntosCasa');
let puntosJ=document.getElementById('puntosJugador');
let result=document.getElementById('resultado');
let winner=document.getElementById('ganador');

let agregar=document.getElementById('juego');
agregar.addEventListener("click",ganador);

let start=document.getElementById('start');
start.addEventListener("click",empezarJuego);

// variables para almacenar los puntos y las cartas
let puntosCasa = 0;
let jugadaCasa = [];
let puntosJugador = 0;
let jugadaJugador = [];

// Juego de la casa
let cartasCasa = ["A", 2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K"];

// Juego del jugador
let cartasJugador = ["A", 2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K"];


function empezarJuego() {
    jugadaJugador = [];
    jugadaCasa=[];
    // Recogemos la dos cartas iniciales de la casa:
    jugar("casa");
    jugar("casa");


    // Recogemos la dos cartas iniciales del jugador:
    jugar("jugador");
    jugar("jugador");

}

function calcularPuntos() {
    // calcular los puntos desde cero cada vez q se agrega una nueva carta
    puntosCasa = 0;
    puntosJugador = 0;
    
    // recorremos el array y asignamos valores al As,J,Q y K.
    for (let i = 0; i < jugadaCasa.length; i++) {
        let as = false;
        switch (jugadaCasa[i]) {
            case "A":
                puntosCasa += 11;
                as = true;
                break;
            case "J":
            case "Q":
            case "K":
                puntosCasa += 10;
                break;

            default:
                puntosCasa += jugadaCasa[i];
                break;
        }
        if (puntosCasa > 21 && as) {
            puntosCasa -= 10;
        }
    }
    for (let i = 0; i < jugadaJugador.length; i++) {
        let as = false;
        switch (jugadaJugador[i]) {
            case "A":
                puntosJugador += 11;
                as = true;
                break;
            case "J":
            case "Q":
            case "K":
                puntosJugador += 10;
                break;

            default:
                puntosJugador += jugadaJugador[i];
                break;
        }
        if (puntosJugador > 21 && as) {
            puntosJugador -= 10;
        }
    }
    // Imprimimos las cartas y los puntos que van sumando
    casa.innerHTML="Cartas de la casa: " + jugadaCasa.join();
    puntosC.innerHTML="puntuación de la casa: " + puntosCasa;
    jugador.innerHTML="Cartas del jugador: " + jugadaJugador.join();
    puntosJ.innerHTML="puntuación del jugador: " + puntosJugador;
    gameover();
    // empezarJuego();
}

let fin = false;
function gameover() {
    // se crea variable en false para al ponerse en true se cerrará al cumplirse la condición.
    if (puntosJugador > 21) {
        winner.innerHTML="El jugador se ha pasado de 21. Gana la casa";
        fin = true;
        return;

    } else if (puntosCasa > 21) {
        winner.innerHTML="La casa se ha pasado de 21. Gana el jugador";
        fin = true;
        return;
    }
    // if(fin==true) agregar.style.display='hidden';
}
    
function ganador() {
    // se agrega una nueva carta si "fin" es false(o sea si no sobrepasa a 21)
    if (puntosJugador > puntosCasa && !fin) {
        result.innerHTML="Va ganando el jugador";
        console.log("");
        jugar("casa");
        return;
    } else if (puntosCasa > puntosJugador && !fin) {
        result.innerHTML="Va ganando la casa";
        console.log("");
        jugar("jugador");
        return;
    } else {
        result.innerHTML="Hay empate";
        console.log("");
        jugar("jugador");
        return;
    }
}

// Función que ira dando una carta al azar ya sea al jugador o a la casa.
function jugar(jugada) {
    switch (jugada) {
        case "casa":
            jugadaCasa.push(cartasCasa[Math.floor(Math.random() * cartasCasa.length)]);
            break;
        case "jugador":
            jugadaJugador.push(cartasJugador[Math.floor(Math.random() * cartasJugador.length)]);
            break;
    }

    //Condicion hace que se calcule los puntos cuando el jugador y casa tengan 2 cartas en adelante. 
    if (jugadaCasa.length >= 2 && jugadaJugador.length >= 2) calcularPuntos();
}

empezarJuego();