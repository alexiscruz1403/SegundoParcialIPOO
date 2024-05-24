<?php

class PartidoFutbol extends Partido{
    //Atributos
    private $coeficienteMenores;  //Double
    private $coeficienteJuveniles;  //Double
    private $coeficienteMayores; //Double

    //Constructor
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coeficienteMenores=0.13;
        $this->coeficienteMayores=0.27;
        $this->coeficienteJuveniles=0.19;
    }

    //Observadores
    public function getCoeficienteMenores(){
        return $this->coeficienteMenores;
    }
    public function getCoeficienteJuveniles(){
        return $this->coeficienteJuveniles;
    }
    public function getCoeficienteMayores(){
        return $this->coeficienteMayores;
    }
    public function __toString(){
        $cadena=parent::__toString();
        $cadena.="Coeficiente menores: ".$this->getCoeficienteMenores()."\n".
        "Coeficiente juveniles: ".$this->getCoeficienteJuveniles()."\n".
        "Coeficiente mayores: ".$this->getCoeficienteMayores()."\n";
        return $cadena;
    }

    //Modificadores
    public function setCoeficienteMenores($unCoeficiente){
        $this->coeficienteMenores=$unCoeficiente;
    }
    public function setCoeficienteJuveniles($unCoeficiente){
        $this->coeficienteJuveniles=$unCoeficiente;
    }
    public function setCoeficienteMayores($unCoeficiente){
        $this->coeficienteMayores=$unCoeficiente;
    }

    //Propios

    /**
     * Retorna el coeficiente obtenido en el partido
     * @return double
     */
    public function coeficientePartido(){
        $categoriasEquipo=$this->getObjEquipo1()->getObjCategoria()->getDescripcion();
        $categoriasEquipo=strtolower($categoriasEquipo);
        switch($categoriasEquipo){
            case "menores":
                $this->setCoefBase($this->getCoeficienteMenores());
                break;
            case "juveniles":
                $this->setCoefBase($this->getCoeficienteJuveniles());
                break;
            case "mayores":
                $this->setCoefBase($this->getCoeficienteMayores());
                break;
        }
        $coeficiente=parent::coeficientePartido();
        return $coeficiente;
    }
}