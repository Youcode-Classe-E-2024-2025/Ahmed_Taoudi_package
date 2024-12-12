<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/output.css">
    <title>Document</title>
</head>

<body class="bg-blue-200">
    <div  class="h-screen flex flex-col justify-start">

        <?php require('views/partials/navbar.php') ?>

        <main class="text-center content-center p-10">
            <h1 class="text-4xl font-bold text-indigo-800 p-10"><?= $package['name']?></h1>
            <p class="text-2xl my-5"><?= $package['description']?></p>

            
            <a class=" py-2 px-5 rounded  hover:bg-white hover:text-indigo-700   text-white bg-indigo-700" href="<?= $package['repository_url']?>">(github) install le package </a>
            <h2 class="text-3xl font-bold text-indigo-800 p-10">
                Authors :
            </h2>
            <div class="flex flex-col justify-center items-center  gap-4 my-5">
            <?php foreach($authors as $author):?>
                <div class= "w-3/4 sm:w-1/3 py-2 px-5 rounded hover:bg-white hover:text-indigo-700   text-white bg-indigo-700">
                   <?= $author['name']?> 
                   <button type="button"> modifier</button>
                   <details >
                       <p class="my-4">e-mail :  <?= $author['email'] ?> </p>
                        <p class="my-4"> bio :  <?= $author['biograph'] ?>  </p>
                    </details>
                </div>
                <?php endforeach ;?>
                </div>

            <h2 class="text-3xl font-bold text-indigo-800 p-10">
                les versions :
            </h2>
            <div class="flex flex-col justify-center items-center  gap-4 my-5">
            <?php foreach($versions as $version):?>
                <div class= "w-3/4 sm:w-1/3 py-2 px-5 rounded hover:bg-white hover:text-indigo-700   text-white bg-indigo-700">
                    <?= $version['version'] ?>
                    <details >
                        <p class="my-4"> date de sortie :  <?= $version['release_date'] ?>  </p>
                        <p class="mb-4">change log :  <?= $version['changelog'] ?> </p>
                    </details>
                </div>
            <?php endforeach ;?>
            </div>
        </main>
        <?php require('views/partials/footer.php');?>
    </div>
</body>

</html>