<?php
require("./db.php");
$dpname= "tochukwu";
$username= "jayz";
$useremail = "jelrjkelwjr";
$passwordhashed = "soething";
$phoneno = "89723423";
$refids = "sdufhjs";

$sql= "INSERT INTO users (dpname,name, email, password,phoneno,refferedme) VALUES (:dpnames,:names,:emails,:passwords,:phonenos,:refferedmes)";
            $stmt = $pdo->prepare($sql);
            $thise = $stmt->execute(['dpnames'=>$dpname,'names'=>$username,'emails'=>$useremail,'passwords'=>$passwordhashed,'phonenos'=>$phoneno,'refferedmes'=>$refids]);

        if($thise){
            echo "e don enter";
        }else{
            echo "e no work";
        }

?>