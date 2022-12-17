<html>

<head>

</head>

<body>
<h1>Please register.</h1>

<?php

include "database_connect.php";

?>

<form action="process_new_user.php" method="post">

Please enter username:<br>
<input type="text" name="username"><br>
Please enter password:<br>
<input type="password" name="password1"><br>
Confirm password:<br>
<input type="password" name="password2"><br>
<input type="submit" value="Register">
</form>

<?php

$mysqli->close();
echo "<br><a href='index.php'>Return to main page</a>";

?>

</body>


</html>