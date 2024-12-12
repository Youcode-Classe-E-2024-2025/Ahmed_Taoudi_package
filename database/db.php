<?php 
require('config.php');


$dsn ="mysql:host=$host;port=$port;user=$user;password=$password;dbname=$dbname";
// dd($dsn);
$pdo = new PDO($dsn);
// global $dsn;
function fetchAll($query){
global $pdo;
$statement = $pdo->prepare($query);
$statement->execute();
return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function fetch($query){
    global $pdo;
$statement = $pdo->prepare($query);
$statement->execute();
return $statement->fetch(PDO::FETCH_ASSOC);
}

function execute_sql($query){
    global $pdo;
$statement = $pdo->prepare($query);
$statement->execute();
}

