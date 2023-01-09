<?php

$list = json_decode($_COOKIE["contacts"], true);


function delet($id)
{
    global $list;
    if ($id == "all") {
        $list = [];
        setcookie("contacts", json_encode($list));
    } else {
        unset($list[$id]);
        setcookie("contacts", json_encode($list));
        echo "
            <p class='text-1xl font-medium text-center text-red-500 uppercase mt-5'>Contato deletado com successo!</p>
            <script>
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 1000);
            </script>";
    }
}

function edit($id, $name, $number)
{
    global $list;
    $duplicate = false;

    $save = $list[$id];

    $list[$id] = [
        "name" => "NULL",
        "number" => "NULL"
    ];

    foreach ($list as $contact) {
        if (in_array($name, $contact)) {
            $duplicate = true;
        }
        if (in_array($number, $contact)) {
            $duplicate = true;
        }
    }

    if (!empty($name) && !empty($number)) {
        if ($duplicate) {
            $list[$id] = $save;
            echo "
                <p class='text-1xl font-medium text-center text-red-500 uppercase mt-5'>Nome ou número ja existem!</p>
            ";
        } else {
            $list[$id] = [
                "name" => $name,
                "number" => $number
            ];
            setcookie("contacts", json_encode($list));
            echo "
                <p class='text-1xl font-medium text-center text-green-500 uppercase mt-5'>Contato Editado com successo!</p>
                <script>
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 1000);
                </script>";
        }
    } else {
        echo "
            <p class='text-1xl font-medium text-center text-red-500 uppercase mt-5'>Preencha todos os campos!</p>
        ";
    }
}

function add($name, $number)
{
    global $list;
    $duplicate = false;

    foreach ($list as $contact) {
        if (in_array($name, $contact)) {
            $duplicate = true;
        }
        if (in_array($number, $contact)) {
            $duplicate = true;
        }
    }

    if (!empty($name) && !empty($number)) {
        if ($duplicate) {
            echo "
                <p class='text-1xl font-medium text-center text-red-500 uppercase mt-5'>Nome ou número ja existem!</p>
            ";
        } else {
            $list[] = [
                "name" => $name,
                "number" => $number
            ];
            setcookie("contacts", json_encode($list));
            echo "
                <p class='text-1xl font-medium text-center text-green-500 uppercase mt-5'>Contato Adicionado com successo!</p>
                <script>
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 1000);
                </script>";
        }
    } else {
        echo "
            <p class='text-1xl font-medium text-center text-red-500 uppercase mt-5'>Preencha todos os campos!</p>
        ";
    }
}
