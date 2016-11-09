<?php
namespace modele\dao;

use modele\metier\Offre;
use modele\dao\EtablissementDAO;
use modele\dao\TypeChambreDAO;
use PDO;


class OffreDAO implements IDAO {
    
    protected static function enregVersMetier($enreg) {
        $typeChambre = TypeChambreDAO::getAll();
        $etablissement = EtablissementDAO::getAll();
        $nbChambres = $enreg['nbChambres'];
        
        $offre = new Offre($etablissement, $typeChambre, $nbChambres);
        return $offre;
        
    }
   
    public static function delete($id) {
        $ok = false;
        $requete = "DELETE FROM Offre WHERE ID = :id";
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
        $requete = "UPDATE Offre SET idEtab = :idEtab, idTypeChambre = :idTypeChambre, nombreChambres = :nbChambres WHERE idEtab = :id";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $stmt->bindParam(':id', $id);
        $ok = $stmt->execute();
        $ok = $ok && ($stmt->rowCount() > 0);
        return $ok;
    }

//put your code here
}
