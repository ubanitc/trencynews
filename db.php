<?php

$host = "us-cdbr-east-06.cleardb.net";
$username = "b2d9d974750f74";
$password = "6f44b614";
$dbname = "login system";

$dsn = ("mysql:host=".$host.";dbname=".$dbname);

try{
    $pdo = new pdo($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
        echo "connection error:".$e->getMessage();
}
