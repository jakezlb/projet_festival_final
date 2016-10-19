<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Offre Test</title>
    </head>
    <body>
        <?php
        use modele\metier\Offre;
        require_once __DIR__ . '/../includes/autoload.php';
        echo "<h2>Test unitaire de la classe Offre</h2>";
        $objet = new Offre("0350773A", "C2", 15);
        var_dump($objet);
        ?>
    </body>
</html>