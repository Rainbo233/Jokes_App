<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "database_connect.php";

$username = addslashes($_POST["username"]);
$password = addslashes($_POST["password"]);

// Searches the database with any jokes that include the word "chicken" in it. Should only be 1.
echo "Trying to login with " . $username . " and " . $password . "...";

$stmt = $mysqli->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($userid, $uname, $pw);

if($stmt->num_rows == 1){

  echo "<br>Found a match!<br>";
  $stmt->fetch();
  if(password_verify($password, $pw)){

    echo "The passwords match! <br>";
    echo "Login successful!<br>";
    $_SESSION['username'] = $uname;
    $_SESSION['user_id'] = $userid;
    echo "<br><a href='index.php'>Return to main page</a>";
    exit;

  } else{

    $_SESSION = [];
    session_destroy();

  }

} else{

    $_SESSION = [];
    session_destroy();

}

echo "<br>Login fail.<br>";
echo "<br><a href='index.php'>Return to main page</a>";
echo "<br><a href='login_form.php'>Return to log in.</a>";

echo "<br>";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

?>