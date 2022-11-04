// const y let
const precio1= 5;       //Esta variable nunca va a cambiar
const precio2=6;
let total= precio1 + precio2;   //resul=11
console.log(total);
//Esta variable puede cambiar
total=precio1 * 2 + precio2    //resul=16
console.log(total);
// Si tratamos de asignar nuevos valores a las variables contantes, nos dará un error y el codigo se detendra
// precio1=10;
// console.log(precio1);


//numeros y strings
const pi=3.14;  //sabemos que esta variable contendra un valor constante
let nombre='Alan';
let edad=34;

console.log(edad+pi); //se suman los numeros rpt=37.14
edad='34'; //ahora estoy escribiendo el numero como un string
console.log(edad+pi); //suma de numero y string rpt=343.14

//valor undefined
let coche;  //hemos asignado la variable pero no le hemos asignado ningun valor

console.log(coche);