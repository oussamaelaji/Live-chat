<?php
require('connect.php');
session_start();
$inactive = 600; //10 minute
if(!isset($_SESSION['logout']) ){
    $_SESSION['logout'] = time()+$inactive; 
}
if(time() > $_SESSION['logout']){
    session_destroy();
    header('Location: login.php');
}else{
    $_SESSION['logout'] = time()+$inactive; 
}

if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}
ob_start(); //for warning: cannot modify header information – header already sent by
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Live Chat</title>
    <link rel="stylesheet" href="CSS/style.css">
  </head>
  <body>
    <div style="display: flex;">
    <h1 class="text">Live Chat</h1>
    <a href="logout.php" class="logout"><img src="img/logout.png" alt="">Logout</a>
    
    </div>
    <div class="chatbox">
        <div class="chatlogs">            
            <?php
            echo '<div id="show"></div>';
            echo '<script type="text/javascript" src="jQuery/jquery.js"></script>';
            echo '<script type="text/javascript">';
                echo '$(document).ready(function() {';
                    echo 'setInterval(function () {';
                        echo "$('#show').load('message.php')";
                    echo '}, 500);';
                echo '});';
            echo '</script>';
            echo '<script>updateScroll()</script>';
            ?>
        </div>
        <div class="chat-form">
            <form action="insertmessage.php" class="form1" method="POST" id="idform" onsubmit="return formSubmit();">
                <div class="form2">
                <textarea required name="textarea" maxlength="200" id="myInput" required></textarea>
                </div>
                <input type="submit" name="submit" value="Send" id="myBtn">
            </form>
        </div>
    </div>
    <span id="result"></span>
    <script>
        var input = document.getElementById("myInput");
        input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
           document.getElementById("myBtn").click();
        }
        });
    </script>
    <p style="text-align: right; margin: 10px 25px; font-size: 20px; font-weight: bold;">Devoloped By <a href="https://www.facebook.com/oussma.elaji" style="text-decoration: none;color:black;" target="_blank">EL-AJI Oussama</a></p>
    <script src="jQuery/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script>
    function formSubmit(){
    $.ajax({
        type:'POST',
        url:'insertmessage.php',
        data:$('#idform').serialize(),
        success:function(response){
            $('#result').html(response);
        }
    });
    var form=document.getElementById('idform').reset();
    return false;
    }
    </script>
  </body>
</html>