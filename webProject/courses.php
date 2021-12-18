<!DOCTYPE html>
<html>
<head>
    <?php session_start();?>
    <meta charset="utf-8">
    <title>courses</title>
    <link rel="stylesheet" href="courseStyle.css">
    <link rel="stylesheet" href="search.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


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
                <li><a href="myCourses.php">My Courses</a></li>
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
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span><!-- <?php echo $cart_count; ?> --></span></a>
</div>


<div class="fasl" style="background-image: url('texture.jpg');">Discover New Courses</div>

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
<a href="">
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
                  <div class="star">
                  <?php 
                  $sql3= "SELECT * FROM ratings Where courseid = '".$row['courseId']."'";
                  $result3=mysqli_query($conn,$sql3);
                   if($row3=mysqli_fetch_array($result3)){
                    if($row3['Total']<=1){
                        ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <?php
                    }
                     else if($row3['Total']>1&&$row3['Total']<=1.5){
                         ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <?php
                    }
                    else if($row3['Total']>1.5&&$row3['Total']<=2){
                         ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <?php
                    }
                    else if($row3['Total']>2&&$row3['Total']<=2.5){
                         ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <?php
                    }
                    else if($row3['Total']>2.5&&$row3['Total']<=3){
                       ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <?php
                    }
                     else if($row3['Total']>3.5&&$row3['Total']<=4){
                       ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <i class="fa fa-star-o"></i>
                      <?php
                    }
                    else if($row3['Total']>4&&$row3['Total']<=4.5){
                       ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <?php
                    }
                    else if($row3['Total']>4.5&&$row3['Total']<=5){
                       ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <?php
                    }
                   }
                  ?>
                 
                 </div>
                </div>

                 <?php
            }
           
       }
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
<a href="">
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
                    if($row3['Total']<=1){
                        ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <?php
                    }
                     else if($row3['Total']>1&&$row3['Total']<=1.5){
                         ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <?php
                    }
                    else if($row3['Total']>1.5&&$row3['Total']<=2){
                         ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <?php
                    }
                    else if($row3['Total']>2&&$row3['Total']<=2.5){
                         ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <?php
                    }
                    else if($row3['Total']>2.5&&$row3['Total']<=3){
                       ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-o"></i>
                      <i class="fa fa-star-o"></i>
                      <?php
                    }
                     else if($row3['Total']>3.5&&$row3['Total']<=4){
                       ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <i class="fa fa-star-o"></i>
                      <?php
                    }
                    else if($row3['Total']>4&&$row3['Total']<=4.5){
                       ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i>
                      <?php
                    }
                    else if($row3['Total']>4.5&&$row3['Total']<=5){
                       ?>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <?php
                    }
                   }
                  ?>
                 
                 </div>
                 

                 
            }
           
       }

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
  

</body>
</html>
