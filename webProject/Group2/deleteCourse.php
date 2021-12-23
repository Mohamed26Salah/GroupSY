
  <?php

            require_once "DBConnection.php";


            $courseId=$_POST['courseId']; 
           




            $sql= "DELETE FROM `course`  WHERE courseId ='".$courseId."'";
            $result=mysqli_query($conn,$sql);
           // $row = $result-> fetch_array(MYSQLI_ASSOC);
            //mysqli_num_rows($result)==1
          
              ?>

            <script>window.location.replace("courses.php");</script>

            