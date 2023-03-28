// variables para imprimir en pantalla
let casa = document.getElementById('cartasCasa');
let jugador = document.getElementById('cartasJugador');
let puntosC = document.getElementById('puntosCasa');
let puntosJ = document.getElementById('puntosJugador');
let result = document.getElementById('resultado');
let winner = document.getElementById('ganador');

let agregar = document.getElementById('juego');
agregar.addEventListener("click", jugar);
agregar.style.display = "block";

let start = document.getElementById('start');
start.addEventListener("click", empezarJuego);

let end = document.getElementById('end');
end.addEventListener("click", plantar);

// variables de almacenar dinero
let dinero = document.getElementById('saldo');
let saldoTotal = 100;
dinero.innerHTML = saldoTotal+ "€";
let apuesta = document.getElementById('apuesta')

let ficha5 = document.getElementById('ficha1')
let ficha1 = 5;
ficha5.innerHTML = ficha1 + "€";
let ficha10 = document.getElementById('ficha2')
let ficha2 = 10;
ficha10.innerHTML = ficha2 + "€";
let ficha20 = document.getElementById('ficha3')
let ficha3 = 20;
ficha20.innerHTML = ficha3 + "€";


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
    jugadaCasa = [];
    puntosCasa = 0;
    puntosJugador = 0;
    valorApuesta = 0;
    winner.innerHTML = "";
    agregar.style.display = "block";
    result.style.display = "block";
    end.style.display = "block";
    fin = false;

    // Recogemos la dos cartas iniciales de la casa:
    jugar("casa");
    jugar("casa");


    // Recogemos la dos cartas iniciales del jugador:
    jugar();
    jugar();
}

function calcularPuntos() {
    // calcular los puntos desde cero cada vez q se agrega una nueva carta
    puntosCasa = 0;
    puntosJugador = 0;

    // recorremos el array y asignamos valorApuestaes al As,J,Q y K.
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
    mostrarCartas();
    // casa.innerHTML = jugadaCasa;
    puntosC.innerHTML = puntosCasa;
    puntosJ.innerHTML = puntosJugador;
    // jugador.innerHTML = jugadaJugador;
    ganador();
    gameover();
}
function mostrarCartas() {
    casa.innerHTML = '';
    jugador.innerHTML = '';
    let signo = [1, 2, 3, 4];
    let baraja = [];
    for (let i = 0; i < 10; i++) {
        baraja.push(signo[Math.floor(Math.random() * signo.length)]);
    }
    for (let i = 0; i < jugadaCasa.length; i++) {
        casa.innerHTML += "<img src='cards/" + jugadaCasa[i] + "-" + baraja[i] + ".png'>";
    }
    for (let i = 0; i < jugadaJugador.length; i++) {
        jugador.innerHTML += "<img src='cards/" + jugadaJugador[i] + "-" + baraja[i] + ".png'>";
    }
}

let fin = false;
function gameover() {
    // se crea variable en false para al ponerse en true se cerrará al cumplirse la condición.
    if (puntosJugador > 21) {
        winner.innerHTML = "El jugador se ha pasado de 21. Gana la casa";
        result.style.display = "none";
        agregar.style.display = "none";
        apuesta.innerHTML = 0 + "€";
        fin = true;
        return;

    } else if (puntosCasa > 21) {
        winner.innerHTML = "La casa se ha pasado de 21. Gana el jugador";
        result.style.display = "none";
        agregar.style.display = "none";
        dinero.innerHTML = (saldoTotal+ valorApuesta * 2) + "€";
        apuesta.innerHTML = 0 + "€";
        fin = true;
        return;
    } else if (puntosCasa == 21) {
        winner.innerHTML = "Casa tiene 21. Vuelve a jugar"
        result.style.display = "none";
        agregar.style.display = "none";
        end.style.display = "none";
    } else if (puntosJugador == 21) {
        winner.innerHTML = "Felicidades, sacaste 21 a la primera!!!";
        agregar.style.display = "none";
        dinero.innerHTML = (saldoTotal+ valorApuesta * 2) + "€";
        end.style.display = "none";
    }
}

function ganador() {
    // se agrega una nueva carta si "fin" es false(o sea si no sobrepasa a 21)
    if (puntosJugador > puntosCasa && !fin) {
        result.innerHTML = "Va ganando el jugador";
        if (jugadaJugador > 2) jugar("casa");
        return;

    } else if (puntosCasa > puntosJugador && !fin) {
        result.innerHTML = "Va ganando la casa";
        return;

    } else if (puntosCasa == puntosJugador) {
        result.innerHTML = "Hay empate";
        apuesta.innerHTML = 0 + "€";
        return;
    }
}

function plantar() {
    if (puntosJugador > puntosCasa) {
        setTimeout(() => {
            jugar("casa");
            plantar();
        }, 1000);
    } else if (puntosCasa > puntosJugador && puntosCasa <= 21) {
        result.style.display = "none";
        winner.innerHTML = "Casa ha ganado";
    } else if (puntosCasa == puntosJugador) {
        result.style.display = "none";
        winner.innerHTML = "Casa gana";
        apuesta.innerHTML = 0 + "€";
    }
}

// Función que ira dando una carta al azar ya sea al jugador o a la casa.
function jugar(jugada) {
    switch (jugada) {
        case "casa":
            jugadaCasa.push(cartasCasa[Math.floor(Math.random() * cartasCasa.length)]);
            break;
        default:
            jugadaJugador.push(cartasJugador[Math.floor(Math.random() * cartasJugador.length)]);
            break;
    }

    //Condicion hace que se calcule los puntos cuando el jugador y casa tengan 2 cartas en adelante. 
    if (jugadaCasa.length >= 2 && jugadaJugador.length >= 2) calcularPuntos();
}
let valorApuesta = 0;
apuesta.innerHTML = 0 + "€";
function apostar(x) {
    // se resta la apuesta del saldo y se muestra valorApuesta de la apusta
    saldoTotal = saldoTotal - x;
    valorApuesta = valorApuesta + x;
    dinero.innerHTML = saldoTotal + "€";
    apuesta.innerHTML = valorApuesta + "€";
    console.log();
}

empezarJuego();