<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>courses</title>
	<link rel="stylesheet" href="courseStyle.css">
</head>
<body>
	<table border=1>
<tr>
  <th> courseId </th>
  <th> courseName </th>
  <th> coursePrice </th>
  <th> enrolledSid </th>
  <th> description </th>
  <th> instructorName </th>
  <th> image </th>
</tr>
       <?php
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);

        
           
            $sql= "SELECT * FROM course";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){
            	?>
            	<tr>
            	 <td> <?php echo $row['courseId'] ?></td>
                 <td> <?php echo $row['courseName'] ?></td>
                 <td> <?php echo $row['coursePrice'] ?></td>
                 <td> <?php echo $row['enrolledSid'] ?></td>
                 <td> <?php echo $row['description'] ?></td>
                 <td> <?php echo $row['instructorName'] ?></td>
                 <td> <?php echo $row['image'] ?></td><br>
                </tr>
                 <?php
            }

       ?>
   </table>
</body>
</html>
