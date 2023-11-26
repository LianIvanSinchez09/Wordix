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
 * Funcion qur obtiene una estructura de datos
 * con ejemplos palabras de 5 letras.
 * @return ARRAY
 */
function cargarColeccionPalabras()
//ARRAY $coleccionPalabras **ARREGLO CON LAS PALABRAS A JUGAR**
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "LAGOS", "POLLO", "AVION", "SOPLA", "BASOS"

    ];

    return ($coleccionPalabras);
}

/**
 * 2)
 * Funcion que almacena la coleccion de partidas
 * @return ARRAY
 */
function cargarPartidas()
{
    $partida = [];
    $partida[0] = ["palabraWordix" => "QUESO", "jugador" =>  "LIAN", "intentos" => 2, "puntaje" =>  21];
    $partida[1] = ["palabraWordix" => "MUJER", "jugador" =>  "FRAN", "intentos" => 1, "puntaje" =>  16];
    $partida[2] = ["palabraWordix" => "GOTAS", "jugador" =>  "LAUTARO", "intentos" => 3, "puntaje" =>  23];
    $partida[3] = ["palabraWordix" => "YUYOS", "jugador" =>  "BEJAMIN", "intentos" => 4, "puntaje" =>  22];
    $partida[4] = ["palabraWordix" => "TINTO", "jugador" =>  "MELINA", "intentos" => 5, "puntaje" =>  21];
    $partida[5] = ["palabraWordix" => "NAVES", "jugador" =>  "CELESTE", "intentos" => 0, "puntaje" =>  0];
    $partida[6] = ["palabraWordix" => "PISOS", "jugador" =>  "FABIO", "intentos" => 1, "puntaje" =>  25];
    $partida[7] = ["palabraWordix" => "MELON", "jugador" =>  "CLAUDIO", "intentos" => 3, "puntaje" =>  14];
    $partida[8] = ["palabraWordix" => "VERDE", "jugador" =>  "ESTEBAN", "intentos" => 2, "puntaje" =>  24];
    $partida[9] = ["palabraWordix" => "GATOS", "jugador" =>  "RODRIGO", "intentos" => 1, "puntaje" =>  25];
    return $partida;
}
/**
 * 3)
 * Funcion que muestra por pantalla un Menu 
 * de Partidas y solicita al usuario una opcion valida
 * @return INT
 */
function seleccionarOpcion()
{
    //INT $opcionMenu
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
    $opcionMenu = numeroRangoValores();
    return $opcionMenu;
}

/** 
 * Funcion que retorna un numero aleatorio
 * @param ARRAY $collection **ARREGLO CON PARTIDAS/PALABRAS**
 * @return ARRAY **INDICE ALEATORIO**
 */
function numeroAleatorio($collection)
{
    return $collection[random_int(1, count($collection))];
    //array_rand
}

/**
 * Funcion que retorna un numero entero del indice del arreglo
 * @param ARRAY $array
 * @return ARRAY
 */
