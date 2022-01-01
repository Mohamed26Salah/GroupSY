<!DOCTYPE html>
<html>
<head>
    <?php session_start();?>
    <meta charset="utf-8">
    <title>courses</title>
    <link rel="stylesheet" href="CSS/courseStyle.css">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <!--  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <?php
    $counter=0;
if (empty($_SESSION['username'])) {
    ?>
   <nav>
    <div class="topnav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="courses.php">COURSES</a></li>
               <!--  <li><a href="myCourses.php">My Courses</a></li> -->
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
                <li><a href="myCourses.php">My Courses</a></li>
                <li><a href="">CONTACT</a></li>
                <li><a href="profile.php"><i class="fa fa-user-circle"><?php echo $_SESSION['username'];?></i></a></li>
                <li><a href="php/signOut.php">signOut</a></li>
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


<div class="fasl" style="background-image: url('texture.jpg');">Discover New Courses</div>


<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span><!-- <?php echo $cart_count; ?> --></span></a>
</div>


<div class="All">
<section class="course">

    <div class="row">
       <?php
       if (empty($_POST['search'])) {
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);

        
           
            $sql= "SELECT * FROM course";
            $result=mysqli_query($conn,$sql);
    
        
            while($row=mysqli_fetch_array($result)){
                ?>

                <div class="Course-col">
                  <img src="<?php echo $row['image']; ?>" height="250px" width="400px">
                  <?php //echo $row['courseId'] ?>
                  <span class="coursename"><?php echo $row['courseName']; ?></span><br>
                  <span class="instName"> <?php echo $row['instructorName']; ?></span><br>
                      <?php
                        if (!empty($_SESSION['username'])) {
                        if($_SESSION['Type']=="Adminstrator"){
                             ?>
                             <div class="box">
                            <a class="bEd" href=courses.php?id=<?php echo $row['courseId'];?>#popup1>Edit</a>
                        </div>
                        <div class="box">
                            <a class="bEd" href=courses.php?id=<?php echo $row['courseId'];?>#popup2>Delete</a>
                        </div>

                        <?php if($row['Approved'] == 0){

                        ?>
                        <div class="box">
                            <a class="bEd" href=courses.php?id=<?php echo $row['courseId'];?>#popup4>Approve</a>
                        </div>
                        
                     <?php
                    } 
                 }
                     } 

                        ?>

                  <?php echo "(".$row['enrolledSid'].")"; ?><br>

                  <!-- <?php echo $row['description'];?><br> -->

                 <span class="price"><?php echo "$".$row['coursePrice']; ?></span><br>

                  <br>
                  <form method="post" action="cart.php">
                  <!-- <input type="text" name="quantity" value="1" class="form-control" /> -->
                  <input type="hidden" name="hidden_name" value="<?php echo $row["courseName"]; ?>" />
                  <input type="hidden" name="hidden_price" value="<?php echo $row["coursePrice"]; ?>" />
                  <input type="hidden" name="hidden_id" value="<?php echo $row["courseId"]; ?>" />
                  <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                  </form>
                 <a href="index2.php?id=<?php echo $row['courseId'];?>"> <div class="star">
                  <?php 
                  $sql3= "SELECT * FROM ratings Where courseid = '".$row['courseId']."'";
                  $result3=mysqli_query($conn,$sql3);
                   if($row3=mysqli_fetch_array($result3)){
                    for($star = 1; $star <= 5; $star++)
                      {
                          $class_name = '';

                          if($row3['Total'] >= $star)
                          {
                               $class_name = 'text-warning';
                          }
                          else
                          {
                               $class_name = 'star-light';
                            }
                            ?>
                            <i class='fas fa-star <?php echo $class_name ?> mr-1'></i>
                            <?php
                        }
                   }
                  ?>
                 
                 </div></a>
                </div>

                 
                    <?php 
                 if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query1 = "select * from course where courseId=$id";
                    $result1 = $conn->query($query1);
                    while ($row1 = mysqli_fetch_array($result1)) {
                ?>


                                   <!--  edit popup -->

            <div id="popup1" class="overlay">
                        <div class="popup">
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <div  >    
                                    <form action="php/editCourse.php" method="post" id="changing" enctype="multipart/form-data">

                                      <h2>Edit Options</h2> 

                                      <br>
                                       <input  type="hidden" name = "courseId" value= "<?php echo $row1['courseId']; ?>">
                                      Course Name: <input type="text" id= "cn"name = "courseName" value= "<?php echo $row1['courseName']; ?>"><br><br>
                                      Instructor Name: <input type="text" name = "instructorName" value= "<?php echo $row1['instructorName'];  ?>"><br><br>
                                      Course Price: <input type="text" name = "coursePrice" value= "<?php echo $row1['coursePrice']; ?>"><br><br>
                                      Enrolled Student: <input type="text" name = "enrolledSid" value= "<?php echo $row1['enrolledSid']; ?>"><br><br>
                                      Description:<br><textarea rows="4" cols="50" name="description" form="changing"></textarea><br><br>
                                       <div class="center">
                                          <div class="form-input">
                                            <div class="preview">
                                              <img id="file-ip-1-preview">
                                            </div>
                                            <label for="file-ip-1">Upload Image</label>
                                            <input type="file" id="file-ip-1"  name="fileup" onchange="showPreview(event);">
                                            
                                          </div>
                                        </div> 
                                      <input type="submit" name = "subedit" >
                                     
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>       


                   <!--  delete popup -->
                    <div id="popup2" class="overlay">
                        <div class="popup">
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <div  >    
                                    <form action="php/deleteCourse.php" method="post" id="changing" enctype="multipart/form-data">

                                      <h2>DELETE CONFIRM?</h2> 

                                      <br>
                                       <input  type="hidden" name = "courseId" value= "<?php echo $row1['courseId']; ?>">
                                      
                                      <input type="submit" name = "subdelete" value="CONFIRM" >
                                     
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- popup approve -->
                    <div id="popup4" class="overlay">
                        <div class="popup">
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <div  >    
                                    <form action="php/approving.php" method="post" id="changing" enctype="multipart/form-data">

                                      <h2>Do you approve this course !?</h2> 

                                      <br>
                                       <input  type="hidden" name = "courseId" value= "<?php echo $row1['courseId']; ?>">
                                      
                                      <input type="submit" name = "subapprove" value="approve" >
                                     
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>       
                             
                
<?php

 }
////////////////////////////////////////////////////////////////////////////////////////////

            }
          /////////////////////////////////////////////////

            }

            ?>
             <!-- add course -->
              <div class="Course-col">
              <?php
                        if (!empty($_SESSION['username'])) {
                        if($_SESSION['Type']=="Adminstrator" ||$_SESSION['Type']=="Tutor"){
                             ?>
                            
                         <a href=courses.php?#popup3>
                    
                      <img src="uploads/add.png" alt="add" height="400px" width="400px">
                     </a>
                      <br>
                     <?php }
                     } 

                        ?>
      
       


                        <!--  add popup -->
                    <div id="popup3" class="overlay">
                        <div class="popup">
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <div  >    
                                    <form action="php/addCourse.php" method="post" id="changing" enctype="multipart/form-data">

                                      <h2>Add Course</h2> 

                                      <br>
                                       <input  type="hidden" name = "courseId" >
                                        <?php
                                       $approve = 0; 
                                       if($_SESSION['Type']=="Adminstrator"){
                                            $approve = 1;
                                       }
                                       else if($_SESSION['Type']=="Tutor"){
                                            $approve = 0;
                                       }
                                        ?>
                                       <input  type="hidden" name = "approved" value = "<?php echo $approve;?>">

                                      Course Name: <input type="text" id= "cn"name = "courseName"><br><br>
                                      Instructor Name: <input type="text" name = "instructorName" ><br><br>
                                      Course Price: <input type="text" name = "coursePrice" ><br><br>
                                      Enrolled Student: <input type="text" name = "enrolledSid" ><br><br>
                                      Description: <br><textarea rows="4" cols="50" name="description" form="changing"></textarea><br><br>
                                       <div class="center">
                                          <div class="form-input">
                                            <div class="preview">
                                              <img id="file-ip-1-preview">
                                            </div>
                                            <label for="file-ip-1">Upload Image</label>
                                            <input type="file" id="file-ip-1"  name="fileup" onchange="showPreview(event);">
                                            
                                          </div>
                                        </div> 
                                      <input type="submit" name = "subedit" >
                                     
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 

                 </div> 
                 <?php  
           
       }
            /////////////////////////////////////////////////
       


       else{
$conn = new mysqli("localhost" , "root" , "" , "webdatabase");


    if($conn-> connect_error)
      die("fatal error - cannot connect to the DB");



    if(isset($_POST['submit'])) {

        $input = $_POST['search'];
        $sql = "SELECT * FROM course WHERE courseName = '$input'";

        $results = $conn-> query($sql);

        if($row = mysqli_fetch_array($results)) {

          ?>
<a href="index2.php?id=<?php echo $row['courseId'];?>">
                <div class="Course-col">
                  <img src="<?php echo $row['image']; ?>" height="250px" width="400px"></a>
                  <?php //echo $row['courseId'] ?>
                  <span class="coursename"><?php echo $row['courseName']; ?></span><br>
                  <span class="instName"> <?php echo $row['instructorName']; ?></span><br>
                  

                  <?php echo "(".$row['enrolledSid'].")"; ?><br>

                  <!-- <?php echo $row['description'];?><br> -->

                 <span class="price"><?php echo "$".$row['coursePrice']; ?></span><br>

                  <br>
                  <form method="post" action="cart.php">
                   <!-- <input type="text" name="quantity" value="1" class="form-control" /> -->
                  <input type="hidden" name="hidden_name" value="<?php echo $row["courseName"]; ?>" />
                  <input type="hidden" name="hidden_price" value="<?php echo $row["coursePrice"]; ?>" />
                  <input type="hidden" name="hidden_id" value="<?php echo $row["courseId"]; ?>" />
                  <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                  </form>
                  <?php 
                  $sql3= "SELECT * FROM ratings Where courseid = '".$row['courseId']."'";
                  $result3=mysqli_query($conn,$sql3);
                   if($row3=mysqli_fetch_array($result3)){
                   for($star = 1; $star <= 5; $star++)
                      {
                          $class_name = '';

                          if($row3['Total'] >= $star)
                          {
                               $class_name = 'text-warning';
                          }
                          else
                          {
                               $class_name = 'star-light';
                            }
                            ?>
                            <i class='fas fa-star <?php echo $class_name ?> mr-1'></i>
                            <?php
                        }
                   }
                  ?>
                 
                 </div>

                 </div>
                 </a>

            <?php  
        }

        else {
          echo "<br>";
          echo "<strong style = 'color:red;'>Incorrect Course Name....</strong>";
        }
    }
        
       }
        ?>
            </div>
       
  
</div>
</section>

 <?php
  $message = '';
  if(isset($_GET["success"]))
{

    $message = '
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Item Added into Cart
    </div>
    ';

} 
echo $message;

  ?>
</body>
</html>
