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
        "LAGOS", "POLLO", "AVION", "SOPLA", "VASOS"

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
    $partida[1] = ["palabraWordix" => "MUJER", "jugador" =>  "LIAN", "intentos" => 1, "puntaje" =>  16];
    $partida[2] = ["palabraWordix" => "GOTAS", "jugador" =>  "LIAN", "intentos" => 3, "puntaje" =>  23];
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
    $opcionMenu = solicitarNumeroEntre(1, 8);
    return $opcionMenu;
}

/** 
 * Funcion que retorna un numero aleatorio
 * @param ARRAY $collection **ARREGLO CON PARTIDAS/PALABRAS**
 * @return ARRAY **INDICE ALEATORIO**
 */
function numeroAleatorio($collection)
{
    $numeroAlt = (count($collection)-1);
    return $collection[random_int(0, $numeroAlt)];
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
 * 6)
 * Funcion mostrarUnaPartida recibe un numero entero y un array de partidas. Se usa el numero entero como indice en el array de partidas para buscar X elemento.
 * @param INT $numeroIndice **NUMERO PUESTO POR EL USUARIO**
 * @param ARRAY $arraycargarpartidas **COLECCION DE PARTIDAS**
 */
function mostrarUnaPartida($numeroIndice, $arraycargarpartidas)
{
    //se obtiene el indice con correlacion al numero que eligio el usuario
    $nuevoNumeroIndice = $numeroIndice - 1;
    //se menciona si el jugador elegido no adivino ninguna palabra 
    if ($arraycargarpartidas[$nuevoNumeroIndice]["intentos"] < 1) {
        $arraycargarpartidas[$nuevoNumeroIndice]["intentos"] = "No adivino la palabra";
    }//AGREGAR COMO VARIABLE EL MENSAJE DE ARRIBA
    //menu de partida
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
 *  Retorna el nombre de un jugador en minusculas y verifica si es string. Retorna el nombre modificado en minuscula.
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

/** Funcion compararPorNombre compara con cmp 2 elementos de un array (de partidas en este caso) y devuelve -1 si $colUno < $colDos, 0 si $colUno === $colDos y 1 si $colUno > $colDos
 * @param ARRAY $colUno
 * @param ARRAY $colDos
 * @return INT
 */
function compararPorNombre($colUno, $colDos){
    $result = strcmp($colUno["jugador"], $colDos["jugador"]);
    //IMPORTANTE: si los nombres son iguales o empiezan con la misma letra, se comparara por palabra para mantener consistencia
    if ($result === 0) {
        $result = strcmp($colUno["palabraWordix"], $colDos["palabraWordix"]);
    }
    return $result;
}

/**
 * 3.8)
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
 * 3.9)
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
    //BOOLEAN $found
    
    $nroPartidas = 0;
    $puntajeTotal = 0;
    $victorias = 0;
    $found = false;
    $int1 = 0;
    $int2 = 0;
    $int3 = 0;
    $int4 = 0;
    $int5 = 0;
    $int6 = 0; 
    $k = 0;
    $l = 0;

    //Verifica si el nombre del jugador ingresado jugo una partida
    while ($l < count($array) && !$found) {
        if ($array[$l]["jugador"] == $persona) {
            $found = true;
        }
        $l++;
    }
    // Si es verdadero muestra el resumen total del jugador
    if ($found) {
        while ($k < count($array)) {

            if ($array[$k]["jugador"] == $persona) {
                $intentos = $array[$k]["intentos"];

                if ($intentos > 0) {
                    $victorias++;
                    $nroPartidas++;
                    $puntajeTotal += $array[$k]["puntaje"];
                } 
                else {
                    $nroPartidas++;
                }

                switch ($intentos) {
                    case 1:
                        $int1++;
                        break;
                    case 2:
                        $int2++;
                        break;
                    case 3:
                        $int3++;
                        break;
                    case 4:
                        $int4++;
                        break;
                    case 5:
                        $int5++;
                        break;
                    case 6:
                        $int6++;
                        break;
                    default:
                    break;
                }            
            }
            $k++;                        
        }
            
        $porcentajeVictoria = (($victorias / $nroPartidas) * 100);
            
        $resumenMatriz[0] = [
            "Jugador" => strtolower($persona),
            "Partidas" => $nroPartidas,
            "Puntaje Total" => $puntajeTotal,
            "Victorias" => $victorias,
            "Porcentaje" => $porcentajeVictoria . "%",
            "Adivinadas" => "",
            "    Intento 1" => $int1,
            "    Intento 2" => $int2,
            "    Intento 3" => $int3,
            "    Intento 4" => $int4,
            "    Intento 5" => $int5,
            "    Intento 6" => $int6
        ];
    }
    else { //Muestra un resumen de valor 0 de las partidas del jugador no existente
        $resumenMatriz[0] = [
            "Jugador" => strtolower($persona),
            "Partidas" => 0,
            "Puntaje Total" => 0,
            "Victorias" => 0,
            "Porcentaje" => 0 . "%",
            "Adivinadas" => "",
            "    Intento 1" => 0,
            "    Intento 2" => 0,
            "    Intento 3" => 0,
            "    Intento 4" => 0,
            "    Intento 5" => 0,
            "    Intento 6" => 0
            ];
    }    
    return $resumenMatriz;
}

/**
 * Funcion que verifica si la palabra fue utilizada 
 * antes por el jugador y si fue utilizada antes retorna true
 * @param STRING $jugador
 * @param ARRAY $partidas
 * @param ARRAY $palabras
 * @param ARRAY $inidice
 * @return bool
 */
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

/** Permite al usuario dejar jugar al Wordix con la palabra elegida y almacena la partida
 * @param ARRAY $palabras, 
 * @param ARRAY $partidas, 
 * @param STRING $jugador
 * @return ARRAY
 */
function elegirPalabra($palabras, $partidas, $jugador)
{
    $cantPalabras = count($palabras);
    $palabraDisponible = false;

    do { 
        echo "Ingrese numero entre 1 - $cantPalabras: ";      
        $numero = solicitarNumeroEntre(1, count($palabras));
        $inidice = $numero - 1;

        $palabraAJugar = $palabras[$inidice];          
        $palabraDisponible = verificarPalabra($jugador, $partidas, $palabras, $inidice);
        if ($palabraDisponible) {
            echo $palabraDisponible . " Ups, esta palabra ya fue utilizada! \n";
        }
    } while ($palabraDisponible);

    $partida = jugarWordix($palabraAJugar, $jugador);

    return $partida;
}

/**
 * Funcion palabraAleatoria permite al jugador jugar con una palabra aleatoria, 
 * toma un numero aleatorio y chequea si la palabra fue utilizada antes en 
 * Wordix por el jugador y si fue utilizada la reemplaza por otra.
 * @param ARRAY $palabras
 * @param ARRAY $partidas
 * @param STRING $jugador
 * @return ARRAY
 */
function palabraAleatoria($palabras, $partidas, $jugador){
    $count = 0;
    do {    
        $numeroAlt = numeroAleatorio($palabras);       
        echo "\n\n" . $numeroAlt . "\n\n"; //PERMITE VER LA PALABRA ALEATORIA, DESHABILITAR PARA JUGAR WORDIX NORMALMENTE
            
        $palabraDisponible = verificarPalabraAleatoria($jugador, $partidas, $numeroAlt);
        $count++;
    } while ($palabraDisponible && $count < count($palabras));
    if($count == count($palabras)){
        $partida = "FELICIDADES. Usted ha adivinado todas las palabras del Wordix! Gracias por jugar.\n";
        echo $partida;
    }
    else{
        $partida = jugarWordix($numeroAlt, $jugador);
    }
    return $partida;
}

/**
 * Funcion verificarPalabraAleatoria verifica si la palabra elegida 
 * aleatoriamente no fue usada antes, retorna true si fue utilizada 
 * y false si no. 
 * @param STRING $jugador
 * @param ARRAY $partidas
 * @param ARRAY $inidice
 * @return BOOLEAN
 */
/**
 */
function verificarPalabraAleatoria($jugador, $partidas, $inidice){
    $palabraAJugar = false;
    $j = 0; 
    $cantidadPartidas = count($partidas);
    while (($j < $cantidadPartidas && !$palabraAJugar)) { 
        if ($jugador == $partidas[$j]["jugador"]) {
            if ($inidice == $partidas[$j]["palabraWordix"]) {
                $palabraAJugar = true;
            }
        }
        $j++; // conteo que se incrementa en cada bucle
    }


    return $palabraAJugar;
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

/**Declaración de variables:
* INT $numeroDePartida, $indice, $nuevaPos, $opcion, $currPosition 
* STRING $jugadorGanador, $nombre, $nombreMayuscula
* ARRAY $jugadorResumen, $listado, $collectionMod, $partidasCollection, $palabraCollection
* BOOLEAN $encontrado, $comprobante, $partidaAleatoria
*/

//Inicialización de variables:


//Proceso:
/**
 * Algoritmo Principal, se le muestra un menu al usuario con opciones 
 * para jugar al Wordix, mostrar estadisticas, etc.
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
            $partida = elegirPalabra($palabraCollection, $partidasCollection, $nombreMayuscula);
            $comprobante = is_array($partida);
            if($comprobante){
                $partidasCollection[$currPosition] = $partida;  //almacena todos datos de la partida
                $currPosition++;
                // echo $currPosition;
            }                   
            break;
            //Jugar al wordix con una palabra aleatoria
        case 2:
            $nombre = solicitarJugador();  
            $nombreMayuscula = strtoupper($nombre);                               
            $partidaAleatoria = palabraAleatoria($palabraCollection, $partidasCollection, $nombreMayuscula);
            $comprobante = is_array($partidaAleatoria);
            if($comprobante){
                $partidasCollection[$currPosition] = $partidaAleatoria;
                $currPosition++;
                // echo $currPosition;
            }
            break;
            //Mostrar una partida
        case 3:
            echo "Ingrese un numero de partida entre 1 y " .  count($partidasCollection) . ": ";
            $numeroDePartida = solicitarNumeroEntre(1, count($partidasCollection));
            /* Esto no va ya que supuestamente de otro modulo
            while (($numeroDePartida > count($partidasCollection) || $numeroDePartida < 0)) {
                echo "Numero invalido\n";
                echo "Ingrese un numero valido: ";
                $numeroDePartida = trim(fgets(STDIN));
            }*/
            mostrarUnaPartida($numeroDePartida, $partidasCollection);
            break;
            //Mostrar la primer partida ganadora
        case 4:
            echo "Ingrese nombre de jugador: ";
            $jugadorGanador = trim(fgets(STDIN));
            $comprobante = esPalabra($jugadorGanador);
            if(!$comprobante){
                do{
                    echo "No se permiten numeros, ingrese un nombre: ";
                    $jugadorGanador = trim(fgets(STDIN));
                    $comprobante = esPalabra($jugadorGanador);
                }while(!$comprobante);
            }
            $indice = MostraPrimerPartidaGanadora($partidasCollection, strtoupper($jugadorGanador));
            if ($indice > 0) {
                mostrarUnaPartida($indice, $partidasCollection);
            } else {
                echo "\nEl jugador " . $jugadorGanador . " no ganó ninguna partida" . "\n\n";
            }
            break;
            //Mostrar resumen de Jugador
        case 5:
            echo "Ingrese jugador: ";
            $jugadorGanador = trim(fgets(STDIN));
            $comprobante = esPalabra($jugadorGanador);
            if(!$comprobante){
                do{
                    echo "No se permiten numeros, ingrese un nombre: ";
                    $jugadorGanador = trim(fgets(STDIN));
                    $comprobante = esPalabra($jugadorGanador);
                }while(!$comprobante);
            }
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
            // se arma el array con los nombres y palabras
            for ($i = 0; $i < count($partidasCollection); $i++) {
                $finalSort[$i] = ['jugador' => $partidasCollection[$i]['jugador'], 'palabraWordix' => $partidasCollection[$i]['palabraWordix']];
            }
            //se ordena la lista
            uasort($finalSort, "compararPorNombre");
            print_r($finalSort);
            break;
            //Agregar una palabra de 5 letras a Wordix
        case 7:
            $palabra = leerPalabra5Letras();
            $collectionMod = agregarPalabra($palabraCollection, $palabra);
            $palabraCollection = $collectionMod;
            break;
        default;
            break;
    }
} while ($opcion != 8);
?>