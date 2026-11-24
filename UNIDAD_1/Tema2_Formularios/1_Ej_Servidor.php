<!--  Ejercicio 4: Escribe el código php necesario para crear una función que sume 2 números : -->

<?php
// Crea la función que sume 2 números y devuelva con return el resultado
function sumar1($a, $b) {
    return $a + $b;
}

// Define las variables para los dos números y asígnales un valor
$num1 = 3;
$num2 = 6;

// Define una variable que llame a la función para sumar las variables anteriores
$resultado1 = sumar1($num1, $num2);

// Muestra por pantalla el mensaje
print "La suma de $num1 + $num2 es: $resultado1";
echo "<br/>";


//<!-- Ejercicio 5: Modifica el código anterior de forma que se pueda hacer la misma función de otra forma, por ejemplo, variables globales.-->


// Variables globales definidas fuera del ámbito de la función
$num1 = 3;
$num2 = 6;

// Función que accede a las variables externas mediante la palabra clave 'global'
function sumar2() {
    global $num1, $num2;
    return $num1 + $num2;
}

// Llama a la funciónsftp:
$resultado2 = sumar2();

// Muestra por pantalla el resultado
echo "La suma de $num1 + $num2 es: $resultado2";


//<!-- Ejercicio 6: 
//Crea un script en PHP que simule el seguimiento del tiempo dedicado a tareas utilizando distintos tipos de variables.

//Para ello, implementa tres funciones diferentes:

//tiempoTarea(): Declara una variable local llamada $tiempo con un valor fijo (por ejemplo, 15 minutos). 
//Muestra en pantalla el tiempo estimado de una tarea individual.
//Observa cómo este valor se reinicia cada vez que se llama a la función.


//acumularTiempo(): Utiliza una variable global $tiempoTotal, inicializada fuera de la función, para acumular el tiempo total invertido.
//Cada vez que se llama, suma 15 minutos al total y muestra el resultado acumulado.
//Esta variable debe mantenerse entre llamadas.


//contarTareas(): Usa una variable static dentro de la función para contar cuántas tareas se han registrado. 
//Muestra el número de tarea cada vez que se llama, y observa cómo el contador sigue aumentando entre llamadas. 


//Llama a las tres funciones dos veces (simulando dos tareas). Comprueba que:
//El tiempo estimado se reinicia.

//El tiempo total se acumula.

//El número de tareas aumenta progresivamente.-->


echo "<br";
//MOstrar errores (opcional para desarrollo)  para visual studio code
ini_set('dispay_errors', 1);
error_reporting(E_ALL);

// Variable global inicializada fuera de las funciones
$tiempoTotal = 0;

// 1. Variable local: se crea y destruye en cada llamada
function tiempoTarea() {
    $tiempo = 15;
    echo "Tiempo estimado tarea individual: $tiempo minutos.<br>";
}

// 2. Variable global: modifica y acumula el valor externo
function acumularTiempo() {
    global $tiempoTotal;
    $tiempoTotal += 15;
    echo "Tiempo total acumulado: $tiempoTotal minutos.<br>";
}

// 3. Variable static: conserva su valor entre ejecuciones de la función
function contarTareas() {
    static $contador = 0;
    $contador++;
    echo "Tarea número: $contador<br>";
}

// --- SIMULACIÓN ---

echo "<h3>Simulación: Tarea 1</h3>";
contarTareas();
tiempoTarea();
acumularTiempo();

echo "<h3>Simulación: Tarea 2</h3>";
contarTareas();
tiempoTarea();
acumularTiempo();



?>

