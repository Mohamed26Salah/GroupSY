<!DOCTYPE html>
<html>
<head>
    <?php session_start();?>
    <meta charset="utf-8">
    <title>courses</title>
    <link rel="stylesheet" href="CSS/courseStyle.css">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</head>

<body>

<?php 

//index.php

$connect = new PDO("mysql:host=localhost;dbname=webdatabase", "root", "");

$message = '';
if(isset($_POST["add_to_cart"]))
{
   
    if(isset($_COOKIE["shopping_cart"]))
    {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
    }
    else
    {
        $cart_data = array();
    }

    $item_id_list = array_column($cart_data, 'item_id');

    if(in_array($_POST["hidden_id"], $item_id_list))
    {
        foreach($cart_data as $keys => $values)
        {
            if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
            {
                echo "Joex";
                echo "it is already in the cart";
                header("location:/GroupSY/webProject/courses.php?failed=1");
                //fe moshkela hna //ask samira
            }
        }
    }
    else
    {
        $item_array = array(
            'item_id'           =>  $_POST["hidden_id"],
            'item_name'         =>  $_POST["hidden_name"],
            'item_price'        =>  $_POST["hidden_price"]
            
        );
        $cart_data[] = $item_array;
        
    }


    
    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
    header("location:/GroupSY/webProject/courses.php?success=1");
 }



if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
        foreach($cart_data as $keys => $values)
        {
            if($cart_data[$keys]['item_id'] == $_GET["id"])
            {
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart", $item_data, time() + (86400 * 30));
                header("location:/GroupSY/webProject/cart.php?remove=1");
            }
        }
    }
    if($_GET["action"] == "clear")
    {
        setcookie("shopping_cart", "", time() - 3600);
        header("location:/GroupSY/webProject/cart.php?clearall=1");
    }
}

if(isset($_GET["success"]))
{
    $message = '
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Item Added into Cart
    </div>
    ';
}

if(isset($_GET["remove"]))
{
    $message = '
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Item removed from Cart
    </div>
    ';
}
if(isset($_GET["clearall"]))
{
    $message = '
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Your Shopping Cart has been clear...
    </div>
    ';
}
if(isset($_GET["failed"]))
{
    $message = '
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Item is Already Added into Cart
    </div>
    ';
}


?>





 <div class="cart">
    <?php echo $message; ?>
            <div style="clear:both"></div>
            <br />
            <h3>Order Details</h3>
            
           
            <table class="table table-bordered">
                <tr>
                    <th width="40%">Item Name</th>
                    
                    <th width="20%">Price</th>
                   <!--  <th width="15%">Total</th> -->
                    <th width="5%">Action</th>
                </tr>
            <?php
            if(isset($_COOKIE["shopping_cart"]))
            {
                $total = 0;
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                foreach($cart_data as $keys => $values)
                {
            ?>
                <tr>
                    <td><?php echo $values["item_name"]; ?></td>
                    <td colspan="1">$ <?php echo $values["item_price"]; ?></td>
                    <td><a href="/GroupSY/webProject/cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                </tr>
            <?php   
                    $total = $total + $values["item_price"];
                }
            ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td>$ <?php echo number_format($total, 2); ?></td>
                    <td> <form method="post">
                        
                        <input type="submit" name="BuyNow" style="margin-top:5px;" class="btn btn-success" value="Buy Now" /></form> </td>
                </tr>
            <?php
            }
            else
            {
                echo '
                <tr>
                    <td colspan="5" align="center">No Item in Cart</td>
                </tr>
                ';
                
            }
            ?>
            </table>
           <div align="left">
  <a href="/GroupSY/webProject/cart.php?action=clear"><b>Clear Cart</b></a>
</div>
<div align="right">
    <a href="/GroupSY/webProject/courses.php"><b>Back to Course</b></a>
</div>
     </div>
   <?php
   if(isset($_POST['BuyNow'])){
        header("location:/GroupSY/webProject/cart.php?action=clear");
    if(empty($_SESSION['username'])){
         ?>

            <script>window.location.replace("LR2.php");</script>
             <?php 
    }
    else{
        // connecting dp by speed
        $servername = "localhost";
        $username ="root";
        $password = "";
        $DB = "webdatabase";
        $conn = mysqli_connect($servername,$username,$password,$DB);
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
        foreach($cart_data as $keys => $values)
                {
                    $sql= "INSERT INTO `usercourse`(`userid`, `username`, `courseName`, `courseId`) VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."','".$values["item_name"]."','".$values["item_id"]."')";
                     $result=mysqli_query($conn,$sql);
                      $sql2 = "UPDATE course set enrolledSid=enrolledSid+1 WHERE courseid ='".$values["item_id"]."'";
                      $result2=mysqli_query($conn,$sql2);
                }
              //moshkela hna  
           $message1 = "Thank you for your purchase.";
           echo "<script type='text/javascript'>alert('$message1');</script>";
    }
   }
   ?>  

 


</div>
</body>
</html>