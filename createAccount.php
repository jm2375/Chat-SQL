<?php
include 'MySQL.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(empty($username) || empty($password)){
        echo 'Invalid username or password.';
        return;
    }
    
    $stmt = $con->prepare("SELECT * FROM ChatUsers WHERE LOWER(Name) = LOWER(:username)");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    if($stmt->rowCount() > 0){
        echo 'Username already taken. Please choose a different one.';
    }
    else{
        $stmt = $con->prepare("INSERT INTO ChatUsers (Name, Password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        
        if($stmt->execute()){
            echo 'Account created successfully!';
        }
        else{
            echo 'Unable to create account.';
        }
    }
}
?>
