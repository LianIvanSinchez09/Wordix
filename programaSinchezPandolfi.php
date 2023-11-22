<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

// Lian Ivan Sinchez. Legajo: [FAI-4202]. Carrera: TUDW.
// Email: lian.sinchez@est.fi.uncoma.edu.ar - Github: LianIvanSinchez09 - Carrera: TUDW
// Pandolfi Jimenez Francisco/ Legajo: [FAI-4650]. Carrera: TUDW.
// Email: francisco.pandolfi@est.fi.uncoma.edu.ar - Github: FranciscoPJ

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * 1)
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
 * 2)
 * Funcion que almacena información de las partidas
 */
function cargarPartidas(){
    $partida = [];
    $partida[0] = [ "palabraWordix" => "QUESO", "jugador" =>  "LIAN", "intentos" => 2, "puntaje" =>  5];
    $partida[1] = [ "palabraWordix" => "MUJER", "jugador" =>  "FRAN", "intentos" => 1, "puntaje" =>  6];
    $partida[2] = [ "palabraWordix" => "GOTAS", "jugador" =>  "LAUTARO", "intentos" => 3, "puntaje" =>  4];
    $partida[3] = [ "palabraWordix" => "YUYOS", "jugador" =>  "BEJAMIN", "intentos" => 4, "puntaje" =>  3];
    $partida[4] = [ "palabraWordix" => "TINTO", "jugador" =>  "MELINA", "intentos" => 5, "puntaje" =>  2];
    $partida[5] = [ "palabraWordix" => "NAVES", "jugador" =>  "CELESTE", "intentos" => 7, "puntaje" =>  0];
    $partida[6] = [ "palabraWordix" => "PISOS", "jugador" =>  "FABIO", "intentos" => 1, "puntaje" =>  6];
    $partida[7] = [ "palabraWordix" => "MELON", "jugador" =>  "CLAUDIO", "intentos" => 3, "puntaje" =>  4];
    $partida[8] = [ "palabraWordix" => "VERDE", "jugador" =>  "ESTEBAN", "intentos" => 2, "puntaje" =>  5];
    $partida[9] = [ "palabraWordix" => "GATOS", "jugador" =>  "RODRIGO", "intentos" => 1, "puntaje" =>  6];
    return $partida; 
}

/**
 * 3)
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
    // la funcion numeroRangoValores(max, min) agregar parametros sino utilizar en wordix pero sabien que hace a la hora de presentarlo
    $opcion = numeroRangoValores();
    return $opcion;
}

/** 
 * Funcion que retorna un numero aleatorio
 * @return ARRAY
 */
