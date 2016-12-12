<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>OffreDAO : test</title>
    </head>

    <body>

        <?php

        use modele\dao\OffreDAO;
        use modele\dao\Bdd;
        use modele\metier\Offre;
        use modele\metier\Etablissement;
        use modele\metier\TypeChambre;

require_once __DIR__ . '/../includes/autoload.php';

        $idEtab = '0350773A';
        $idTypeChambre = 'C2';
        Bdd::connecter();

        echo "<h2>1- OffreDAO</h2>";

        // Test n°1
        echo "<h3>Test getOneById</h3>";
        try {
            $objet = OffreDAO::getOneById2($idEtab,$idTypeChambre);
            var_dump($objet);
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }

        // Test n°2
        echo "<h3>2- getAll</h3>";
        try {
            $lesObjets = OffreDAO::getAll();
            var_dump($lesObjets);
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }

        // Test n°3
        echo "<h3>3- insert</h3>";
        try {
            $idEtab2 = '0350777A';
            $objet11 = new Etablissement('0350777A', 'La Joliverie', '141 route de Clisson', '44230', 'Saint-Sébastien', '0240987456', 'contact@la-joliverie.com', 1, 'Monsieur', 'Bizet', 'Patrick');
            $objet22 = new TypeChambre('C7', 'Dortoir géant');
            \modele\dao\EtablissementDAO::insert($objet11);
            modele\dao\TypeChambreDAO::insert($objet22);
            $idTC2 = 'C7';
            $nbC = 150;
            $objet = new Offre($objet11, $objet22, $nbC);
            $ok = OffreDAO::insert2($objet);
            if ($ok) {
                echo "<h4>ooo réussite de l'insertion ooo</h4>";
                $objetLu = OffreDAO::getOneById2($idEtab2,$idTC2);
                var_dump($objetLu);
            } else {
                echo "<h4>*** échec de l'insertion ***</h4>";
            }
        } catch (Exception $e) {
            echo "<h4>*** échec de la requête ***</h4>" . $e->getMessage();
        }

        // Test n°3-bis
        echo "<h3>3- insert déjà présent</h3>";
        try {
            $id = '0350777A';
            $idtc = 'C7';
            $objet = new Offre($objet11,$objet22,$nbC);
            $ok = OffreDAO::insert2($objet);
            if ($ok) {
                echo "<h4>*** échec du test : l'insertion ne devrait pas réussir  ***</h4>";
                $objetLu = OffreDAO::getOneById2($id,$idtc);
                var_dump($objetLu);
            } else {
                echo "<h4>ooo réussite du test : l'insertion a logiquement échoué ooo</h4>";
            }
        } catch (Exception $e) {
            echo "<h4>ooo réussite du test : la requête d'insertion a logiquement échoué ooo</h4>" . $e->getMessage();
        }

        // Test n°4
        echo "<h3>4- update</h3>";
        try {
            $id = '0350777A';
            $idtc = 'C7';
            $objet->setNombreChambres(12);
            $ok = OffreDAO::update2($id,$idtc,$objet);
            if ($ok) {
                echo "<h4>ooo réussite de la mise à jour ooo</h4>";
                $objetLu = OffreDAO::getOneById2($id,$idtc);
                var_dump($objetLu);
            } else {
                echo "<h4>*** échec de la mise à jour ***</h4>";
            }
        } catch (Exception $e) {
            echo "<h4>*** échec de la requête ***</h4>" . $e->getMessage();
        }

        // Test n°5
        echo "<h3>5- delete</h3>";
        try {
            $ok = OffreDAO::delete2($id,$idtc);
            $ok1 = modele\dao\EtablissementDAO::delete($objet11->getId());
            $ok2 = modele\dao\TypeChambreDAO::delete($objet22->getId());
//          $ok = EtablissementDAO::delete("xxx");
            if ($ok && $ok1 && $ok2) {
                echo "<h4>ooo réussite de la suppression ooo</h4>";
            } else {
                echo "<h4>*** échec de la suppression ***</h4>";
            }
        } catch (Exception $e) {
            echo "<h4>*** échec de la requête ***</h4>" . $e->getMessage();
        }

        Bdd::deconnecter();
        ?>


    </body>
</html>