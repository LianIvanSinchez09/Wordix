<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

// Lian Ivan Sinchez. Legajo: [FAI-4202]. Carrera: TUDW.
// Email: lian.sinchez@est.fi.uncoma.edu.ar - Github: LianIvanSinchez09
// Pandolfi Jimenez Francisco/ Legajo: [FAI-4650]. Carrera: TUDW.
// Email: francisco.pandolfi@est.fi.uncoma.edu.ar - Github: FranciscoPJ

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * 3.1)
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS"
        /* Agregar 5 palabras más */
    ];

    return ($coleccionPalabras);
}

/**
 * 3.2)
 * Funcion que almacena información de las partidas
 */
function cargarPartidas(){
    $partida = [];
    $partida[0] = [ "palabraWordix" => "QUESO", "jugador" =>  "LIAN", "intentos" => 2, "puntaje" =>  5];
    $partida[1] = [ "palabraWordix" => "MUJER", "jugador" =>  "FRAN", "intentos" => 1, "puntaje" =>  6];
    $partida[2] = [ "palabraWordix" => "GOTAS", "jugador" =>  "LAUTARO", "intentos" => 3, "puntaje" =>  4];
    $partida[3] = [ "palabraWordix" => "YUYOS", "jugador" =>  "BEJAMIN", "intentos" => 4, "puntaje" =>  3];
    $partida[4] = [ "palabraWordix" => "TINTO", "jugador" =>  "MELINA", "intentos" => 5, "puntaje" =>  2];
    $partida[5] = [ "palabraWordix" => "NAVES", "jugador" =>  "CELESTE", "intentos" => 6, "puntaje" =>  1];
    $partida[6] = [ "palabraWordix" => "PISOS", "jugador" =>  "FABIO", "intentos" => 1, "puntaje" =>  6];
    $partida[7] = [ "palabraWordix" => "MELON", "jugador" =>  "CLAUDIO", "intentos" => 3, "puntaje" =>  4];
    $partida[8] = [ "palabraWordix" => "VERDE", "jugador" =>  "ESTEBAN", "intentos" => 2, "puntaje" =>  5];
    $partida[9] = [ "palabraWordix" => "GATOS", "jugador" =>  "RODRIGO", "intentos" => 1, "puntaje" =>  6];
    return $partida; 
}


/**
 * Funcion que solicita al usuario un número entre un rango de valores
 * Si el número ingresado por el usuario no es válido, 
 * la función se encarga de volver a pedirlo. 
 * La función retorna un número válido.
 * @return INT
 */
function numeroRangoValores(){
    $rango = trim(fgets(STDIN));
    while(!($rango >= 1 && $rango <= 8)){
        echo "Opcion Invalido.\nIngrese un numero del menu: ";
        $rango = trim(fgets(STDIN));
    }
    return $rango;
}

/**
 * funcion que retorna un Menu de Partidas
 * @return INT
 */
function seleccionarOpcion(){
    echo "Menu de opciones:\n";
    echo "1: Jugar al wordix con una palabra elegida\n";
    echo "2: Jugar al wordix con una palabra aleatoria\n";
    echo "3: Mostrar una partida\n";
    echo "4: Mostrar la primer partida ganadora\n";
    echo "5: Mostrar resumen de Jugador\n";
    echo "6: Mostrar listado de partidas ordenadas por jugador y por palabra\n";
    echo "7: Agregar una palabra de 5 letras a Wordix\n";
    echo "8: Salir\n";
    echo "Ingrese una opcion:\n";
    $opcion = numeroRangoValores();
    return $opcion;
}

/**
 * Funcion agregarPalabra añade una palabra y la agrega al final del array
 * @param ARRAY palabraCollection
 * @param STRING 
 */

function agregarPalabra($col, $pal){
    $col[count($col)] = $pal;
    return $col;
}

/** 
 * Funcion que retorna un numero aleatorio
 * @return ARRAY
 */
function numeroAleatorio($palabraCollection){
    return $palabraCollection[random_int(0, 14)];
    //array_rand
}

/**
 * Funcion que retorna el nombre ingresado por el usuario
 * @return STRING
 */
function ingreseUnNombre(){
    echo "Ingrese su nombre: ";
    $nombre = trim(fgets(STDIN));
    return $nombre;
}

/**
 * Funcion que retorna un numero entero del indice del arreglo
 * @return INT
 */
function numeroDePalabra($array){
    //$col = [];
    echo "Ingrese un numero de palabra para jugar: ";
    $index = trim(fgets(STDIN));
    
    //CONSULTA: QUE REALIZA ESTA ALTERNATIVA?

    /*if ($index >= 0 && $index < count($col)) {
        $numero = $col[$index];
    } else {
        echo "indice fuera de rango\n";
    }*/
    return $array[$index];;
}

