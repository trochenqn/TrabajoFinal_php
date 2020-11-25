<?php
/******************************************
*Completar:
* ANGEL ADRIAN MELILLAN - FAI-3139
* JOSE LUIS TROCHE - 108488
******************************************/

/**
* genera un arreglo de palabras para jugar
* @return array
*/
// (1)
function cargarPalabras(){
  $coleccionPalabras = array();
  $coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>5);
  $coleccionPalabras[1]= array("palabra"=> "hepatitis" , "pista" => "enfermedad que inflama el higado", "puntosPalabra"=> 8);
  $coleccionPalabras[2]= array("palabra"=> "volkswagen" , "pista" => "marca de vehiculo", "puntosPalabra"=> 10);
  $coleccionPalabras[3]= array("palabra"=> "rock" , "pista" => "genero musical", "puntosPalabra"=> 4);
  $coleccionPalabras[4]= array("palabra"=> "avioneta" , "pista" => "se encuentra en un hangar", "puntosPalabra"=> 7);
  $coleccionPalabras[5]= array("palabra"=> "minotauro" , "pista" => "bestia de la mitologia griega", "puntosPalabra"=> 8);
  $coleccionPalabras[6]= array("palabra"=> "leon" , "pista" => "rey de la selva", "puntosPalabra"=> 6);
  $coleccionPalabras[7]= array("palabra"=> "netflix" , "pista" => "plataforma de entretenimiento online", "puntosPalabra"=> 7);

  return $coleccionPalabras;
}
/**
 * genera un arreglo de letras para jugar 
 * @return array
 */
// 
function cargarLetras(){
    $coleccionLetras = array();
    $coleccionLetras [0] = array("letra" => "l", "descubierta" => true);
    $coleccionLetras [1] = array("letra" => "e", "descubierta" => true);
    $coleccionLetras [2] = array("letra" => "o", "descubierta" => true);
    $coleccionLetras [3] = array("letra" => "n", "descubierta" => true);
    return $coleccionLetras;
}
/**
 * determina los puntos que ganó el jugador
 * @return array
*/
// (2)
function cargarJuegos(){
	$coleccionJuegos = array();
	$coleccionJuegos[0] = array("puntos"=> 0, "indicePalabra" => 1);
	$coleccionJuegos[1] = array("puntos"=> 10,"indicePalabra" => 2);
    $coleccionJuegos[2] = array("puntos"=> 0, "indicePalabra" => 1);
    $coleccionJuegos[3] = array("puntos"=> 8, "indicePalabra" => 0);
    $coleccionJuegos[4] = array("puntos"=> 5,"indicePalabra" => 7);
    $coleccionJuegos[5] = array("puntos"=> 8, "indicePalabra" => 5);
    $coleccionJuegos[6] = array("puntos"=> 10, "indicePalabra" => 6);
    return $coleccionJuegos;
}

/**
* a partir de la palabra genera un arreglo para determinar si sus letras fueron o no descubiertas
* @param string $palabra
* @return array
*/
// (3)
function dividirPalabraEnLetras($palabra){
  
    //Variables internas: array $coleccionLetras
    //Variables internas: int $i
    $coleccionLetras = array();
    for($i = 0; $i < strlen($palabra); $i++){
        $coleccionLetras[$i] = array("letra" => $palabra[$i], "descubierta" => false);
    }
//print_r($coleccionLetras);
return $coleccionLetras;
}

/**
* muestra y obtiene una opcion de menú ***válida***
* @return int
*/
//(4)
function seleccionarOpcion(){
    echo "--------------------------------------------------------------\n";
    echo "\n ( 1 ) Jugar con una palabra aleatoria"; 
    echo "\n ( 2 ) Jugar con una palabra elegida";
    echo "\n ( 3 ) Agregar una palabra al listado ";
    echo "\n ( 4 ) Mostrar la información completa de un número de juego  ";
    echo "\n ( 5 ) Mostrar la información completa del primer juego con más puntaje  ";
    echo "\n ( 6 ) Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario  ";
    echo "\n ( 7 ) Mostrar la lista de palabras ordenada por orden alfabético  ";
    echo "\n ( 8 ) Salir  ";
    do{
        echo " \n Ingrese una opcion valida: ";
        $opcion = trim(fgets(STDIN));
        }while (($opcion<1) || ($opcion>8));

    echo "--------------------------------------------------------------\n";
    return $opcion;
}

