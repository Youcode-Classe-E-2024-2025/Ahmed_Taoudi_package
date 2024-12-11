<?php 

$id = $_GET['id'];

$package =fetch("select * from Package where id =  $id ");

$versions = fetchAll(" select * from Version v where v.package_id = $id");

// dd($versions);
require('views/package.view.php');