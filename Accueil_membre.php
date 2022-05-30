<?php

/* Starting a session. */
session_start();
$_years = date("Y");
?>

<?php
include_once("./page/header_inc.php");
?>

<body>
    <header>
        <a href="./Accueil_membre.php"><img src="./assets/1490877823-sport-badges06_82415.png" alt="streaming" /></a>
        <h1>Maison des ligues - tous les sports</h1>
        <ul>
            <li aria-hidden="true">
                <span class="material-icons"> visibility </span>
            </li>
            <li aria-hidden="true">
                <span class="material-icons"> light_mode </span>
            </li>
        </ul>
        <a href="./session_user.php" class="compte">
            <span class="material-icons">
                account_circle
            </span>
        </a>
        <a href="./" class="deconnexion">
            Deconnexion <span class="material-icons"> logout </span>
        </a>
    </header>
    <main>
        <?php
            if(isset($_SESSION["id"]) && isset($_GET['id_event'])){
                include_once "./page/connect_BDD.php";
                try {
                $_date = new DateTime();
                $_date = $_date->format('Y-m-d H:i:s');
                $_req = $_bdd->prepare('INSERT INTO historique_client(id_client, id_event, date_consultation) VALUES (:id_client, :id_event, :date_consultation)');
                $_req->execute(array(
                    'id_client' => $_SESSION['id'],
                    'id_event' => $_GET['id_event'],
                    'date_consultation' => $_date,
                ));
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());    
            }
        }
        ?>    
        <section>
            <h3 class="bonjour">Bonjour <?= $_SESSION['nom'] . " " . $_SESSION['prenom'] ?> ! Prêt à la compétition ?</h3>

            <p>Tous les mois profitez de toutes les nouveautés et opportunités. A partir du mois
                prochain on vous propose toutes les séance de sport sur vos support préférés</p>
            <ul class="grid-picture-large" aria-hidden="true">
                <?php include_once "./page/connect_BDD.php" ?>
                <?php /* include_once "./page/AJoutEvenement.php" */ ?>
                <?php
                try {
                    $request = "SELECT * FROM `evenement` ";
                    $sport = $_bdd->prepare($request);
                    $sport->execute();
                    $evenement = $sport->fetchAll();

                    foreach ($evenement as $event) {
                        echo
                        '<li' . ' data-image=' . $event['image'] . ' data-title="' . $event['nom'] . '" '
                            . 'data-description="' . $event['description'] . '"'
                            . 'data-id="' . $event['id_event']
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
                    
                    <form method="post">
                        <input type="submit" value="S'inscrire à l'évenement">
                    </form>
                </figcaption>
            </figure>
            <p class="valid"></p>
        </div>
    </main>
    <script src="./js/app_membre.js"></script>
    <?php
    include_once("./page/footer_inc.php");
    ?>