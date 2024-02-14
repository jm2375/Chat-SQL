<?php
include 'MySQL.php';

$stmt = $con->query("SELECT Name FROM ChatUsers");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($users as $user){
    echo htmlspecialchars($user['Name']) . "\n";
}
?>
