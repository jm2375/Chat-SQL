<?php
include 'MySQL.php';

$name = $_GET['Name'] ?? '';

$stmt = $con->prepare("SELECT Chat FROM ChatUsers WHERE Name = ?");
$stmt->execute([$name]);
$chatContent = $stmt->fetch(PDO::FETCH_ASSOC);

if($chatContent === false){
    echo 'Invalid partner username';
}
else{
    echo trim($chatContent['Chat']) !== '' ? $chatContent['Chat'] : 'No messages';
}
?>
