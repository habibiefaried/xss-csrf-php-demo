<?php
include("../config.php");
if (!isset($_SESSION['login_user'])) {
	header("location: login.php");
}

$sql = 'SELECT * FROM guestbook';

$q = $pdo->prepare($sql);
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);

$count = 0;
echo "<h1>Fans Message</h1>";
echo "<ul>";
while ($r = $q->fetch()) {
  echo "<li><a href='gb.php?id=".$r['id']."'>".$r['name']."</li>";
}
echo "</ul>";
?>
