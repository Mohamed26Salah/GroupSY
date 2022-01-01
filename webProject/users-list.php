<?php
    session_start();
    include_once "DBConnection.php";
    $outgoing_id = $_SESSION['unique_id'];
    if($_SESSION["Type"] == "Student") {
        $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND `type` = 'Adminstrator' ORDER BY `status` ";
    }
    
    if($_SESSION['Type'] == "Adminstrator") {
        $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND `type` = 'Student' ORDER BY `status` ";
    }
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(!$query){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>