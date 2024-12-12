<?php
// require('assets/helper/fonctions.php');
// require('database/db.php');



$packages =fetchAll("select * from Package ");
$Package_count =fetch("select count(*) as nbr from Package ")['nbr'];
// echoo($Package_count);

$Author_count =fetch("select count(*) as nbr from Author ")['nbr'];


// dd($packages);


require('views/index.view.php');