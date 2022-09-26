<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	 <link rel="stylesheet" href="styleReg.css">
          </head>
          <body>
               <div id="main">
          	    <div class ="Reg">              
                <h2>Register Here</h2>


	<form action="process_register.php" method="post">
		
          		<input type="text" name="FirstName" placeholder="First Name">

          		<p>
        
             
              <input type="text" name="SecondName" placeholder= "Second Name">

              <p>

              <input type="text" name="Location" placeholder="Location">

              <p>

              <input type="tel" name="PhoneNumber" placeholder= "Phone Number">

              <p>


              <input type="email" name="EmailAddress" placeholder="Emailaddress">
          		
          		<p>

              <input type="Password" name="Password" placeholder="Create Password">
              
              <p>

             

              <input type="submit" name="register" value="Register">
                    <br>
              <a href="http://localhost/food/foodsLogin.php">already have an account?LOGIN</a><br>
       </div>
              </div>

	</form>
</body>
</html>



