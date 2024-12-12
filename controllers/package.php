<?php 

$id = $_GET['id'];

$package =fetch("select * from Package where id =  $id ");

$versions = fetchAll(" select * from Version v where v.package_id = $id");
$authors = fetchAll(" select a.id as id, name ,email , biograph from Author a inner join package_author pa on a.id = pa.author_id where pa.package_id = $id ");
// dd($versions);
require('views/package.view.php');