/**
* Determina si una palabra existe en el arreglo de palabras
* @param array $coleccionPalabras
* @param string $palabra
* @return boolean
*/
//(5)
function existePalabra($coleccionPalabras,$palabra){
    $i=0;
    $cantPal = count($coleccionPalabras);
    $existe = false;
    while($i<$cantPal && !$existe){
        $existe = $coleccionPalabras[$i]["palabra"] == $palabra;
        $i++;
    }
    
    return $existe;
} 

/**
* Determina si una letra existe en el arreglo de letras
* @param array $coleccionLetras
* @param string $letra
* @return boolean
*/
// (6)
function existeLetra($coleccionLetras,$letra){
    // Variable interna: boolean $encontrado
    $encontrado = false; 
    foreach ($coleccionLetras as $indiceExisteLetras => $valorExisteLetras) {
        if ($valorExisteLetras["letra"] == $letra);
        $encontrado = true;
    }
    return $encontrado;
}

/**
* Solicita los datos correspondientes a un elemento de la coleccion de palabras: palabra, pista y puntaje. 
* Internamente la función también verifica que la palabra ingresada por el usuario no exista en la colección de palabras.
* @param array $coleccionPalabras
* @return array  colección de palabras modificada con la nueva palabra.
*/
//(7)
function noExistePalabra($coleccionPalabras){
    // Variable interna: string $palabra, $pista
    // Variable interna: int $contador, $puntosNoExiste 
    // Varibale interna: boolean $noExiste 
    $noExiste = false;
    $contador = count($coleccionPalabras);
    do{
    echo "\n Ingrese una palabra: ";
    $palabraNoExiste = trim(fgets(STDIN));
    $noExiste = existePalabra($coleccionPalabras,$palabraNoExiste);
     
        if ($noExiste <>true  ){
            echo "\n Ingrese pista: ";
            $pistaNoExiste = trim(fgets(STDIN));
            echo "\n Ingrese los puntos: ";
            $puntosNoExiste = trim(fgets(STDIN));
            $coleccionPalabras[$contador++]= array ("palabra" => $palabraNoExiste, "pista" => $pistaNoExiste, "puntosPalabra" => $puntosNoExiste);
        }else{
          echo "\n La palabra ingresada ya existe  ";
          }
          
        }while($noExiste <>false);

      //  print_r($coleccionPalabras);
        return $coleccionPalabras;
    }

/**
* Obtener indice aleatorio
* @param int $min
* @param int $max
* @return int
*/ 
// (8)
function indiceAleatorioEntre($min,$max){
    // la funcion "rand" se encarga de dar un numero entero aleatorio.
    $i = rand($min,$max); 
    return $i;
}

/**
* solicitar un valor entre min y max
* @param int $min
* @param int $max
* @return int
*/
// (9)
function solicitarIndiceEntre($min,$max){ 
    do{
        echo "Seleccione un valor entre $min y $max: ";
        $indice = trim(fgets(STDIN));
    }while(! ($indice >= $min && $indice <= $max));
    return $indice;
}

