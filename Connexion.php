<?php
//sessions
session_start(); //démarrage de la session
$id_session = session_id();
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
            <?php
       
            /* test de session user récupérer les cookie */
            if(isset($_POST['login']) && isset($_COOKIE['PHPSESSID'])){
                $_login = $_POST['login'];
                    if(!$_login){
                    print '<section><p class="error">Remplir les champs</p></section>';
                }
                else{
                $_SESSION['nom'] = $_login;
                print '<section><p class="success">Bonjour : '.$_SESSION['nom'].'</p></section>';
                print '<section>
                            <a href="session_user.php">Accéder à votre compte</a>
                        </section>';
              
                }
            }   
        ?>
            <fieldset>
                <legend>
                    <h3>Veuillez vous connecter</h3>
                </legend>
                <form action="<?php $_SERVER['PHP_SELF']?>"  method="post">
                <label for="login">
                    Votre login
                </label>
                <input 
                    type="email" 
                    name="login" 
                    id="login" 
                    placeholder="Votre login" 
                    aria-required="true">
                    <label for="login">
                    Votre Password
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    placeholder="Votre password" 
                    aria-required="true">
                    <input type="submit" value="Connexion">
                </form>
                <a href="./accueil.php">Si vous n'avez pas de compte <span>s'inscrire</span></a>
                <a href="./accueil.php">Mot de passe oublié ?</a>
            </fieldset>
        </section>
        
    </main>
    <?php
    include_once("./page/footer_inc.php");
    ?>