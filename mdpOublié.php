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
            <legend>Changement de mot de passe</legend>
            <form action="<?php $_SERVER['PHP_SELF']?>"  method="post">
                <label for="pseudo">Votre mail</label>
                <input type="text" name="pseudo" id="pseudo" required />
                <?php
                /*
                    ini_set("SMTP","localhost");
                    ini_set("smtp_port","25");
                    $dest="philippe.delente@gmail.com";
                    $objet="Changement de mot de passe";
                    $message="
                        <font face='arial'>
                        Bonjour,
                        ouais
                        </font>
                    ";
                    $entetes="From: philippe.delente@gmail.com";
                    $entetes.="Cc: philippe.delente@gmail.com";
                    $entetes.="Content-Type: text/html; charset=iso-8859-1";
                    
                        mail($dest,$objet,$message,$entetes)
                        
                    */
                ?> 

                <input type="submit" value="S'inscrire" />
            </form>
        </fieldset>
    </main>
    <?php
    include_once("./page/footer_inc.php");
    ?>