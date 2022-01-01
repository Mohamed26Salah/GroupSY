
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

            


            $sql= "UPDATE `course` SET `courseName`='".$CourseName."',`coursePrice`='".$CoursePrice."',`enrolledSid`='".$EnrolledStudent."',`description`='".$Description."',`instructorName`='".$InsName."',`image`='".$target_file."' WHERE courseId ='".$courseId."'";
            $result=mysqli_query($conn,$sql);
           // $row = $result-> fetch_array(MYSQLI_ASSOC);
            //mysqli_num_rows($result)==1
          
              ?>

            <script>window.location.replace("courses.php");</script>

            