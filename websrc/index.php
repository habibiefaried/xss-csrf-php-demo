<?php
include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {      
	$sql = 'INSERT INTO guestbook (name, message) VALUES (?, ?)';

	$q = $pdo->prepare($sql);
	$q->execute([$_POST['name'], $_POST['message']]);
	echo "Done!";
} else {
?>

<h2>Legit Elon Musk Fans Page</h2>
<p>Please send us message so we can forward it to Mr. Elon!</p>
<form action = "" method = "post">
  <label for="name">Your Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="password">Message:</label><br>
  <textarea id="message" name="message" rows="15" cols="50">
</textarea><br><br>
  <input type = "submit" value = " Submit "/><br />
</form>

<?php
}
?>