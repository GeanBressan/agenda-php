<?php
    require_once "main.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-2xl sm:text-5xl font-black text-center text-sky-800 uppercase mt-10">
            Adicionar Contato 
        </h1>

        <?php
            if(array_key_exists('add', $_POST)) {
                $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
                $number = filter_var($_POST['number'], FILTER_SANITIZE_SPECIAL_CHARS);
                add($name, $number);
            }
        ?>

        <form class="flex flex-col w-5/6 sm:w-96 mx-auto mt-5" method="post">
            <input class="border-2 border-stone-800 rounded-md p-2 mb-2" type="text" name="name" placeholder="Nome">
            <input class="border-2 border-stone-800 rounded-md p-2 mb-2" type="text" name="number" placeholder="Número">
            <input class="cursor-pointer border-2 bg-green-500 hover:bg-green-600 rounded-md p-2 text-white" type="submit" name="add" value="Salvar">
        </form>     
    </div>
</body>
</html>