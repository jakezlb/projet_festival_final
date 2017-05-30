<?php
namespace modele\metier;

/**
 * Description of Groupe
 * un groupe musical se produisant au festival
 * @author btssio
 */
class Groupe {
    /**
     * identifiant du groupe
     * @var string
     */
    private $id;
    /**
     * nom du groupe
     * @var string
     */
    private $nom;
    /**
     * nom du responsable du groupe
     * @var string 
     */
    private $identite;
    /**
     * adresse du groupe
     * @var string
     */
    private $adresse;
    /**
     * effectif du groupe
     * @var integer
     */
    private $nbPers;
    /**
     * nom du pays d'origine
     * @var string 
     */
    private $nomPays;
    /**
     * Souhaite un hébergement (O/N)
     * @var char 
     */
    private $hebergement;

    function __construct($id, $nom, $identite, $adresse, $nbPers, $nomPays, $hebergement) {
        $this->id = $id;
        $this->nom = $nom;
        $this->identite = $identite;
        $this->adresse = $adresse;
        $this->nbPers = $nbPers;
        $this->nomPays = $nomPays;
        $this->hebergement = $hebergement;
    }
    
    //ACCESSEURS
    
    /**
     * 
     * @return id
     */
    function getId() {
        return $this->id;
    }
    /**
     * 
     * @return nom
     */
    function getNom() {
        return $this->nom;
    }
    
    /**
     * 
     * @return identite
     */
    function getIdentite() {
        return $this->identite;
    }
    
    /**
     * 
     * @return adresse
     */
    function getAdresse() {
        return $this->adresse;
    }
    
    /**
     * 
     * @return nbPers
     */
    function getNbPers() {
        return $this->nbPers;
    }
    
    /**
     * 
     * @return nomPays
     */
    function getNomPays() {
        return $this->nomPays;
    }

    /**
     * 
     * @return hebergement
     */
    function getHebergement() {
        return $this->hebergement;
    }

    //MUTATEURS
    
    /**
     * 
     * @param type $id
     */
    function setId($id) {
        $this->id = $id;
    }
    
    /**
     * 
     * @param type $nom
     */
    function setNom($nom) {
        $this->nom = $nom;
    }

    /**
     * 
     * @param type $identite
     */
    function setIdentite($identite) {
        $this->identite = $identite;
    }

    /**
     * 
     * @param type $adresse
     */
    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    /**
     * 
     * @param type $nbPers
     */
    function setNbPers($nbPers) {
        $this->nbPers = $nbPers;
    }

    /**
     * 
     * @param type $nomPays
     */
    function setNomPays($nomPays) {
        $this->nomPays = $nomPays;
    }

    /**
     * 
     * @param type $hebergement
     */
    function setHebergement($hebergement) {
        $this->hebergement = $hebergement;
    }


}
