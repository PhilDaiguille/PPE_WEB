<?php
        if (isset($_SESSION["id"]) && isset($_GET['id_event'])) {
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