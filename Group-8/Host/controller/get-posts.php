<?php 
    require('../model/post-model.php');

    if(isset($_GET['address'])){
        $result =  searchPostByAddress($_GET['address']);
        echo json_encode($result);
    }

?>