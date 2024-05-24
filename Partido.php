<?php
class Partido{
    //Atributos
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    //Constructor
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
            $this->idpartido = $idpartido;
            $this->fecha = $fecha;
            $this->objEquipo1 =$objEquipo1;
            $this->cantGolesE1 = $cantGolesE1;
            $this->objEquipo2 = $objEquipo2;
            $this->cantGolesE2 = $cantGolesE2;
            $this->coefBase = 0.5;


    }

    //Observadores
    public function getIdpartido(){
        return $this->idpartido;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getObjEquipo1(){
        return $this->objEquipo1;
    }
    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }
    public function getObjEquipo2(){
        return $this->objEquipo2;
    }
    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }
    public function getCoefBase(){
        return $this->coefBase;
    }
    public function __toString(){
        //string $cadena
        $cadena = "Id del partido: ".$this->getIdpartido()."\n";
        $cadena = $cadena. "Fecha: ".$this->getFecha()."\n";
        $cadena = $cadena."\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 1> "."\n".$this->getObjEquipo1();
        $cadena = $cadena. "Cantidad Goles E1: ".$this->getCantGolesE1()."\n";
        $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 2> "."\n".$this->getObjEquipo2();
        $cadena = $cadena. "Cantidad Goles E2: ".$this->getCantGolesE2()."\n";
        $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        return $cadena;
    }

    //Modificadores
    public function setidpartido($idpartido){
        $this->idpartido= $idpartido;
    }
    public function setFecha($fecha){
        $this->fecha= $fecha;
    }
    public function setObjEquipo1($objEquipo1){
        $this->objEquipo1= $objEquipo1;
    }
    public function setCantGolesE1($cantGolesE1){
        $this->cantGolesE1= $cantGolesE1;
    }
    public function setObjEquipo2($objEquipo2){
        $this->objEquipo2= $objEquipo2;
    }
    public function setCantGolesE2($cantGolesE2){
        $this->cantGolesE2= $cantGolesE2;
    }
    public function setCoefBase($coefBase){
         $this->coefBase = $coefBase;
    }
    //Propios

    /**
     * Retorna una coleccion con el ganador del equipo
     * Gana el equipo que haya metido mas goles
     * En caso de empate, retorna ambos equipos
     * @return array
     */
    public function darEquipoGanador(){
        $ganadores=array();
        $golesE1=$this->getCantGolesE1();
        $golesE2=$this->getCantGolesE2();
        if($golesE1>$golesE2){
            $equipo1=$this->getObjEquipo1();
            array_push($ganadores,$equipo1);
        }else{
            if($golesE2>$golesE1){
                $equipo2=$this->getObjEquipo2();
                array_push($ganadores,$equipo2);
            }else{
                $equipo1=$this->getObjEquipo1();
                $equipo2=$this->getObjEquipo2();
                array_push($ganadores,$equipo1,$equipo2);
            }
        }
        return $ganadores;
    }

    /**
     * Retorna el coeficiente obtenido en el partido
     * @return double
     */
    public function coeficientePartido(){
        $coeficienteBase=$this->getCoefBase();
        $golesE1=$this->getCantGolesE1();
        $golesE2=$this->getCantGolesE2();
        $golesTotal=$golesE1+$golesE2;
        $cantJugadoresE1=$this->getObjEquipo1()->getCantJugadores();
        $cantJugadoresE2=$this->getObjEquipo2()->getCantJugadores();
        $cantJugadoresTotal=$cantJugadoresE1+$cantJugadoresE2;
        $coeficiente=$coeficienteBase*$golesTotal*$cantJugadoresTotal;
        return $coeficiente;
    }
}
?>