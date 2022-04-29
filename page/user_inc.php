<?php include_once("./page/connect_BDD.php") ?>
<?php

try {
    // On récupère tout le contenu de la table recipes
    $sqlQuery = 'SELECT * FROM client';
    $recipesStatement = $_bdd->prepare($sqlQuery);
    $recipesStatement->execute();
    $users = $recipesStatement->fetchAll();

    // On affiche chaque recette une à une


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
<?php

foreach ($users as $user) {

    if ($user['email'] === $_SESSION['nom']) {
        echo
        '<ul>' .
            '<li>' . "Nom : " . $user['nom'] . '</li>' .
            '<li>' . "Prénom : " . $user['prenom'] . '</li>' .
            '<li>' . "Age : " . $user['age'] . '</li>' .
            '<li>' . "Email : " . $user['email'] . '</li>' .
            '</ul>';
    }
}


?>
