<?php
// require('assets/helper/fonctions.php');
// require('database/db.php');


if($_SERVER["REQUEST_METHOD"] === "POST"){

    if ($_POST['_method'] === 'ajoute') {

        // dd($_POST['_method']);
        $method = "ajoute";

    } else if ($_POST['_method'] === 'modifie') {
        
        $pk_id = $_POST['id'];
        $pckg = fetch("select * from Package where id = $pk_id ") ;
        // dd($pckg);
        $method = "modifie";

    }else if($_POST['_method'] === 'submit_ajoute'){
        // dd($_POST);

        $method = "submit_ajoute";
       $newPackage = ajoutePackage($_POST);
       header("Location: /packages");
       exit();
    }else if($_POST['_method'] === 'submit_modifie'){

        // dd($_POST);
        modifieInfoPackage($_POST);
        header("Location: /packages");
        exit();
    }else{
    require('views/404.php');
die();
    }
    $authors =fetchAll("select * from Author ");
    require('views/form.view.php');
}else{
    require('views/404.php');

}

function ajoutePackage($post){
    // dd($post);
    $name =$post['name'];
    $description =$post['description'];
    $repository_url =$post['repository_url'];
    execute_sql(" insert into Package (name, description, repository_url) values ('$name','$description','$repository_url')");
    $pk_id = fetch("select * from Package where repository_url = '$repository_url' ") ;
    // dd($pk_id);
    return $pk_id;
}
function modifieInfoPackage($post){
    $pid =$post['id'];
    $name =$post['name'];
    $description =$post['description'];
    $repository_url =$post['repository_url'];
    execute_sql("update Package set name = '$name' ,description = '$description' , repository_url = '$repository_url'  where id = $pid ");
}
// dd($packages);