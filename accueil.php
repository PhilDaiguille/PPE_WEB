<?php
//sessions
session_start(); //démarrage de la session
$id_session = session_id();

$_years = date("Y");
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
        <a href="./Connexion.php" class="connexion">
            <span class="material-icons" id="connexion">
                account_circle
            </span>
        </a>
    </header>
    <main>
        <section>
            <h2>Prêt à la compétition ? Remplissez le formulaire proposé dans cette page</h2>
            <p>Tous les mois profitez de toutes les nouveautés et opportunités. A partir du mois
                prochain on vous propose toutes les séance de sport sur vos support préférés</p>
            <ul class="grid-picture-large" aria-hidden="true">
                <?php include_once "./page/connect_BDD.php" ?>
                <?php
                try {
                    // On récupère tout le contenu de la table recipes
                    $request = "SELECT * FROM `evenement` ";
                    $recipesStatement = $_bdd->prepare($request);
                    $recipesStatement->execute();
                    $evenement = $recipesStatement->fetchAll();

                    // On affiche chaque recette une à une
                    foreach ($evenement as $event) {
                        echo
                        '<li' . ' data-image=' . $event['image'] . ' data-title="' . $event['nom'] . '" ' 
                        . 'data-description="' . $event['description'] 
                        . '"' . ' data-dates="' . $event['date_creation']
                        . '" >' 
                             . '<figure>' . '<img src=' . $event['image'] . ' alt=' . $event['nom'] . " />"

                            . '<figcaption>' . '<h2>' . '<span class="material-icons" aria-hidden="true"> ' . 'add' . '</span> ' . "En savoir" . '</h2>' . '</figcaption>'


                            . '</figure>' .

                            '</li>';
                    }
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }

                ?>

            </ul>
            <a href="./formulaire.php">Cliquez ici pour commencer</a>
        </section>

        <!-- modale -->
        <div class="parent-modale" role="dialog" aria-label="true">
            <figure class="modale">
                <button aria-label="closed">
                    <span class="material-icons">clear</span>
                </button>
                <img src="https://via.placeholder.com/500" alt="picture" />
                <figcaption class="desc">
                    <h3>title</h3>
                    <p></p>
                    <time datetime="2022-03-20">Years :</time>
                    <a href="./Inscrire.php">S'inscrire à l'évenements</a>
                </figcaption>
            </figure>
        </div>
    </main>
    <?php
    include_once("./page/footer_inc.php");
    ?>