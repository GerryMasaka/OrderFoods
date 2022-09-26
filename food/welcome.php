<?php
session_start();
echo $_SESSION['UserID'];
	
?>
<?php
include('db_connect.php');
if (isset($_POST["add_to_cart"]))
{
          if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="welcome.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="welcome.php"</script>';  
                }  
           }  
      }







}
?>
<!DOCTYPE html>
<html>
<head>
    <title>order</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrp/3.3.6/js/bootstrap.min.js"></script> 


</head>
<body>
    <br/>
    <div class ="container" style="width: 700px:">
        <h3 align="center">Shopping Cart</h3><br />
        <?php
        $query ="SELECT * FROM fooditems ORDER BY foodID ASC";
        $result= mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_array($result))
            {
             ?>
            <div class="col-md-4">
                <form method="post" action="welcome.php?action=add&id=<?php echo $row["foodID"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center"> 

                             <?php echo '<img src="data:image;base64,'.base64_encode($row['imagename']).'"alt="image" style="width:100px;height:100px;">'; ?>

                              
                               <h4 class="text-info"><?php echo $row["food"]; ?></h4>  

                               <h4 class="text-danger">ksh <?php echo $row["foodprice"]; ?></h4>  

                               <input type="text" name="quantity" class="form-control" value="1" />  

                               <input type="hidden" name="hidden_name" value="<?php echo $row["food"]; ?>" /> 

                               <input type="hidden" name="hidden_price" value="<?php echo $row["foodprice"]; ?>" />

                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  


            </div>
            <?php

                
            }
        }
        ?>
    <div style="clear:both"></div>
    <br />
    <h3>Order Details</h3>  

                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Food Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>ksh <?php echo $values["item_price"]; ?></td>  
                               <td>ksh <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="welcome.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  

                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr> 
                            <td colspan="3" align="right">Total</td>  
                               <td align="right">ksh <?php echo number_format($total, 2); ?></td>  
                               <td></td> 

                       </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div> 
 
           <br /> 

           	<form action="cart.php" method="post">
              
              <body>
<style>
                .body span{
                  position: absolute;
                  color: orange;
                }
              </style>
		
          		<input type="text" name="EmailAddress" placeholder="Email Address Here" style="border: none;
  border-bottom: 1px solid black;
  background: transparent;
  outline: none;
  height: 40px;
  color: black;
  font-size: 16px;
  opacity: 1;"/>
          		<br>
          		<br>

          		<p>
        
             <label>Type your order here form cart</label><br>
              <label>ITEM      -    QUANTITY</label><br>

              <textarea name="food" rows="15" cols=30></textarea>
              <p>
              <br>
              <input type="submit" name="order" style="margin-top:5px;" class="btn btn-success" value="order" />  
             </body>
           </form>



           

       
</body>
</html>