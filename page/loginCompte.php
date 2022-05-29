<?php
    try {

    $_SQL = 'SELECT * FROM client';
    $_verification = $_bdd->prepare($_SQL);
    $_verification->execute();
    $_connexion = $_verification->fetchAll();
    } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
    }
    try {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        if (!isset($_POST['login']) && !isset($_POST['password']) && !isset($_COOKIE['PHPSESSID'])) {
            print '<section><p class="error">Mail ou Mot de passe incorrect</p></section>';
        } else {
            $_login = $_POST['login'];
            $_password = $_POST['password'];
            foreach ($_connexion as $value) {
                if ($_login == $value['email'] && password_verify($_password , $value['password'])) {
                    $_SESSION['login'] = $value['email'];
                    $_SESSION['password'] = $value['password'];

                    if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                        $_SESSION['login'] = $_login;
                        $_SESSION['nom'] = $value['nom'];
                        $_SESSION['prenom'] = $value['prenom'];
                        $_SESSION['age'] = $value['age'];
                        $_SESSION['ville'] = $value['ville'];
                        $_SESSION['id'] = $value['id_client'];
                        
                        print '<section><p class="success">Bonjour : ' . $_SESSION['nom'] . " " . $_SESSION['prenom'] . '</p></section>';
                        print '<section>
                                        <a href="./Accueil_membre.php">Accéder à votre compte</a>
                                </section>';
                        print '<script src="./js/pouf.js"></script>';
                    }
                }
                
            }
            
        }
        
    }
    } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
    }
