let puntosCasa=0;
let jugadaCasa=[];

// Juego de la casa
let cartaCasa=["A",2,3,4,5,6,7,8,9,10,"J","Q","K"];

// Juego del jugador
let puntosJugador=0;
let jugadaJugador=[];
let cartaJugador=["A",2,3,4,5,6,7,8,9,10,"J","Q","K"];


function empezarJuego() {
    
    //Recogemos las dos vartas iniciales de la casa:
    jugadaCasa.push(cartaCasa[Math.floor(Math.random() * cartaCasa.length)]);   
    jugadaCasa.push(cartaCasa[Math.floor(Math.random() * cartaCasa.length)]);
   

    //Recogemos las dos vartas iniciales del jugador:
    jugadaJugador.push(cartaJugador[Math.floor(Math.random() * cartaJugador.length)]);
    jugadaJugador.push(cartaJugador[Math.floor(Math.random() * cartaJugador.length)]);

    calcularPuntos ();
    // agregarCarta();
    console.log(jugadaCasa.join());
    console.log("puntuación de la Casa: " + puntosCasa);
    console.log(jugadaJugador.join());
    console.log("puntuación del Jugador: " + puntosJugador);
    


    // if (puntosJugador < 21) {
    //     console.log(puntosJugador);
    // }
}

function calcularPuntos () {
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
    ganador();
}
function ganador() {
    if (puntosCasa>puntosJugador) console.log("Casa a Ganado");
    if (puntosCasa<puntosJugador) console.log("Jugador a Ganado");
    if (puntosCasa==puntosJugador) console.log("Empate");
}
function agregarCarta() {
    let carta=jugadaJugador.push(cartaJugador[Math.floor(Math.random() * cartaJugador.length)]);
    
    for (let i = 0; i < carta.length; i++) {
        if (puntosJugador<21) {
        console.log(puntosJugador += carta[i]);
    }
    }
}

empezarJuego();