<?php
$selection = trim($_POST["selection"]); // On va rappeler les numéros appliqué par les utilisateurs
$numeros = explode(" ", $selection); //
// La fonction trim va retirer l'espace volontairement mis dans le val+

$tirage = array();     // On va stocker le résultat du tirage dans ce tableau
for ($i = 0; $i < 6; $i++) {
    do {
        $tr = mt_rand(1, 49); //La fonction mt_rand permet de générer un nb aléatoire 
    } while (in_array($tr, $tirage));
    $tirage[] = $tr;
}
// On va afficher combien de bons numéros ont étaient joué par l'utilisateur

$bon = 0; // ça sert à dire qu'au début il y a aucun bon numéro
for ($i = 0; $i < 6; $i++) {
    if (in_array($tirage[$i], $numeros)) // on vérifie la correspondance des numéros
        $bon++;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu de loterie</title>
    <link rel="stylesheet" href="loterie.css?t=<?php echo time() ?>">

</head>

<body>
    <h1>Tirage</h1>
    <h2>Numéros joués</h2>
    <?php for ($i = 0; $i < 6; $i++) { ?>

        <div class="numeros"><?php echo $numeros[$i] ?></div> <!-- Quand on va choisir les 6 num; et on clique sur jouer, on sera diriger vers tirage.php avec les nums pris -->
    <?php } ?>

    <h2>Résultat du tirage</h2>
    <?php for ($i = 0; $i < 6; $i++) { ?>

        <div class="numeros" id="<?php echo $i ?>"><?php echo $tirage[$i] ?></div> <!-- Quand on va choisir les 6 num; et on clique sur jouer, on sera diriger vers tirage.php avec les nums pris -->
    <?php } ?>
    <h2 id="resultat"> Vous avez eu<span> <?php echo $bon ?></span> bon(s) numéro(s)</h2>


    <!-- Pour aider à l'animation du mouvement de mélange des numéros -->

    <script>
        document.body.onload = function() {

            num = "<?php echo $selection ?>".split(" ");
            res = "<?php echo implode(" ", $tirage) ?>".split(" ");

            i = 0;
            j = 0;
            tirer();
        }

        // <!-- i réprésente la case animé -->
        // <!-- J c'est le nombre qui va s'incrémenter au milieu de chaque case-->

        function tirer() {
            t = setTimeout("tirer()", 40);
            if (j < res[i]) {
                j++;
                document.getElementById(i).innerHTML = j;
            } else { // Pour généraliser l'animation dans toutes les cases
                if (num.indexOf(res[i]) != -1) // Pour rajouter en surbrillance les bonnes cases . Le -1 
                {
                    document.getElementById(i).style.borderColor = "#EA2";
                    document.getElementById(i).style.backgroundColor = "#EA2";
                    document.getElementById(i).style.color = "#000";

                }
                j = 0;
                if (i < 5) // Vu qu'on a 6 cases en tout cas, il faut que la valeur soit inférieur à 5
                    i++;
                else {
                    clearTimeout(t);
                    document.getElementById("resultat").style.visibility = "visible"; // avec la fonction CSS ça aide à cacher le résultat jusqu'à l'obtention de tous numéros
                }
            }
        }
    </script>
    <button><a href="index.php" role="button">Recommencer</a></button>

</body>

</html>