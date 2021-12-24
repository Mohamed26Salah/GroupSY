<?php

//submit_rating.php

$connect = new PDO("mysql:host=localhost;dbname=webdatabase", "root", "");

if(isset($_POST["rating_data"]))
{

	$data = array(
		':course_id'      =>  $_POST['course_id'],
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
	SELECT * FROM review 
	ORDER BY userId  DESC
	";
	//fe 8alta hnaaa course id


	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'courseId'     => $row["courseId"],
			'user_review'	=>	$row["user_review"],
			// 'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"]),
			'user_name'		=>	$row["user_Name"]
			// 'rating'		=>	$row["user_rating"],
		);
  }
		$query2="SELECT * FROM ratings WHERE courseId ='".$data[':course_id']."'";
		$result2 = $connect->query($query2, PDO::FETCH_ASSOC);
		foreach($result2 as $row2)
	{
		// $review_content2[] = array(
			$one_star     = $row2["star1"];
			$two_star     = $row2["star2"];
			$three_star   = $row2["star3"];
			$four_star    = $row2["star4"];
			$five_star    = $row2["star5"];
			$Total	     = $row2["Total"];
		// );
	}
      $average_rating=$Total;
      $five_star_review=$five_star;
      $four_star_review=$four_star;
      $three_star_review=$three_star;
      $two_star_review=$two_star;
      $one_star_review=$one_star;
      $total_review=$five_star_review+$four_star_review+$three_star_review+$two_star_review+$one_star_review;

	// 	if($row["user_rating"] == '5')
	// 	{
	// 		$five_star_review++;
	// 	}

	// 	if($row["user_rating"] == '4')
	// 	{
	// 		$four_star_review++;
	// 	}

	// 	if($row["user_rating"] == '3')
	// 	{
	// 		$three_star_review++;
	// 	}

	// 	if($row["user_rating"] == '2')
	// 	{
	// 		$two_star_review++;
	// 	}

	// 	if($row["user_rating"] == '1')
	// 	{
	// 		$one_star_review++;
	// 	}

	// 	$total_review++;

	// 	$total_user_rating = $total_user_rating + $row["user_rating"];

	// }

	// $average_rating = $total_user_rating / $total_review;
		// $average_rating=$results2;

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