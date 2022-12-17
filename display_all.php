<?php

$sql = "SELECT Joke_ID, Joke_Question, Joke_Answer, users_id FROM jokes_table";
$result = $mysqli->query($sql);

// Displays results from connection one at a time, if there are results at all.
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "Joke Number: " . $row["Joke_ID"]. " - Question: " . $row["Joke_Question"]. " - Answer: " . $row["Joke_Answer"]. " - Submitted by user: " . $row['users_id'] ."<br>";
    }
  } else {
    echo "0 results";
  }

?>