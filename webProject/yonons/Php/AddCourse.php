
  <?php
///////////////////////////////////////////////////////////////////////

    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES['fileup']['name']);

    echo $target_dir;

   
        if($_FILES['fileup']['size']>1000000)
            echo "the file is too large";

    echo "<br> the file type ".$_FILES['fileup']['type']."<br>";

    if($_FILES['fileup']['type']== "image/jpeg")
        echo "the file is accepted";
    else
        echo "File has to be a jpeg image";


    $tmp_name = $_FILES['fileup']['tmp_name'];
    $name = basename($_FILES['fileup']['name']);
    move_uploaded_file($tmp_name, "$target_dir/$name");





  /////////////////////////////////////////////////////////////////////////

 
            require_once "DBConnection.php";


            $courseId=$_POST['courseId']; 
            $CourseName=$_POST['courseName'];
            $InsName=$_POST['instructorName'];
            $CoursePrice=$_POST['coursePrice'];
            $EnrolledStudent=$_POST['enrolledSid'];
            $Description=$_POST['description'];




            $sql= "INSERT INTO `course`(`courseId`, `courseName`, `coursePrice`, `enrolledSid`, `description`, `instructorName`, `image`) VALUES ('','".$CourseName."','".$CoursePrice."','".$EnrolledStudent."','".$Description."','".$InsName."','".$target_file."')";
            $result=mysqli_query($conn,$sql);
           // $row = $result-> fetch_array(MYSQLI_ASSOC);
            //mysqli_num_rows($result)==1
           $sql2= "INSERT INTO `ratings`(`courseid`, `star1`, `star2`, `star3`, `star4`, `star5`, `TNOR`, `Total`) VALUES ('','0','0','0','0','1','0','0')";
            $result2=mysqli_query($conn,$sql2);
              ?>

            <script>window.location.replace("../courses.php");</script>

            