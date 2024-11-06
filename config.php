<?php

    $dbHost = 'localhost';
    $dbUsername = 'root'; // Colocar entre aspas Nome do Local do banco de dados (Normalmente o padrão é root)
    $dbPassword = ''; // Colocar entre aspas a senha que você configurou para guardar o banco de dados (caso não colocou seixar vazio)
    $dbName = 'db-lddh';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

?>
