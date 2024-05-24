<?php
class Categoria{
    //Atributos
	private $idcategoria;
	private $descripcion;
	 
    //Constructor
	public function __construct($idcategoria, $descripcion ){
		$this->idcategoria=$idcategoria;
		$this->descripcion= $descripcion;
	}

    //Observadores
    public function getIdCategoria(){
        return $this->idcategoria;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function __toString(){
        //string $cadena
        $cadena = "IdCategoria: ".$this->getIdCategoria()."\n";
        $cadena = $cadena. "Descripcion: ".$this->getDescripcion()."\n";
        return $cadena;
    }

    //Modificadores
    public function setIdCategoria($idcategoria){
         $this->idcategoria= $idcategoria;
    }
    public function setDescripcion($descripcion){
         $this->descripcion= $descripcion;
    }
}
?>
