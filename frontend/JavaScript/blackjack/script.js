// variables para imprimir en pantalla
let casa = document.getElementById('cartasCasa');
let jugador = document.getElementById('cartasJugador');
let puntosC = document.getElementById('puntosCasa');
let puntosJ = document.getElementById('puntosJugador');
let result = document.getElementById('resultado');
let winner = document.getElementById('ganador');
let mensaje = document.getElementById('tooltiptext');
let mazo = document.getElementById('mazo');

let agregar = document.getElementById('juego');
agregar.addEventListener("click", jugar);
agregar.style.display = "none";

let start = document.getElementById('start');
start.addEventListener("click", empezarJuego);

let end = document.getElementById('end');
end.addEventListener("click", plantar);
end.style.display = "none";

// variables de almacenar dinero
let dinero = document.getElementById('saldo');
let saldoTotal = 100;
dinero.innerHTML = saldoTotal + "€";
let apuesta = document.getElementById('apuesta');

// Variables de Fichas
let fichas = document.querySelectorAll('.ficha');
let ficha5 = document.getElementById('ficha1');
let ficha1 = 5;
ficha5.innerHTML = ficha1 + "€";
let ficha10 = document.getElementById('ficha2');
let ficha2 = 10;
ficha10.innerHTML = ficha2 + "€";
let ficha20 = document.getElementById('ficha3');
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
    repartir("devolverCartas");
    // casa.style.visibility = 'hidden';
    casa.style.transition = 'all 0s';
    // jugador.style.visibility = 'hidden';
    jugador.style.transition = 'all 0s';
    cards[1].classList.add('card');
    cards[0].classList.add('card');
    puntosCasa = 0;
    puntosJugador = 0;
    valorApuesta = 0;
    winner.innerHTML = "";
    result.style.display = "none";
    start.style.display = 'none';
    fin = false;

    for (let i = 0; i < fichas.length; i++) {
        fichas[i].removeAttribute("disabled");
    }

    // Recogemos la dos cartas iniciales de la casa:
    jugar("casa");

    // Recogemos la dos cartas iniciales del jugador:
    jugar();
    jugar();

    calcularPuntos("");
}

function calcularPuntos(puntos) {
    // calcular los puntos desde cero cada vez q se agrega una nueva carta
    puntosCasa = 0;
    puntosJugador = 0;
    // recorremos el array y asignamos valorApuestaes al As,J,Q y K.
    switch (puntos) {
        case "dealer":
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

        case "player":
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
            break;
    }
    // Imprimimos las cartas y los puntos que van sumando
    mostrarCartas();
    puntosC.innerHTML = puntosCasa;
    puntosJ.innerHTML = puntosJugador;
    ganador();
    gameover();
}
let signo = [1, 2, 3, 4];
let baraja = [];
for (let i = 0; i < 10; i++) {
    baraja.push(signo[Math.floor(Math.random() * signo.length)]);
}
function mostrarCartas() {
    casa.innerHTML = '';
    jugador.innerHTML = '';

    for (let i = 0; i < jugadaJugador.length; i++) {
        jugador.innerHTML += "<img src='cards/" + jugadaJugador[i] + "-" + baraja[i] + ".png'>";
    }
    for (let i = 0; i < jugadaCasa.length; i++) {
        if (jugadaCasa.length < 2) {
            casa.innerHTML += "<img src='cards/" + jugadaCasa[i] + "-" + baraja[i] + ".png'>" + "<img src='cards/0-0.png'>";
        } else {
            casa.innerHTML += "<img src='cards/" + jugadaCasa[i] + "-" + baraja[i] + ".png'>";
        }
    }
}

let fin = false;
function gameover() {
    // se crea variable en false para al ponerse en true se cerrará al cumplirse la condición.
    fin = true;
    if (puntosJugador > 21) {
        winner.innerHTML = "El jugador se ha pasado de 21. Gana la casa";
        winner.style.color = "red";
        result.style.display = "none";
        agregar.style.display = "none";
        end.style.display = "none";
        start.style.display = 'block';
    } else if (puntosCasa > 21) {
        winner.innerHTML = "La casa se ha pasado de 21. Gana el jugador";
        winner.style.color = "blue";
        result.style.display = "none";
        agregar.style.display = "none";
        saldoTotal += valorApuesta * 2;
        dinero.innerHTML = saldoTotal + "€";
    } else if (puntosCasa == 21) {
        winner.innerHTML = "Casa tiene 21. Vuelve a jugar"
        winner.style.color = "red";
        result.style.display = "none";
        agregar.style.display = "none";
        // }else if (puntosJugador == 21) {
        //     winner.innerHTML = "Felicidades, sacaste 21!!!";
        //     result.style.display = "none";
        //     saldoTotal += valorApuesta * 2;
        //     dinero.innerHTML = saldoTotal + "€";
    } else {
        fin = false;
        return false;
    }
    return true;
}

