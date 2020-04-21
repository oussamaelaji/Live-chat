<?php
require('connect.php');
session_start();
ob_start();
            $time=date("Y-m-d h:i:s A");
            $time=strtotime($time); //to subtract 2 hour
            $time=$time-(7200); //to subtract 2 hour
            $time=date("Y-m-d H:i:s", $time); //to subtract 2 hour
            $text=strip_tags($_POST['textarea']);
            $text=mysql_real_escape_string($_POST['textarea']);
            $text=htmlentities($_POST['textarea']);
            $text=stripslashes($_POST['textarea']);
            $text=filter_var($_POST['textarea'], FILTER_SANITIZE_MAGIC_QUOTES); //or this $text=str_replace("'","\'e",$_POST['textarea']);
            $result=mysqli_query($connect,"INSERT INTO messages(id,messages,time)VALUES(".$_SESSION['id'].",'".$text."','".$time."');");
            if($result){
                ob_end_flush(); //for warning: cannot modify header information – header already sent by
            }
            mysqli_close($connect);
?>