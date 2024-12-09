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
            <aside class="col-start-1 col-end-4 bg-indigo-900 text-blue-950">
                <div class="py-4 px-6 flex  flex-col gap-4">
                    <a class=" px-6 py-1 bg-blue-50 rounded-lg hover:scale-105 hover:bg-blue-300 transition" href="/packages.php?type=auteur">auteurs</a>
                    <a class=" px-6 py-1 bg-blue-50 rounded-lg hover:scale-105 hover:bg-blue-300 transition" href="/packages.php?type=packages">packages</a>
                    <a class=" px-6 py-1 bg-blue-50 rounded-lg hover:scale-105 hover:bg-blue-300 transition" href="/packages.php?type=auteur">packages</a>
                </div>
            </aside>
            <div class="col-start-4 -col-end-1">
                <!-- statistique -->
                <div id="statistique" class="flex justify-around p-10">
                    <div class="bg-blue-50 w-1/4 rounded-xl text-center p-4">
                        <h3> nombre jjj</h3>
                        <span>90</span>
                    </div>
                    <div class="bg-blue-50 w-1/4 rounded-xl text-center p-4">
                        <h3> nombre jjj</h3>
                        <span>90</span>
                    </div>
                    <div class="bg-blue-50 w-1/4 rounded-xl text-center p-4">
                        <h3> nombre jjj</h3>
                        <span>90</span>
                    </div>

                </div>
                <!-- packages -->
                 <div id="packages">

                 </div>
            </div>

        </main>
        <footer></footer>
    </div>
</body>

</html>