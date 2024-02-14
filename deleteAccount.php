<?php
include 'MySQL.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(empty($username) || empty($password)){
        echo 'Invalid username or password.';
        return;
    }
    
    $sql = "DELETE FROM ChatUsers WHERE Name = :username AND Password = :password";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    
    if($stmt->execute()){
        $rowCount = $stmt->rowCount();
        
        if($rowCount > 0){
            echo 'Account deleted successfully!';
        }
        else{
            echo 'Invalid username or password.';
        }
    }
    else{
        echo 'Error deleting account.';
    }
}
?>
