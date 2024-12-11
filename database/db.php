<?php 
require('config.php');


$dsn ="mysql:host=$host;port=$port;user=$user;password=$password;dbname=$dbname";
// dd($dsn);
$pdo = new PDO($dsn);
$query= "select * from Version ";
$statement = $pdo->prepare($query);
$statement->execute();
$versions = $statement->fetchAll();
// dd($versions);