<?php
include("../config.php");

$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {      
   $sql = 'SELECT * FROM admins WHERE username = ? and password = ?';

   $q = $pdo->prepare($sql);
   $q->execute([$_POST['username'], $_POST['password']]);
   $q->setFetchMode(PDO::FETCH_ASSOC);

   $count = 0;
   while ($r = $q->fetch()) {
      $count++;
   }

   if ($count > 0) {
      $_SESSION['login_user'] = $_POST['username'];
      header("location: index.php");
   }else {
      $error = "Your Login Name or Password is invalid";
   }
}
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
   
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px">
                  <?php 
                  if (isset($_GET['logout'])) {
                     echo "Logout success";
                  }
                  ?></div>
               
            </div>
            
         </div>
         
      </div>

   </body>
</html>