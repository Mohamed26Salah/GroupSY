<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <?php session_start();?>
  <title>CodePen - Glassmorphism login Form Tutorial in html css</title>
  

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body {font-family:Garamond , Helvetica, sans-serif;

 
  background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);  
     background-size: 400% 400%;  
        animation: gradient 13s ease infinite;     height: 100vh; } 
         @keyframes gradient { 
          0% {         background-position: 0% 50%;     }    
          50% {         background-position: 100% 50%;     }    
          100% {       background-position: 0% 50%;     } }

body{
    background-color: #080710;
}
/*.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}*/
form{
    height: 775px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
    
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 5px;
  display: flex;
  position: fixed;
}
.social div{
  
  /*background: red;*/
  width: 150px;
  height: 100px;
  border-radius: 3px;
  padding: 5px 5px 5px 5px;
  /*background-color: rgba(255,255,255,0.27);*/
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  /*background-color: rgba(255,255,255,0.47);*/
}
.social .female{
  margin-left: 25px;
  width: 30px;
  margin-bottom: 30px;
  /*height: 20px;*/
  text-align: left;
}
.social .male{
  /*margin-left: 60px;*/
  margin-bottom: 30px;
  width: 30px;
  /*height: 20px;*/
}

.btn{
  width:70%;
  margin-top: 30px;
  margin-left: 50px;
}
.register{
    margin-top: 40px;
}
.photo{
    /*width:70%;*/
  margin-top: 110px;
  margin-left: 6px;
}

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
   <!-- <div id="first">  -->
  <!--   <form action="LRN.php" method="post">
        <h3>Login Here</h3> 
        <label for="Lname">Username</label>
        <input type="text" placeholder="Username" id="Lname" name="Lname">

        <label for="Lpsw">Password</label>
        <input type="password" placeholder="Password" id="Lpsw" name="Lpsw">
          
        <button type="submit">Log In</button>
        <button type="button" class="btn">I'm New Here</button> -->
        <!-- <button>Log In</button> -->
        <!-- <div class="social">
          <div class="go"><i class="fab fa-google"></i>  Google</div>
          <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div> -->
   <!--  </form>
   </div>  -->


   <div id="secound"> 
    <form action="LRN.php" method="post">

      <h3>Register Here</h3> 

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="unameR" minlength="7"
       maxlength="20" size="20" required>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pswR" minlength="10"
       maxlength="20" size="20" required>

      <label for="EM"><b>Email</b></label>
      <input type="text" placeholder="Enter Your Email" name="EM" required>
      <div class="social">
          <div class="male"><input type="radio" name="gender" value="male" required> Male</div>
          <div class="female"><input type="radio" name="gender" value="female" required> Female</div>
     </div>
    <div class="photo">
      <label class="header">Profile Photo:</label>
      <input id="image" type="file" name="profile_photo" placeholder="Photo"  capture>
    </div>   
      <button class="register" type="submit">Register</button>
     
    </form>
   </div> 


     <?php


if (isset($_POST['Lname'])) {
   function Sql1($Data1,$Data2){
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
             else
            {
              //check1();
             $message = "Username and/or Password incorrect.\\nTry again.";
              echo "<script type='text/javascript'>alert('$message');</script>";
              
              
            exit();
            }
      }
      $name=$_POST['Lname'];
      $password=$_POST['Lpsw'];
      Sql1($name,$password);
      
  }
      ?>
</body>
</html>
<!-- partial -->

</body>
</html>
