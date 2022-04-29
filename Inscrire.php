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
        <fieldset>
            <legend>Inscription</legend>
            <form action="<?php $_SERVER['PHP_SELF']?>"  method="post">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" required />

                <label for="mail">Votre adresse mail</label>
                <input type="text" name="mail" id="mail" required />
                
                <label for="mdp">Votre mot de passe</label>
                <input type="password" name="mdp" id="mdp" required />
                <input type="submit" value="S'inscrire" />
            </form>
        </fieldset>
    </main>
    <?php
    include_once("./page/footer_inc.php");
    ?>