<?php
namespace modele\metier;

class Attribution  {
    private $idGroupe; //type etablisement 
    private $idEtab; //type etablisement 
    private $idTypeChambre; // type typechambre
    private $nombreChambres; // type int
    
    public function __construct($idEtab, $idTypeChambre, $nombreChambres, $idGroupe) {
        $this->idGroupe = $idGroupe;
        $this->idEtab = $idEtab;
        $this->idTypeChambre = $idTypeChambre;
        $this->nombreChambres = $nombreChambres;
    }
    
    function getIdEtab() {
        return $this->idEtab;
    }
    
    function getIdGroupe() {
        return $this->idGroupe;
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
    
    function setIdGroupe($idGroupe) {
        $this->idEtab = $idGroupe;
    }

    function setIdTypeChambre($idTypeChambre) {
        $this->idTypeChambre = $idTypeChambre;
    }

    function setNombreChambres($nombreChambres) {
        $this->nombreChambres = $nombreChambres;
    }


    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

