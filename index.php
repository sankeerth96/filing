<?php
$connection = mysqli_connect("localhost","root","","filing");
$message;
if(isset($_POST['email']))
    {
        
        $email      = mysqli_real_escape_string($connection,$_POST['email']);
        $passw   = mysqli_real_escape_string($connection,$_POST['passw']);
        $query = "SELECT email FROM register where email='".$email."'";
        $result = mysqli_query($connection,$query);
        $numResults = mysqli_num_rows($result);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            $message =  "Invalid email address please type a valid email!!";
        }
        elseif($numResults>=1)
        {
            $message = $email." Email already exist!!";
        }
        else
        {
            $query="insert into register values('".$email."','".md5($passw)."')";
            mysqli_query($connection,$query);
            $message = "Signup Sucessfully!!";
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
        <div class="reg">
        <form action="index.php" method="post">
  <div class="container">
    <label><b>User Name</b></label>
    <input type="text" placeholder="Enter Email" name="email" required><br>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="passw" required><br>

   
    
    
    <a href="confirmpass.php">Remember me</a>&emsp;<a href="login.php">Login</a>

    <div class="clearfix">
      
      <button type="submit" class="signupbtn" onclick="index.php">Sign Up</button>
        <?php echo "$message"; ?>
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
    .cancelbtn, .signupbtn {
        width: 100%;
    }
}
            
            </style>
        </div>
        

</body>
</html>