/**
* Determinar si la palabra fue descubierta, es decir, todas las letras fueron descubiertas
* @param array $coleccionLetras
* @return boolean
*/
//(10)
function palabraDescubierta($coleccionLetras){
  //Variable interna: int $numero1, $numero2
  //Variable interna: boolean $auxiliar
    $auxiliar = false;
    $numero1 = count($coleccionLetras);
   // $numero1 =   --$numero1;
    $numero2 = 0;
    foreach($coleccionLetras as $clave => $valor){
        if($valor["descubierta"] == !($auxiliar)){
            $numero2 = $numero2 + 1;  // Se incrementa el valor en caso de que descubierta sea verdadero.
        }
    }
     if($numero2 == $numero1){ // Al iniciar se le asigna a $numero1 el valor de la función count en el arreglo $coleccionLetras
                               //si $numero2 y $numero1 son iguales, significa que la palabra se a descubierto!
         $auxiliar = true;
     }else{
        $auxiliar = false; // En el caso que $numero2 y $numero1  no son iguales, eso significa que la palabra no ha sido descubierta.
     }
 
    return $auxiliar;
 }

/**
 * Solicitar una letra para completar la palabra del juego.
* @return $letra
*/
//(11)
function solicitarLetra(){
    $letraCorrecta = false;
    do{
        echo "Ingrese una letra: ";
        //strtolower - Convierte un string a minúsculas
        $letra = strtolower(trim(fgets(STDIN)));
             //strlen — Obtiene la longitud de un string
        if(strlen($letra)!=1){
            echo "Debe ingresar 1 letra!\n";
        }else{
            $letraCorrecta = true;
        }
        
    }while(!$letraCorrecta);
    
    return $letra;
}

/**
* Descubre todas las letras de la colección de letras iguales a la letra ingresada.
* Devuelve la coleccionLetras modificada, con las letras descubiertas
* @param array $coleccionLetras
* @param string $letra
* @return array colección de letras modificada.
*/
// (12)
function destaparLetra($coleccionLetras, $letra){
 
    for($i = 0; $i < count($coleccionLetras); $i++){
        if($coleccionLetras[$i]["letra"] == $letra){
           $coleccionLetras[$i] = array("letra" => $letra , "descubierta" => true);
          // print_r($coleccionLetras);
        }
     }
  return $coleccionLetras;
}

/**
* obtiene la palabra con las letras descubiertas y * (asterisco) en las letras no descubiertas. Ejemplo: he**t*t*s
* @param array $coleccionLetras
* @return string  Ejemplo: "he**t*t*s"
*/
// (13)
function stringLetrasDescubiertas($coleccionLetras){
    //Variable interna: string $pal
    $pal= " ";
    $i = 0;
    $contador = count($coleccionLetras);
    $contador = -- $contador;
    print_r($coleccionLetras[$i]["descubierta"]);

       while ($i <=  $contador ){
        if ( $coleccionLetras[$i]["descubierta"]){
            $pal .= $coleccionLetras[$i]["letra"];
        }else{
            $pal .= "*";
        }
        $i++;
    }

    $pal = trim($pal);
    
    return $pal;
}


/**
* Desarrolla el juego y retorna el puntaje obtenido
* Si descubre la palabra se suma el puntaje de la palabra más la cantidad de intentos que quedaron
* Si no descubre la palabra el puntaje es 0.
* @param array $coleccionPalabras
* @param int $indicePalabra
* @param int $cantIntentos
* @return int puntaje obtenido
*/
// (14)
function jugar($coleccionPalabras, $indicePalabra, $cantIntentos){
    $pal = $coleccionPalabras[$indicePalabra]["palabra"];
    $coleccionLetras = dividirPalabraEnLetras($pal); //4
  //  print_r($coleccionLetras);
    $puntaje = 0;
     $i=0; 
     
    echo "\n PISTA:  ".  $coleccionPalabras[$indicePalabra]["pista"] ." \n";
    $palabraFueDescubierta=false;
    while (($cantIntentos > $i) <> ($palabraFueDescubierta<>false)){
      $corresponde=1; 
      $j=0;  
    echo "\n ---------------------------------------------- \n";
      $letra= solicitarLetra();
      $coleccionLetras= destaparLetra($coleccionLetras, $letra);
   
    while ($j< count($coleccionLetras)) {
  
      if (($coleccionLetras[$j]["letra"]== $letra) && ($coleccionLetras[$j]["descubierta"]== true) ){
            $corresponde=0;
      }
          $j++;
      }
  
      if ($corresponde==0){
        echo "\n La Letra ". $letra ."PERTENECE a la palabra";
         }else{
        echo "\n La Letra ". $letra ." NO pertenece a la palabra. Quedan". --$cantIntentos . "intentos";
        }
   
    echo "\n Palabra a Descubrir: ". stringLetrasDescubiertas($coleccionLetras);
    echo "\n ---------------------------------------------- \n";
       
    $palabraFueDescubierta= palabraDescubierta($coleccionLetras);
      }
       //solicitar letras mientras haya intentos y la palabra no haya sido descubierta:
    If($palabraFueDescubierta){
        //obtener puntaje:
        $puntaje= $coleccionPalabras[$indicePalabra]["puntosPalabra"];
        
        echo "\n¡¡¡¡¡¡GANASTE ".$puntaje." puntos!!!!!!\n";
    }else{
        echo "\n¡¡¡¡¡¡AHORCADO AHORCADO!!!!!!\n";
    }
    
    return $puntaje;
}

