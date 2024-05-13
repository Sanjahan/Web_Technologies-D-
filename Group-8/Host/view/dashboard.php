<?php 

    require_once('../model/dashboard-model.php');

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');

    $posts = getPostByUserID($_COOKIE['id']);
    $bookedPosts = getBookedPostByUserID($_COOKIE['id']);
    $revenuePerMonth = getRevenuePerMonthByUserID($_COOKIE['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<?php include('header.php') ?>
    <br><br><br><br><br><br><br>
    <table width="25%" border="0" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                Total Posts : <?php echo $posts ?> <br><br>
                Booked Posts : <?php echo $bookedPosts ?> <br><br>
                Total Revenue [Per Month] : <?php echo $revenuePerMonth ?>
            </td>
        </tr>
    </table>
</body>
</html>