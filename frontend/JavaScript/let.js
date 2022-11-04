// Block Scope
{ //bloque A
    //Los bloques son agrupaciones de expresiones y se contienen dentro de las llaves
    let x = 5;
    console.log(x);

    var y = 11;
    // Las variables declaradas con var tienen ambito o alcance global y pueden ser usadas fuera del bloque
}
{ //Bloque B
    //Los bloques son idependientes unos de otros
    let x = 7;
    console.log(x);
}
console.log(y + 1);

// Hoisting
// let coche;
coche = 'seat panda';
console.log(coche);

// 