/**
* Agrega un nuevo juego al arreglo de juegos
* @param array $coleccionJuegos
* @param int $ptos
* @param int $indicePalabra
* @return array coleccion de juegos modificada
*/
//  (15)
function agregarJuego($coleccionJuegos,$puntos,$indicePalabra){
    $coleccionJuegos[] = array("puntos"=> $puntos, "indicePalabra" => $indicePalabra);    
    return $coleccionJuegos;
}

/**
* Muestra los datos completos de un registro en la colección de palabras
* @param array $coleccionPalabras
* @param int $indicePalabra
*/
//  (16)
function mostrarPalabra($coleccionPalabras,$indicePalabra){
      
      //$coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>7);
    echo '    Palabra: '. $coleccionPalabras[$indicePalabra]["palabra"]."  \n ". '   Pista: '.$coleccionPalabras[$indicePalabra]["pista"]."\n". '    Puntos de la palabra: '.$coleccionPalabras[$indicePalabra] ["puntosPalabra"]."\n";
}


/**
* Muestra los datos completos de un juego
* @param array $coleccionJuegos
* @param array $coleccionPalabras
* @param int $indiceJuego
*/
// (17)
function mostrarJuego($coleccionJuegos,$coleccionPalabras,$indiceJuego){
    //array("puntos"=> 8, "indicePalabra" => 1)
    echo "\n\n";
    echo "<-<-< Juego ".$indiceJuego." >->->\n";
    echo "  Puntos ganados: ".$coleccionJuegos[$indiceJuego]["puntos"]."\n";
    echo "  Información de la palabra:\n";
    mostrarPalabra($coleccionPalabras,$coleccionJuegos[$indiceJuego]["indicePalabra"]);
    echo "\n";
}


/*>>> Implementar las funciones necesarias para la opcion 5 del menú <<<*/ 
/**
 * Refleja el mayor puntaje de la partida
 * @param array $coleccionJuegos
 */
// (18)
function puntajeMayor($coleccionJuegos){
    // Variables internas: array $puntajeMayorAuxiliar, $coleccionDeJuegosPuntaje, $coleccionDePalabrasPuntaje
    // Variables internas: int $indiceAuxiliar, $indiceDeJuego, $mayor
    $coleccionDeJuegosPuntaje = cargarJuegos();
    $coleccionDePalabrasPuntaje = cargarPalabras();
    $indiceAuxiliar = 0;
    $indiceDeJuego = (($indiceAuxiliar >= 0) && ($indiceAuxiliar <= 7));
    $puntajeMayorAuxiliar = $coleccionJuegos[0];
    $mayor = 0;
        if ($puntajeMayorAuxiliar > $mayor) {
            mostrarJuego($coleccionDeJuegosPuntaje, $coleccionDePalabrasPuntaje, $indiceDeJuego);
        }
}

/*>>> Implementar las funciones necesarias para la opcion 6 del menú <<<*/ 
/**
 * 
 * @param array $coleccionJuegos
 * @param array $puntajeSolicitado
 */
