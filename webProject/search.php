<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>courses</title>
	<link rel="stylesheet" href="courseStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    

</head>
<body>
    <nav>
    <div class="topnav">
 <ul>
                <li><a href="">Home</a></li>
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



    $conn = new mysqli("localhost" , "root" , "" , "webdatabase");


    if($conn-> connect_error)
      die("fatal error - cannot connect to the DB");



    if(isset($_POST['submit'])) {

        $input = $_POST['search'];
        $sql = "SELECT * FROM course WHERE courseName = '$input'";

        $results = $conn-> query($sql);

        if($row = mysqli_fetch_array($results)) {

          ?>

          <br><br><br>

            <table border=1>
              <tr>
                <th>Course Name</th>
                <th>Course Price</th>
                <th>Course Rate</th>
                <th>Enrolled Students</th>
                <th>Description</th>
                <th>Instructor Name</th>
              </tr>

              <tr>
                
                <td> <?php echo $row['courseName']?> </td>
                <td> <?php echo $row['coursePrice']?> </td>
                <td> <?php echo $row['enrolledSid']?> </td>
                <td> <?php echo $row['description']?> </td>
                <td> <?php echo $row['instructorName']?> </td>
                
              </tr>
            </table>

            <?php  
        }

        else {
          echo "<br>";
          echo "<strong style = 'color:red;'>Incorrect Course Name....</strong>";
        }
    }
?>

</body>
</html>
