<?php
//general configs
$server = "localhost";
$usuario = "root";
$senha= "";
$banco="first_database";


//Connection

$pdo = new PDO("mysql:host=$server;dbname=$banco",$usuario,$senha);