<?php

    require_once('database.php');
    
    function getHistoryByID($id){

        $con = dbConnection();
        $sql = $con -> prepare ("Select * from History where HostID = ?");
        $sql -> bind_param("i", $id);
        $sql -> execute();
             
        $result = $sql -> get_result();
        return $result;
        
    }

?>