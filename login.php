<?php
require('connect.php');
session_start();
if(isset($_SESSION["loggedin"])){
  header("location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/loginstyle.css">
  </head>
  <body>
    <div class="form-login">
    <div class="img"><img src="img/images.png"></div>
    <form action="" method="POST" id="form">
      <input class="form-input" type="text" name="username" id="" placeholder="Username"><br>
      <input class="form-input" type="password" name="password" id="" placeholder="Password"><br>
    <input class="form-input submit" type="submit" name="submitform">
    </form>
    </div>
    <?php
    if(isset($_POST['submitform'])){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $result=mysqli_query($connect,"SELECT * FROM users WHERE username='".$username."' AND password='".$password."';");
      $count=mysqli_num_rows($result);
      if($count>0){
        $_SESSION["loggedin"]=true;
        $_SESSION["username"]=$username;
        $rows=mysqli_fetch_assoc($result);
        $_SESSION["id"]=$rows['id'];
        mysqli_free_result($result);
        header("Location: index.php");
      }
      else {
        echo '<h3 style="color:red;">Username or Password is incorrect</h3>';
        header("Refresh:1;url=login.php");
      }
    }
    ?>
  </body>
</html>