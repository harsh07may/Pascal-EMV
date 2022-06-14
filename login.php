<?php 
	
  session_start();
	$username = "";
  $errors = array();

	$db = mysqli_connect('localhost', 'root', '', 'pascal');

	if($db === false){
		die("ERROR: Could not connect. ". mysqli_connect_error());
	}

  if (isset($_POST['Submit'])) {

    // Data sanitization to prevent SQL injection
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Error message if the input field is left blank
    if (empty($fname)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    // Checking for the errors
    if (count($errors) == 0) {

      // echo "\nno errors\n";
        // Password matching
        // $password = md5($password);

        $query = "SELECT * FROM users WHERE fname='$fname' AND password='$password'";
        $results = mysqli_query($db, $query);

        // $results = 1 means that one user with the
        // entered username exists
        if (mysqli_num_rows($results) == 1) {
           echo "hello results";
            // Storing username in session variable
            $_SESSION['username'] = $fname;

            // Welcome message
            //$_SESSION['success'] = "You have logged in!";

            // Page on which the user is sent
            // to after logging in
            // echo "\nlocation";
            header('location: index.php');
        } else {

            // If the username and password doesn't match
            array_push($errors, "Incorrect username or password");
        }
      }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="finance.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
      $(document).ready(function () {
        $("#my-form").validate({
          rules: {
            fname: "required",

            user_email: {
              required: true,
              email: true,
            },
            contact: {
              required: true,
              minlength: 10,
              maxlength: 10,
              number: true,
            },
            address: "required",
          },
          messages: {
            fname: "This field is required",

            user_email: {
              email: "Enter a valid email",
              fname: "This field is required",
            },
            contact: {
              fname: "This field is required",
              minlength: "Should be a 10-digit number",
              number: "Should be a 10-digit number",
            },
            address: "This field is required",
          },
        });
      });
    </script>
    <title>Finances</title>
  </head>

  <body>
    <nav>
      <div class="topnav">
        <a class="navbar-brand" href="/">
          <img src="logo.svg" alt="Pascal Logo" class="logo_img"/>
        </a>
        <a href="index.html#products">Products</a>
        <a href="finance.html">Purchase</a>
        <a href="about_us.html">About</a>
        <a href="show_customers.php">Track Order</a>
      </div>
    </nav>

    <p class="center">Sign in</p>
    <br />
    <br />
    <div class="container-1">
      <div class="cont">
        <form id="my-form" action="login.php" method="post">
          <!-- <h2>Purchase</h2> -->
          <div class="pform">
            <label for="">Full Name</label>
            <input type="text" id="name" name="fname" required />
            <label for="">Password</label>
            <input type="text" id="password" name="password" required /><br />
          </div>
          <button type="submit" name="Submit" class="btn">Login</button>
        </form>
        <br>
        <p>Don't have an account? Click <a href="register.php"><b>here</b></a> to register.</p>
      </div>
      <img
        class="image"
        src="pics/magnus_ex_header.png"
        alt="A man on a bike"
      />
    </div>
  </body>
</html>
