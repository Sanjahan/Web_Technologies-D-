<?php

    require_once('../model/profile-model.php');
    require_once('../model/notification-model.php');

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');
    
    $user = getUserByID($_COOKIE["id"]);
    $result = getNotificationsByID($_COOKIE["id"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php include('header.php') ?>
    <br><br><br>
    <?php 
        if(mysqli_num_rows($result)>0){
        echo"<table width=\"70%\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">";

            while($row=mysqli_fetch_assoc($result)){

                $notification=$row['Notification'];
                $date=$row['Date'];
                echo "    
                <tr><td>$notification</td>
                <td>$date</td>
                </tr>";
            }
        }else{
            echo"<table width=\"70%\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
            <tr>
                <td align=\"center\" colspan=\"2\">No Notifications Available</td>
            </tr>";
        }
    ?>
</body>
</html>