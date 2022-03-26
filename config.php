<?php
   $host = 'db:3306';
   $dbname = 'xsscsrfdemo';
   $username = 'root';
   $password = 'example';
   $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   ini_set('session.cookie_httponly',0);
   ini_set('session.use_only_cookies',0);
   session_start();
?>