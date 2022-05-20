<?php
    
    try {
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['ville'])) {

            if (!isset($_POST['nom']) && !isset($_POST['prenom']) && !isset($_POST['email']) && !isset($_POST['age']) && !isset($_POST['ville'])) {

                print "<p class=\"warning\">Veuillez saisir des lettre</p>";

            } 
            else {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $age = $_POST['age'];
                $ville = $_POST['ville'];
                $email = $_POST['email'];
                $id = $_SESSION['id'];
            
                try {
                    $req = $_bdd->prepare("UPDATE client SET nom = :nom, prenom = :prenom, age = :age, ville = :ville, email = :email WHERE id_client = :id");
                    $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'age' => $age,
                    'ville' => $ville,
                    'email' => $email,
                    'id' => $id,
                    
                    ));
                    print "<p class=\"success\">Votre changement de profil a bien été prise en compte</p>";
                    header('Location: session_user.php');
                    
                }
                catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }

                

                
            }
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

?>