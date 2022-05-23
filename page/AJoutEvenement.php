<?php include_once("./page/connect_BDD.php");
        try {
            $_date = new DateTime();
            $_date = $_date->format('Y-m-d H:i:s');
            $_test = 2;
            $_req = $_bdd->prepare("INSERT INTO historique_client(id_client, id_event, date_modification) VALUES(:id_client, :id_event, :date_modification)");
            $_req -> execute(array(
                'id_client' => $_test,
                'id_event' => $_test,
                'date_modification' => $_date,
            ));
        
           
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    
    
?>
