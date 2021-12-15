<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <?php session_start();?>
    
    <meta charset="utf-8">
    <title>courses</title>
    <link rel="stylesheet" href="courseStyle.css">
    <link rel="stylesheet" href="search.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>
<body>

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
   

   <?php
   $courseName=0;
   $price1=0;
   $image1=0;
   $courseId=0;
$conn = mysqli_connect("localhost","root","","webdatabase");
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$sql="SELECT * FROM course WHERE courseId ='$code'";
// $result = mysqli_query($conn,$sql);
$result = mysqli_query($conn, $sql) or die( mysqli_error($conn));
while($row = mysqli_fetch_assoc($result)){
    $GLOBALS['courseName'] = $row['courseName'];
    $GLOBALS['price1'] = $row['coursePrice'];
    $GLOBALS['image1'] = $row['image'];
    $GLOBALS['courseId'] = $row['courseId'];
}
$cartArray = array(
    $code=>array(
    // 'name'=>$name,
    'courseName'=>$GLOBALS['courseName'],
    'coursePrice'=>$GLOBALS['price1'],
    'image'=>$GLOBALS['image1'],
    'courseId'=>$GLOBALS['courseId'])
     );

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
        $status = "<div class='box' style='color:red;'>
        Product is already added to your cart!</div>";  
    } else {
    $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
    $status = "<div class='box'>Product is added to your cart!</div>";
    }

    }
}

if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

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
                <?php 
                 echo"
                <form method='post' action=''>
                   <input type='hidden' name='code' value=".$row['courseId'].">
                   <button type='submit' class='buy'>Buy Now</button>
               </form>
               ";?>
                  <?php echo "(".$row['enrolledSid'].")"; ?><br>

                  <!-- <?php echo $row['description'];?><br> -->

                 <span class="price"><?php echo "$".$row['coursePrice']; ?></span><br>

                  <br>


                 </div>
                 </a>

                 <?php
            }
            mysqli_close($conn);
           
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
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
</body>
</html>
