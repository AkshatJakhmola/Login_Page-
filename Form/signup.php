<?php
$r=0;
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include the database connection
    include 'Database.php';

    // Escape user inputs for security
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO `form` (name, email, pass) VALUES ('$name', '$email', '$pass')";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
      $r=1;
        // Display success message
        } else {
        // Display error message if the query fails
        echo '<div style="background-color: #FF9999; border-radius: 10px; padding: 10px 15px;" role="alert">
                  <h4 class="alert-heading">Oops!</h4>
                  <p>Something went wrong. Please try again later.</p>
              </div>';
    }
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS </title> 
    <link rel="stylesheet" href="style.css">
   </head>
<body>
  <?php
  if($r=1){
    echo '<div style="background-color: #99CC99; border-radius: 10px; padding: 10px 15px;" role="alert">
                  <h4 style="tex-align: centre;" class="alert-heading">Congratulations!</h4>
                  <p>Registration Successful. Thank you!</p>
              </div>';
    
  }
  ?>
  <div class="wrapper">
    <h2>Registration</h2>
    <form method="post" action="#">
      <div class="input-box">
        <input type="text" name="name" placeholder="Enter your username" required>
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="pass" placeholder="Create password" required>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now" name="submit">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>