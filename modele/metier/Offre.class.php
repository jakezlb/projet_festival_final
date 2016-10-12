<?php
class Offre {
    private $idEtab;
    private $idTypeChambre;
    private $nombreChambres;
    
    public function __construct($idEtab, $idTypeChambre, $nombreChambres) {
        $this->idEtab = $idEtab;
        $this->idTypeChambre = $idTypeChambre;
        $this->nombreChambres = $nombreChambres;
    }
    function getIdEtab() {
        return $this->idEtab;
    }

    function getIdTypeChambre() {
        return $this->idTypeChambre;
    }

    function getNombreChambres() {
        return $this->nombreChambres;
    }

    function setIdEtab($idEtab) {
        $this->idEtab = $idEtab;
    }

    function setIdTypeChambre($idTypeChambre) {
        $this->idTypeChambre = $idTypeChambre;
    }

    function setNombreChambres($nombreChambres) {
        $this->nombreChambres = $nombreChambres;
    }


    
}
