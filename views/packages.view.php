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

        <main >
            
            <div class="max-w-7xl py-4 px-6 md:px-40 mx-auto">
                <!-- packages -->
                 <section id="packages">
                    <div class="py-10 px-4 flex justify-between ">
                    <h2 class="text-blue-900 text-3xl font-semibold">les packages </h2>
                    <form action="/admin" method="POST">
                        <input type="hidden" name="_method" value="ajoute">
                        <button  class="px-4 py-1 transition-all rounded border-2 border-indigo-200 bg-indigo-600 text-indigo-100 hover:bg-white hover:text-indigo-600 hover:border-indigo-600 font-bold text-xl " type="submit">ajoute </button>
                    </form>
                    </div>
                    
                    <div class="flex flex-col gap-4 mx-4">
                        <?php foreach($packages as $package) :?>
                            
                        <div class="bg-white px-6 py-4 rounded flex justify-between ">
                            <a href="/package?id=<?= $package['id']?>" class="hover:underline font-semibold text-indigo-800 "><?=$package['name']?></a>
                            <div class="flex gap-4">
                            <form action="/admin" method="post">
                                <input type="hidden" name="id" value="<?= $package['id']?>">
                                <input type="hidden" name="_method" value="modifie">
                                 <button type="submit"  class="hover:underline font-semibold text-green-800  ">modifier </button>
                            </form>
                            <form action="" method="post"> 
                                <input type="hidden" name="id" value="<?= $package['id']?>">
                                <input type="hidden" name="_method" value="supprime">
                                <button type="submit"  class="hover:underline font-semibold text-rose-800  ">supprimer </button>
                            </form>
                           
                            <!-- <a href="/package?id=<?= $package['id']?>" class="hover:underline font-semibold text-rose-800  ">supprimer</a> -->
                            </div>
                            
                        </div>
                        <?php endforeach ;?>
                    </div>
                 </section>
            </div>

        </main>
        <?php require('views/partials/footer.php');?>
    </div>
</body>

</html>