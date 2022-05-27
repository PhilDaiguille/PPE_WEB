<?php 
      if(!empty($_POST) && isset($_SESSION["id"]) && $_GET['id_event']){
        try {
            $_date = new DateTime();
            $_date = $_date->format('Y-m-d H:i:s');
            $_req = $_bdd->prepare('INSERT INTO historique_client(id_client, id_event, date_consultation) VALUES (:id_client, :id_event, :date_consultation)');
            $_req->execute(array(
                'id_client' => $_SESSION['id'],
                'id_event' => $_GET['id_event'],
                'date_consultation' => $_date,
            ));
            print_r($_SESSION['id'], $_GET['id_event'], $_date);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
            
    }   
?>