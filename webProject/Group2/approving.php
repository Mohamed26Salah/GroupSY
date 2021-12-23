 <?php

            require_once "DBConnection.php";


            $courseId=$_POST['courseId']; 

            $sql = "UPDATE `course` SET `Approved` = 1 WHERE `courseId` = '".$courseId."'";
            $result=mysqli_query($conn,$sql);
           	
          
              ?>

            <script>window.location.replace("courses.php");</script>