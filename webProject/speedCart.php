<link rel="stylesheet" href="courseStyle.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="cart">
            <div style="clear:both"></div>
            <br />
            <h3>Order Details</h3>
            
           
            <table class="table table-bordered">
                <tr>
                    <th width="40%">Item Name</th>
                    <th width="10%">Quantity</th>
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
                    <td><?php echo $values["item_quantity"]; ?></td>
                    <td>$ <?php echo $values["item_price"]; ?></td>
                    <td><a href="/GroupSY/webProject/courses.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                </tr>
            <?php   
                    $total = $total + $values["item_price"];
                }
            ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td></td>
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
           
     </div>
     <div align="right">
  <a href="/GroupSY/webProject/courses.php?action=clear"><b>Clear Cart</b></a>
</div>
