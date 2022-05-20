<?php
//sessions
session_start(); //démarrage de la session

?>
<?php
include_once("./page/header_inc.php");
?>

<body>
    <header>
        <a href="./accueil.php"><img src="./assets/1490877823-sport-badges06_82415.png" alt="streaming" /></a>
        <h1>Maison des ligues - tous les sports</h1>
        <ul>
            <li aria-hidden="true">
                <span class="material-icons"> visibility </span>
            </li>
            <li aria-hidden="true">
                <span class="material-icons"> light_mode </span>
            </li>
        </ul>
    </header>

    <main>
        <!-- formulaire -->
        <section>
            <h2 class="titleco">
                Connexion à votre espace personnel
            </h2>
            <?php include_once "./page/connect_BDD.php";
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
                            if ($_login == $value['email'] && $_password == $value['password']) {
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
            ?>
            <?php
            /* if(isset($_POST['login']) && isset($_COOKIE['PHPSESSID'])){
                $_login = $_POST['login'];
                if(!$_login){
                    print '<section><p class="error">Remplir les champs</p></section>';
                }
                else{
                $_SESSION['nom'] = $_login;
                print '<section><p class="success">Bonjour : '.$_SESSION['nom'].'</p></section>';
                print '<section>
                            <a href="./Accueil_membre.php">Accéder à votre compte</a>
                        </section>';
              
                }
            }    */



            ?>
            <fieldset>
                <legend>
                    <h3>Veuillez vous connecter</h3>
                </legend>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="login">
                        Votre login
                    </label>
                    <input type="email" name="login" id="login" placeholder="Votre login" aria-required="true" required>
                    <label for="password">
                        Votre Password
                    </label>
                    <input type="password" name="password" id="password" placeholder="Votre password" aria-required="true" required>
                    <input type="submit" value="Connexion">
                </form>
                <ul>
                    <li><a href="./formulaire.php">Si vous n'avez pas de compte <span>s'inscrire</span></a></li>
                    <li><a href="./mdpOublié.php">Mot de passe oublié ?</a></li>
                </ul>


            </fieldset>
        </section>

    </main>
    <?php
    include_once("./page/footer_inc.php");
    ?>