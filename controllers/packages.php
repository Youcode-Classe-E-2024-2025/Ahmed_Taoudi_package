<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // dd($_POST['_method']);
    if ($_POST['_method'] === 'supprime') {
        $pk_id = $_POST['id'];
        // echoo("delete from Package where id = $pk_id");
        execute_sql("delete from Package where id = $pk_id");
    } 
}

$packages = fetchAll("select * from Package ");

require('views/packages.view.php');
