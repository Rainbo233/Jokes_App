<?php

session_start();

if(! $_SESSION['username']){

    echo "<br>Must be signed in to make jokes.<br>";
    exit;

}

$user_id = $_SESSION['user_id'];

include "database_connect.php";
$new_joke = $_GET["new_joke"];
$new_answer = $_GET["new_answer"];

$new_joke = addslashes($new_joke);
$new_answer = addslashes($new_answer);

// Searches the database with any jokes that include the word "chicken" in it. Should only be 1.
echo "<h2> Adding new joke: $new_joke $new_answer </h2>";


// $sql = "INSERT INTO Jokes_Table (Joke_ID, Joke_Question, Joke_Answer, users_id) VALUES (NULL, '$new_joke', '$new_answer', '$user_id')";

$stmt = $mysqli->prepare("INSERT INTO Jokes_Table (Joke_ID, Joke_Question, Joke_Answer, users_id) VALUES (NULL, ?, ?, '$user_id')");
$stmt->bind_param("ss", $new_joke, $new_answer);

$stmt->execute();
$stmt->store_result();

// $stmt->bind_result($Joke_ID, $n_joke, $n_answer, $users_id);

// $result = $mysqli->query($sql) or die(mysqli_error($mysqli));

include "display_all.php";

?>

<a href="index.php">Return to main page</a>