<html>

<head>

</head>

<body>
<h1>Login for Jokes App</h1>
<?php

include "database_connect.php";

?>

<h3>Please Log in.</h3>

<form action="process_login.php" method="post">

Please enter username:<br>
<input type="text" name="username"><br>
Please enter password:<br>
<input type="password" name="password"><br>
<input type="submit" value="Log in">
</form>


<?php
$mysqli->close();
?>

</body>


</html>