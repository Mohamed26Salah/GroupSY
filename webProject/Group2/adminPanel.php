<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
<head>
   <link rel="stylesheet" href="profilesListing.css">
   <link rel="stylesheet" href="previewImage.css">
    <link rel="stylesheet" href="search.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
</head>
<body background="background1.jpg" style="background-repeat: round; width: auto; height: auto;">
<?php
if (empty($_SESSION['username'])) {
    ?>
    <nav>
        <div class="topnav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="courses.php">COURSES</a></li>
                <li><a href="">BLOG</a></li>
                <li><a href="">CONTACT</a></li>
                <li><a href="LR2.php"><i class="fa fa-user-circle"> Login</i></a></li>
            </ul>
        </div>


        <form method="post">
            <div class="searchBox">
                <input class="searchInput"type="text" name="search" placeholder="enter course name....">
                <button class="searchButton" href="#"type="submit" name="submit" value = "Search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div>

            <!-- <input type="text" name="search" placeholder="enter course name....">

            <input type="submit" name="submit" value = "Search">
         -->
        </form>
    </nav>
    <?php
}
else{
    ?>
    <nav>
        <div class="topnav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="courses.php">COURSES</a></li>
                <li><a href="">BLOG</a></li>
                <li><a href="">CONTACT</a></li>
                <?php

                if($_SESSION['Type']=="Administartor"){
                    ?>
                    <li><a href="adminPanel.php">ADMINPANEL</a></li>

                <?php }else{
                    //header('location: index.php');
                }


                ?>
                <li><a href="profile.php"><i class="fa fa-user-circle"><?php echo $_SESSION['username'];?></i></a></li>
                <li><a href="signOut.php">signOut</a></li>
            </ul>
        </div>


        <form method="post">
            <div class="searchBox">
                <input class="searchInput"type="text" name="search" placeholder="enter course name....">
                <button class="searchButton" href="#"type="submit" name="submit" value = "Search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div>

            <!-- <input type="text" name="search" placeholder="enter course name....">

            <input type="submit" name="submit" value = "Search">
         -->
        </form>
    </nav>
    <?php
}
?>

<div class="w3-container w3-margin-top "><ul class="w3-ul w3-card-4">
<?php
$servername = "localhost";
$username ="root";
$password = "";
$DB = "weball";

$conn = mysqli_connect($servername,$username,$password,$DB);
$sql= "SELECT * FROM users ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
?>

  

    <li  class="w3-bar  w3-white  w3-margin-top"  style="border-radius: 7px ;">
        <div class="box w3-right ">
            <a class="bEd" style="text-decoration: none" href=adminPanel.php?id=<?php echo $row['userid'];?>#popup1>change permission</a>
        </div>
        <div class="box w3-right ">
            <a class="bEd" style="text-decoration: none" ><?php echo $row['type'];?></a>
        </div>
      <img src="<?php echo $row['image'] ?>" class="w3-bar-item  " style="max-height:10%;width:15%;border-radius: 50px ">
      <div class="w3-bar-item">
        <span class="w3-large"><?php echo $row['username'] ?></span><br>
        <span><?php echo $row['email'] ?></span>
      </div>
    </li>
    <div id="popup1" class="overlay">
        <div class="popup">
            <a class="close" href="#">&times;</a>
            <div class="content">
                <div  >
                    <form action="changePermission.php" method="post" id="changing" enctype="multipart/form-data">

                        <h2>Permission Select</h2>

                        <br>
                        <input  type="hidden" name = "useridd" value= <?php echo $_GET['id'];?>>
                        <input type="radio" id="e1" name="type" value="Administartor" checked='checked'>
                        <label for="e1">Administartor</label><br>
                        <input type="radio" id="e2" name="type" value="Tutor" >
                        <label for="e2">Tutor</label><br>
                        <input type="radio" id="e3" name="type" value="Learner" >
                        <label for="e3">Learner</label><br>
                        <input type="radio" id="e4" name="type" value="Auditor" >
                        <label for="e4">Auditor</label><br><br>
                        <input type="submit" name = "subedit" value="confirm" >

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
    </ul></div>


</body>


</html>