function ganador() {
    // se agrega una nueva carta si "fin" es false(o sea si no sobrepasa a 21)
    if (puntosJugador > puntosCasa && !fin) {
        result.style.color = "blue";
        result.innerHTML = "Va ganando el jugador";
        return;

    } else if (puntosCasa > puntosJugador && !fin) {
        result.style.color = "red";
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
        winner.style.color = "red";
        winner.innerHTML = "Casa ha ganado";
    } else if (puntosCasa == puntosJugador) {
        result.style.display = "none";
        winner.innerHTML = "Ninguno gana, se devuelve la apuesta";
        saldoTotal += valorApuesta;
        dinero.innerHTML = saldoTotal + "€";
    }
    end.style.display = "none";
    agregar.style.display = "none";
    start.style.display = 'block';
    for (let i = 0; i < fichas.length; i++) {
        fichas[i].setAttribute("disabled", true);
    }
}

// Función que ira dando una carta al azar ya sea al jugador o a la casa.
function jugar(jugada) {
    switch (jugada) {
        case "casa":
            jugadaCasa.push(cartasCasa[Math.floor(Math.random() * cartasCasa.length)]);
            repartir("naipeBaraja");
            break;
        default:
            jugadaJugador.push(cartasJugador[Math.floor(Math.random() * cartasJugador.length)]);
            break;
    }
    //Esta condicion hace que se calcule los puntos cuando el jugador tenga 2 o más.
    if (jugadaJugador.length >= 2) calcularPuntos("dealer");

}
let valorApuesta = 0;
// let cartaMazo = document.getElementById('carta3');
let cards = document.getElementsByClassName('cartas-mesa');
apuesta.innerHTML = valorApuesta + "€";

// crear el mazo de cartas apiladas
for (let i = 1; i < 26; i++) {
    mazo.innerHTML += "<img id='naipes " + [i] + " ' class='naipe' src='cards/0-0.png'>";
}
let cartaTop = document.getElementsByClassName('naipe');
for (let i = 0; i < cartaTop.length; i++) {
    cartaTop[i].style.right = 116 + (i) + 'px';
    if (i % 2 == 0) {
        cartaTop[i].style.borderRight = '1px solid black';
    }
}

function repartir(reparto) {
    let j = 0;
    switch (reparto) {
        case "barajaMesa":
            for (let i = cartaTop.length - 1; i > cartaTop.length - 5; i--) {
                j++;
                setTimeout(() => {

                    cartaTop[i].classList.add('card');
                    cartaTop[i].style.transition = "all 1s";

                }, 200 * j);
            }
        case "naipesMesa":
            setTimeout(() => {

                cards[1].classList.remove('card');
                cards[0].classList.remove('card');

                result.style.display = "block";
                calcularPuntos("dealer");
            }, 350 * j);

            break;
        case "naipeBaraja":
            for (let n = cartaTop.length-5; n > cartaTop.length-12; n--) {
                n--;
            }
            // cartaTop[n].classList.add('card');
            break;
        case "devolverCartas":
            for (let i = cartaTop.length - 1; i > cartaTop.length - 5; i--) {
                cartaTop[i].classList.remove('card');
            }
            break;
    }
}
function apostar(x) {
    // se resta la apuesta del saldo y se muestra valorApuesta de la apusta
    repartir("barajaMesa");
    saldoTotal -= x;
    valorApuesta += x;
    apuesta.innerHTML = valorApuesta + "€";
    dinero.innerHTML = saldoTotal + "€";
    agregar.style.display = "block";
    start.style.display = "block";
    end.style.display = "block";
    // casa.style.visibility = 'visible';
    casa.style.transition = 'all 1s';
    // jugador.style.visibility = 'visible';
    jugador.style.transition = 'all 1s';
    start.style.display = 'none';
    mensaje.style.visibility = "hidden";

}
empezarJuego();