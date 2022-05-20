<?php
    try {
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['password']) && isset($_POST['ville'])) {

            if (!isset($_POST['nom']) && !isset($_POST['prenom']) && !isset($_POST['email']) && !isset($_POST['age']) && !isset($_POST['password']) && !isset($_POST['ville'])) {

                print "<p class=\"warning\">Veuillez saisir des lettre</p>";

            } 
            else {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $age = $_POST['age'];
                $ville = $_POST['ville'];
                $email = $_POST['email'];
                $mdp = $_POST['password'];

                $req = $_bdd->prepare('INSERT INTO client(nom, prenom, age, ville, email, password) VALUES(:nom, :prenom, :age, :ville, :email, :password)');
                $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'age' => $age,
                    'ville' => $ville,
                    'email' => $email,
                    'password' => $mdp,
                ));

                print "<p class=\"success\">Votre inscription a bien été prise en compte</p>";
            }
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

?>