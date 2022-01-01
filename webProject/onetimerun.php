<?php 
include_once('DBConnection.php');
$sql="SELECT * FROM users";
$result1 = $conn->query($sql);
while ($row = mysqli_fetch_array($result1)) {
$ran_id = rand(time(), 100000000);
$insert_query = mysqli_query($conn, "UPDATE users set `unique_id` = '".$ran_id."' WHERE `userid` ='".$row['userid']."'");
}
?>