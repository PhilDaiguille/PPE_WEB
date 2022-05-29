<?php include_once("./page/connect_BDD.php");

try {
    $sqlQuery = 'SELECT * FROM client';
    $recipesStatement = $_bdd->prepare($sqlQuery);
    $recipesStatement->execute();
    $users = $recipesStatement->fetchAll();

    foreach ($users as $user) {

        if ($user['id_client'] === $_SESSION['id']) {
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['age'] = $user['age'];
            $_SESSION['ville'] = $user['ville'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id_client'];
        }
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


