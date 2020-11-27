<?php 
/******************************************
*Completar:
* ANGEL ADRIAN MELILLAN - FAI-3139
* JOSE LUIS TROCHE - 108488
******************************************/

/**
* Genera un arreglo de palabras para jugar.
* @return array
*/
// (1)
function cargarPalabras(){
  $coleccionPalabras = array();
  $coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=> 6);
  $coleccionPalabras[1]= array("palabra"=> "hepatitis" , "pista" => "enfermedad que inflama el higado", "puntosPalabra"=> 8);
  $coleccionPalabras[2]= array("palabra"=> "volkswagen" , "pista" => "marca de vehiculo", "puntosPalabra"=> 10);
  $coleccionPalabras[3]= array("palabra"=> "rock" , "pista" => "genero musical", "puntosPalabra"=> 6);
  $coleccionPalabras[4]= array("palabra"=> "avioneta" , "pista" => "se encuentra en un hangar", "puntosPalabra"=> 7);
  $coleccionPalabras[5]= array("palabra"=> "minotauro" , "pista" => "bestia de la mitologia griega", "puntosPalabra"=> 9);
  $coleccionPalabras[6]= array("palabra"=> "leon" , "pista" => "rey de la selva", "puntosPalabra"=> 6);
  $coleccionPalabras[7]= array("palabra"=> "netflix" , "pista" => "plataforma de entretenimiento online", "puntosPalabra"=> 7);
  return $coleccionPalabras;
}

/**
 * Determina los puntos que ganó el jugador.
 * @return array
*/
// (2)
function cargarJuegos(){
	$coleccionJuegos = array();
	$coleccionJuegos[0] = array("puntos"=> 0, "indicePalabra" => 1);
	$coleccionJuegos[1] = array("puntos"=> 10, "indicePalabra" => 2);
    $coleccionJuegos[2] = array("puntos"=> 0, "indicePalabra" => 1);
    $coleccionJuegos[3] = array("puntos"=> 8, "indicePalabra" => 0);
    $coleccionJuegos[4] = array("puntos"=> 5,"indicePalabra" => 7);
    $coleccionJuegos[5] = array("puntos"=> 8, "indicePalabra" => 5);
    $coleccionJuegos[6] = array("puntos"=> 10, "indicePalabra" => 6);
    return $coleccionJuegos;
}

/**
* A partir de la palabra genera un arreglo para determinar si sus letras fueron o no descubiertas.
* @param string $palabra.
* @return array
*/
// (3)
function dividirPalabraEnLetras($palabra){
    //Variables internas: int $auxiliarDividirPalabras.
    $coleccionLetras = array();
    $auxiliarDividirPalabras = 0;
    for($auxiliarDividirPalabras = 0; $auxiliarDividirPalabras < strlen($palabra); $auxiliarDividirPalabras++){ //strlen — Obtiene la longitud de un string.
        $coleccionLetras[$auxiliarDividirPalabras] = array("letra" => $palabra[$auxiliarDividirPalabras], "descubierta" => false);
    }
return $coleccionLetras;
}

/**
* Muestra y obtiene una opcion de menú ***válida***.
* @return int
*/           
// (4)
function seleccionarOpcion(){
    echo "--------------------------------------------------------------\n";
    echo "              ¡¡¡BIENVENIDO AL AHORCADO!!! \n";
    echo "                        +---+ "."\n";
    echo "                        |   |"."\n";
    echo "                        o   |"."\n";
    echo "                       /|\  |"."\n";
    echo "                       / \  |"."\n";
    echo "                            |"."\n";
    echo "--------------------------------------------------------------";
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
        $opcionDelMenu = trim(fgets(STDIN));
        }while (($opcionDelMenu < 1) || ($opcionDelMenu > 8));

    echo "--------------------------------------------------------------\n";
    return $opcionDelMenu;
}

/**
* Determina si una palabra existe en el arreglo de palabras.
* @param array $coleccionPalabras.
* @param string $palabra.
* @return boolean
*/
// (5)
function existePalabra($coleccionPalabras,$palabra){
      //Variables internas: int $auxiliarExistePalabra, $cantPal.
    $auxiliarExistePalabra = 0;
    $cantPal = count($coleccionPalabras); // count — Cuenta todos los elementos de un array.
    $existe = false;
    while($auxiliarExistePalabra < $cantPal && !$existe){
        $existe = $coleccionPalabras[$auxiliarExistePalabra]["palabra"] == $palabra;
        $auxiliarExistePalabra++;
    }
    return $existe;
} 

