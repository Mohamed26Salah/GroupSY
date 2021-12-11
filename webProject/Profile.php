<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
<head>
    <style>
button {
  background-color: #212F45;
  color: #EEEDE7;
  padding: 15px 22px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  border-radius: 10%;
  border: 1px ;
}

button:hover {
  opacity: 0.5;
}
.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 20, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}

    </style>

    <?php
 
   // echo $_SESSION["Type"];
    $ID1 = $_GET["userid"];
  if (isset($_POST['Ename'])) {
    $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        
        $conn = mysqli_connect($servername,$username,$password,$DB);

            
            $name=$_POST['Ename'];
            $password=$_POST['Epassword'];
            $email=$_POST['Eemail'];
           // $gender=$_POST['gender'];

            
            $sql= "UPDATE users SET email='$email',password='$password',username='$name' WHERE userid =".$ID1;
            $result=mysqli_query($conn,$sql);
           
            
            $_SESSION["email"]=$_POST['Eemail'];
            $_SESSION["Password"]=$_POST['Epassword'];
            $_SESSION["username"]=$_POST['Ename'];
           
            


            }
  $src;
     if(empty($_SESSION['image'])){
        if($_SESSION["gender"]=="male")
        {$GLOBALS['src'] = "https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg";}
       else{
        $GLOBALS['src'] ="Images/femaleAvatar.png";
       }
       
     }
     else{
       $GLOBALS['src'] =$_SESSION["image"];
     }
     //echo"$src";
  ?>

   
          
          
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
</head>
<body background="background1.jpg">

<form action="" method="post">
<div class="container rounded bg-white mt-5 mb-5">
 <!-- dont take a copy from the img name -->
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?php echo $src?>"><span class="font-weight-bold"><?php echo  $_SESSION["username"] ?></span><span class="text-black-50"><?php echo $_SESSION["email"] ?></span><span> </span>


            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" name = "Ename" class="form-control"  value="<?php echo  $_SESSION["username"] ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" name = "Epassword" class="form-control"  value="<?php echo $_SESSION["Password"] ?>"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" name = "Eemail" class="form-control" value="<?php echo $_SESSION["email"] ?>"></div>
                    <div class="col-md-12"><label class="labels">Gender:</label>
                    <br><?php echo $_SESSION["gender"] ?></div>

                </div>
                <div class="mt-5 text-center"><button style="background-color: purple ;" class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>
            <!-- background="background.jpg" -->
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience" style = "margin-left: 35%"><span>Role</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;<?php echo $_SESSION["Type"] ?></span></div><br>
                
            </div>
        </div>
        
    </div>
</div>
</div>
</div>

</form>




</body>
</html>
