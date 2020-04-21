<?php
require('connect.php');
session_start();
$result = $connect->query("SELECT * FROM messages");
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        if($row['id']==2){
            echo '<div class="chat user2">';
            echo '<div class="user-photo"><img src="img/user2.png" alt=""></div>';
            if($_SESSION['id']==2)
                echo '<div class="chat-message" style="order: -1;background-color: #0099ff;color: white;border-top-right-radius: 0px;">';
            if($_SESSION['id']==1)
                echo '<div class="chat-message" style="background-color: #f1f0f0;color:black;border-top-left-radius: 0px;">';
            echo '<p>'.$row['messages'].'</p>';
            if($_SESSION['id']==2)
                echo '<h3 class="time" style="color: white;">'.$row['time'].'</h3>';
            if($_SESSION['id']==1)
                echo '<h3 class="time" style="color: black;">'.$row['time'].'</h3>';
            echo '</div>';
            echo '</div>';
        }
        else{
            echo '<div class="chat user1">';
            echo '<div class="user-photo"><img src="img/user1.png" alt=""></div>';
            if($_SESSION['id']==1)
                echo '<div class="chat-message" style="order: -1;background-color: #0099ff;color: white;border-top-right-radius: 0px;">';
            if($_SESSION['id']==2)
                echo '<div class="chat-message" style="background-color: #f1f0f0;color: black;border-top-left-radius: 0px;">';
            echo '<p>'.$row['messages'].'</p>';
            if($_SESSION['id']==1)
                echo '<h3 class="time" style="color: white;">'.$row['time'].'</h3>';
            if($_SESSION['id']==2)
                echo '<h3 class="time" style="color: black;">'.$row['time'].'</h3>';
            echo '</div>';
            echo '</div>';
        }
    }
}
?>