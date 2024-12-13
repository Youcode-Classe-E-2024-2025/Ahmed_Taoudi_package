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

        <?php require('views/partials/navbar.php') ?>

        <main class="flex justify-center items-center h-screen ">
        <section  id="modal-form-add" class="   h-fit w-11/12  sm:w-4/5  m-auto   ">
        <div class="m-auto bg-white shadow-lg rounded-lg   max-w-lg w-full p-6">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6"><?=$method?> package</h2>
            <form method="post" id="form-add" action="#">
            <?php if( $method === "modifie" && isset($pckg)):?>
                <input type="hidden" name="id" value="<?= $pckg['id'] ?>">
                <?php endif;?>
                <input type="hidden" name="_method" value="submit_<?= $method ?>">
                <div class="mb-2">
                    <label for="name" class="block text-gray-600">Nom de package</label>
                    <input type="text" id="name" name="name" required
                 value="<?php if( $method === "modifie" && isset($pckg)){echo $pckg['name'] ;}else{echo "";}  ?>"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="express js">
                </div>
                <div class="mb-2">
                    <label for="repository_url" class="block text-gray-600">repository url</label>
                    <input type="url" id="repository_url" name="repository_url" required
                 value="<?php if( $method === "modifie" && isset($pckg)){echo $pckg['repository_url'] ;}else{echo "";}  ?>"

                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="https://github.com/versionhub/example">
                </div>
                <div class="mb-2">
                    <label for="description" class="block text-gray-600">Description</label>
                    <textarea type="text" id="description" name="description" required

                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="framework for node.js ..."><?php if( $method === "modifie" && isset($pckg)){echo $pckg['description'] ;}else{echo "";}  ?></textarea>
                </div>
                <div class="mt-4 text-gray-600">Authors :</div>
                <div class=" mt-4" id="authorZone">

                </div>
                <div class=" mt-4">
                <input type="hidden" id="select_cmp" name="select_cmp"  >
                <input type="hidden" id="cmp" name="cmp"  >
                    
                    <button type="button" id="addAuthorBtn" 
                        class="bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400"> + Author</button>
                        Ou
                   <button type="button" id="selectAuthorBtn" 
                        class="bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400">select Author</button>
                </div>
                <div class="mt-4 text-gray-600">Versions :</div>
                <div class=" mt-4" id="versionZone">

                </div>
                <div class=" mt-4">
                    <input type="hidden" id="cmpV" name="cmpV">
                    <button type="button" id="addVersionBtn" 
                        class="bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400"> + Version</button>

                </div>
               
                

                <div class="flex gap-3  justify-end mt-4">
                    <a href="/packages" id="btn-cancel"
                        class="bg-rose-500 text-white px-6 py-2 rounded-lg hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-rose-400">Cancel</a>
                    <button type="submit" id="btn-submit-add"
                        class="bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400">Submit</button>
                </div>
            </form>
        </div>
    </section>
        </main>
        <footer></footer>
    </div>
</body>
<script>
    document.getElementById('cmp').value=<?php echo "0" ?>;
document.getElementById('select_cmp').value=<?php echo "0" ?>;
document.getElementById('cmpV').value=<?php echo "0" ?>;
    const addAuthorBtn =document.getElementById('addAuthorBtn');
    const selectAuthorBtn =document.getElementById('selectAuthorBtn');
    const authorZone =document.getElementById('authorZone');
    const addVersionBtn =document.getElementById('addVersionBtn');
    const versionZone =document.getElementById('versionZone');
    let cmp =Number(document.getElementById('cmp').value);
    let select_cmp =Number(document.getElementById('select_cmp').value);
    let cmpV=Number(document.getElementById('cmpV').value);




    addAuthorBtn.addEventListener('click',()=>{  
cmp++
document.getElementById('cmp').value=cmp;
        const div = document.createElement('div');
        div.innerHTML=`
         <p>author ${cmp + select_cmp}</p>
       <input type="text" id="name${cmp}" name="name${cmp}" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="nom d'author">
                        <input type="text" id="biograph${cmp}" name="biograph${cmp}" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="biography">
                        <input type="email" id="email${cmp}" name="email${cmp}" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="email">
        `;
        authorZone.append(div);

    }) ;
    selectAuthorBtn.addEventListener('click',()=>{  
select_cmp++;
document.getElementById('select_cmp').value=select_cmp;
        const div = document.createElement('div');
        div.innerHTML=`
         <p>author ${cmp + select_cmp}</p>
        <select id="author_id${select_cmp}" name="author_id${select_cmp}" required 
                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option selected value="-1">choisir l'Author</option>
                       <?php foreach($authors as $author):?>
                        <option value="<?= $author['id'] ?>"><?= $author['name'] ?> </option>
                       <?php endforeach ;?>
                    </select>
        `;
        authorZone.append(div);
    }) ;

    addVersionBtn.addEventListener('click',()=>{
        cmpV++;
        document.getElementById('cmpV').value=cmpV;
        const div = document.createElement('div');
        div.innerHTML=`
         <p> version ${cmpV}</p>
       <input type="text" id="version${cmpV}" name="version${cmpV}" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="nom d'author">
                        <input type="date" id="release_date${cmpV}" name="release_date${cmpV}" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        >
                        <input type="text" id="changelog${cmpV}" name="changelog${cmpV}" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="email">
        `;
        versionZone.append(div);
    });
</script>
</html>