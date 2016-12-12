<?php
namespace modele\dao;

use modele\metier\Offre;
use modele\dao\EtablissementDAO;
use modele\dao\TypeChambreDAO;
use PDO;


class OffreDAO implements IDAO {
    
    protected static function enregVersMetier($enreg) {
        $typeChambre = TypeChambreDAO::getOneById($enreg['IDTYPECHAMBRE']);
        $etablissement = EtablissementDAO::getOneById($enreg['IDETAB']);
        $nbChambres = $enreg['NOMBRECHAMBRES'];
        
        $offre = new Offre($etablissement, $typeChambre, $nbChambres);
        return $offre;
        
    }
   protected static function metierVersEnreg($objetMetier, $stmt) {
        // On utilise bindValue plutôt que bindParam pour éviter des variables intermédiaires
        $stmt->bindValue(':idEtab', $objetMetier->getIdEtab()->getId());
        $stmt->bindValue(':idTypeChambre', $objetMetier->getIdTypeChambre()->getId());
        $stmt->bindValue(':nombreChambres', $objetMetier->getNombreChambres());
    }
    
    public static function delete($id) {
       
    }
    public static function delete2($idEtab,$idTypeChambre) {
        $ok = false;
        $requete = "DELETE FROM Offre WHERE idEtab = :idEtab AND idTypeChambre = :idTypeChambre";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':idEtab', $idEtab);
        $stmt->bindParam(':idTypeChambre', $idTypeChambre);
        $ok = $stmt->execute();
        $ok = $ok && ($stmt->rowCount() > 0);
        return $ok;
    }

    public static function getAll() {
        $lesObjets = array();
        $requete = "SELECT * FROM Offre";
        $stmt = Bdd::getPdo()->prepare($requete);
        $ok = $stmt->execute();
        if ($ok) {
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lesObjets[] = self::enregVersMetier($enreg);
            }
        }
        return $lesObjets;
    }

    public static function getOneById($id) {
        
    }
    public static function getOneById2($idEtab,$idTypeChambre) {
        $objetConstruit = null;
        $requete = "SELECT * FROM Offre WHERE idEtab = :idEtab AND idTypeChambre = :idNbC";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':idEtab', $idEtab);
        $stmt->bindParam(':idNbC', $idTypeChambre);
        $ok = $stmt->execute();
        // attention, $ok = true pour un select ne retournant aucune ligne
        if ($ok && $stmt->rowCount() > 0) {
            $objetConstruit = self::enregVersMetier($stmt->fetch(PDO::FETCH_ASSOC));
        }
        return $objetConstruit;
    }
    

    public static function insert($objet) {
        
    }
    
    public static function insert2($objet) {
        $requete = "INSERT INTO Offre VALUES (:idEtab, :idTypeChambre, :nombreChambres)";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $ok = $stmt->execute();
        var_dump($stmt);
        return ($ok && $stmt->rowCount() > 0);
    }
    
    public static function update($id, $objet) {
        
    }
    public static function update2($idEtab, $idTypeChambre, $objet) {
        $ok = false;
        $requete = "UPDATE Offre SET NOMBRECHAMBRES = :nombreChambres,  IDETAB = :id, IDTYPECHAMBRE = :idTypeChambre WHERE idEtab = :id AND idTypeChambre = :idTypeChambre";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $stmt->bindParam(':id', $idEtab);
        $stmt->bindParam(':idTypeChambre', $idTypeChambre);
        $ok = $stmt->execute();
        $ok = $ok && ($stmt->rowCount() > 0);
        return $ok;
    }

//put your code here
}
