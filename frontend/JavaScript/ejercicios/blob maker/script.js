// El codigo numerico del border-radius
let outputcode = document.querySelector('.output-code');

// array con los sliders
const sliders = document.querySelectorAll('input[type="range"]');

// recorremos el array para asignar un evento a cada slider
sliders.forEach(function (slider) {
    slider.addEventListener('input', createBlob);
});

// array con los input numericos 
const inputs = document.querySelectorAll('input[type="number"]');

// asignamos eventos a los input
inputs.forEach(function (input) {
    input.addEventListener('change', createBlob);
});

// funcion que crea un blob nuevo cada vez que alteramos un slider o input
function createBlob() {
    // recorremos los valores de cada slider
    let radiusOne = sliders[0].value;
    let radiusTwo = sliders[1].value;
    let radiusThree = sliders[2].value;
    let radiusFour = sliders[3].value;

    // recorremos los valores numericos de altura y anchura
    let blobHeight = inputs[0].value;
    let blobWidth = inputs[1].value;

    // creamos una variable que reuna todos estos valores
    let borderRadius = `${radiusOne}% ${100 - radiusOne}% ${100 - radiusThree}% ${radiusThree}% / ${radiusFour}% ${radiusTwo}% ${100 - radiusTwo}% ${100 - radiusFour}%`

    // escribimos el css del blob con los datos de los inputs
    document.querySelector('.output').style.cssText = 
    `border-radius:${borderRadius};
    height:${blobHeight}px;
    width:${blobWidth}px;`

    // imprime en pantalla el valor del border-radius
    outputcode.innerHTML= `${borderRadius}`;
}

function copy() {
    var r=document.createRange();
    r.selectNode(outputcode);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(r);
    document.execCommand('copy');
    window.getSelection().removeAllRanges();
}