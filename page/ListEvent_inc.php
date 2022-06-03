<?php include_once("./page/connect_BDD.php");

try {
    $sqlQuery = 'SELECT DISTINCT nom, description, date_consultation, id_client FROM historique_client
                INNER JOIN evenement ON historique_client.id_event = evenement.id_event
                WHERE historique_client.id_client = :id_client
                GROUP BY historique_client.id_event, historique_client.date_consultation, nom, description
                ORDER BY historique_client.date_consultation DESC LIMIT 10';

    $recipesStatement = $_bdd->prepare($sqlQuery);
    $recipesStatement->execute(array(
        'id_client' => $_SESSION['id'],
    ));
    $users = $recipesStatement->fetchAll();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


print '<table>' . '<th>' . "Nom de l'événement" . '</th>' . '<th>' . "Description de l'événement" . '</th>' . '<th>' . "Date de l'événement" . '</th>'. '<th>' . "Date de la consultation" . '</th>';
    foreach ($users as $user) {
        if (isset($user['id_client']) == $_SESSION['id']) {
            echo
            '</tr>' .
                '<tr>' . '<td>' . $user['nom'] . '</td>' . '<td>' 
                . $user['description'] . '</td>' . '<td>'
                . $user['date_consultation'] . '</td>' . '<td>' 
                . $user['date_consultation'] . '</td>' ;
                
        }
    }
print '</tr> ' . ' </table>';
?>