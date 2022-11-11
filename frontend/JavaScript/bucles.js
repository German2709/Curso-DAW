const display=document.getElementById('display');

let texto='';
let array=[];

// queremos imprimir todos los números del 2 al 20 solo pares
// for (let i = 1; i <= 10; i++) {
//     array[i-1]=i*2;
// }
// display.innerHTML=array.join(' ');
// ↑↑ para imprimir es usar el ".innerHTML" despues de la variable creada (este caso display) y el metodo ".join()" se usa cuando los strings estan dentro de una array  


// para hacer una cuanta atras de 99 a 0 con multiplos de 3
for (let i = 99; i >= 3; i=i-3) {
    texto+=i+",";
}

// para crear una cuenta atras del 100 a 0 pero que este dentro de un string tendria q usar un string que me sirva de contador y el bucle(for)
// Donde index es el string contador y aumentaria con los "++" y donde se almacenaria el bucle es el reverso
// para que la reducción en multiplos es cambiar el "j--" por "j=j-(numero del multiplo)"
let index=0;
let countdown=[];

    for (let j = 33; j >= 3; j=j--) {
        
        countdown[index]=j;
        index++;
    }
    console.log(countdown);

display.innerHTML=countdown.join(' ');



const vocales=document.getElementById('letras');
const letras=[
    "a",
    "e",
    "i",
    "o",
    "u"
]
texto="";

for (let i = 0; i < letras.length; i++) {
    texto+=i;   
}
vocales.innerHTML=letras.join(' ');

// Números pares hasta el 100, y que cada multiplo de 5 este en negrita
// let txt = '';

// for (let i = 2; i < 100; i=i+2) {
    
//     if (i % 5 ==  0) {
//         txt += "<b>" + i + "</b> <br>"
//     } else {
//         txt+= i + "<br>"
//     }
    
// }
// display.innerHTML=txt;

