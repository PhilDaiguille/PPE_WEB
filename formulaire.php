<?php
include_once("./page/header_inc.php");
?>

<body>
    <header>
        <a href="./accueil.php"><img src="./assets/1490877823-sport-badges06_82415.png" alt="streaming"></a>
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
        <section>
            <ul class="grid-picture-large" aria-hidden="true">
            <?php include_once "./page/connect_BDD.php" ?>
                <?php
                try {
                    // On récupère tout le contenu de la table recipes
                    $request = "SELECT * FROM `evenement` WHERE 5 >= `id_event`";
                    $sport = $_bdd->prepare($request);
                    $sport->execute();
                    $evenement = $sport->fetchAll();

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
        </section>
        <?php include_once("./page/connect_BDD.php");
            include_once("./page/main_form_inc.php");
        ?>
        <p id="warning"></p>
        <fieldset>
            <legend>Remplissez le formulaire</legend>
            <form method="post">
                <label for="nom">nom</label>
                <input type="text" id="nom" name="nom" placeholder="Nom" aria-required="true" autofocus required>
                <label for="prenom">prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Prénom" aria-required="true" required>
                <label for="age">age</label>
                <input type="number" id="age" name="age" placeholder="Age" aria-required="true" required>  
                <label for="ville">Ville</label>
                <select name="ville" id="ville" aria-required="true" required>
                    <option value="">- Choisissez la ville -</option>
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
                <label for="email">email</label>
                <input type="email" id="email" name="email" placeholder="email" aria-required="true" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Mot de passe ..." aria-required="true" required>
                <input type="submit" value="Valider">
            </form>
        </fieldset>
        <!-- modale -->
        <div class="parent-modale" role="dialog" aria-label="true">
            <figure class="modale">
                <button aria-label="closed">
                    <span class="material-icons">clear</span>
                </button>
                <img src="https://via.placeholder.com/500" alt="picture" />
                <figcaption class="desc">
                    <h3>title</h3>
                    <p> </p>
                    <time datetime="2022-03-20">Years : </time>
                </figcaption>
            </figure>
        </div>

    </main>
    <?php
    include_once("./page/footer_form_inc.php");
    ?>