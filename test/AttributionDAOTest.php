<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AttributionDAO : test</title>
    </head>

    <body>

        <?php

        use modele\dao\AttributionDAO;
        use modele\dao\Bdd;
        use modele\metier\Etablissement;
        use modele\metier\Groupe;
        use modele\metier\TypeChambre;
        use modele\metier\Attribution;

require_once __DIR__ . '/../includes/autoload.php';

        $idEtab = '0350773A';
        $idTypeChambre = 'C2';
        $idGroupe = 'g004';
        Bdd::connecter();

        echo "<h2>AttributionDAO</h2>";

        // Test n°1
        echo "<h3>1- getOneById</h3>";
        try {
            $getOne = AttributionDAO::getOneById2($idEtab, $idTypeChambre, $idGroupe);
            var_dump($getOne);
        } catch (Exception $e) {
            echo "<h4>*** échec de la requête ***</h4>" . $e->getMessage();
        }

        // Test n°2
        echo "<h3>2- getAll</h3>";
        try {
            $lesObjets = AttributionDAO::getAll();
            var_dump($lesObjets);
        } catch (Exception $e) {
            echo "<h4>*** échec de la requête ***</h4>" . $e->getMessage();
        }

        // Test n°3
        echo "<h3>3- insert</h3>";
        try {
            $idEtab = '0359999A';
            $idTypeChambre = 'C7';
            $idGroupe = 'g015';
            $objet1 = new Etablissement($idEtab, 'La Joliverie', '141 route de Clisson', '44230', 'Saint-Sébastien', '0240987456', 'contact@la-joliverie.com', 1, 'Monsieur', 'Bizet', 'Patrick');
            $objet2 = new TypeChambre($idTypeChambre, 'Dortoir géant');
            $objet3 = new Groupe($idGroupe, 'Pata', null, NULL, 10, 'France', False);
            $objet4 = new Attribution($objet1, $objet2, 3, $objet3);
            $ok = AttributionDAO::insert2($objet4);
            if ($ok) {
                echo "<h4>ooo réussite de l'insertion ooo</h4>";
                $objetLu = AttributionDAO::getOneById2($idEtab, $idTypeChambre, $idGroupe);
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
            $idEtab1 = '0359999A';
            $idTypeChambre1 = 'C7';
            $idGroupe1 = 'g015';
            $objet11 = new Etablissement($idEtab1, 'La Joliverie', '141 route de Clisson', '44230', 'Saint-Sébastien', '0240987456', 'contact@la-joliverie.com', 1, 'Monsieur', 'Bizet', 'Patrick');
            $objet21 = new TypeChambre($idTypeChambre1, 'Dortoir géant');
            $objet31 = new Groupe($idGroupe1, 'Pata', null, NULL, 10, 'France', False);
            $objet41 = new Attribution($objet11, $objet21, 3, $objet31);
            $ok = AttributionDAO::insert2($objet41);
            if ($ok) {
                echo "<h4>*** échec du test : l'insertion ne devrait pas réussir  ***</h4>";
                $objetLu = AttributionDAO::getOneById2($idEtab1, $idTypeChambre1, $idGroupe1);
                //$objetLu = Bdd::getOneById2($id);
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
            $objet11->setCdp('44000');
            $objet11->setVille('Nantes');
            $objet21->setLibelle('Grand dortoir');
            $ok = AttributionDAO::update2($idEtab1, $idTypeChambre1, $idGroupe1, $objet41);
            if ($ok) {
                echo "<h4>ooo réussite de la mise à jour ooo</h4>";
                $objetLu = AttributionDAO::getOneById2($idEtab1, $idTypeChambre1, $idGroupe1);
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
            $ok = AttributionDAO::delete2($idEtab, $idTypeChambre, $idGroupe);
//            $ok = EtablissementDAO::delete("xxx");
            if ($ok) {
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

