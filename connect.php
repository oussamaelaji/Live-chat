<?php
$host="localhost";
$user="root";
$password="";
$database="livechat";
$connect= mysqli_connect($host, $user, $password, $database);
if(mysqli_connect_errno()){
    die("cannot connect to database field : ". mysqli_connect_error());
}
// else {
//     echo 'Database is connected<br>';
// }
?>
