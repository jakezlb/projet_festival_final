<?php

namespace modele\dao;

use modele\dao\EtablissementDAO;
use modele\dao\TypeChambreDAO;
use modele\metier\Attribution;
use PDO;

class AttributionDAO implements IDAO {

    protected static function metierVersEnreg($objetMetier, $stmt) {
        // On utilise bindValue plutôt que bindParam pour éviter des variables intermédiaires
        $stmt->bindValue(':idEtab', $objetMetier->getIdEtab()->getId());
        $stmt->bindValue(':idTypeChambre', $objetMetier->getIdTypeChambre()->getId());
        $stmt->bindValue(':idGroupe', $objetMetier->getIdGroupe()->getId());
        $stmt->bindValue(':nombreChambres', $objetMetier->getNombreChambres());
    }

    protected static function enregVersMetier($enreg) {
        $etablissement = EtablissementDAO::getOneById($enreg['IDETAB']);
        $typeChambre = TypeChambreDAO::getOneById($enreg['IDTYPECHAMBRE']);
        $groupe = GroupeDAO::getOneById($enreg['IDGROUPE']);
        $nbChambres = $enreg['NOMBRECHAMBRES'];
        $att = new Attribution($etablissement, $typeChambre, $nbChambres, $groupe);
        return $att;
    }

    public static function delete($id) {
        
    }

    public static function delete2($idEtab, $idTypeChambre, $idGroupe) {
        $ok = false;
        $requete = "DELETE FROM Attribution WHERE idEtab = :idEtab AND idTypeChambre = :idTypeChambre AND idGroupe = :idGroupe";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':idEtab', $idEtab);
        $stmt->bindParam(':idTypeChambre', $idTypeChambre);
        $stmt->bindParam(':idGroupe', $idGroupe);
        $ok = $stmt->execute();
        $ok = $ok && ($stmt->rowCount() > 0);
        return $ok;
    }

    public static function getAll() {
        $lesObjets = array();
        $requete = "SELECT * FROM Attribution";
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

    public static function getOneById2($idEtab, $idTypeChambre, $idGroupe) {
        $objetConstruit = null;
        $requete = "SELECT * FROM Attribution WHERE idEtab = :idEtab AND idTypeChambre = :idNbC AND idGroupe = :idGroupe";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':idEtab', $idEtab);
        $stmt->bindParam(':idNbC', $idTypeChambre);
        $stmt->bindParam(':idGroupe', $idGroupe);
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
        $requete = "INSERT INTO Attribution VALUES (:idEtab, :idTypeChambre, :idGroupe, :nombreChambres)";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $ok = $stmt->execute();
        var_dump($stmt);
        return ($ok && $stmt->rowCount() > 0);
    }

    public static function update($id, $objet) {
        
    }

    public static function update2($idEtab, $idTypeChambre, $idGroupe, $objet) {
        $ok = false;
        $requete = "UPDATE Attribution SET IDETAB = :idEtab, IDTYPECHAMBRE = :idTypeChambre, "
                . "IDGROUPE = :idGroupe, NOMBRECHAMBRES = :nombreChambres WHERE IDETAB = :idEtab "
                . "AND IDTYPECHAMBRE = :idTypeChambre AND IDGROUPE = :idGroupe";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $stmt->bindParam(':idEtab', $idEtab);
        $stmt->bindParam(':idTypeChambre', $idTypeChambre);
        $stmt->bindParam(':idGroupe', $idGroupe);
        $ok = $stmt->execute();
        $ok = $ok && ($stmt->rowCount() > 0);
        return $ok;
    }

//put your code here
}
