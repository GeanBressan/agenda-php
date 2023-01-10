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
            Lista de contatos
            <a class="bg-green-500 hover:bg-green-600 text-white rounded px-4 pb-2" href='add.php'>+</a>
        </h1>
        <?php
        if (array_key_exists('delet', $_POST)) {
            $id = "all";
            delet($id);
        }
        ?>
        <div class="text-center mt-10">
            <?php
            if (!empty($list)) {
                echo "
                        <form method='post'>
                            <p class='text-1xl font-black text-sky-800 uppercase inline'>Limpar todos </p>
                            <input class='font-black bg-red-500 hover:bg-red-600 text-white rounded cursor-pointer px-2 py-1' type='submit' value='X' name='delet'>
                        </form>
                    ";
                echo "
                            <table class='w-5/6 table-auto border-collapse border border-sky-800 mx-auto mt-10 px-10'>
                                <thead>
                                    <tr class='border border-sky-5800'>
                                        <th class='border border-sky-800 p-2 text-sky-800 uppercase'>Nome</th>
                                        <th class='border border-sky-800 p-2 text-sky-800 uppercase'>Número</th>
                                        <th class='border border-sky-800 p-2 text-sky-800 uppercase'>Editar</th>
                                        <th class='border border-sky-800 p-2 text-sky-800 uppercase'>Deletar</th>
                                    </tr>
                                </thead>
                                <tbody>
                            ";
                foreach ($list as $k => $contact) {
                    echo "
                                <tr class='border border-sky-800'>
                                    <td class='border border-sky-800 p-2'>{$contact["name"]}</td>
                                    <td class='border border-sky-800 p-2'>{$contact["number"]}</td>
                                    <td class='border border-sky-800 p-2'><a class='font-black text-sky-500 hover:text-sky-600 rounded px-2 py-1' href='edit.php?id={$k}'>Editar</a></td>
                                    <td class='border border-sky-800 p-2'><a class='font-black bg-red-500 hover:bg-red-600 text-white rounded px-2 py-1' href='delet.php?id={$k}'>X</a></td>
                                </tr>
                                ";
                }
                echo "
                                </tbody>
                            </table>
                            ";
            } else {
                echo "<p class='text-1xl font-medium text-center text-sky-500 uppercase mt-5'>Lista de contatos vazia</p>";
            }

            ?>
        </div>
    </div>
</body>

</html>