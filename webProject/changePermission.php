
  <?php
///////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////

 
            require_once "DBConnection.php";


            $type=$_POST['type']; 
            $id=$_POST['useridd'];
            echo $type;
            echo $id;
            $sql= "UPDATE `users` SET `type`='".$type."' WHERE `userid` =".$id;
            $result=mysqli_query($conn,$sql);
           // $row = $result-> fetch_array(MYSQLI_ASSOC);
            //mysqli_num_rows($result)==1
          
              ?>

            <script>window.location.replace("adminPanel.php");</script>

            