<?php 

$packages =fetchAll("select * from Package ");

require('views/packages.view.php');