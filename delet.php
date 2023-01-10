<?php
    require_once "main.php";
    $id = $_GET["id"];
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
            Deletar Contato 
        </h1>
        <table class="table-fixed border-collapse border border-sky-800 mx-auto mt-10">
                <thead>
                    <tr class="border border-sky-5800">
                        <th class="border border-sky-800 p-2 text-sky-800 uppercase">Nome</th>
                        <th class="border border-sky-800 p-2 text-sky-800 uppercase">Número</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        echo "
                        <tr class='border border-sky-800'>
                            <td class='border border-sky-800 p-2'>{$list[$id]["name"]}</td>
                            <td class='border border-sky-800 p-2'>{$list[$id]["number"]}</td>
                        </tr>
                        ";
                    ?>
                </tbody>
            </table>
            <p class="text-center mt-10">
                Deseja deletar este contato?
            </p>
                <?php
                    if(array_key_exists('delet', $_POST)) {
                        delet($id);
                    }
                ?>
                <form method="post" class="text-center">
                    <input class="text-red-500 hover:text-red-600 cursor-pointer" type="submit" value="Deletar" name="delet">
                    | <a class="text-center text-sky-500 hover:text-sky-600" href='index.php'>Voltar</a>
                </form>
                
            
    </div>
</body>
</html>