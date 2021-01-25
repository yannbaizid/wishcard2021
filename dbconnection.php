<?php
header('Access-Control-Allow-Origin: *');

const DB_NAME = 'wish2021';
const DB_USER = 'root';
const DB_PWD = '22JambonPoulet';

$pdo = new PDO('mysql:host=localhost;dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>