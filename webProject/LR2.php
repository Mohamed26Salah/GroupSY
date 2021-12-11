<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php session_start();?>
	<title>LR</title>
	<link rel="stylesheet" href="LR2.css">
</head>
<body>
 <div class="container">
 	<div class="card">
 		<div class="inner-box" id="card">
 			<div class="card-front">
 				<h2>Login</h2>
 		<form action="LR2.php" method="post">
         
        <!-- <label for="Lname">Username</label> -->
        <input type="text" class="input-box" placeholder="Username" name="Lname" required>

        <!-- <label for="Lpsw">Password</label> -->
        <input type="password" class="input-box" placeholder="Password" name="Lpsw" required>
          
        <button type="submit" class="submit-btn">Log In</button>
        <input type="checkbox" name="checkbox"><span>Rememeber Me</span>
        
        
     </form>
     <button type="button" class="btn" onclick="openRegister()">I'm New Here</button>
 		  </div>
 			<div class="card-back">
 		<form action="LR2.php" method="post" enctype="multipart/form-data">

      <h2>Register</h2> 

      <!-- <label for="uname"><b>Username</b></label> -->
      <input type="text" class="input-box" placeholder="Enter Username" name="unameR" minlength="7"
       maxlength="20" size="20" required>
      <!-- <label for="psw"><b>Password</b></label> -->
      <input type="password" class="input-box" placeholder="Enter Password" name="pswR" minlength="10"
       maxlength="20" size="20" required>

      <!-- <label for="EM"><b>Email</b></label> -->
      <input type="text" class="input-box" placeholder="Enter Your Email" name="EM" required>
      <div class="gender">
          <input type="radio" name="gender" value="male" required> Male
          <input type="radio" name="gender" value="female" required> Female
     </div>
    <div class="photo">

      <!-- <label class="header">Profile Photo:</label> -->
      <!-- <input id="image" type="file" name="profile_photo" placeholder="Photo"  capture> -->
      <!-- <form action = "upload.php" method = "post" > -->
        Select an image to upload: 
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    
    </div>   
      <button class="submit-btn" type="submit">Register</button>
     
    </form>
    <button type="button" class="btn" onclick="openLogin()">I've an account</button>
 			</div>
 		</div>
 	</div>
 </div>
  <?php
///////////////////////////////////////////////////////////////////////

    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES['fileToUpload']['name']);

    echo $target_dir;

   
        if($_FILES['fileToUpload']['size']>1000000)
            echo "the file is too large";

    echo "<br> the file type ".$_FILES['fileToUpload']['type']."<br>";

    if($_FILES['fileToUpload']['type']== "image/jpeg")
        echo "the file is accepted";
    else
        echo "File has to be a jpeg image";


    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $name = basename($_FILES['fileToUpload']['name']);
    move_uploaded_file($tmp_name, "$target_dir/$name");





  /////////////////////////////////////////////////////////////////////////
 $x=true;
  if (isset($_POST['Lname'])) {
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);

        
            $name=$_POST['Lname'];
            $password=$_POST['Lpsw'];
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

            <script>window.location.replace("http://localhost/GroupSY/webProject/Profile.php?userid=<?php echo $row['userid'] ?>");</script>
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
       	echo "mynf3sh ya sa7by";
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
            <script>window.location.replace("http://localhost/GroupSY/webProject/Profile.php?userid=<?php echo $row['userid'] ?>");</script>
             <?php
            exit();
            }
      }
 

$name=$_POST['unameR'];
$password=$_POST['pswR'];
$Email=$_POST['EM'];
$image=$target_file;
$gender=$_POST['gender'];
$type="Student";
 
sql1($name,$password,$Email,$image,$type,$gender);
Sql2($name,$password);

  }

      ?>
 <script>
 	var card = document.getElementById('card');
 	function openRegister(){
 		card.style.transform="rotateY(-180deg)";
 	}
 	function openLogin(){
 		card.style.transform="rotateY(0deg)";
 	}
 </script>



</body>
</html>