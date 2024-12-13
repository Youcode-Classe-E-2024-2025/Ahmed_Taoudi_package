<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/output.css">
    <title>Document</title>
</head>

<body class="bg-blue-200">
    <div class="h-screen flex flex-col justify-start">

        <?php require('views/partials/navbar.php') ?>

        <main class="">
            
            <div class="max-w-7xl py-4 px-6 md:px-40 mx-auto">
            <div class=" w-full flex justify-center items-center">
              <form action="/" method="POST" class="col-span-full px-4">
                  <div class="relative">
                      <input type="text" name="search" class=" border h-12 shadow p-4 rounded " placeholder="search">
                      <button type="submit">
                          <svg class="text-indigo-400 h-5 w-5 absolute top-3.5 right-3 fill-current "
                              xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                              x="0px" y="0px" viewBox="0 0 56.966 56.966"
                              style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                              <path
                                  d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                              </path>
                          </svg>
                      </button>
                  </div>
              </form>
            </div>

                <!-- statistique -->
                <section id="statistique" class="flex justify-around p-10">
                    <div class="bg-blue-50 w-2/5 rounded-xl text-center p-4">
                        <h3> nombre des Authors</h3>
                        <span><?= $Author_count?></span>
                    </div>
                    <div class="bg-blue-50 w-2/5 rounded-xl text-center p-4">
                        <h3> nombre des packages</h3>
                        <span><?= $Package_count ?></span>
                    </div>
                    

                </section>
                <!-- packages -->
                 <section id="packages">
                    <form action="/admin" method="POST">
                    <input type="hidden" name="_method" value="ajoute">
                        <button  class="px-4 py-1 transition-all rounded border-2 border-indigo-200 bg-indigo-600 text-indigo-100 hover:bg-white hover:text-indigo-600 hover:border-indigo-600 font-bold text-xl " type="submit">ajoute </button>
                    </form>
                    <h2 class="text-blue-900  py-10 px-4 font-semibold">les packages </h2>
                    <div class="grid grid-cols-3  gap-4 mx-4">
                       <?php foreach($packages as $package):?>

                       <a href="/package?id=<?=$package['id'] ?>" class="bg-white px-6 py-4 transition-all rounded border-2 font-normal border-white  text-indigo-600 hover:bg-indigo-300 hover:font-bold hover:border-indigo-600 ">
                          
                            <h3><?= $package['name'] ?></h3>
                       </a>
                        <?php endforeach;?>
                        
                    </div>
                 </section>
            </div>

        </main>
        <?php require('views/partials/footer.php');?>
    </div>
</body>

</html>