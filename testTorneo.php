<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasquet.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'Juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

//Punto 1
$unTorneo=new Torneo(100000);

//Punto 2.a
$partidoBasquetUno=new PartidoBasquet(11,'2024-05-05',$objE7,80,$objE8,120,7);
$partidoBasquetDos=new PartidoBasquet(12,'2024-05-06',$objE9,81,$objE10,110,8);
$partidoBasquetTres=new PartidoBasquet(13,'2024-05-07',$objE11,115,$objE12,85,9);

//Punto 2.b
$partidoFutbolUno=new PartidoFutbol(14,'2024-05-07',$objE1,3,$objE2,2);
$partidoFutbolDos=new PartidoFutbol(15,'2024-05-08',$objE3,0,$objE4,1);
$partidoFutbolTres=new PartidoFutbol(16,'2024-05-09',$objE5,2,$objE6,3);

//Punto 3.a
$partidoNuevoUno=$unTorneo->ingresarPartido($objE5,$objE11,'2024-05-23','Futbol');
if($partidoNuevoUno==null){
    echo "No se pudo ingresar el partido\n";
}else{
    echo "Partido agregado\n";
    echo $partidoNuevoUno;
}

//Punto 3.b
$partidoNuevoDos=$unTorneo->ingresarPartido($objE11,$objE11,'2024-05-23','Basquetbol');
if($partidoNuevoDos==null){
    echo "No se pudo ingresar el partido\n";
}else{
    echo "Partido agregado\n";
    echo $partidoNuevoDos;
}
//Punto 3.c
$partidoNuevoTres=$unTorneo->ingresarPartido($objE9,$objE10,'2024-05-25','Basquetbol');
if($partidoNuevoTres==null){
    echo "No se pudo ingresar el partido\n";
}else{
    echo "Partido agregado\n";
    echo $partidoNuevoTres;
}
//Punto 3.d
$ganadoresBasquet=$unTorneo->darGanadores("basquetbol");
if(count($ganadoresBasquet)!=0){
    echo "GANADORES DE BASQUETBOL\n";
    foreach($ganadoresBasquet as $ganador){
        echo $ganador;
    }
}else{
    echo "NO HAY GANADORES DE PARTIDOS DE BASQUETBOL\n";
}

//Punto 3.e
$ganadoresFutbol=$unTorneo->darGanadores("futbol");
if(count($ganadoresFutbol)!=0){
    echo "GANADORES DE FUTBOL\n";
    foreach($ganadoresFutbol as $ganador){
        echo $ganador;
    }
}else{
    echo "NO HAY GANADORES DE PARTIDOS DE FUTBOL\n";
}

//Punto 3.f
// $arregloInfo=$unTorneo->calcularPremioPartido($partidoNuevoUno);
// echo "Importe premio $".$arregloInfo["premioPartido"]."\n";
// echo "Equipo Ganador: 'n";
// foreach($arregloInfo["equipoGanador"] as $ganador){
// echo $ganador;
// }
// echo "\n";
// No se puede ejecutar porque partidoNuevoUno es null

// $arregloInfo=$unTorneo->calcularPremioPartido($partidoNuevoDos);
// echo "Importe premio $".$arregloInfo["premioPartido"]."\n";
// echo "Equipo Ganador: \n";
// foreach($arregloInfo["equipoGanador"] as $ganador){
//     echo $ganador;
// }
// echo "\n";
//No se puede ejecutar porque partidoNuevoDos es null

$arregloInfo=$unTorneo->calcularPremioPartido($partidoNuevoTres);
echo "Importe premio $".$arregloInfo["premioPartido"]."\n";
echo "Equipo Ganador: \n";
foreach($arregloInfo["equipoGanador"] as $ganador){
    echo $ganador;
}
echo "\n";
?>
