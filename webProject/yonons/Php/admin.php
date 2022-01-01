
 <?php

  $conn = new mysqli("localhost" , "root" , "" , "webdatabase");

 
    if($conn-> connect_error)
      die("fatal error - cannot connect to the DB");

        $target_dir = "images/";
        $target_file = $target_dir.basename($_FILES["name2"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file , PATHINFO_EXTENSION));
        $fileName = $_FILES["name2"]["name"];
        if(empty($_FILES["name2"]["name"]))
        {
          $uploadOk=1;
        }
        else if(file_exists($target_file)) {
            echo "Sorry, File already exists.";
            $uploadOk=0;
        }

        else if($_FILES["name2"] ["size"] > 1000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        else if($imageFileType != "jpg" && $imageFileType!="png" && $imageFileType!= "jpeg") {
            echo "Sorry, only JPG , PNG and JPEG are allowed.";
            $uploadOk = 0;
        }

        
        
        if($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        }

        else {
            if(move_uploaded_file($_FILES["name2"]["tmp_name"], $target_file)) {
              echo"<h3 style = 'color : green'>uploaded succesfully</h3>";
                  include "course.php";
            }
            else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    

      $email = $_POST["email"];
      $name = $_POST["name"];
      $courseName = $_POST["courseName"];

      $sql= "INSERT into responses (email,name,scourse , image) values('$email','$name','$courseName' , '$target_file' )";

      $results = $conn -> query($sql);
     

      // if($results)
      //   {
      //       header("Location:course.php");
      //   }
      //   else
      //   {
      //       echo $sql;
      //   }

    


 ?>