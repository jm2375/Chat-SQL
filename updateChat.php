<?php
include 'MySQL.php';

$name = $_POST['Name'] ?? '';
$password = $_POST['Password'] ?? '';
$chatContent = $_POST['Chat'] ?? '';

$stmt = $con->prepare("SELECT * FROM ChatUsers WHERE Name = ? AND Password = ?");
$stmt->execute([$name, $password]);

if($stmt->rowCount() > 0){
    $updateStmt = $con->prepare("UPDATE ChatUsers SET Chat = ? WHERE Name = ? AND Password = ?");
    $updateStmt->execute([$chatContent, $name, $password]);
    echo 'true';
}
else{
    echo 'false';
}
?>