/**
* Determina si una letra existe en el arreglo de letras.
* @param array $coleccionLetras
* @param string $letra
* @return boolean
*/
// (6)
function existeLetra($coleccionLetras,$letra){
    // Variable interna: string $indiceExisteLetras, $valorExisteLetras.
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
* @param array $coleccionPalabras.
* @return array  colección de palabras modificada con la nueva palabra.
*/
// (7)
function noExistePalabra($coleccionPalabras){
    // Variable interna: string $palabraExiste, $pistaExiste.
    // Variable interna: int $contador, $puntosExiste.
    // Varibale interna: boolean $existeLaPalabra.
    $existeLaPalabra = false;
    $contador = count($coleccionPalabras);
    do{
        echo "\n Ingrese una palabra: ";
        $palabraExiste = trim(fgets(STDIN));
        $existeLaPalabra = existePalabra($coleccionPalabras,$palabraExiste);
            if ($existeLaPalabra <> true  ){
                echo "\n Ingrese pista: ";
                $pistaExiste = trim(fgets(STDIN));
                echo "\n Ingrese los puntos: ";
                $puntosExiste = trim(fgets(STDIN));
                
                array_push($coleccionPalabras, array("palabra" => $palabraExiste,"pista" => $pistaExiste,"puntosPalabra" => $puntosExiste));
                /*
                $coleccionPalabras[$contador]["palabra"] = $palabraExiste;
                $coleccionPalabras[$contador]["pista"] = $pistaExiste;
                $coleccionPalabras[$contador]["puntos"] = $puntosExiste;*/
            }else{
            echo "\n La palabra ingresada ya existe  ";
            }
        }while($existeLaPalabra <> false);
    return $coleccionPalabras;
    }

/**
* Obtiene un indice aleatorio.
* @param int $min.
* @param int $max.
* @return int
*/ 
// (8)
function indiceAleatorioEntre($min,$max){
    $indiceAleatorio = rand($min,$max);     // rand — Genera un número entero aleatorio.
    return $indiceAleatorio;
}

/**
* Solicita un valor entre un minimo y un maximo.
* @param int $min.
* @param int $max.
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
// (10)
function palabraDescubierta($coleccionLetras){
  //Variable interna: int $contadorDeLetras, $auxiliarDeLetras
  //Variable interna: string $keyPalabra, $valuePalabra.
    $descubierta = false;
    $contadorDeLetras = count($coleccionLetras);
    $auxiliarDeLetras = 0;
    foreach($coleccionLetras as $keyPalabra => $valuePalabra){
        if($valuePalabra["descubierta"] == !($descubierta)){
            $auxiliarDeLetras = $auxiliarDeLetras + 1;  // Se incrementa el valor en caso de que descubierta sea verdadero.
        }
    }
    if($auxiliarDeLetras == $contadorDeLetras){ //Si $auxiliarDeLetras y $contadorDeLetras son iguales, significa que la palabra se a descubierto!

         $descubierta = true;
     }else{
        $descubierta = false; // En el caso que $auxiliarDeLetras y $contadorDeLetras no sean iguales, eso significa que la palabra no ha sido descubierta.
     }
    return $descubierta;
 }

/**
 * Solicitar una letra para completar la palabra del juego.
* @return string 
*/
// (11)
function solicitarLetra(){
    //Variable interna: boolean $letraCorrecta.
    $letraCorrecta = false;
    do{
        echo "Ingrese una letra: ";
        $letraSolicitada = strtolower(trim(fgets(STDIN))); //strtolower — Convierte un string a minúsculas
        if(strlen($letraSolicitada) !=1){  // strlen — Nos permite obtener la longitud de un string.
            echo "Debe ingresar 1 letra! \n";
        }else{
            $letraCorrecta = true;
        }  
    }while(!$letraCorrecta);
    return $letraSolicitada;
}

/**
* Descubre todas las letras de la colección de letras iguales a la letra ingresada.
* Devuelve la coleccionLetras modificada, con las letras descubiertas
* @param array $coleccionLetras.
* @param string $letra.
* @return array colección de letras modificada.
*/
// (12)
function destaparLetra($coleccionLetras, $letra){
    //Variable interna: int $auxiliarDestaparLetra.
    $auxiliarDestaparLetra = 0; 
    for($auxiliarDestaparLetra = 0; $auxiliarDestaparLetra < count($coleccionLetras); $auxiliarDestaparLetra++){
        if($coleccionLetras[$auxiliarDestaparLetra]["letra"] == $letra){
           $coleccionLetras[$auxiliarDestaparLetra] = array("letra" => $letra , "descubierta" => true);
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
    //Variable interna: int $auxiliarLetrasDescubiertas, $contadorLetras.
    $pal= " ";
    $auxiliarLetrasDescubiertas = 0;
    $contadorLetras = count($coleccionLetras);
    $contadorLetras = -- $contadorLetras;
    while ($auxiliarLetrasDescubiertas <=  $contadorLetras ){
        if ( $coleccionLetras[$auxiliarLetrasDescubiertas]["descubierta"]){
            $pal .= $coleccionLetras[$auxiliarLetrasDescubiertas]["letra"];
        }else{
            $pal .= "*";
        }
        $auxiliarLetrasDescubiertas++;
    }
    $pal = trim($pal); // trim — Elimina espacio en blanco del inicio y el final de la cadena.
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
    //Variables internas: array $palabras, $coleccionLetrasJugar.
    //Variables internas: int $auxiliarJugar, $corresponde, $auxiliarjugar2.
    //Variables internas: boolean $palabraFueDescubierta.
    //Variables internas: string $letraSolicitadaJugar.
    $palabras = $coleccionPalabras[$indicePalabra]["palabra"];
    $coleccionLetrasJugar = dividirPalabraEnLetras($palabras); //3
    $puntaje = 0;
    $auxiliarJugar = 0; 
    echo "\n PISTA:  ".  $coleccionPalabras[$indicePalabra]["pista"] ." \n";
    $palabraFueDescubierta = false;
    while (($cantIntentos > $auxiliarJugar) <> ($palabraFueDescubierta<>false)){
        $corresponde = 1; 
        $auxiliarJugar2 = 0;  
        echo "\n ---------------------------------------------- \n";
        $letraSolicitadaJugar = solicitarLetra();
        $coleccionLetrasJugar = destaparLetra($coleccionLetrasJugar, $letraSolicitadaJugar);
        
        while ($auxiliarJugar2 < count($coleccionLetrasJugar)) {
            if (($coleccionLetrasJugar[$auxiliarJugar2]["letra"] == $letraSolicitadaJugar) && ($coleccionLetrasJugar[$auxiliarJugar2]["descubierta"] == true) ){
                    $corresponde = 0;
            }
            $auxiliarJugar2++;
        }      
        if ($corresponde == 0){
            echo "\n La letra ". $letraSolicitadaJugar ." PERTENECE a la palabra ";
            }else{
            echo "\n La letra ". $letraSolicitadaJugar ." NO pertenece a la palabra. Quedan ".--$cantIntentos. " intentos \n";
                if ($cantIntentos == 5){ // Dibujo grafico de los intentos que van quedando y como eso transforma al muñeco.
                    echo "                        +---+ "."\n";
                    echo "                        |   |"."\n";
                    echo "                        o   |"."\n";
                    echo "                            |"."\n";
                    echo "                            |"."\n";
                    echo "                            |"."\n";
                }elseif($cantIntentos == 4){
                    echo "                        +---+ "."\n";
                    echo "                        |   |"."\n";
                    echo "                        o   |"."\n";
                    echo "                        |   |"."\n";
                    echo "                            |"."\n";
                    echo "                            |"."\n";
                }elseif($cantIntentos == 3){
                    echo "                        +---+ "."\n";
                    echo "                        |   |"."\n";
                    echo "                        o   |"."\n";
                    echo "                       /|   |"."\n";
                    echo "                            |"."\n";
                    echo "                            |"."\n";
                }elseif($cantIntentos == 2){
                    echo "                        +---+ "."\n";
                    echo "                        |   |"."\n";
                    echo "                        o   |"."\n";
                    echo "                       /|\  |"."\n";
                    echo "                            |"."\n";
                    echo "                            |"."\n";
                }elseif($cantIntentos == 1){
                    echo "\n              ¡Cuidado, te queda 1 intento!\n";
                    echo "                        +---+ "."\n";
                    echo "                        |   |"."\n";
                    echo "                        o   |"."\n";
                    echo "                       /|\  |"."\n";
                    echo "                       /    |"."\n";
                    echo "                            |"."\n";
                 }
            }
        echo "\n Palabra a Descubrir: ". stringLetrasDescubiertas($coleccionLetrasJugar);
        echo "\n ---------------------------------------------- \n";
        $palabraFueDescubierta = palabraDescubierta($coleccionLetrasJugar);
    }
//solicitar letras mientras haya intentos y la palabra no haya sido descubierta:
    If($palabraFueDescubierta && $cantIntentos == 6){        //Obtener puntaje sin errores
        $puntaje = $coleccionPalabras[$indicePalabra]["puntosPalabra"];    
        echo "\n              ¡¡¡¡¡¡GANASTE ". $puntaje ." puntos!!!!!!\n";
        }elseif($palabraFueDescubierta && $cantIntentos == 5) { // Obtener puntaje con errores. 
            $puntaje = $coleccionPalabras[$indicePalabra]["puntosPalabra"]- $cantIntentos;
        //   $puntaje = $puntaje - 1;
            echo "\n              ¡¡¡¡¡¡GANASTE ". $puntaje ." puntos!!!!!!\n";
        }elseif($palabraFueDescubierta && $cantIntentos == 4) {
            $puntaje = $coleccionPalabras[$indicePalabra]["puntosPalabra"] - $cantIntentos;
        //  $puntaje = $puntaje - 2;
            echo "\n              ¡¡¡¡¡¡GANASTE ". $puntaje ." puntos!!!!!!\n";
        }elseif($palabraFueDescubierta && $cantIntentos == 3)  {
            $puntaje = $coleccionPalabras[$indicePalabra]["puntosPalabra"] - $cantIntentos;
        //  $puntaje = $puntaje - 3;
            echo "\n              ¡¡¡¡¡¡GANASTE ". $puntaje ." puntos!!!!!!\n";
        }elseif($palabraFueDescubierta && $cantIntentos == 2) {
            $puntaje = $coleccionPalabras[$indicePalabra]["puntosPalabra"] - $cantIntentos;
        // $puntaje = $puntaje - 4;
            echo "\n              ¡¡¡¡¡¡GANASTE ". $puntaje." puntos!!!!!!\n";
        }elseif($palabraFueDescubierta && $cantIntentos == 1) {
            $puntaje = $coleccionPalabras[$indicePalabra]["puntosPalabra"] - $cantIntentos;
        //   $puntaje = $puntaje - 5;
            echo "\n              ¡¡¡¡¡¡GANASTE ". $puntaje ." puntos!!!!!!\n"; 
    }else{               
        echo "\n           ¡¡¡¡¡¡AHORCADO AHORCADO!!!!!!\n";
        echo "                        +---+ "."\n";
        echo "                        |   |"."\n";
        echo "                        o   |"."\n";
        echo "                       /|\  |"."\n";
        echo "                       / \  |"."\n";
        echo "                            |"."\n";
    }  
    return $puntaje;
}

/**
* Agrega un nuevo juego al arreglo de juegos.
* @param array $coleccionJuegos.
* @param int $puntos.
* @param int $indicePalabra.
* @return array coleccion de juegos modificada.
*/
// (15)
function agregarJuego($coleccionJuegos,$puntos,$indicePalabra){
    $coleccionJuegos[] = array("puntos"=> $puntos, "indicePalabra" => $indicePalabra);    
    return $coleccionJuegos;
}

/**
* Muestra los datos completos de un registro en la colección de palabras
* @param array $coleccionPalabras
* @param int $indicePalabra
*/
// (16)
function mostrarPalabra($coleccionPalabras,$indicePalabra){
      //$coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>7);
    echo '  *              Palabra: '. $coleccionPalabras[$indicePalabra]["palabra"]."\n ". ' *              Pista: '.$coleccionPalabras[$indicePalabra]["pista"]."\n". '  *              Puntos de la palabra: '.$coleccionPalabras[$indicePalabra] ["puntosPalabra"]."\n";
}

/**
* Muestra los datos completos de un juego.
* @param array $coleccionJuegos.
* @param array $coleccionPalabras.
* @param int $indiceJuego.
*/
// (17)
function mostrarJuego($coleccionJuegos,$coleccionPalabras,$indiceJuego){
    //array("puntos"=> 8, "indicePalabra" => 1)
    echo "\n";
    echo "  *********************************************************** \n";
    echo "  *                                                         * \n";
    echo "  *              <-<-< Juego ".$indiceJuego." >->->\n";
    echo "  *             Puntos ganados: ".$coleccionJuegos[$indiceJuego]["puntos"]."\n";
    echo "  *             Información de la palabra: \n";
    mostrarPalabra($coleccionPalabras,$coleccionJuegos[$indiceJuego]["indicePalabra"]);
    echo "  *                                                         * \n";
    echo "  *********************************************************** \n";
    echo "\n";
}

/**
 * Refleja el mayor puntaje de la partida.
 * @param array $coleccionJuegos
 * @return int
 */
// (18)
function puntajeMayor($coleccionJuegos){
    //Variables internas int $auxiliarPuntajeMayor, $auxiliarPuntos.
    //Variables internas: string $value.
    $auxiliarPuntajeMayor = 0;
    $indiceDePuntajes = 0;
    foreach ($coleccionJuegos as $auxiliarPuntos =>$value){ // Recorrido de arreglo exhaustivo para encontrar el mayor puntaje solicitado.
        if ($auxiliarPuntajeMayor < $coleccionJuegos[$auxiliarPuntos]["puntos"]){
            $auxiliarPuntajeMayor = $coleccionJuegos[$auxiliarPuntos]["puntos"];
            $indiceDePuntajes = $auxiliarPuntos;
        }
    }
    return $indiceDePuntajes;
}

/**
 * Refleja el puntaje mayor al que solicito el usuario.
 * @param array $coleccionJuegos.
 * @param int $puntajeSolicitado.
 * @return int
 */
// (19)
function superePuntajeSolicitado($coleccionJuegos,$puntajeSolicitado){
    //Variables internas int  $auxiliarSuperarPuntaje, $indicePuntaje.
    //Variables internas: boolean $maximoSuperado. 
    $indicePuntaje = -1;
    $maximoSuperado = true;
    $auxiliarSuperarPuntaje = 0;
    while ($auxiliarSuperarPuntaje < count($coleccionJuegos) && $maximoSuperado){ // Recorrido de arreglo parcial para encontrar el primer mayor puntaje que el solicitado.
        if ( $coleccionJuegos[$auxiliarSuperarPuntaje]["puntos"] > $puntajeSolicitado) {
            $maximoSuperado = false;
            $indicePuntaje = $auxiliarSuperarPuntaje;
        }
        $auxiliarSuperarPuntaje++;
    }
    return $indicePuntaje;

}
/**
 * Ordena la lista de palabras en orden alfabetico
 * @param array $coleccionPalabras
 */
// (20)
function ordenarPalabrasAlfabeticamente($coleccionPalabras){
    sort($coleccionPalabras); // Ordena los elementos de menor a mayor. 
                                                    // Elimina cualquier clave existente y asigna nuevos índices a partir del 0
    print_r ($coleccionPalabras); // print_r — Imprime información "legible para humanos" sobre una variable.
}

/************************************************/
/************** PROGRAMA PRINCIAL *********/
/***********************************************/
// Variables internas PROGRAMA PRINCIPAL:    
    // array $coleccionDePalabrasAlListado, $coleccionJuegosPrincipal.
    // int $cantidadDeIntentos, $minimoGeneral.


//Variables internas CASE 1:
    // int $minimoAleatorio, $maximoAleatorio, $indicePalabraAleatoria.

//Variables internas CASE 2:
    // int $minimoElegida, $maximoElegida, $indiceDePalabraElegida.

//Variables internas CASE 3:

//Variables internas CASE 4:
    // int $minimoMostrar, $maximoMostrar, $indiceJuegoMostrar.

//Variables internas CASE 5:
    // int $indiceDeJuego

//Variables internas CASE 6:
    // int $puntajeBrindado.

//Variable internas CASE 7:

define("CANT_INTENTOS", 6); //Constante en php para cantidad de intentos que tendrá el jugador para adivinar la palabra.
$coleccionDePalabrasPrincipal = cargarPalabras(); //Constante que carga el arreglo de palabras.
$coleccionJuegosPrincipal = cargarJuegos(); //Constante que cargar el arreglo de juegos.
$minimoGeneral = 0; //Constante de minimo de indices (0).
$cantidadDeIntentos =  CANT_INTENTOS; // Constante de la cantidad de intentos.
do{
    $opcion = seleccionarOpcion(); 
    switch ($opcion) {
    case 1: //Jugar con una palabra aleatoria.
       
        $maximoAleatorio = count($coleccionDePalabrasPrincipal); 
        $indicePalabraAleatoria =  indiceAleatorioEntre($minimoGeneral,--$maximoAleatorio); // Elige un indice aleatorio entre los indices que existen.
        $puntajeActual =  jugar($coleccionDePalabrasPrincipal, $indicePalabraAleatoria, $cantidadDeIntentos); 
        array_push($coleccionJuegosPrincipal, array("puntos"=> $puntajeActual, "indicePalabra" => $indicePalabraAleatoria));
        break;

    case 2: //Jugar con una palabra elegida.

        $maximoElegida = count($coleccionDePalabrasPrincipal);
        $indiceDePalabraElegida = solicitarIndiceEntre($minimoGeneral,--$maximoElegida); // Solicita al usuario un indice entre los indices existentes.
        $puntajeActual = jugar($coleccionDePalabrasPrincipal, $indiceDePalabraElegida, $cantidadDeIntentos);
        array_push($coleccionJuegosPrincipal, array("puntos"=> $puntajeActual, "indicePalabra" => $indiceDePalabraElegida));

        break;

    case 3: //Agregar una palabra al listado

        $coleccionDePalabrasPrincipal = noExistePalabra($coleccionDePalabrasPrincipal); // Comprueba si la palabra ingresada existe, y si no, ingresa los nuevos datos al arreglo.
        break;

    case 4: //Mostrar la información completa de un número de juego
        
        $indiceJuegoMostrar = solicitarIndiceEntre($minimoGeneral,count($coleccionJuegosPrincipal)-1); 
        echo "\n--------------------------------------------------------------\n";
        mostrarJuego($coleccionJuegosPrincipal , $coleccionDePalabrasPrincipal , $indiceJuegoMostrar); // Muestra la partida que el usuario eligió.
        break;

    case 5: //Mostrar la información completa del primer juego con más puntaje

        $indiceDeJuego = puntajeMayor($coleccionJuegosPrincipal); // A partir del arreglo de juegos, encuentra la partida con mayor puntuación 
                                                                                                                        // y brinda el indice al programa.
        mostrarJuego($coleccionJuegosPrincipal, $coleccionDePalabrasPrincipal, $indiceDeJuego); // Muestra la partida con mayor puntaje del juego 
                                                                                                                                                                                // utilizando el indice brindado anteriormente.
        break;

    case 6: //Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario

        echo "\n Ingrese un puntaje: "; // Solicita al usuario que ingrese un puntaje a superar.
        $puntajeBrindado = trim(fgets(STDIN));  
        $puntajeBrindado = superePuntajeSolicitado($coleccionJuegosPrincipal, $puntajeBrindado); // Realiza la función para encontrar el indice.
        mostrarJuego($coleccionJuegosPrincipal, $coleccionDePalabrasPrincipal, $puntajeBrindado);
        break;

    case 7: //Mostrar la lista de palabras ordenada por orden alfabetico

        $coleccionDePalabrasPrincipal = $coleccionDePalabrasPrincipal;  // Se actualizan los valores ingresados en el case 3, para agregarlos a la lista
                                                                                                                                // en la cual se ordenará alfabeticamente. 
        ordenarPalabrasAlfabeticamente($coleccionDePalabrasPrincipal);
        break;

    }
}while($opcion != 8);
