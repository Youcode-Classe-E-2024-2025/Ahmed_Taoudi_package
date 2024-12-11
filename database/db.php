<?php 
require('config.php');


$dsn ="mysql:host=$host;port=$port;user=$user;password=$password;dbname=$dbname";
// dd($dsn);

function fetchAll($query){
    global $dsn;
    $pdo = new PDO($dsn);
$statement = $pdo->prepare($query);
$statement->execute();
return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function fetch($query){
    global $dsn;
    $pdo = new PDO($dsn);
$statement = $pdo->prepare($query);
$statement->execute();
return $statement->fetch(PDO::FETCH_ASSOC);
}

