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
                <input type="hidden" name="_method" value="submit_<?= $method ?>">
                <div class="mb-2">
                    <label for="name" class="block text-gray-600">Nom de package</label>
                    <input type="text" id="name" name="name" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="express js">
                </div>
                <div class="mb-2">
                    <label for="repository_url" class="block text-gray-600">repository url</label>
                    <input type="url" id="repository_url" name="repository_url" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="https://github.com/versionhub/example">
                </div>
                <div class="mb-2">
                    <label for="description" class="block text-gray-600">Description</label>
                    <textarea type="text" id="description" name="description" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="framework for node.js ..."></textarea>
                </div>
               
               
                

                <div class="flex gap-3  justify-end mt-4">
                    <a href="/" id="btn-cancel"
                        class="bg-rose-500 text-white px-6 py-2 rounded-lg hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-rose-400">Cancel</a>
                    <button type="submit" id="btn-submit-add"
                        class="bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400">Submit</button>
                </div>
            </form>
            <form method="post" action="#">
            <div class="mb-2">
                    <label for="position" class="block text-gray-600">Author</label>
                    <select id="position" name="position" required 
                        class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option selected value="-1">choisir l'Author</option>
                       <?php foreach($authors as $author):?>
                        <option value="<?= $author['id'] ?>"><?= $author['name'] ?> </option>
                       <?php endforeach ;?>
                    </select>
                </div>
            </form>
        </div>

    </section>
        </main>
        <footer></footer>
    </div>
</body>

</html>