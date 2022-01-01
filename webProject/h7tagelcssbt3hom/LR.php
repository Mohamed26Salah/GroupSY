<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php session_start();?>
<style>
body {font-family:Garamond , Helvetica, sans-serif;

 
  background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);  
     background-size: 400% 400%;  
        animation: gradient 13s ease infinite;     height: 100vh; } 
         @keyframes gradient { 
          0% {         background-position: 0% 50%;     }    
          50% {         background-position: 100% 50%;     }    
          100% {       background-position: 0% 50%;     } }

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 10px ;
  display: inline-block;
  border: 2px solid #000C66;
  box-sizing: border-box;
  color:#000000;
  background-color: #BDC3CB;
}

/* Set a style for all buttons */
button {
  background-color: #212F45;
  color: #EEEDE7;
  padding: 15px 22px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 10%;
  border: 1px ;
}

@keyframes movingGradient {
   from{background-position: 0 0;}
   to {background-position: 100% 100%;}
  }


button:hover {
  opacity: 0.5;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #F51720;
  color: #EEEDE7;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The modal1 (background) */
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.5);
   /* Black w/ opacity */

  padding-top: 50px;
}
/* The modal2 (background) */
.modal2 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
  padding-top: 50px;
}

/* modal1 Content/Box */
.modal1-content {
  background-color: #5885AF;

  margin: 5% auto 10% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
}
/* modal2 Content/Box */
.modal2-content {
  background-color: #5885AF;

  margin: 5% auto 10% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 1.1s;
  animation: animatezoom 1.1s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

/* The actual popup (appears on top) */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class when clicking on the popup container (hide and show the popup) */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}


/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
#SN {
    position: fixed;
   top: 20%;
   right: 42.7%;
  }
  #Lbutton
  {

position: fixed;
   top: 35%;
   right: 42.5%;
}
#Rbutton
  {
position: fixed;
   top: 35%;
   right: 50.0%;


}
</style>
</head>
<body>

<font face="Trebuchet MS Bold" size="50px" color="#FFFFFF"><center ><div id="SN">XY SERVER</div></center></font>

<div id="Lbutton"><button onclick="document.getElementById('id01').style.display='block'" style="width:120px;">Login</button></div>
<div id="Rbutton"><button onclick="document.getElementById('id02').style.display='block'" style="width:120px;">Register</button></div>

<div id="id01" class="modal1">
  
  <form class="modal1-content animate" action="LR.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close modal1">&times;</span>
      <img src="R.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="fname" required>
      
        
      <button type="submit">Login</button>
 
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#41729F">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<div id="id02" class="modal2">
  
  <form class="modal2-content animate" action="LR.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close modal2">&times;</span>
      <img src="R.png" alt="Avatar" class="avatar">
    </div>
    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="unameR" minlength="7"
       maxlength="20" size="20" required>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pswR" minlength="10"
       maxlength="20" size="20" required>

      <label for="EM"><b>Email</b></label>
      <input type="text" placeholder="Enter Your Email" name="EM" required>

      <input type="radio" name="gender" value="male" required> Male
      <input type="radio" name="gender" value="female" required> Female<br><br>

      <label class="header">Profile Photo:</label>
      <input id="image" type="file" name="profile_photo" placeholder="Photo"  capture>
       
      <button type="submit">Register</button>
     
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#41729F">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal1
var modal1 = document.getElementById('id01');

// When the user clicks anywhere outside of the modal1, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}
var modal2 = document.getElementById('id02');

// When the user clicks anywhere outside of the modal1, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}




</script>
<?php
  $x=true;
  if (isset($_POST['uname'])) {
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);

        
            $name=$_POST['uname'];
            $password=$_POST['psw'];
            $sql= "SELECT * FROM users WHERE username='".$name."' AND password='".$password."'";
            $result=mysqli_query($conn,$sql);
           // $row = $result-> fetch_array(MYSQLI_ASSOC);
            //mysqli_num_rows($result)==1
            if($row=mysqli_fetch_array($result)){
            $_SESSION["Type"]=$row[0];
            $_SESSION["userid"]=$row[1];
            $_SESSION["email"]=$row[2];
            $_SESSION["Password"]=$row[3];
            $_SESSION["username"]=$row[4];
            $_SESSION["gender"]=$row[5];
            $_SESSION["image"]=$row[6];
              ?>

            <script>window.location.replace("http://localhost/webProject/Profile.php?userid=<?php echo $row['userid'] ?>");</script>
             <?php
             //remeber to tsheel id mn elink 3lsah nelzft speeddddd

            exit();
            }
            else
            {
              //check1();
             $message = "Username and/or Password incorrect.\\nTry again.";
              echo "<script type='text/javascript'>alert('$message');</script>";
              
              
            exit();
            }
  }
  if(isset($_POST['unameR'])){

     function sql1($Data1,$Data2,$Data3,$Data4,$Data5,$Data6)
      {
       
        if(!filter_var($Data3 , FILTER_VALIDATE_EMAIL)=== false)
        {
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);
        $sql= "SELECT * FROM users WHERE username='".$Data1."' AND email='".$Data3."'";
        $result=mysqli_query($conn,$sql);
        if($row=mysqli_fetch_array($result)){
         $message = "Yasta mynf3sh.\\nTry again.";
              echo "<script type='text/javascript'>alert('$message');</script>";
         die();
         //sHOULD I CLOSE THE CONNECTIOJN ??$conn->close();
        }
        else
        {
           $sql= "INSERT INTO users (username, password, email,image,type,gender) VALUES ('$Data1', '$Data2', '$Data3','$Data4','$Data5','$Data6')";

        if($conn->query($sql)=== TRUE){
         echo "Yeaaaah";
        }
        else
        {
            echo "Error: ".sql."<br>".$conn->error;
        }
        $conn->close();
        }
        //$conn->close();

       }
       else{
        $message1 = "email is invalid incorrect.\\nTry again.";
              echo "<script type='text/javascript'>alert('$message1');</script>";
       }
      }
      function Sql2($Data1,$Data2){
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);
        $sql= "SELECT * FROM users WHERE username='".$Data1."' AND password='".$Data2."'";

         $result=mysqli_query($conn,$sql);
           // $row = $result-> fetch_array(MYSQLI_ASSOC);
          //  mysqli_num_rows($result)==1
            if($row=mysqli_fetch_array($result)){
            $_SESSION["Type"]=$row[0];
            $_SESSION["userid"]=$row[1];
            $_SESSION["email"]=$row[2];
            $_SESSION["Password"]=$row[3];
            $_SESSION["username"]=$row[4];
            $_SESSION["gender"]=$row[5];
            $_SESSION["image"]=$row[6];

              ?>
            <script>window.location.replace("http://localhost/webProject/Profile.php?userid=<?php echo $row['userid'] ?>");</script>
             <?php
            exit();
            }
      }
 

$name=$_POST['unameR'];
$password=$_POST['pswR'];
$Email=$_POST['EM'];
$image=$_POST['profile_photo'];
$gender=$_POST['gender'];
$type="Student";
 
sql1($name,$password,$Email,$image,$type,$gender);
Sql2($name,$password);

  }
  ?>
</body>
</html>

<!-- <?php //function check1() -->{ 
        ?>
        <script>window.addEventListener("DOMContentLoaded", function(){
               var fname = document.getElementById("fname");
                fname.addEventListener("input", function(){
                fname.setCustomValidity("Password is incorrect");
                fname.reportValidity();
             
               });
             });</script> 
        <?php
      //}
        ?> 