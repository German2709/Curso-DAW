let minutos = document.getElementById('minutos');
let segundos = document.getElementById('segundos');
let cents = document.getElementById('cents');

let contadorCents = 0;
let contadorSecs = 0;
let contadorMins = 0;
let crono;

// let btnStart = document.getElementById('btnStart');
// Botón START
// El cronómetro arranca
function startCrono() {
    // Detenemos el intervalo o bucle para evitar errores
    clearInterval(crono);

    // Un intervalo se ejecuta en bucle cada x(10 en este caso) milisegundos
    crono = setInterval(start, 10);
}

// Función que cuenta el tiempo y lo imprime
function start() {
    // Aumento el contador en 1 por que la función se ejecuta cada centésima de segundo
    contadorCents++;

    // Compruebo si las centésimas llegan a 100 y si es así reiniciar el contador y aumetar un segundo
    if (contadorCents == 100) {
        // reiniciamos el contador
        contadorCents = 0;
        // los segundos aumentan en 1
        contadorSecs++;
    }
    if (contadorSecs == 60) {
        contadorSecs = 0;
        contadorMins++;
    }

    // Imprimo el resultado del contador
    cents.innerHTML = contadorCents;
    segundos.innerHTML = contadorSecs;
    minutos.innerHTML = contadorMins;

    // Formato de los números
    if (contadorCents < 10) {
        cents.innerHTML = '0' + contadorCents;
    }
    if (contadorSecs < 10) {
        segundos.innerHTML = '0' + contadorSecs;
    }
    if (contadorMins < 10) {
        minutos.innerHTML = '0' + contadorMins;
    }

    // La función se ejecuta cada 10ms (1 centésima de segundo)


    // btnStart.disabled = true;
}

// Detenemos el bucle
function stop() {
    clearInterval(crono);
    // btnStart.disabled = false;
}

// Detenemos el bucle y reiniciamos la interfaz y los contadores
function reset() {
    clearInterval(crono);
    // btnStart.disabled = false;

    contadorCents = 0;
    contadorSecs = 0;
    contadorMins = 0;

    minutos.innerHTML = '00';
    segundos.innerHTML = '00';
    cents.innerHTML = '00';
}

