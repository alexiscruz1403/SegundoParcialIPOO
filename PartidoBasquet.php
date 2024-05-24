<?php

class PartidoBasquet extends Partido{
    //Atributos
    private $cantidadInfracciones; //Int
    private $coeficientePenalizacion; //Double

    //Constructor
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$unaCantidadInfracciones){
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->cantidadInfracciones=$unaCantidadInfracciones;
        $this->coeficientePenalizacion=0.75;
    }

    //Observadores
    public function getCantidadInfracciones(){
        return $this->cantidadInfracciones;
    }
    public function getCoeficientePenalizacion(){
        return $this->coeficientePenalizacion;
    }
    public function __toString(){
        $cadena=parent::__toString();
        $cadena.="Cantidad de infracciones: ".$this->getCantidadInfracciones()."\n".
                    "Coeficiente de penalizacion: ".$this->getCoeficientePenalizacion()."\n";
        return $cadena;
    }

    //Modificadores
    public function setCantidadInfracciones($unaCantidadInfracciones){
        $this->cantidadInfracciones=$unaCantidadInfracciones;
    }
    public function setCoeficientePenalizacion($unCoeficiente){
        $this->coeficientePenalizacion=$unCoeficiente;
    }

    //Propios

    /**
     * Retorna el coeficiente obtenido en el partido
     * @return double
     */
    public function coeficientePartido(){
        $coeficiente=parent::coeficientePartido();
        $coeficientePenalizacion=$this->getCoeficientePenalizacion();
        $cantidadInfracciones=$this->getCantidadInfracciones();
        $coeficiente=$coeficiente-($coeficientePenalizacion*$cantidadInfracciones);
        return $coeficiente;
    }
}