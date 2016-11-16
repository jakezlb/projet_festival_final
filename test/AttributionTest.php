<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Attribution Test</title>
    </head>
    <body>
        <?php
        use modele\metier\Offre;
        use modele\metier\Attribution;
        use modele\metier\Etablissement;
        use modele\metier\TypeChambre;
        use modele\metier\Groupe;
        
        require_once __DIR__ . '/../includes/autoload.php';
        echo "<h2>Test unitaire de la classe Attribution</h2>";
        $objet1 = new TypeChambre("C9", "Dortoir");
        $objet2 = new Etablissement('9999999A', 'La Joliverie', '141 route de Clisson', '44230', 'Saint-Sébastien', '0240987456', 'contact@la-joliverie.com', 1, 'Monsieur', 'Bizet', 'Patrick');
        $objet3 = new Groupe("g999","les Joyeux Turlurons","général Alcazar","Tapiocapolis" ,25,"San Theodoros","N");
        $objet4 = new Attribution($objet2, $objet1, 5 , $objet3);
        var_dump($objet4);
        ?>
    </body>
</html>

