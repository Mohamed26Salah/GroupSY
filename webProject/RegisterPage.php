<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php

 
      function sql1($Data1,$Data2,$Data3)
      {
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);
        if(!$conn){
            die("Connection Failed:". mysqli_connect_error());
        }
        else{
            echo "Connected Sucessfully";
        }
        
        $sql= "INSERT INTO users (username, password, email) VALUES ('$Data1', '$Data2', '$Data3')";
        if($conn->query($sql)=== TRUE){
            echo "New record created Successfully";
        }
        else
        {
            echo "Error: ".sql."<br>".$conn->error;
        }
        $conn->close();
      }
 

$name=$_POST['uname'];
$password=$_POST['psw'];
$Email=$_POST['EM'];
 
sql1($name,$password,$Email);

?>
</body>
</html>