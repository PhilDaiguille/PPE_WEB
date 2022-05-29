<?php
    try {
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['password']) && isset($_POST['ville'])) {

            if (!isset($_POST['nom']) && !isset($_POST['prenom']) && !isset($_POST['email']) && !isset($_POST['age']) && !isset($_POST['password']) && !isset($_POST['ville'])) {

                print "<p class=\"error\">Veuillez saisir des lettre</p>";

            }
                if(isset($_POST['email'])){
                    $email2 = $_POST['email'];
                    $_req2 = $_bdd->prepare('SELECT * FROM client WHERE email = :email');
                    $_req2 -> execute(array(
                        'email' => $email2,
                    ));
                    $resultat2 = $_req2->fetch();
                    if($resultat2){
                        print "<p class=\"error\">Email déjà utilisé</p>";
                    }
                    else {
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $age = $_POST['age'];
                        $ville = $_POST['ville'];
                        $email = $_POST['email'];
                        $mdp = password_hash($_POST['password'], PASSWORD_BCRYPT);
        
                        $req = $_bdd->prepare('INSERT INTO client(nom, prenom, age, ville, email, password) VALUES(:nom, :prenom, :age, :ville, :email, :password)');
                        $req->execute(array(
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'age' => $age,
                            'ville' => $ville,
                            'email' => $email,
                            'password' => $mdp,
                        ));
                        if($req){
                            print "<p class=\"success\">Votre inscription a bien été prise en compte</p>";
                            sleep(3);
                            header("Location: ./Accueil.php");
                        }
                        print "<p class=\"success\">Votre inscription a bien été prise en compte</p>";
                        
                    }
                }
            
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
