<?php
session_start();

?>


<!DOCTYPE html>
<html>
<head>
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>
<?php
include 'dbcon.php';

if(isset($_POST['submitb'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

      $pass = password_hash($password, PASSWORD_BCRYPT);
      $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

      $emailquery = " select * from signup where email='$email' ";
      $query = mysqli_query($con,$emailquery);

      $emailcount = mysqli_num_rows($query);

      if($emailcount>0){
        echo "Email already exists";
      }else{
        if($password === $cpassword){

        $insertquery = "insert into signup(username, email, mobile, password, cpassword) values('$username','$email','$mobile','$pass','$cpass')";

        $iquery = mysqli_query($con, $insertquery);

        if($iquery){
    ?>
    <script>
        alert("inserted Successful");
    </script>

    <?php
}else{

    ?>
    <script>
        alert("Not Inserted");
    </script>

    <?php

}

        }else{
            ?>
    <script>
        alert(" Password Not Matching");
    </script>

    <?php
        }
      }

}

?>



    <div>
    <h1 style="color:white;">Sign Up</h1>
</div>
    <div class="container">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <label for="name">Student Name</label>
            <input type="text" name="username" id="pname" required>

            <label for="id">Email Address</label>
            <input type="text" name="email" id="email" required>

             <label for="mobile">Number</label>
            <input type="text" name="mobile" id="mobile" required>

             <label for="password">Password</label>
            <input type="password" name="password" id="password" required>


             <label for="cpassword">Confirm Password</label>
            <input type="password" name="cpassword" id="cpassword" required>




<br><br>
            <button type="submit" name="submitb"  class="btn btn-primary btn-block">Submit</button>
            
            <p class="text-center">Have an account? <a href="login.php">Log In</a></p>
        </form>


    </div>
      <br><br>
</body>
</html>