/**
 * 6)
 * Funcion que tiene un parametrole. 
 * Le solicita al usuario un número de partida 
 * y se muestra en pantalla
 * @param ARRAY $parametro
 */
function mostrarUnaPartida($parametro){             //Falta corregir: cuando ingreso 1 es el numero 2 en el array
    echo "Ingrese un numero de partida: ";          // Solo eso. ej ingreso 1. y el programa lo lee como numero 2 del array
    $numPartida = trim(fgets(STDIN));
    $numPartidaReal = $numPartida - 1;
    while(!($numPartidaReal >= 0 && $numPartidaReal < count($parametro))){
        echo "Error. Volver a insertar un número de partida correcto: ";
        $numPartidaReal = trim(fgets(STDIN));
    }
    if($parametro[$numPartidaReal]["intentos"] > 6){
        $parametro[$numPartidaReal]["intentos"] = "No adivino la palabra";
    }
        echo "***********************************\n";
        echo "Partida WORDIX " . $numPartida . ": palabra " . $parametro[$numPartidaReal]["palabraWordix"] . "\n";
        echo "Jugador: " . $parametro[$numPartidaReal]["jugador"] . "\n";
        echo "Puntaje: " . $parametro[$numPartidaReal]["puntaje"] . "\n";
        echo "Intentos: " . $parametro[$numPartidaReal]["intentos"] . "\n";
        echo "***********************************\n";
}


/**
 *  Retorna el nombre de un jugador en minusculas
 *  @param ARRAY $collection
 *  @param STRING $name
 *  @return ARRAY
 */
function solicitarJugador(){
    echo "Ingrese su nombre: ";
    $name = trim(fgets(STDIN));
    $aMinuscula = strtolower($name);
    return $aMinuscula;
}

/**
 * Dada una coleccion de palabras, muestra la collection de partidas ordenada por nombre de jugador elegido y palabra
 * @param ARRAY $collection
 */

function retornarPartidasPorNombre($collection){
    $sortedCollection = uasort($collection, 'cargarPartidas');
}




/**
 * 8)
 * funcion que dada una colección de partidas y el nombre de un jugador, 
 * retorna el índice de la primer partida ganada por dicho jugador
 * @param ARRAY $array
 * @param STRING $persona
 * @return INT
 */
function MostraPrimerPartidaGanadora($array, $persona)
{
    $mayor = 10000;
    $i = 0;
    $encontrado = false;
    echo "cantidad: " . count($array) . "\n";

    while ( $i < count($array) && $encontrado == false) {
        if ($array[$i]["jugador"] == $persona && $array[$i]["intentos"] < 7) {
            $encontrado = true;
            $resultado = $i + 1;
        } else {
            $resultado = -1;
        }
        $i++;
    }
    return $resultado;
}

/* ****COMPLETAR***** */

//arrgelo indexado de arreglo asociativo
    //$coleccionPArtida

    //explicaion 3. son ejercicios


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$palabraCollection = cargarColeccionPalabras(); //ACA TIENE QUE ESTAR
$partidasCollection = cargarPartidas(); //ACA TIENE QUE ESTAR
$palabraCollection = cargarColeccionPalabras();
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        //Jugar al wordix con una palabra elegida
        case 1: 
            $nuevaPos = count($partidasCollection);
            $partidasCollection[$nuevaPos] = jugarWordix(numeroDePalabra($palabraCollection), strtolower(ingreseUnNombre()));
            
            break;
        //Jugar al wordix con una palabra aleatoria
        case 2: $partida = jugarWordix(numeroAleatorio($palabraCollection), strtolower(ingreseUnNombre()));        

            break;
        //Mostrar una partida
        case 3:
            mostrarUnaPartida($partidasCollection);
            break;
        //Mostrar la primer partida ganadora
        case 4: 
            echo "Ingrese jugador: ";
            $jugadorGanador = trim(fgets(STDIN));
            echo MostraPrimerPartidaGanadora($partidasCollection, strtoupper($jugadorGanador)) . "\n";
            break;
        //Mostrar resumen de Jugador
        case 5: 
            cargarPartidas();
            for($i = 0; $i < count( cargarPartidas()); $i++){
                echo "coleccionPartidas[" . $i . "] = ";
                foreach( cargarPartidas()[$i] as $indice => $dato){
                    echo $indice . ": " . $dato . " ";
                }  
                echo "\n";
            }        
            break;
        //Mostrar listado de partidas ordenadas por jugador y por palabra
        case 6: $partida = jugarWordix("MELON", strtolower(ingreseUnNombre()));        

            break;
        //Agregar una palabra de 5 letras a Wordix
        case 7: 
            $palabra = leerPalabra5Letras();
            $palabraCollection = agregarPalabra($palabraCollection, $palabra);
            print_r($palabraCollection);
            break;
        default; break;
    }
} while ($opcion != 8);

?>