<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loterie</title>
    <link rel="stylesheet" href="loterie.css?t<?php echo time() ?>">
    <script src="loterie.js" defer></script>
</head>

<body>

    <h1>Veuillez sélectionner 6 cases pour jouer</h1>
    <div id="grille">

        <!-- Pour automatiser la créations des boutons -->
        <?php
        for ($i = 1; $i <= 49; $i++) {

        ?>
            <input type="button" value="<?php echo $i ?>" id="<?php echo $i ?>" onclick="jouer(this.value)" />
            <!-- On intègre un retour à la ligne. On limite à 7 cases par lignes -->
        <?php
            if ($i % 7 == 0)
                echo "<br />";
        }
        ?>
    </div>
    <!-- Ce conteneur va accueilir les numéros qui ont étaient jouer -->
    <div id="selection"></div>

    <!-- Formulaire pour poster les numéros qui ont étaient joué à la page qui va assurer le tirage -->
    <form name="fo" method="post" action="tirage.php">
        <input type="hidden" name="selection" /> <!-- Ceci va lister les numéros qui ont été joué-->
        <input type="submit" value="Jouer" name="jouer">

    </form>

</body>

</html>