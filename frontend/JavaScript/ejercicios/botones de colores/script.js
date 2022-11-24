// forma sencilla, pero entre mas botonos se tendria q crear mas onclicks
// function colorChange(color) {
//     document.body.style.background = color;
// }
function colorReset(color) {
    document.body.style.background = 'linear-gradient(90deg, #141e30,#243b55)';
}


// funcion avanzada 
// const colores=document.getElementsByClassName('panel');
const colores=document.querySelector("button");

for (let i = 0; i < colores.length; i++) {
    colores=addEventListener('click',function(){
        document.body.style.background=color;
    });
}

// function changeColor() {
//     colores.style.background=document.body.style.background;
// }
