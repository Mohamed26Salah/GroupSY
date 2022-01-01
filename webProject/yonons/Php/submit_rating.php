<?php
session_start();
//submit_rating.php

$connect = new PDO("mysql:host=localhost;dbname=webdatabase", "root", "");

if(isset($_POST["rating_data"]))
{

	$data = array(
		':user_id'        => $_SESSION['userid'],
		':course_id'      =>  $_POST['course_id'],
		':user_review'		=>	$_POST["user_review"],
		':datetime'			=>	date("Y-m-d H:i:s"),
		':user_name'		=>	$_POST["user_name"],
		':user_rating'    =>	$_POST["rating_data"],
		':user_image'     => $_SESSION['image']
	);
    /////////////////////////////////////////////////////////////
     $rateType = $_POST['rating_data'];

                    if($rateType == "1") {
                        $query1 = "UPDATE ratings set star1=star1+1 WHERE courseid =" .$_POST['course_id'];
                    }

                    if($rateType == "2") {
                        $query1 = "UPDATE ratings set star2=star2+1 WHERE courseid =" .$_POST['course_id'];
                    }

                     if($rateType == "3") {
                        $query1 = "UPDATE ratings set star3=star3+1 WHERE courseid =" .$_POST['course_id'];
                    }

                     if($rateType == "4") {
                        $query1 = "UPDATE ratings set star4=star4+1 WHERE courseid =" .$_POST['course_id'];
                    }

                     if($rateType == "5") {
                        $query1 = "UPDATE ratings set star5=star5+1 WHERE courseid =" .$_POST['course_id'];
                    }
                    
               
    /////////////////////////////////////////////////////////////
	$query = "
	INSERT INTO review 
	(userId,courseId, user_review, datetime,user_Name,user_rating,image) 
	VALUES (:user_id,:course_id,:user_review,:datetime,:user_name,:user_rating,:user_image)
	";

 try { 
 	$statement = $connect->prepare($query);
	$statement->execute($data);
    $results = $connect-> query($query1);
	echo "Your Review & Rating Successfully Submitted";
    }
    catch(Exception $e){
        echo 'You have already sumbitted a review';
    }
	
    

	

}

?>