<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Offre Test</title>
    </head>
    <body>
        <?php
        use modele\metier\Offre;
        use modele\metier\Etablissement;
        use modele\metier\TypeChambre;
        
        require_once __DIR__ . '/../includes/autoload.php';
        echo "<h2>Test unitaire de la classe Offre</h2>";
        $objet3 = new TypeChambre("C9", "Dortoir");
        $objet2 = new Etablissement('9999999A', 'La Joliverie', '141 route de Clisson', '44230', 'Saint-Sébastien', '0240987456', 'contact@la-joliverie.com', 1, 'Monsieur', 'Bizet', 'Patrick');
        $objet = new Offre($objet2, $objet3, 5);
        var_dump($objet);
        ?>
    </body>
</html>