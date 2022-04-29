<?php
//sessions
session_start(); //démarrage de la session

?>

<?php
include_once "./page/header_inc.php";
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
        <section>
            <h2 class=".confirm">
                Bonjour <?= $_SESSION["nom"] ?>
            </h2>
        </section>
        <section class="userInfo">
            <h2>Information</h2>
            <?php include_once "./page/user_inc.php" ?>
            <a href="#">Changer le profil</a>
            <a href="#">Voir l'historique des évenements</a>
        </section>
        <form action="./accueil.php">
            <input type="submit" value="Deconnexion" />
        </form>
        
    </main>
</body>

</html>