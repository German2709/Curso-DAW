<?php
$result = 0;
// crear un bucle que imprima los numeros del 1 al 10
for ($i = 1; $i < 11; $i++) {
    echo $i = $i++;
}

echo '<br>';

for ($i = 1; $i <= 10; $i++) {
    if ($i != 10) echo $i . "-";
}

echo '<h3> crear un bucle que sume todos los números del 0 al 30 </h3>';

for ($i = 1; $i < 31; $i++) {
    $result += $i;
}
echo "resultado: $result";

echo '<h3> crear un script que imprima el siguiente patrón: </h3>';
// *
// * *
// * * *
// * * * *
// * * * * *
$n_asterisco = 5;
for ($i = 1; $i <= $n_asterisco; $i++) {
    for ($j = 0; $j < $i; $j++) echo "* ";
    echo "<br>";
}
echo "<hr>";
$asterisco = 5;
for ($i = 0; $i <= $asterisco; $i++) {
    echo str_repeat("* ", $i) . "<br>";
}
echo "<hr>";
// 3.1
$simbolo = 1;
for ($i = 5; $i >= $simbolo; $i--) {
    echo str_repeat("* ", $i) . "<br>";
}

echo '<h3> crear un script que imprima el patrón anterior más la disminución: </h3>';
for ($i = 1; $i <= $n_asterisco; $i++) {
    for ($j = 0; $j < $i; $j++) echo "* ";
    echo "<br>";
}
for ($i = $n_asterisco; $i > 0; $i--) {
    for ($j = 0; $j < $i - 1; $j++) echo "* ";
    echo "<br>";
}

echo '<h3> crear un bucle que calcule el factorial de un número dado. el factorial de un número 
es el de todos los naturales hasta llegar a dicho número ejem:<br>4! es 4*3*2*1 = 23 </h3>';

$factorial = 1;
$producto = 4;
for ($i = 1; $i <= $producto; $i++) {
    $factorial *= $i;
}
echo "resultado: $factorial";

echo '<h3> crear un programa que muestre todas las potenciales combinaciones de dos digitos decimales,
 impresos separados por coma </h3>';

for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        if ($i . $j == 99) {
            echo $i . $j;
        } else {
            echo $i . $j . ",";
        }
    }
    echo '<br>';
}

echo '<h3>Escribir un programa que cuente el número de "r" de un string dado</h3>';
$str = 'parancuaritimiricuaro';
$contar = 0;
for ($i = 0; $i < strlen($str); $i++) {
    if (substr($str, $i, 1) == 'r') $contar++;
}
echo "El string '$str' contiene $contar r";


echo '<h3>Escribir un programa que cree automáticamente una tabla con las tablas de multiplicar 
con el alcance que nosotros le indiquemos Ejemplo:
    <br> Alcance 6. Primera num de la tabla 
    <br> | 1 * 1 = 1 | 1 * 2 = 2 | 1 * 3 = 3... | 1 * 6 = 6 |
    <br>...
    <br> | 6 * 1 = 6 | 6 * 2 = 12 | 6 * 3 = 18... | 6 * 6 = 36 |</h3>';

include 'user_data.php';

$alcance = 6;
$multi = 1;
echo "<table>";
for ($i = 1; $i <= $alcance; $i++) {
    echo "<tr>";
    for ($j = $multi; $j < 7; $j++) {
        echo "<td>";
        echo  "$i * $j = " . $j * $i;
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";


echo '<h3>Crear un programa de PHP que imprima un tablero de ajedrez
Pista: Usar una tabla con 270px de ancho y 30px como medida para las celdas</h3>';

$blanca = "<td></td>";
$negro = "<td class='cols'></td>";
echo "<table class='tablero'>";
for ($a = 1; $a <= 8; $a++) {
    echo "<tr>";
    for ($i = 1; $i <= 8 / 2; $i++) {
        if ($a % 2 == 0) {
            echo $blanca;
            echo $negro;
        } else {
            echo $negro;
            echo $blanca;
        }
    }
}

echo "</table>";


echo '<h3> Crear un script que imprima la siguiente tabla</h3>';
$alcance = 10;
$celda = 1;
echo "<table>";
for ($i = 1; $i <= $alcance; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= $alcance; $j++) {
        echo "<td>";
        echo $j * $i;
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";

echo '<h3> Escribir un programa de PHP que itere los números del 1 al 50. Al imprimirlos, 
los múltiplos de 3 se susituirán por "fizz", los múltiplos de 5 por "Buzz" y los que sean 
múltiplos de 3 y 5 por "FizzBuzz"</h3>';
for ($i = 1; $i < 51; $i++) {
    if ($i==50) echo "Buzz";
    if (($i % 3)==0) echo "Fizz";
    if (($i % 5) == 0) echo "Buzz-";
    if  ($i % 3 !== 0 && $i % 5 !== 0)echo  $i . "-";
}
    echo'<hr>';

for ($i = 1; $i < 51; $i++) {
    switch ($i) {
        case 50:
            echo "Buzz";
            break;
        case ($i % 3) == 0 && ($i % 5==0):
            echo "FizzBuzz,";
            break;
        case $i % 5 == 0 :
            echo "Buzz,";
            break;
        case $i % 3 == 0 :
            echo "Fizz,";
            break;
        default:
        echo $i.",";
            break;
    }
}

echo '<h3> Crear un triangulo de Floyd</h3>';
$num=12;
$cont=1;

for ($fila = 1; $fila <=$num; $fila++) {
    for ($colum = 1; $colum <=$fila; $colum++) {
        if($cont<10)echo 0;
        echo $cont . " ";
        $cont++;
    }
    echo "<br>";
}

echo '<hr>';
for ($i = 1; $i <= 8; $i++) {
    echo $i;
    for ($j = 1; $j <= 5; $j++){
        echo $j." ";
        if($j<=1)echo "  * * *  ";
        if($j==4)echo "* * * * *";
        if($j<1 && $j>5)echo "*       *";

    }
    echo '<br>';
}
        