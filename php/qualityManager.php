<?php

require("dbconnection.php");


try {
    $data = array();

    $req = $pdo->prepare('SELECT * FROM quality  ORDER BY  RAND() LIMIT :inputNumber;');
    $req->bindValue(':inputNumber', $_GET['number'], PDO::PARAM_INT);
    $req->execute();
    while ($answer = $req->fetch()) {
        $data[] = $answer;
   
    }
    $arrayObject = json_encode($data);
    echo $arrayObject;
} catch (Exception $e) {


    die('Erreur : ' . $e->getMessage());
}
