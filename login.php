<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>

    <title>Login</title>


    
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
    $email = $_POST['email']; 
    $password = $_POST['password'];


    $email_search = " select * from signup where email='$email' ";
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['password'];

        $_SESSION['username']=$email_pass['username'];

        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
            echo "login successful";
            
        ?>
        <script>
            // Redirect to the React app running on localhost:3000
        window.location.replace("http://localhost:3000");

        </script>
        <?php


        }else{
            echo "password incorrect";
        }
        }else{
            echo"Invalid Email";
        }
    }


?>


<br><br>
<br><br>
    <div>
    <h1 style="color:white;">Login</h1>
</div>
    <div class="container">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <label for="name">User Name</label>
            <input type="text" name="email" id="email" required>

             <label for="password">Password</label>
            <input type="password" name="password" id="password" required>



<br><br>
            <button type="submit" name="submitb" class="btn btn-primary btn-block">Submit</button>
            <br>
            <p class="text-center">Not Have an account? <a href="signup.php">SignUp Here</a></p>
        </form>


    </div>
      <br><br>
</body>
</html>
