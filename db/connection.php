<?php
//general configs
$server = "localhost";
$usuario = "root";
$senha = "25153jHj82794";
$banco = "crud";


//Connection
try {
    $pdo = new PDO("mysql:host=$server;dbname=$banco", $usuario, $senha);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


//Cleaning the input
function CleaningInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
