<?php 
$servername = "localhost";
$username ="root";
$password = "";
$DB = "webdatabase";
$conn = mysqli_connect($servername,$username,$password,$DB);
$query = "SELECT * FROM `ratings` WHERE courseId ='".$_GET['id']."'";
    $five_star_progress = 0;
	$four_star_progress = 0;
	$three_star_progress = 0;
	$two_star_progress = 0;
	$one_star_progress = 0;
  
	$result = $conn->query($query);
    // $html = '';
	$row = mysqli_fetch_assoc($result);
	$five_star_progress = (($row["star5"]/$row["TNOR"]) * 100);
	$four_star_progress = (($row["star4"]/$row["TNOR"]) * 100);
	$three_star_progress = (($row["star3"]/$row["TNOR"]) * 100);
	$two_star_progress = (($row["star2"]/$row["TNOR"]) * 100);
	$one_star_progress = (($row["star1"]/$row["TNOR"]) * 100);

    $html="
   
    			
    				<div class='col-sm-4 text-center'>
    					<h1 class='text-warning mt-4 mb-4'>
    						<b><span id='average_rating'>".number_format($row["Total"], 1)."</span> / 5</b> 
    					</h1>
    					<div class='mb-3'>
                             ";
                     for($star = 1; $star <= 5; $star++)
                      {
                          $class_name = '';

                          if($row["Total"] >= $star)
                          {
                               $class_name = 'text-warning';
                          }
                          else
                          {
                               $class_name = 'star-light';
                            }
                            
                            $html .= "<i class='fas fa-star $class_name mr-1'></i>";
                        }
                      $html .=  "   

    						
	    				</div>
    					<h3><span id='total_review'>".$row["TNOR"]."</span> Review</h3> 
    				</div>
    				<div class='col-sm-4'>
    					<p>
                            <div class='progress-label-left'><b>5</b> <i class='fas fa-star text-warning'></i></div>

                            <div class='progress-label-right'>(<span id='total_five_star_review'>".$row["star5"]."</span>)</div>
                            <div class='progress'>
                                <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' id='five_star_progress' style='width:$five_star_progress%'></div>
                            </div>
                        </p>
    					<p>
                            <div class='progress-label-left'><b>4</b> <i class='fas fa-star text-warning'></i></div>
                            
                            <div class='progress-label-right'>(<span id='total_four_star_review'>".$row["star4"]."</span>)</div>
                            <div class='progress'>
                                <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' id='four_star_progress' style='width:$four_star_progress%'></div>
                            </div>               
                        </p>
    					<p>
                            <div class='progress-label-left'><b>3</b> <i class='fas fa-star text-warning'></i></div>
                            
                            <div class='progress-label-right'>(<span id='total_three_star_review'>".$row["star3"]."</span>)</div>
                            <div class='progress'>
                                <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' id='three_star_progress' style='width:$three_star_progress%'></div>
                            </div>               
                        </p>
    					<p>
                            <div class='progress-label-left'><b>2</b> <i class='fas fa-star text-warning'></i></div>
                            
                            <div class='progress-label-right'>(<span id='total_two_star_review'>".$row["star2"]."</span>)</div>
                            <div class='progress'>
                                <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' id='two_star_progress' style='width:$two_star_progress%'></div>
                            </div>               
                        </p>
    					<p>
                            <div class='progress-label-left'><b>1</b> <i class='fas fa-star text-warning'></i></div>
                            
                            <div class='progress-label-right'>(<span id='total_one_star_review'>".$row["star1"]."</span>)</div>
                            <div class='progress'>
                                <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' id='one_star_progress' style='width:$one_star_progress%'></div>
                            </div>               
                        </p>
    				
    				
    	";
	echo $html;
?>