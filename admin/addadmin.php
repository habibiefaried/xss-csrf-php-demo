<?php
include("../config.php");
if (!isset($_SESSION['login_user'])) {
	header("location: login.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
	if (($_POST['username'] == '') OR ($_POST['password'] == '')) {
		header("location: addadmin.php");
	} else {
		$sql = 'INSERT INTO admins (username, password) VALUES (?, ?)';

		$q = $pdo->prepare($sql);
		$q->execute([$_POST['username'], $_POST['password']]);
		header("location: index.php?msg=Add Admin Success");
	}
} else {


?>

<h2>Add admin page </h2>
<form action = "addadmin.php" method = "post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="text" id="password" name="password"><br><br>
  <input type = "submit" value = " Submit "/><br />
</form>

<?php
}
?>