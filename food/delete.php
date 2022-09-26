<?php
require_once("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foodUsers</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"      
    />
   
</head>
<body style="padding-top: 100px;">

 
  <div class="container">
  <?php
  $fetchQuery = mysqli_query($conn, "select * from register") or die("could nOt fetch". mysqli_error($conn));
  ?>
  <div class="container">
      <?php
      if(isset($_POST['submitDeleteBtn'])){
          $key = $_POST['keyToDelete'];

          //check if the record exists
          $check = mysqli_query($conn, "select * from register where userID = '$key' ")or die("not found".mysqli_error($conn));
          if(mysqli_num_rows($check)>0){
              //means record found

              $queryDelete = mysqli_query($conn, "DELETE from register where userID = '$key'")
              or die("not deleted".mysqli_error($conn));?>

              <div class="alert alert-success">
                <p>Record deleted!!</p>
              </div>

        <?php 
         header('Location:table.php');
        }
          else{
              //give warning that record doesn't exist?>
              
              <div class="alert alert-warning">
                <p>Record doesn't exist</p>
              </div>
         <?php }
      }
      ?>
  </div>

  <table class="table table-condensed table-bordered">
        <tr>
            <th>userId</th>
            <th>FirstName</th>
            <th>SecondName</th>
            <th>Location</th>
            <th>PhoneNumber</th>
            <th>EmailAddress</th>
            <th>Passwordr</th>

            <th>Delete</th>
        </tr>
        <?php

        $sql = "SELECT userID, FirstName,SecondName,Location, PhoneNumber, EmailAddress,Password from register";
        $result = $conn->query($sql);

            $sr = 1;
            while ($row = $result->fetch_assoc()) { ?>
               
                <tr>
                <form action="delete.php" method="post" role="form">
                    <td><?php echo $row['userID'];?></td>
                    <td><?php echo $row['FirstName'];?></td>
                    <td><?php echo $row['SecondName'];?></td>
                   <td><?php echo $row['Location'];?></td>
                    <td><?php echo $row['PhoneNumber'];?></td>
                    <td><?php echo $row['EmailAddress'];?></td>

                    <td><?php echo $row['Password'];?></td>
                    <td>
                        <input type="checkbox" name="keyToDelete" value="<?php echo $row['userID'];?>" required>
                    </td>
                    <td>
                        <input type="submit" name="submitDeleteBtn" class="btn btn-info">
                    </td>
                </form>
                </tr>
                
                <?php $sr++;
            }           
            ?>
       
    </table>
  </div>   
</body>
</html>