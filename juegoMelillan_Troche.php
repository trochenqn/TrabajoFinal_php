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
 * Genera un arreglo de letras para jugar.
 * @return array
 */
// (2)// Ese creo que no va 
function cargarLetras(){
    $coleccionLetras = array();
    $coleccionLetras [0] = array("letra" => "l", "descubierta" => true);
    $coleccionLetras [1] = array("letra" => "e", "descubierta" => true);
    $coleccionLetras [2] = array("letra" => "o", "descubierta" => true);
    $coleccionLetras [3] = array("letra" => "n", "descubierta" => true);
    return $coleccionLetras;
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
        $opcion = trim(fgets(STDIN));
        }while (($opcion<1) || ($opcion>8));

    echo "--------------------------------------------------------------\n";
    return $opcion;
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
      //Variables internas: boolean $existe.
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
    // Variable interna: string $palabraNoExiste, $pistaNoExiste.
    // Variable interna: int $contador, $puntosNoExiste.
    // Varibale interna: boolean $noExiste.
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
                $coleccionPalabras[$contador]["palabra"] = $palabraNoExiste;
                $coleccionPalabras[$contador]["pista"] = $pistaNoExiste;
                $coleccionPalabras[$contador]["puntos"] = $puntosNoExiste;
            }else{
            echo "\n La palabra ingresada ya existe  ";
            }
        }while($noExiste <>false);
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
    //Variable interna: int $indiceAleatorio.
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
  //Variable interna: int $auxiliarPalabraNum1, $auxiliarPalabraNum2
  //Variable interna: boolean $auxiliar
    $auxiliar = false;
    $auxiliarPalabraNum1 = count($coleccionLetras);
    $auxiliarPalabraNum2 = 0;
    foreach($coleccionLetras as $key => $value){
        if($value["descubierta"] == !($auxiliar)){
            $auxiliarPalabraNum2 = $auxiliarPalabraNum2 + 1;  // Se incrementa el valor en caso de que descubierta sea verdadero.
        }
    }
     if($auxiliarPalabraNum2 == $auxiliarPalabraNum1){ // Al iniciar se le asigna a $auxiliarPalabraNum1 el valor de la función count en el arreglo $coleccionLetras
                               //si $auxiliarPalabraNum2 y $auxiliarPalabraNum1 son iguales, significa que la palabra se a descubierto!
         $auxiliar = true;
     }else{
        $auxiliar = false; // En el caso que $auxiliarPalabraNum2 y $auxiliarPalabraNum1  no son iguales, eso significa que la palabra no ha sido descubierta.
     }
    return $auxiliar;
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
        if(strlen($letraSolicitada) !=1){ 
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
    print_r($coleccionLetras[$auxiliarLetrasDescubiertas ]["descubierta"]); // print_r — Imprime información "legible para humanos" sobre una variable.
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
    
    $palabras = $coleccionPalabras[$indicePalabra]["palabra"];
    $coleccionLetrasJugar = dividirPalabraEnLetras($palabras); //4
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
    If($palabraFueDescubierta){
        //obtener puntaje:
        $puntaje = $coleccionPalabras[$indicePalabra]["puntosPalabra"];    
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

// (18)
/**
 * Refleja el mayor puntaje de la partida.
 * @param array $coleccionJuegos
 * @return array
 */
function puntajeMayor($coleccionJuegos){
    // Variables internas: array $coleccionDePalabrasPuntaje, $mostrarJuegoPuntaje
    // Variables internas: int $indiceAuxiliar, $indiceDeJuego.
    // Variables internas: string $auxiliarMayor.
    $coleccionDePalabrasPuntaje = cargarPalabras();
    $indiceAuxiliar = 0;
    $indiceDeJuego = (($indiceAuxiliar >= 0) && ($indiceAuxiliar <= 7));
    $auxiliarMayor = " ";
        for ($i=0; $i < count($coleccionJuegos) ; $i++) { 
            for ($j=0; $j < count($coleccionJuegos) -1; $j++) { 
                if($coleccionJuegos[$j] < $coleccionJuegos[$j+1]){
                    $auxiliarMayor = $coleccionJuegos[$j];
                    $coleccionJuegos[$j] = $coleccionJuegos[$j+1];
                    $coleccionJuegos[$j+1] = $auxiliarMayor;
                }
            }
        }
    $mostrarJuegoPuntaje = mostrarJuego($coleccionJuegos, $coleccionDePalabrasPuntaje, $indiceDeJuego);
    return $mostrarJuegoPuntaje;
    }

 // (19)
/**
 * Refleja el puntaje mayor al que solicito el usuario.
 * @param array $coleccionJuegos.
 * @param array $puntajeSolicitado.
 * @return array
 */
// (19)
function superePuntajeSolicitado($coleccionJuegos,$puntajeSolicitado){
    //Variables internas: array $coleccionDeJuegosPuntaje, $coleccionDePalabrasPuntaje, $puntajeMayorAuxiliar.
    //Variables internas int $indiceAuxiliarMenor, $indiceAuxiliarMayor, $indiceDeJuego

    $indiceAuxiliar = 0;
    $indiceDeJuego = (($indiceAuxiliar >= 0) && ($indiceAuxiliar <= 7));
    sort($coleccionJuegos);
        if ($puntajeSolicitado <= 99){
            $n = count($coleccionJuegos);
            $i = 0;
            $maximo = false;
            while ($i < $n &&  !$maximo) {
                $maximo = true;
                $puntajeSolicitado = $puntosObtenidos;
                $indiceJuego = $mostrarJuegoPuntaje;
                echo $mostrarJuegoPuntaje;
                }
        $i++;
       // $mostrarJuegoPuntaje = mostrarJuego($coleccionJuegos, $coleccionDePalabrasPuntaje, $indiceDeJuego);
        }else{
            $mostrarJuegoPuntaje = -1;
            echo "  \n"."           ".$mostrarJuegoPuntaje."\n"."\n";
        }
    return $mostrarJuegoPuntaje;
}

// (20)
/**
 * Ordena la lista de palabras en orden alfabetico
 * @param array $coleccionPalabras
 */
function ordenarPalabrasAlfabeticamente($coleccionPalabras){
    sort($coleccionPalabras);
    print_r ($coleccionPalabras); // La función print_r imprime información sobre la variable de forma "legible para humanos"
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

//Variables internas CASE 6:
    // int $puntajeBrindado.

//Variable internas CASE 7:

define("CANT_INTENTOS", 6); //Constante en php para cantidad de intentos que tendrá el jugador para adivinar la palabra.
$coleccionDePalabrasPrincipal = cargarPalabras(); 
$coleccionJuegosPrincipal = cargarJuegos();
$minimoGeneral = 0;
$cantidadDeIntentos =  CANT_INTENTOS;
do{
    $opcion = seleccionarOpcion();
    switch ($opcion) {
    case 1: //Jugar con una palabra aleatoria.
       
        echo "\n ---------------------------------------------- \n";
        $maximoAleatorio = count($coleccionDePalabrasPrincipal);
        $indicePalabraAleatoria =  indiceAleatorioEntre($minimoGeneral,--$maximoAleatorio);
        jugar($coleccionDePalabrasPrincipal, $indicePalabraAleatoria, $cantidadDeIntentos);
        break;

    case 2: //Jugar con una palabra elegida.
        
        echo "\n ---------------------------------------------- \n";

        $maximoElegida = count($coleccionDePalabrasPrincipal);
        $indiceDePalabraElegida = solicitarIndiceEntre($minimoGeneral,--$maximoElegida);
        jugar($coleccionDePalabrasPrincipal, $indiceDePalabraElegida, $cantidadDeIntentos);
        break;

    case 3: //Agregar una palabra al listado

        echo "\n ---------------------------------------------- \n";
        $coleccionDePalabrasPrincipal = noExistePalabra($coleccionDePalabrasPrincipal);
        print_r($coleccionDePalabrasPrincipal);
        break;

    case 4: //Mostrar la información completa de un número de juego

        echo "\n ---------------------------------------------- \n";
        $maximoMostrar = count($coleccionJuegosPrincipal);
        $indiceJuegoMostrar = solicitarIndiceEntre($minimoGeneral,--$maximoMostrar);
        mostrarJuego($coleccionJuegosPrincipal , $coleccionDePalabrasPrincipal , $indiceJuegoMostrar);
        break;

    case 5: //Mostrar la información completa del primer juego con más puntaje
        
        echo "\n ---------------------------------------------- \n";
        puntajeMayor($coleccionJuegosPrincipal);
        break;

    case 6: //Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario

        echo "\n ---------------------------------------------- \n";
        echo "\n Ingrese un puntaje: ";
        $puntajeBrindado = trim(fgets(STDIN)); 
        superePuntajeSolicitado($coleccionJuegosPrincipal, $puntajeBrindado);
        break;

    case 7: //Mostrar la lista de palabras ordenada por orden alfabetico

        echo "\n ---------------------------------------------- \n";
        $coleccionDePalabrasPrincipal = $coleccionDePalabrasPrincipal;
        ordenarPalabrasAlfabeticamente($coleccionDePalabrasPrincipal);
        break;

    }
}while($opcion != 8);