<?php
// require('assets/helper/fonctions.php');
// require('database/db.php');



$packages =fetchAll("select * from Package ");
// dd($packages);


require('views/index.view.php');