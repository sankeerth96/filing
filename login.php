<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['passw']); 
      
      $sql = "SELECT email FROM register WHERE email = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("email");
         $_SESSION['login_user'] = $myusername;
         
         header("location: main.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
    <body>
<div class="container">
  <div class="jumbotron">
    <h1>FILING</h1>      
 <style>
        h1 {
    background-color: green;
            text-align: center;
        
            font-size: 100px;
}
</style>
  </div>
     
</div>
        <h2 style="text-align:center;">Login</h2>
        <div class="reg">
        <form action="login.php" method="post">
  <div class="container">
    <label><b>User Name</b></label>
    <input type="text" placeholder="Enter Email" name="email" required><br>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="passw" required><br>

   
    
    
    

    <div class="clearfix">
      
    <button type="submit" value="submit"  >Login</button>
      
    </div>
  </div>
</form>
            
            <style>
            
            /* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}


/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    {
        width: 100%;
    }
}
            
            </style>
        </div>
        

</body>
</html>