// (19)
function superePuntajeSolicitado($coleccionJuegos,$puntajeSolicitado){
    $coleccionDeJuegosPuntaje = cargarJuegos();
    $coleccionDePalabrasPuntaje = cargarPalabras();
  
  //  $indiceDeJuego = count($coleccionJuegos[0]);
  //  $puntajeMayorAuxiliar = $coleccionJuegos[0];
    $error = 0;
    if ($puntajeSolicitado <= 10){
     
       /* foreach ($puntajeMayorAuxiliar as $key) {
            if ($puntajeMayorAuxiliar > $puntajeSolicitado) {
                mostrarJuego($coleccionDeJuegosPuntaje,$coleccionDePalabrasPuntaje,$indiceDeJuego);
            }
        }*/
     }else{
          $error = -1;
          echo "  \n".$error."\n"."\n";
     }
    return $error;
}

/*>>> Implementar las funciones necesarias para la opcion 7 del menú <<<*/ 
/**
 * Ordena la lista de palabras en orden alfabetico
 * @param array $coleccionPalabras
 */
// (20)
function ordenarPalabrasAlfabeticamente($coleccionPalabras){
    sort($coleccionPalabras);
    print_r ($coleccionPalabras); // La función print_r imprime información sobre la variable de forma "legible para humanos"

}

/************************************************/
/************** PROGRAMA PRINCIAL *********/
/***********************************************/
define("CANT_INTENTOS", 6); //Constante en php para cantidad de intentos que tendrá el jugador para adivinar la palabra.

do{
    $opcion = seleccionarOpcion();
    switch ($opcion) {
    case 1: //Jugar con una palabra aleatoria
        echo "\n ---------------------------------------------- \n";

        $coleccionPalabras = cargarPalabras();
        $min= 0;
        $max = count($coleccionPalabras);
        $indicePalabra =  indiceAleatorioEntre($min,--$max);
        $cantIntentos = CANT_INTENTOS;
        jugar($coleccionPalabras, $indicePalabra, $cantIntentos);
        break;
    case 2: //Jugar con una palabra elegida
        echo "\n ---------------------------------------------- \n";

        $coleccionDePalabras = cargarPalabras();
        $minimo = 0;
        $maximo = count($coleccionDePalabras);
        $indiceDePalabra = solicitarIndiceEntre($minimo,--$maximo);
        $cantidadDeIntentos = CANT_INTENTOS;
        jugar($coleccionDePalabras, $indiceDePalabra, $cantidadDeIntentos);

        break;
    case 3: //Agregar una palabra al listado 
       $coleccionDePalabras = cargarPalabras();
        noExistePalabra($coleccionDePalabras);
        break;
    case 4: //Mostrar la información completa de un número de juego
        $coleccionDeJuegosMostrar = cargarJuegos();
        $minimoMostrar = 0;
        $maximoMostrar = count($coleccionDeJuegosMostrar);
        $coleccionDePalabrasMostrar = cargarPalabras();
        $indiceJuegoMostrar = solicitarIndiceEntre($minimoMostrar,--$maximoMostrar);
        mostrarJuego($coleccionDeJuegosMostrar,$coleccionDePalabrasMostrar,$indiceJuegoMostrar);
        break;
    case 5: //Mostrar la información completa del primer juego con más puntaje
        $coleccionDeJuegos = cargarJuegos();
        puntajeMayor($coleccionDeJuegos);
        break;
    case 6: //Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario
        echo "\n Ingrese un puntaje: ";
        $coleccionDeJuegos = cargarJuegos();
        $puntajeBrindado = trim(fgets(STDIN)); 
        superePuntajeSolicitado($coleccionDeJuegos,$puntajeBrindado);
        break;
    case 7: //Mostrar la lista de palabras ordenada por orden alfabetico
        $coleccionDePalabras = cargarPalabras();
        ordenarPalabrasAlfabeticamente($coleccionDePalabras);
        break;
    }
}while($opcion != 8);

