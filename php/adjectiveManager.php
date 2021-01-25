<?php

require("dbconnection.php");


try {
    $data = array();

    $req = $pdo->prepare('SELECT * FROM adjective  ORDER BY  RAND() LIMIT 1');
    $req->bindValue(':inputNumber', $_GET['number'], PDO::PARAM_INT);
    $req->execute();
    if ($data = $req->fetch()) {
       
        echo json_encode($data);
     
   
    }
} catch (Exception $e) {


    die('Erreur : ' . $e->getMessage());
}
