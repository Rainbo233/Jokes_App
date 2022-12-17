<?php

include "database_connect.php";

$new_username = addslashes($_POST['username']);
$new_password1 = addslashes($_POST['password1']);
$new_password2 = addslashes($_POST['password2']);

$hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);

echo "Adding user " . $new_username . " with passwords " . $new_password1 . " and " . $new_password2 . "...<br>";

preg_match('/[0-9]+/', $new_password1, $matches);
if(sizeof($matches) == 0){

    echo "Password does not contain a number. Please try again.<br>";
    echo "<a href='register_new_user.php'>Click here to register.</a>";
    exit;

}

preg_match('/[!@#$%^&*()]+/', $new_password1, $matches);
if(sizeof($matches) == 0){

    echo "Password does not have a special character, like !@#$%^&*(). Please try again.<br>";
    echo "<a href='register_new_user.php'>Click here to register.</a>";
    exit;

}

if(strlen($new_password1) < 8){

    echo "Password does not meet required length of 8 or more characters. Please try again.<br>";
    echo "<a href='register_new_user.php'>Click here to register.</a>";
    exit;

}

$stmt = $mysqli->prepare("SELECT * FROM users where username = ?");
$stmt->bind_param("s", $new_username);

$stmt->execute();
$stmt->store_result();

// $stmt->bind_result($uname);

// $sql = "SELECT * FROM users where username = '$new_username'";
// $result = $mysqli->query($sql) or die(mysqli_error($mysqli));

if($stmt->num_rows > 0){
    echo "Username " . $uname . " is already taken. Please enter another.<br>";
    echo "<a href='register_new_user.php'>Click here to register.</a>";
    exit;
}

if($new_password1 != $new_password2){
    echo "Passwords do not match, check your passwords and try again.<br>";
    echo "<a href='register_new_user.php'>Click here to register.</a>";
    exit;
}

$stmt = $mysqli->prepare("INSERT INTO users (id, username, password) VALUES (NULL, ?, ?)");
$stmt->bind_param("ss", $new_username, $hashed_password);

$stmt->execute();
$stmt->store_result();

$stmt->close();

if($stmt){
    echo "\nRegistration success<br>";
}
else{
    echo "Error, not registered.<br>";
}



?>

<a href="index.php">Return to main page</a>