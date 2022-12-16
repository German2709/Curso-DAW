let txt = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
let longitud = txt.length;
let pLong = document.getElementById('pLong');

pLong.innerHTML = longitud;

let corte = txt.slice(15, 19)
let pCorte = document.getElementById('pCorte');
pCorte.innerHTML = corte;

let str = 'Tere "terere" Herrera';
let apodo = str.slice(6, 12)
let mote = document.getElementById('apodo');
mote.innerHTML = apodo;

let frase = 'La mejor alumna de clase es Rebeca';
// El primer parametro es lo que buscamos y el segundo es el reemplazado.
//poniendo barra entre la palabra a buscar y posteriormente poner la i(que indica q no sea sencible a la forma de escrita) reemplazara la palabra.
let replaced = frase.replace(/rebeca/i, "Angela");
let pRep = document.querySelector('#pReplace');
pRep.innerHTML = replaced;

let string = 'Hoy es Viernes, Bitches';
let minus = string.toLocaleLowerCase();
let pMinus = document.querySelector('#pMinus');

let mayus = string.toLocaleUpperCase();
let pMayus = document.querySelector('#pMayus');

pMinus.innerHTML = minus;
pMayus.innerHTML = mayus;

// Concatenar strings
// si tengo un str nombre="Roman"
// si tengo otro str apellido= "Gomez"
// y quiero escribir "Roman Gomez"
let nombre = "Roman"
let apellido = "Gomez"
let pConcat = document.querySelector('#pConcat');

pConcat.innerHTML = nombre.concat(" ", apellido);
// Es lo mismo q poner pConcat.innerHTML = nombre+" "+apellido);

// charAt()
let pChar = document.querySelector('#pCharAt');
pChar.innerHTML = apellido.charAt(2);

// cobinamos las anteriores 
let texto = 'santiago';
pChar.innerHTML = texto.charAt(0).toUpperCase().concat(texto.slice(1));

// Transformar a array
let strLista='* Germán, Román, Angela, Tere, Santi, Rebeca, Dafne';
let arrayLista=strLista.split(', ');
console.log(arrayLista);
let pSplit=document.querySelector('#split');
pSplit.innerHTML=arrayLista.join('<br>* ');

let txts = "I can eat bananas all day";
let fruta = txts.slice(10,17);
mote.innerHTML = fruta;