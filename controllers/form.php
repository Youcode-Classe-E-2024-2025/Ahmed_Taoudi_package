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
       $newPackageId = ajoutePackage($_POST);
       $newPackage = ajouteAuthorsVersions($_POST,$newPackageId);
       header("Location: /package?id=$newPackageId");
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
    $pk_id = fetch("select id from Package where repository_url = '$repository_url' ")['id'] ;
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

function ajouteAuthorsVersions($post,$PackageId){
    // dd($PackageId);
    // dd($post);
    $cmpAuthorAjoute = (int) $post['cmp'] ;
    $cmpAuthorSelected = (int) $post['select_cmp'] ;
    $cmpVersionAjoute = (int) $post['cmpV'] ;
    // authors ajoute
    // echo "<br>authors ajoute<br>";

    for($i=1;$i<=$cmpAuthorAjoute;$i++){
       $au_id =  ajouteAuthor($post["name$i"],$post["email$i"],$post["biograph$i"]);
       packageByAuthor($PackageId, $au_id);
        // echo "<br>";
        // var_dump($post["name$i"]);
        // echo "<br>";

    };
    // authors select
    // echo "<br>authors select<br>";
    for($i=1;$i<=$cmpAuthorSelected;$i++){
        $au_id = $post["author_id$i"];
       packageByAuthor($PackageId, $au_id);
        // $ajouteAuthor();
        // echo "<br>";
        // var_dump($post["author_id$i"]);
        // echo "<br>";

    };
    // version ajoute
    // echo "<br>version ajoute<br>";

    for($i=1;$i<=$cmpVersionAjoute;$i++){
        ajouteVersionPackage($PackageId,$post["version$i"],$post["release_date$i"],$post["changelog$i"]);
        // $ajouteAuthor();
        // echo "<br>";
        // var_dump($post["version$i"]);
        // echo "<br>";

    };
    // die();
    // dd($cmpAuthorSelected); 
}
function ajouteAuthor($AuthorName,$AuthorEmail,$AuthorBio){
    // dd($post);
    execute_sql(" insert into Author (name, email , biograph) values ('$AuthorName','$AuthorEmail','$AuthorBio')");
    $au_id = fetch("select id from Author where email = '$AuthorEmail' ")['id'] ;
    // echoo($au_id);
    return $au_id;
}
function packageByAuthor($pk_id,$au_id){
    execute_sql(" insert into package_author (package_id, author_id) values ( $pk_id , $au_id ) ");
}
function ajouteVersionPackage($pk_id,$vr,$rdate,$change){
    execute_sql(" insert into `Version` (package_id, version,release_date,changelog) values ( $pk_id ,  '$vr' , '$rdate' ,'$change' ) ");
}
// dd($packages);



