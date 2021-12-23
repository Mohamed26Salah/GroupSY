<!DOCTYPE html>
<html>
<head>
    <?php session_start();?>
	<meta charset="utf-8">
	<title>courses</title>
	<link rel="stylesheet" href="courseStyle.css">
    <link rel="stylesheet" href="previewImage.css">
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
                 <?php
                       
                        if($_SESSION['Type']=="Adminstrator"){
                             ?>
                            <li><a href="adminPanel.php">ADMINPANEL</a></li>
                        
                     <?php }
                     

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
   


<section class="course">

    <div class="row">
       <?php
       if (empty($_POST['search'])) { 
        require_once "DBConnection.php";


           
                $i = 1;
                $sql= "SELECT * FROM course";
            
           
            
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){
                ?>
    <!-- <a href=""> -->

                <?php if($_SESSION['Type'] != "Adminstrator" && $row['Approved'] == 0){
                            continue;
                }
                ?>        
                <div class="Course-col">
                      <img src="<?php echo $row['image']; ?>" height="250px" width="400px"></a>
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
                       
                    <!-- </form> -->
                      <?php echo "(".$row['enrolledSid'].")"; ?><br>

                      <!-- <?php echo $row['description'];?><br> -->

                     <span class="price"><?php echo "$".$row['coursePrice']; ?></span><br>

                      <br>


                 </div>
                 <!--  </a> -->
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
                                    <form action="editCourse.php" method="post" id="changing" enctype="multipart/form-data">

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
                                    <form action="deleteCourse.php" method="post" id="changing" enctype="multipart/form-data">

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
                                    <form action="approving.php" method="post" id="changing" enctype="multipart/form-data">

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
}
?>
              

    <?php
            }

            ?>
             <!-- add course -->
              <div class="Course-col">
              <?php
                        if (!empty($_SESSION['username'])) {
                        if($_SESSION['Type']=="Adminstrator" ||$_SESSION['Type']=="Tutor"){
                             ?>
                            
                         <a href=courses.php?#popup3>
                    
                      <img src="./uploads/19905266.jpg" height="400px" width="400px">
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
                                    <form action="addCourse.php" method="post" id="changing" enctype="multipart/form-data">

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
       else{
            require_once "DBConnection.php";


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
          echo "<strong style = 'color:red;'>Course was not found....</strong>";
        }
    }
        
       }
        ?>
        <?php $conn->close(); ?>
            </div>
       

</div>
</section>
<script type="text/javascript">
  function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}
</script>
</body>
</html>