function numeroAleatorio($palabraCollection){
    return $palabraCollection[random_int(0, count($palabraCollection))];
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
 * @param ARRAY $array
 */
function numeroDePalabra($array){
    echo "Ingrese un numero de palabra para jugar: ";
    $index = trim(fgets(STDIN));
    return $array[$index];;
}

/**
 * 5)
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
 * 6)
 * Funcion que tiene un parametro. 
 * Le solicita al usuario un número de partida 
 * y se muestra en pantalla
 * @param INT $parametro
 */
function mostrarUnaPartida($numeroIndice){  
    $nuevoNumeroIndice = $numeroIndice - 1;          
    $array = cargarPartidas();
    if($array[$nuevoNumeroIndice]["intentos"] > 6){
        $array[$nuevoNumeroIndice]["intentos"] = "No adivino la palabra";
    }
        echo "\n***********************************\n";
        echo "Partida WORDIX " . ($nuevoNumeroIndice + 1) . ": palabra " . $array[$nuevoNumeroIndice]["palabraWordix"] . "\n";
        echo "Jugador: " . $array[$nuevoNumeroIndice]["jugador"] . "\n";
        echo "Puntaje: " . $array[$nuevoNumeroIndice]["puntaje"] . " puntos\n";
        echo "Intentos: " . $array[$nuevoNumeroIndice]["intentos"] . "\n";
        echo "***********************************\n\n";
}

/**
 * 7)
 * Funcion agregarPalabra añade una palabra y la agrega al final del array
 * @param ARRAY palabraCollection
 * @param STRING 
 */
 function agregarPalabra($col, $pal){
    $col[count($col)] = $pal;
    return $col;
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
 * Compara 2 valores, si son iguales retorna 0, da un numero 
 * negativo si a es menor que b caso contrario da 1
 * @param INT $a
 * @param INT $b
 * @return INT
 */
function cmp($a, $b) {
    if ($a == $b){
        $orden = 0;}
    elseif($a < $b){
        $orden = -1;}
    else{
        $orden = 1;
    }
    return $orden;
}

/**
 * Separa los valores de una coleccion de partidas entre nombre y 
 * palabra correspondiente y los posiciona dentro de un nuevo array
 * @param ARRAY $array
 * @return ARRAY
 */
function nombreSort($array){
    for($i = 0; $i < count($array); $i++){
        $sortingNames[$i] = $array[$i]['jugador'];
    }
    for($i = 0; $i < count($array); $i++){
        $sortingWords[$i] = $array[$i]['palabraWordix'];
        foreach($sortingNames as $valor){
            $finalSort[$i] = ['palabraWordix' => $sortingWords[$i], 'jugador' => $sortingNames[$i]];
        }
    }
    return $finalSort;
}

/**
 * Dada una coleccion de palabras, muestra la collection 
 * de partidas ordenada por nombre de jugador elegido y palabra
 * @param ARRAY $collection
 */
function retornarPartidasPorNombre($collection){
    $sortedByNames = nombreSort($collection);
    uasort($sortedByNames, 'cmp');
    print_r($sortedByNames);
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
    while ( $i < count($array) && $encontrado == false) {
        if ($array[$i]["jugador"] == $persona && $array[$i]["intentos"] > 0) {
            $encontrado = true;
            $resultado = $i + 1;
        } else {
            $resultado = -1;
        }
        $i++;
    }
    return $resultado;
}


/**
 * 9)
 * funcion que dada la colección de partidas y el 
 * nombre de un jugador, retorne el resumen del jugador
 * @param ARRAY $array
 * @param STRING $persona
 * @return ARRAY
 */
function resumenDelJugador($array, $persona)
{

    $nuevaMatriz = [];
    $nroPartidas = 0;
    $puntajeTotal = 0;
    $victorias = 0;
    $int1 = 0;
    $int2 = 0;
    $int3 = 0;
    $int4 = 0;
    $int5 = 0;
    $int6 = 0;
    for($i = 0; $i < count($array); $i++){
        if($array[$i]["jugador"] === $persona && $array[$i]["intentos"] < 7){
            $victorias = $victorias + 1; 
            $nroPartidas = $nroPartidas + 1;  
        }

        if($array[$i]["jugador"] === $persona && $array[$i]["intentos"] > 6){
            $nroPartidas = $nroPartidas + 1;
        }

        if($array[$i]["jugador"] == $persona && $array[$i]["intentos"] == 1){
            $int1 = $int1 + 1;
        } 
        if($array[$i]["jugador"] == $persona && $array[$i]["intentos"] == 2){
            $int2 = $int2 + 1;
        }
        if($array[$i]["jugador"] == $persona && $array[$i]["intentos"] == 3){
            $int3 = $int3 + 1;
        }
        if($array[$i]["jugador"] == $persona && $array[$i]["intentos"] == 4){
            $int4 = $int4 + 1;
        }
        if($array[$i]["jugador"] == $persona && $array[$i]["intentos"] == 5){
            $int5 = $int5 + 1;
        }
        if($array[$i]["jugador"] == $persona && $array[$i]["intentos"] == 6){
            $int6 = $int6 + 1;
        } 
        
    }
    $puntajeTotal = $puntajeTotal + $int1 * 6 + $int2 * 5 + $int3 * 4 + $int4 * 3 + $int5 * 2 + $int6 * 1;
    $porcentajeVictoria = (($victorias / $nroPartidas) * 100);
    $nuevaMatriz[0] = [
        "Jugador" => strtolower($persona), 
        "Partidas" => $nroPartidas, 
        "Puntaje Total" => $puntajeTotal, 
        "Victorias" => $victorias, 
        "Porcentaje" => $porcentajeVictoria . "%",
        "Intento 1" => $int1,
        "Intento 2" => $int2, 
        "Intento 3" => $int3, 
        "Intento 4" => $int4, 
        "Intento 5" => $int5, 
        "Intento 6" => $int6
    ];
    return $nuevaMatriz;
}

function arrayNumeroPalabra(){
    $arrayNumero = [];
    $arrayNumero[0] = ["numero" => 1, "nombre" =>  "LIAN" ];
    $arrayNumero[1] = ["numero" => 0, "nombre" =>  "FRAN" ];
    $arrayNumero[2] = ["numero" => 6, "nombre" =>  "LAUTARO"];
    $arrayNumero[3] = ["numero" => 12, "nombre" =>  "BEJAMIN"];
    $arrayNumero[4] = ["numero" => 8, "nombre" =>  "MELINA"];
    $arrayNumero[5] = ["numero" => 9, "nombre" =>  "CELESTE"];
    $arrayNumero[6] = ["numero" => 14, "nombre" =>  "FABIO"];
    $arrayNumero[7] = ["numero" => 11, "nombre" =>  "CLAUDIO"];
    $arrayNumero[8] = ["numero" => 10, "nombre" =>  "ESTEBAN"];
    $arrayNumero[9] = ["numero" => 5, "nombre" =>  "RODRIGO"];
    return $arrayNumero;
}

function elegirPalabra($array){
    $numerosDePartida = arrayNumeroPalabra();
    $encontrado = false;
    $a = 0;
    echo "Ingrese nombre: ";
    $nombre = trim(fgets(STDIN));
    $nombreMayuscula = strtoupper($nombre);
    echo "Ingrese numero: ";
    $numero = trim(fgets(STDIN));

    //verifica si el numero fue elegido anteriormente
    while ($a < count($numerosDePartida) && $encontrado == false) {
        if ($numerosDePartida[$a]["nombre"] == $nombreMayuscula && $numerosDePartida[$a]["numero"] == $numero) {
            echo "Este numero ya existe. ";
            echo "\nIngrese un nuevo numero: ";
            $numero = trim(fgets(STDIN));
            if($numerosDePartida[$a]["numero"] == $numero){
                do{
                    echo "Ingrese nuevo numero: ";
                    $numero = trim(fgets(STDIN));
                }while($numerosDePartida[$a]["numero"] == $numero);
            }
            $encontrado = true;
        }
        $a++;
}

    //almacena nombre del jugador y numero de palabra asignada
    $nuevaPosicion = count($numerosDePartida);
    $numerosDePartida[$nuevaPosicion] = ["numero" => $numero, "nombre" => $nombreMayuscula];

    //almacena todos datos de la partida
    $nuevaPos = count($array);
    $partidaJugada = jugarWordix($array[$numero-1], $nombreMayuscula);
    $array[$nuevaPos] = $partidaJugada;
    print_r($partidaJugada);
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
/**
 * Algoritmo Principal, se le muestra un menu al usuario con opciones para jugar al Wordix, mostrar estadisticas, etc.
 * ARRAY $palabraCollection - arreglo con las palabras con las que se puede jugar al Wordix.
 * ARRAY $partidasCollection - arreglo con informacion de partidas de Wordix.
 * INT $opcion - numero de opcion, segun su valor se ejecuta una opcion diferente para jugar al Wordix o mostrar ciertas estadisticas.
 * INT $nuevaPos 
 * INT $numeroDePartida
 * STRING $jugadorGanador
 * INT $indice
 * ARRAY $jugadorResumen
 * ARRAY $listado
 * STRING $palabra
 */
do {
    $palabraCollection = cargarColeccionPalabras(); //ACA TIENE QUE ESTAR
    $partidasCollection = cargarPartidas(); //ACA TIENE QUE ESTAR
    $opcion = seleccionarOpcion();
    $numerosDePartida = arrayNumeroPalabra();
    $encontrado = false;
    $a = 0;
    switch ($opcion) {
        //Jugar al wordix con una palabra elegida
        case 1:
            elegirPalabra($palabraCollection);
            break;
        //Jugar al wordix con una palabra aleatoria
        case 2: 
            jugarWordix(numeroAleatorio($palabraCollection), strtolower(ingreseUnNombre()));
            break;
        //Mostrar una partida
        case 3:
            echo "Ingrese un numero de partida: ";
            $numeroDePartida = trim(fgets(STDIN));
            while(($numeroDePartida > count($partidasCollection) || $numeroDePartida < 0)){
                echo "Numero invalido\n";
                echo "Ingrese un numero valido: ";
                $numeroDePartida = trim(fgets(STDIN));
            }
            mostrarUnaPartida($numeroDePartida);
            break;
        //Mostrar la primer partida ganadora
        case 4: 
            echo "Ingrese nombre de jugador: ";
            $jugadorGanador = trim(fgets(STDIN));
            $indice = MostraPrimerPartidaGanadora($partidasCollection, strtoupper($jugadorGanador));
            if($indice > 0){

                mostrarUnaPartida($indice);
            } 
            else{
                echo "\nEl jugador " . $jugadorGanador . " no ganó ninguna partida" . "\n\n";
            }
            break;
        //Mostrar resumen de Jugador
        //Hay error en el puntaje final
        case 5: 
            echo "Ingrese jugador: ";
            $jugadorGanador = trim(fgets(STDIN));
            $jugadorResumen = resumenDelJugador($partidasCollection, strtoupper($jugadorGanador));
            for($i = 0; $i < count($jugadorResumen); $i++) {
                echo "\n***********************************\n";
                foreach ($jugadorResumen[$i] as $indice => $dato) {
                    echo $indice . ": " . $dato . "\n";
                }
                echo "***********************************\n\n";
            }   
            break;
        //Mostrar listado de partidas ordenadas por jugador y por palabra
        case 6: 
            $listado = retornarPartidasPorNombre($partidasCollection);
            print_r($listado);
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