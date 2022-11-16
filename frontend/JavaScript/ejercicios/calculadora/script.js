const input = document.getElementById('input');
// Esta seria la forma para seleccionar los botones que tiene dentro de los divs
const number = document.querySelectorAll('.numeros button');
const operator = document.querySelectorAll('.signos button');

const result = document.getElementById('rpt');
const clear = document.getElementById('clear');

// Mostrar un valor por defecto
input.value = 0;

// variables para guardar los valores y resultados
let value1, value2 = 0;
let operar = '';

// asiganmos un addEvenListener a los botones de numeros
// Hacemos un bucle q recorra el array entero y asignando el evento a cada boton
for (let i = 0; i < number.length; i++) {
    number[i].addEventListener('click', write)
}

function write() {

    //Limpia la pantalla si solo hay un cero 
    if (input.value == 0) {
        input.value = '';
    }

    input.value += this.innerHTML;
}

// Limpiar la pantalla al pulsar el boton C
clear.onclick = () => {
    input.value = 0;
    value1, value2 = 0;
    operar = '';
}

// Asignamos eventos a los operadores
for (let i = 0; i < operator.length; i++) {
    operator[i].addEventListener('click', operate)
}

function operate() {
    // Lo primero es identificar el operador que hemos clicado
    operar = this.innerHTML;
    value1 = parseFloat(input.value);  //un parseFloat es un numero con decimales
    input.value = '';

}
result.onclick = () => {
    value2 = parseFloat(input.value);

    switch (operar) {
        case '+':
            // se suma
            console.log('se suma')
            input.value = value1 + value2;

            break;
        case '-':
            // se resta
            input.value = value1 - value2;

            break;
        case '×':
            // se multiplica
            input.value=value1*value2;
            break;
        case '÷':
            // se divide
            input.value=value1/value2;
            break;

        default:
            console.log('no entra el operador')
            break;
    }
}