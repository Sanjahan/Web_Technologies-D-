<?php

    require_once('database.php');
    
    function getNotificationsByID($id){

        $con = dbConnection();
        $sql = $con -> prepare ("Select * from Notification where UserID = ?");
        $sql -> bind_param("i", $id);
        $sql -> execute();
             
        $result = $sql -> get_result();
        return $result;
        
    }

?>