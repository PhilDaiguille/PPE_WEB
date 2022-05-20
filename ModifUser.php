<?php
include_once("./page/header_inc.php");
session_start();
?>

<body>
    <header>
        <a href="./Accueil_membre.php"><img src="./assets/1490877823-sport-badges06_82415.png" alt="streaming"></a>
        <h1>Maison des ligues - tous les sports</h1>
        <ul>
            <li aria-hidden="true">
                <span class="material-icons">
                    visibility
                </span>
            </li>
            <li aria-hidden="true">
                <span class="material-icons">
                    light_mode
                </span>
            </li>
        </ul>
    </header>
    <main>
        <fieldset>
            <?php
                include_once("./page/connect_BDD.php");
                include_once("./page/form_modif_inc.php"); 
            ?>

            <legend>Changer le profil</legend>
            <form method="post">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="nom" aria-required="true" value="<?php echo $_SESSION['nom'] ?>" autofocus required>

                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="prénom" aria-required="true" value="<?php echo $_SESSION['prenom'] ?>" required>

                <label for="age">Age</label>
                <input type="number" id="age" name="age" placeholder="age" aria-required="true" value="<?php echo $_SESSION['age'] ?>" required>

                <label for="ville">Ville</label>
                <select name="ville" id="ville" aria-required="true" required>
                    <option value=""><?php echo $_SESSION['ville'] ?></option>
                    <option value="paris">Paris</option>
                    <option value="lyon">Lyon</option>
                    <option value="marseille">Marseille</option>
                    <option value="toulouse">Toulouse</option>
                    <option value="nantes">Nantes</option>
                    <option value="strasbourg">Strasbourg</option>
                    <option value="bordeaux">Bordeaux</option>
                    <option value="lille">Lille</option>
                    <option value="rennes">Rennes</option>
                </select>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="email" aria-required="true" value="<?php echo $_SESSION['login'] ?>" required>

                <input type="submit" value="Valider le changement">
            </form>
        </fieldset>
    </main>
    <?php
    include_once("./page/footer_form_inc.php");
    ?>