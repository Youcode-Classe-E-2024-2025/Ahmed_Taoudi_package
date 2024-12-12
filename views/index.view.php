<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/output.css">
    <title>Document</title>
</head>

<body class="bg-blue-200">
    <div class=" ">

        <?php require('./views/partials/navbar.php') ?>

        <main class="grid grid-cols-12 h-screen ">
            <aside class="col-start-1 col-end-3 bg-indigo-900 text-blue-950">
                <div class="p-4 flex  flex-col gap-4">
                    <a class=" px-6 py-1 bg-blue-50 rounded hover:scale-105 hover:bg-blue-300 transition" href="/packages?type=auteur">auteurs</a>
                    <a class=" px-6 py-1 bg-blue-50 rounded hover:scale-105 hover:bg-blue-300 transition" href="/packages.php?type=packages">packages</a>
                    <a class=" px-6 py-1 bg-blue-50 rounded hover:scale-105 hover:bg-blue-300 transition" href="/packages.php">...</a>
                </div>
            </aside>
            <div class="col-start-3 -col-end-1">
                <!-- statistique -->
                <section id="statistique" class="flex justify-around p-10">
                    <div class="bg-blue-50 w-1/4 rounded-xl text-center p-4">
                        <h3> nombre des Authors</h3>
                        <span><?= $Author_count?></span>
                    </div>
                    <div class="bg-blue-50 w-1/4 rounded-xl text-center p-4">
                        <h3> nombre des packages</h3>
                        <span><?= $Package_count ?></span>
                    </div>
                    

                </section>
                <!-- packages -->
                 <section id="packages">
                    <h2 class="text-blue-900  py-10 px-4 font-semibold">les packages </h2>
                    <div class="grid grid-cols-3  gap-4 mx-4">
                       <?php foreach($packages as $package):?>

                       <a href="/package?id=<?=$package['id'] ?>" class="bg-white px-6 py-4 rounded ">
                          
                            <h3><?= $package['name'] ?></h3>
                       </a>
                        <?php endforeach;?>
                        
                    </div>
                 </section>
            </div>

        </main>
        <footer></footer>
    </div>
</body>

</html>