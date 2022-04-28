<?php

require('db/connection.php');

//CREATING A TABLE
try {
    $sql = $pdo->query("CREATE TABLE IF NOT EXISTS clients (
    id INT auto_increment NOT NULL PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL, 
    email VARCHAR(50) NULL, 
    datinha DATE NULL)");
}catch(PDOException $ex){
    echo "Something went wrong" . $ex->getMessage();
}

//INSERTING DATAS

try{
    $sql = $pdo->query("INSERT INTO clients VALUES (DEFAULT,'fodase','fodase@fodase','02/02/02')");
    echo "Every is okay :)";
}catch(PDOException $ex){
    echo "Something went wrong" . $ex->getMessage();
}

