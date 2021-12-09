<?php

    $target_dir = "./uploads/";
    $target_file = $target_dir.basename($_FILES['fileToUpload']['name']);

    echo $target_dir;

    if(isset($_POST['submit']))
    {
        if($_FILES['fileToUpload']['size']>1000000)
            echo "the file is too large";

    echo "<br> the file type ".$_FILES['fileToUpload']['type']."<br>";

    if($_FILES['fileToUpload']['type']== "image/jpeg")
        echo "the file is accepted";
    else
        echo "File has to be a jpeg image";


    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $name = basename($_FILES['fileToUpload']['name']);
    move_uploaded_file($tmp_name, "$target_dir/$name");

    }

?>