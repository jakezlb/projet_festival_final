<?php
namespace modele\dao;

use modele\metier\Offre;
use modele\dao\EtablissementDAO;
use modele\dao\TypeChambreDAO;
use modele\dao\GroupeDAO;
use modele\metier\Attribution;
use PDO;


class AttributionDAO implements IDAO {
    
    protected static function enregVersMetier($enreg) {
        $etablissement = EtablissementDAO::getAll();
        $typeChambre = TypeChambreDAO::getAll();
        $groupe = modele\dao\GroupeDAO::getAll();
        $nbChambres = $enreg['nbChambres'];
        $att = new Attribution($etablissement, $typeChambre, $nbChambres, $groupe);
        return $att;
        
    }
   
    public static function delete($id) {
        $ok = false;
        $requete = "DELETE FROM Groupe WHERE ID = :id";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':id', $id);
        $ok = $stmt->execute();
        $ok = $ok && ($stmt->rowCount() > 0);
        return $ok;
    }

    public static function getAll() {
        
    }

    public static function getOneById($id) {
        
    }

    public static function insert($objet) {
        
    }

    public static function update($id, $objet) {
        $ok = false;
        $requete = "UPDATE Groupe SET idEtab = :idEtab, idTypeChambre = :idTypeChambre, nombreChambres = :nbChambres WHERE idEtab = :id";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $stmt->bindParam(':id', $id);
        $ok = $stmt->execute();
        $ok = $ok && ($stmt->rowCount() > 0);
        return $ok;
    }

//put your code here
}
