<html>

<head>

</head>

<body>
<h1>Jokes Page</h1>
<a href="logout.php">Click here to log out.</a>
<a href="login_form.php">Click here to log in.</a>
<a href="register_new_user.php">Click here to register.</a>
<?php

include "database_connect.php";

?>

<h3>Search for a Joke</h3>

<form action="search_keyword.php">

Please enter keyword:<br>
<input type="text" name="keyword"><br>
<input type="submit" value="Submit">
</form>

<hr>

<h3>Add a Joke</h3>

<form action="add_joke.php">

Please enter first half:<br>
<input type="text" name="new_joke"><br>

Please enter punchline:<br>
<input type="text" name="new_answer"><br>
<input type="submit" value="Submit">
</form>


<?php
$mysqli->close();
?>

</body>


</html>