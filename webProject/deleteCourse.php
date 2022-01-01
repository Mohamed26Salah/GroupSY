
  <?php

            require_once "DBConnection.php";


            $courseId=$_POST['courseId']; 
           




            $sql= "DELETE FROM `course`  WHERE courseId ='".$courseId."'";
            $result=mysqli_query($conn,$sql);
           // $row = $result-> fetch_array(MYSQLI_ASSOC);
            //mysqli_num_rows($result)==1
          $sql2= "DELETE FROM `ratings`  WHERE courseId ='".$courseId."'";
            $result2=mysqli_query($conn,$sql2);
              ?>

            <script>window.location.replace("courses.php");</script>

            