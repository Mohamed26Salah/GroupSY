
<?php 
$servername = "localhost";
$username ="root";
$password = "";
$DB = "webdatabase";
$conn = mysqli_connect($servername,$username,$password,$DB);
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "SELECT * FROM `review` ORDER BY `userId`  DESC ";
	//fe 8alta hnaaa course id

  
	$result = $conn->query($query);
$html = '';
	while($row = mysqli_fetch_assoc($result))
	{
	
			
 
	// 	$query2="SELECT * FROM ratings WHERE courseId ='".$review_content[':courseId']."'";
	// 	$result2 = $connect->query($query2, PDO::FETCH_ASSOC);
	// 	foreach($result2 as $row2)
	// {
	// 	// $review_content2[] = array(
	// 		$one_star     = $row2["star1"];
	// 		$two_star     = $row2["star2"];
	// 		$three_star   = $row2["star3"];
	// 		$four_star    = $row2["star4"];
	// 		$five_star    = $row2["star5"];
	// 		$Total	     = $row2["Total"];
	// 	// );
	// }
    //   $average_rating=$Total;
    //   $five_star_review=$five_star;
    //   $four_star_review=$four_star;
    //   $three_star_review=$three_star;
    //   $two_star_review=$two_star;
    //   $one_star_review=$one_star;
    //   $total_review=$five_star_review+$four_star_review+$three_star_review+$two_star_review+$one_star_review;

	

	// $output = array(
	// 	'average_rating'	=>	number_format($average_rating, 1),
	// 	'total_review'		=>	$total_review,
	// 	'five_star_review'	=>	$five_star_review,
	// 	'four_star_review'	=>	$four_star_review,
	// 	'three_star_review'	=>	$three_star_review,
	// 	'two_star_review'	=>	$two_star_review,
	// 	'one_star_review'	=>	$one_star_review,
	// 	'review_data'		=>	$review_content
	// );

//////////////////////////////////////////////////////////////



                
                    
                  
                  
                        $html .= '<div class="row mb-3">';

                        // $html .= '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'.data.review_data[count].user_name.charAt(0).'</h3></div></div>';

                        $html .= '<div class="col-sm-11">';

                        $html .= '<div class="card">';

                        $html .= '<div class="card-header"><b>'.$row["user_Name"].'</b></div>';

                        $html .= '<div class="card-body"></div></div></div></div></div>';

                        
                  

                   
                }
  echo $html;





////////////////////////////////////////////////////////////////////

?>