<?php
include("../config.php");
if (!isset($_SESSION['login_user'])) {
	header("location: login.php");
}
?>

<h2> Welcome <?= $_SESSION['login_user'] ?> </h2><br>
What do you want to do?
<ul>
	<li><a href="addadmin.php">Add Admin User</a></li>
	<li><a href="listallguestbooks.php">List all guestbooks</a></li>
	<li><a href="logout.php">Logout</a></li>
</ul>
<hr>
<p>
	<h2>
	<?php
	if (isset($_GET['msg'])){
		echo htmlspecialchars($_GET['msg']);
	}
	?>
	</h2>
</p>