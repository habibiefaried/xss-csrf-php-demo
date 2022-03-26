<?php
   $host = 'db:3306';
   $dbname = 'xsscsrfdemo';
   $username = 'root';
   $password = 'example';
   $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   session_start();
?>