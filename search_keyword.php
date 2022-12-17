<?php

include "database_connect.php";
$keyword = addslashes($_GET["keyword"]);

// Searches the database with any jokes that include the word "chicken" in it. Should only be 1.
echo "<h2> Jokes that contain the word $keyword </h2>";

/*
$sql = "

SELECT Joke_ID, Joke_Question, Joke_Answer, users_id, username
FROM jokes_table 
JOIN users on users.id = jokes_table.users_id
WHERE Joke_Question LIKE '%$keyword%'



";
*/

$keyword = "%" . $keyword . "%";

$stmt = $mysqli->prepare("SELECT Joke_ID, Joke_Question, Joke_Answer, users_id, username
FROM jokes_table 
JOIN users on users.id = jokes_table.users_id
WHERE Joke_Question LIKE ?");
$stmt->bind_param("s", $keyword);

$stmt->execute();
$stmt->store_result();
$stmt->bind_result($Joke_ID, $Joke_Question, $Joke_Answer, $users_id, $username);

// Displays results from connection one at a time, if there are results at all.
if ($stmt->num_rows > 0) {
  // output data of each row
  while($row = $stmt->fetch()) {
    echo "Joke Number: " . $Joke_ID . " - Question: " . $Joke_Question . " - Answer: " . $Joke_Answer . " - Submitted by user: " . $users_id ."<br>";
  }
} else {
  echo "0 results";
}

?>

<a href="index.php">Return to main page</a>