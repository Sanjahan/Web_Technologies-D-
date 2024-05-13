<?php

function dbConnection(){

    $conn = mysqli_connect('localhost', 'root', '', 'PayingGuestManagementSystem');
    return $conn;
    
}

?>