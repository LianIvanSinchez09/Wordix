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

// 
$palabraCollection = cargarColeccionPalabras();


/**
 * 3.2)
 * Funcion que almacena información de las partidas almenos 10 veces
 * @return ARRAY
 */
function cargarPartidas(){
    $coleccion = [
        ["palabraWordix" => " ", "jugador" => " ", "intentos" => 0, "puntaje" => 0],
        ["palabraWordix" => " ", "jugador" => " ", "intentos" => 0, "puntaje" => 0],
        ["palabraWordix" => " ", "jugador" => " ", "intentos" => 0, "puntaje" => 0],
        ["palabraWordix" => " ", "jugador" => " ", "intentos" => 0, "puntaje" => 0],
        ["palabraWordix" => " ", "jugador" => " ", "intentos" => 0, "puntaje" => 0],
        ["palabraWordix" => " ", "jugador" => " ", "intentos" => 0, "puntaje" => 0],
        ["palabraWordix" => " ", "jugador" => " ", "intentos" => 0, "puntaje" => 0],
        ["palabraWordix" => " ", "jugador" => " ", "intentos" => 0, "puntaje" => 0],
        ["palabraWordix" => " ", "jugador" => " ", "intentos" => 0, "puntaje" => 0],
        ["palabraWordix" => " ", "jugador" => " ", "intentos" => 0, "puntaje" => 0]
    ];
    return $coleccion;
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
    $opcion = trim(fgets(STDIN));
    return $opcion;
}






/**
 * Funcion agregarPalabra añade una palabra y la agrega al final del array
 * @param ARRAY palabraCollection
 * @param STRING 
 */

function agregarPalabra($col, $pal){
    array_push($col, $pal);
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
function numeroDePalabra($col){
    $col = [];
    echo "Ingrese un numero deseado: ";
    $index = trim(fgets(STDIN));

    if ($index >= 0 && $index < count($col)) {
        $numero = $col[$index];
    } else {
        echo "indice fuera de rango";
    }
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


do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        //Jugar al wordix con una palabra elegida
        case 1: $partida = jugarWordix(numeroDePalabra($palabraCollection), strtolower(ingreseUnNombre()));
            
            break;
        //Jugar al wordix con una palabra aleatoria
        case 2: $partida = jugarWordix(numeroAleatorio($palabrasArray), strtolower(ingreseUnNombre()));        

            break;
        //Mostrar una partida
        case 3: $partida = jugarWordix("MELON", strtolower(ingreseUnNombre()));        

            break;
        //Mostrar la primer partida ganadora
        case 4: $partida = jugarWordix("MELON", strtolower(ingreseUnNombre()));        

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
            break;
        default; break;
    }
} while ($opcion != 8);


/*$partida = jugarWordix("MELON", strtolower(ingreseUnNombre()));
//print_r($partida);
//imprimirResultado($partida);*/
