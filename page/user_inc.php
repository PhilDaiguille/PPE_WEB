<?php include_once("./page/connect_BDD.php");

try {
    $sqlQuery = 'SELECT * FROM client';
    $recipesStatement = $_bdd->prepare($sqlQuery);
    $recipesStatement->execute();
    $users = $recipesStatement->fetchAll();
    
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}



foreach ($users as $user) {

    if ($user['id_client'] === $_SESSION['id']) {
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['age'] = $user['age'];
        $_SESSION['ville'] = $user['ville'];
        $_SESSION['id'] = $user['id_client'];
        echo
        '<ul>' .
            '<li>' . "Nom : " . $user['nom'] . '</li>' .
            '<li>' . "Prénom : " . $user['prenom'] . '</li>'.
            '<li>' . "Age : " . $user['age'] . '</li>' .
            '<li>' . "Ville : " . $user['ville'] . '</li>'.
            '<li>' . "Email : " . $user['email'] . '</li>' .
            '</ul>';
    }
}
