<?php

    require_once('../model/profile-model.php');
    require_once('../model/history-model.php');
    require_once('../model/post-model.php');

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');
    
    $user = getUserByID($_COOKIE["id"]);
    $result = getHistoryByID($_COOKIE["id"]);

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

                $client = getUserByID($row['ClientID']);
                $name = $client["Fullname"];
                $post = getPostByID($row['PostID']);
                $address = $post["Address"];
                $days = $row['DaysSpent'];
                $earning = $row['Earning'];

                echo "    
                <tr>
                <td align=center>$name spent $days days on $address. Total earning = $earning</td>
                </tr>";
            }
        }else{
            echo"<table width=\"70%\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
            <tr>
                <td align=\"center\">No History Available</td>
            </tr>";
        }
    ?>
</body>
</html>