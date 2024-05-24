<?php
class Equipo{
    //Atributos
	private $nombre;
	private $capitan;
	private $cantJugadores;
	private $objCategoria;

    //Constructor
	public function __construct($nombre, $capitan,$cantJugadores,$objCategoria){
		$this->nombre=$nombre;
		$this->capitan= $capitan;
		$this->cantJugadores=$cantJugadores;
		$this->objCategoria=$objCategoria;
	}

    //Observadores
    public function getNombre(){
        return $this->nombre;
    }
    public function getCapitan(){
        return $this->capitan;
    }
    public function getCantJugadores(){
        return $this->cantJugadores;
    }
    public function getObjCategoria(){
        return $this->objCategoria;
    }
    public function __toString(){
        //string $cadena
        $cadena = "Nombre: ".$this->getNombre()."\n";
        $cadena = $cadena. "Capitan: ".$this->getCapitan()."\n";
        $cadena = $cadena. "Categoria: ".$this->getObjCategoria()->getDescripcion()."\n";
        $cadena = $cadena. "Cant. Jugadores: ".$this->getCantJugadores()."\n";
        return $cadena;
    }

    //Modificadores
    public function setNombre($nombre){
         $this->nombre= $nombre;
    }
    public function setCapitan($capitan){
         $this->capitan= $capitan;
    }
    public function setCantJugadores($cantJugadores){
         $this->cantJugadores= $cantJugadores;
    }
     public function setObjCategoria($objCategoria){
         $this->objCategoria= $objCategoria;
    }

    //Propios
    public function equals($objEquipo){
        return ($this->getNombre()==$objEquipo->getNombre() && $this->getCapitan()==$objEquipo->getCapitan());
    }
}
?>