function numeroDePalabra($array)
{
    //INT $index
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
function numeroRangoValores()
{
    $rango = trim(fgets(STDIN));
    while (!($rango >= 1 && $rango <= 8)) {
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
 * @param INT $numeroIndice
 * @param ARRAY $arraycargarpartidas
 */
function mostrarUnaPartida($numeroIndice, $arraycargarpartidas)
{
    $nuevoNumeroIndice = $numeroIndice - 1;
    if ($arraycargarpartidas[$nuevoNumeroIndice]["intentos"] > 6) {
        $arraycargarpartidas[$nuevoNumeroIndice]["intentos"] = "No adivino la palabra";
    }
    echo "\n***********************************\n";
    echo "Partida WORDIX " . ($nuevoNumeroIndice + 1) . ": palabra " . $arraycargarpartidas[$nuevoNumeroIndice]["palabraWordix"] . "\n";
    echo "Jugador: " . $arraycargarpartidas[$nuevoNumeroIndice]["jugador"] . "\n";
    echo "Puntaje: " . $arraycargarpartidas[$nuevoNumeroIndice]["puntaje"] . " puntos\n";
    echo "Intentos: " . $arraycargarpartidas[$nuevoNumeroIndice]["intentos"] . "\n";
    echo "***********************************\n\n";
}

/**
 * 7)
 * Funcion agregarPalabra añade una palabra y la agrega al final del array
 * @param ARRAY $col **COLECCION DE PALABRAS**
 * @param STRING $pal **PALABRA A AÑADIR**
 * @return ARRAY **ARRAY MODIFICADO**
 */
function agregarPalabra($col, $pal)
{
    $col[count($col)] = $pal;
    return $col;
}

/** 10)
 *  Retorna el nombre de un jugador en minusculas
 *  @return STRING
 */
function solicitarJugador()
{
    //STRING $name, $nameTrim, $primerLetra, $aMinuscula
    //BOOLEAN $comprobante
    echo "Ingrese su nombre: ";
    $name = trim(fgets(STDIN));
    $nameTrim = trim($name);
    $primerLetra = $nameTrim[0];
    $comprobante = esPalabra($primerLetra);
    while (!$comprobante) {
        echo "El primer carácter del nombre de usuario debe ser una letra. Introduzca su nombre: ";
        $name = trim(fgets(STDIN));
        $nameTrim = trim($name);
        $primerLetra = $nameTrim[0];
        $comprobante = esPalabra($primerLetra);
    }
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
function cmp($a, $b)
{
    //INT $orden
    if ($a == $b) {
        $orden = 0;
    } elseif ($a < $b) {
        $orden = -1;
    } else {
        $orden = 1;
    }
    return $orden;
}

/**
 * Separa los valores de una colección de partidas entre nombre y 
 * palabra correspondiente y los posiciona dentro de un nuevo array
 * @param ARRAY $array
 * @param INT $position
 * @return ARRAY
 */
function nombreSort($array, $position)
{
    //ARRAY $sortingNames, $sortingWords, $finalSort
    $sortingNames = [];
    $sortingWords = [];
    $finalSort = [];

    for ($i = 0; $i < count($array); $i++) {
        $sortingNames[$i] = $array[$i]['jugador'];
        $sortingWords[$i] = $array[$i]['palabraWordix'];
    }

    for ($i = 0; $i < count($array); $i++) {
        $finalSort[$i] = ['jugador' => $sortingNames[$i], 'palabraWordix' => $sortingWords[$i]];
    }
    return $finalSort;
}

/**
 * Dada una coleccion de palabras, muestra la collection 
 * de partidas ordenada por nombre de jugador elegido y palabra
 * @param ARRAY $collection
 */
function retornarPartidasPorNombre($collection, $position)
{
    //ARRAY $sortedByNames
    $sortedByNames = nombreSort($collection, $position);
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
    //INT $i, $resultado
    //BOOLEAN $encontrado
    $i = 0;
    $encontrado = false;
    while ($i < count($array) && $encontrado == false) {
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
    // ARRAY $nuevaMatriz 
    // INT $nroPartidas, $porcentajeVictoria , $puntajeTotal, $victorias, $int1, $int2, $int3, $int4, $int5, $int6, $k
    // BOOLEAN $found     
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
    $found = false;
    $k = 0;

    while ($k < count($array) && !$found) {
        if ($array[$k]["jugador"] == $persona) {
            $found = true;
        }
        $k++;
    }
    if ($found) {
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i]["jugador"] == $persona && $array[$i]["intentos"] > 0) {
                $victorias = $victorias + 1;
                $nroPartidas = $nroPartidas + 1;
                $puntajeTotal = $puntajeTotal + $array[$i]["puntaje"];
            }

            if ($array[$i]["jugador"] === $persona && $array[$i]["intentos"] < 1) {
                $nroPartidas = $nroPartidas + 1;
            }
            if ($array[$i]["jugador"] == $persona && $array[$i]["intentos"] == 1) {
                $int1 = $int1 + 1;
            }
            if ($array[$i]["jugador"] == $persona && $array[$i]["intentos"] == 2) {
                $int2 = $int2 + 1;
            }
            if ($array[$i]["jugador"] == $persona && $array[$i]["intentos"] == 3) {
                $int3 = $int3 + 1;
            }
            if ($array[$i]["jugador"] == $persona && $array[$i]["intentos"] == 4) {
                $int4 = $int4 + 1;
            }
            if ($array[$i]["jugador"] == $persona && $array[$i]["intentos"] == 5) {
                $int5 = $int5 + 1;
            }
            if ($array[$i]["jugador"] == $persona && $array[$i]["intentos"] == 6) {
                $int6 = $int6 + 1;
            }
        }

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
    } else {
        $puntajeTotal = 0;
        $porcentajeVictoria = 0;
        $nuevaMatriz[0] = [
            "Jugador" => strtolower($persona),
            "Partidas" => 0,
            "Puntaje Total" => 0,
            "Victorias" => 0,
            "Porcentaje" => 0 . "%",
            "Intento 1" => 0,
            "Intento 2" => 0,
            "Intento 3" => 0,
            "Intento 4" => 0,
            "Intento 5" => 0,
            "Intento 6" => 0
        ];
    }
    return $nuevaMatriz;
}

/** Permite al usuario dejar jugar al Wordix con la palabra elegida y almacena la partida
 * @param ARRAY $arrayColeccionPalabras, 
 * @param ARRAY $coleccionCargarPartidas, 
 * @param ARRAY $coleccionNumeroJugador
 * @return ARRAY
 */
function elegirPalabra($palabras, $partidas, $jugador)
{
    $cantPalabras = count($palabras);
    $palabraDisponible = false;

    do { 
        echo "Ingrese numero entre 1 - $cantPalabras: ";      
        $numero = trim(fgets(STDIN));
        $inidice = $numero - 1;

        $palabraAJugar = $palabras[$inidice];          
        $palabraDisponible = verificarPalabra($jugador, $partidas, $palabras, $inidice);
        if ($palabraDisponible) {
            echo $palabraDisponible . " Ups, esa palabra ya fue utilizada! \n";
        }
    } while ($palabraDisponible);

    $partida = jugarWordix($palabraAJugar, $jugador);

    return $partida;
}

function verificarPalabra($jugador, $partidas, $palabras, $inidice){
    $palabraAJugar = false;
    $j = 0; 
    $cantidadPartidas = count($partidas);

    while ($j < $cantidadPartidas && !$palabraAJugar) { 
        if ($jugador == $partidas[$j]["jugador"]) {
            if ($palabras[$inidice] == $partidas[$j]["palabraWordix"]) {
                $palabraAJugar = true;
            }
        }
        $j++; // conteo que se incrementa en cada bucle
    }

    return $palabraAJugar;
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
 * ARRAY $palabraCollection
 * ARRAY $partidasCollection
 * INT $opcion
 * INT $nuevaPos 
 * INT $numeroDePartida
 * STRING $jugadorGanador
 * INT $indice
 * ARRAY $jugadorResumen
 * ARRAY $listado
 * STRING $palabra
 * BOOLEAN $encontrado
 */
$partidasCollection = cargarPartidas(); //ACA TIENE QUE ESTAR
$palabraCollection = cargarColeccionPalabras(); //ACA TIENE QUE ESTAR
$currPosition = count($partidasCollection);
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
            //Jugar al wordix con una palabra elegida
        case 1:
            $nombre = solicitarJugador();
            $nombreMayuscula = strtoupper($nombre);
            $encontrado = elegirPalabra($palabraCollection, $partidasCollection, $nombreMayuscula);                   
            $partidasCollection[$currPosition] = $encontrado;  //almacena todos datos de la partida
            break;
            //Jugar al wordix con una palabra aleatoria
        case 2:
            $partida = jugarWordix(numeroAleatorio($palabraCollection), strtoupper(solicitarJugador()));
            $partidasCollection[$currPosition] = $partida;
            $currPosition++;
            break;
            //Mostrar una partida
        case 3:
            echo "Ingrese un numero de partida: ";
            $numeroDePartida = trim(fgets(STDIN));
            while (($numeroDePartida > count($partidasCollection) || $numeroDePartida < 0)) {
                echo "Numero invalido\n";
                echo "Ingrese un numero valido: ";
                $numeroDePartida = trim(fgets(STDIN));
            }
            mostrarUnaPartida($numeroDePartida, $partidasCollection);
            break;
            //Mostrar la primer partida ganadora
        case 4:
            echo "Ingrese nombre de jugador: ";
            $jugadorGanador = trim(fgets(STDIN));
            $indice = MostraPrimerPartidaGanadora($partidasCollection, strtoupper($jugadorGanador));
            if ($indice > 0) {
                mostrarUnaPartida($indice, $partidasCollection);
            } else {
                echo "\nEl jugador " . $jugadorGanador . " no ganó ninguna partida" . "\n\n";
            }
            break;
            //Mostrar resumen de Jugador
            //Hay error en el puntaje final
        case 5:
            echo "Ingrese jugador: ";
            $jugadorGanador = trim(fgets(STDIN));
            $jugadorResumen = resumenDelJugador($partidasCollection, strtoupper($jugadorGanador));
            for ($i = 0; $i < count($jugadorResumen); $i++) {
                echo "\n***********************************\n";
                foreach ($jugadorResumen[$i] as $indice => $dato) {
                    echo $indice . ": " . $dato . "\n";
                }
                echo "***********************************\n\n";
            }
            break;
            //Mostrar listado de partidas ordenadas por jugador y por palabra
        case 6:
            $listado = retornarPartidasPorNombre($partidasCollection, $currPosition);
            break;
            //Agregar una palabra de 5 letras a Wordix
        case 7:
            $palabra = leerPalabra5Letras();
            $collectionMod = agregarPalabra($palabraCollection, $palabra);
            $palabraCollection = $collectionMod;
            // print_r($palabraCollection);
            break;
        default;
            break;
    }
    // $partidasCollection[$currPosition] = $partida; 
} while ($opcion != 8);

/*
 echo "Ingrese numero: ";
                $numero = trim(fgets(STDIN));

                if (esPalabra($numero)) {
                    do {
                        echo "ERROR. No se permiten letras. Por favor ingrese un numero:";
                        $numero = trim(fgets(STDIN));
                    } while (esPalabra($numero));*/
