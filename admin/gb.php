<?php
include("../config.php");
if (!isset($_SESSION['login_user'])) {
	header("location: login.php");
}

$sql = 'SELECT * FROM guestbook WHERE id=?';

$q = $pdo->prepare($sql);
$q->execute([$_GET['id']]);
$q->setFetchMode(PDO::FETCH_ASSOC);

while ($r = $q->fetch()) {
  echo $r['message'];
}
?>
