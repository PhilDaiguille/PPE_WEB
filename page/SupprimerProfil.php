<?php include_once("./page/connect_BDD.php");
    try {
        $request = $_bdd->prepare("DELETE FROM client WHERE id_client = :id");
        $request->execute(array(
            'id' => $_SESSION['id'],
        ));
        session_destroy();
    
       
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    
?>