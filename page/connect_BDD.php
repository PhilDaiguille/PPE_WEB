<?php
try {
        $_pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $_bdd = new PDO(
            'mysql:host=localhost;
            dbname=sport_ligue',
            'root',
            '',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', $_pdo_options)
        );

        $_response = $_bdd->query('SELECT * FROM client');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
}

?>
<?php
    try {
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['age'])) {

            if (!isset($_POST['nom']) && !isset($_POST['prenom']) && !isset($_POST['email']) && !isset($_POST['age'])) {

                print "<p class=\"warning\">Veuillez saisir des lettre</p>";

            } 
            else {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $age = $_POST['age'];
                $email = $_POST['email'];

                $req = $_bdd->prepare('INSERT INTO client(nom, prenom, age, email) VALUES(:nom, :prenom, :age, :email)');
                $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'age' => $age,
                    'email' => $email,
                ));

                print "<p class=\"success\">Votre inscription a bien été prise en compte</p>";
            }
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

?>