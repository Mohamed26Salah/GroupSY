<?php

//submit_rating.php

$connect = new PDO("mysql:host=localhost;dbname=webdatabase", "root", "");

if(isset($_POST["rating_data"]))
{

	$data = array(
		':course_id'        =>  $_POST['course_id'],
		':user_review'		=>	$_POST["user_review"],
		':datetime'			=>	time(),
		':user_name'		=>	$_POST["user_name"]
		// ':user_rating'		=>	$_POST["rating_data"],
		
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
                    
                $results = $connect-> query($query1);
    /////////////////////////////////////////////////////////////
	$query = "
	INSERT INTO review 
	(courseId, user_review, datetime,user_Name) 
	VALUES (:course_id,:user_review,:datetime,:user_name)
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);
    

	echo "Your Review & Rating Successfully Submitted";

}

if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM review_table 
	ORDER BY review_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'user_name'		=>	$row["user_name"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"])
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>