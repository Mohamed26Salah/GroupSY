<?php


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
        
        	$name=$_POST['uname'];
            $password=$_POST['psw'];
            $sql= "SELECT * FROM users WHERE username='".$name."' AND password='".$password."'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)==1){
            	echo "you have Successfully logged in";

            	exit();
            }
            else
            {
            	echo "You have Entered Incorrect";
            	exit();
            }
        
        
        
        
?>