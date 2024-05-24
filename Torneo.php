<?php

class Torneo{
    //Atributos 
    private $importePremio; //Double
    private $colObjPartido; //Coleccion Objetos Partido

    //Constructor
    public function __construct($importe){
        $this->importePremio=$importe;
        $this->colObjPartido=array();
    }

    //Observadores
    public function getImportePremio(){
        return $this->importePremio;
    }
    public function getColeccionPartidos(){
        return $this->colObjPartido;
    }
    public function __toString(){
        return "Premio: $".$this->getImportePremio()."\n".
                "Cantidad de partidos: ".count($this->getColeccionPartidos())."\n";
    }

    //Modificadores
    public function setImportePremio($unImporte){
        $this->importePremio=$unImporte;
    }
    public function setColeccionPartidos($unaColeccion){
        $this->colObjPartido=$unaColeccion;
    }

    //Propios

    /**
     * Crea una intancia de Partido, la almacena en la coleccion y la retorna
     * Antes verifica que no se ingrese el mismo equipo dos veces
     * Antes verifica que ambos equipos sean de la misma categoria y tengan la misma cantidad de jugadores
     * Retorna null en caso de que no se pueda crear
     * @param Equipo $objEquipo1
     * @param Equipo $objEquipo2
     * @param string $fecha
     * @param string $tipoPartido
     * @return Partido
     */
    public function ingresarPartido($objEquipo1,$objEquipo2,$fecha,$tipoPartido){
        $nuevoPartido=null;
        $categoriaE1=$objEquipo1->getObjCategoria()->getDescripcion();
        $categoriaE2=$objEquipo2->getObjCategoria()->getDescripcion();
        $cantJugadoresE1=$objEquipo1->getCantJugadores();
        $cantJugadoresE2=$objEquipo2->getCantJugadores();
        $tipoPartidoMinus=strtolower($tipoPartido);
        if($categoriaE1==$categoriaE2 && $cantJugadoresE1==$cantJugadoresE2 && !($objEquipo1->equals($objEquipo2))){
            $nuevoId=count($this->getColeccionPartidos())+1;
            switch($tipoPartidoMinus){
                case "futbol":
                    $nuevoPartido=new PartidoFutbol($nuevoId,$fecha,$objEquipo1,0,$objEquipo2,0);
                    break;
                case "basquetbol":
                    $nuevoPartido=new PartidoBasquet($nuevoId,$fecha,$objEquipo1,0,$objEquipo2,0,0);
                    break;
                default:
                    break;
            }
            $coleccionPartidos=$this->getColeccionPartidos();
            $coleccionPartidos[]=$nuevoPartido;
            $this->setColeccionPartidos($coleccionPartidos);
        }
        return $nuevoPartido;
    }

    /**
     * Retorna una coleccion con los equipos ganadores de los partidos del tipo especificado por parametro
     * Si no encuentra ganadores, retorna una coleccion vacia
     * @param string $deporte
     * @return array
     */
    public function darGanadores($deporte){
        $coleccionPartidos=$this->getColeccionPartidos();
        $coleccionGanadores=array();
        $tipoDeporte=strtolower($deporte);
        switch($tipoDeporte){
            case "futbol":
                foreach($coleccionPartidos as $partido){
                    if($partido instanceof PartidoFutbol){
                        $ganadoresPartido=$partido->darEquipoGanador();
                        foreach($ganadoresPartido as $ganador){
                            array_push($coleccionGanadores,$ganador);
                        }
                    }
                }
                break;
            case "basquetbol":
                foreach($coleccionPartidos as $partido){
                    if($partido instanceof PartidoBasquet){
                        $ganadoresPartido=$partido->darEquipoGanador();
                        foreach($ganadoresPartido as $ganador){
                            array_push($coleccionGanadores,$ganador);
                        }
                    }
                }
                break;
        }
        return $coleccionGanadores;
    }

    /**
     * Retorna un arreglo asociativo con informacion sobre el ganador de un partido, y su premio correspondiente
     * En la clave equipoGanador se almacena una coleccion, pueden haber uno o dos instancias de equipo
     * @param Partido $objPartido
     * @return array
     */
    public function calcularPremioPartido($objPartido){
        $coleccionGanadores=$objPartido->darEquipoGanador();
        $coeficientePartido=$objPartido->coeficientePartido();
        $importePremio=$this->getImportePremio();
        $premioPartido=$coeficientePartido*$importePremio;
        $infoPremio["premioPartido"]=$premioPartido;
        $infoPremio["equipoGanador"]=$coleccionGanadores;
        return $infoPremio;
    }
}