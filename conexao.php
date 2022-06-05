<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "tomfram";
$port = 3306;

try {
    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" .$dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso.";

    //Conexão sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" .$dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso.";

} catch (PDOException $erro) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado" . $erro->getMessage();
}
