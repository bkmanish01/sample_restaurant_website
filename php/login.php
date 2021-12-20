<?php
  include "db_conn.php";
  session_start();

  if (isset($_POST['submit'])) {
    $errors = 0;
    
    // Data validation
    function validate($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    $username =	validate($_POST['username']);
    $password = validate($_POST['password']);

    // Validate user input
    if (empty($username)) {
      ++$errors;
      header("location: login.php?error=Username is required!");
      exit();
    }
    elseif (empty($password)) {
      ++$errors;
      header("location: login.php?error=Password is required!");
      exit();
    }
    else {
      // Retrieve record from users table
      $SQLstring = "SELECT * FROM users WHERE username = '$username' AND user_password = '$password'";
      $QueryResult = mysqli_query($DBConnect, $SQLstring);

      if (mysqli_num_rows($QueryResult) === 1) {
        $row = mysqli_fetch_assoc($QueryResult);
        if ($row['username'] === $username && $row['user_password'] === $password) {
          $_SESSION['username'] = $row['username'];
          header("location: welcome.php");
          exit();
        }
        else {
          header("location: login.php?error=Invalid username or password!");
          ++$errors;
          exit();
        }
      }
      else {
        header("location: login.php?error=Invalid username or password!");
        ++$errors;
        exit();
      }
    }
    mysqli_close($DBConnect);
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Manish Bishowkarma
    login.php, 12-09-2021 -->

<html xmlns="http://www.w3.org/1999/xhtml">
  <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <meta http-equiv="content-type" content="text/html, charset=iso-8859-1" />                                                                      
    <title>Mo:Mo Shack|Bandipur|Tanahun|Nepal</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <div class="navbar">
        <div class="image">
          <img src="../photo/logo_01.jpg" alt="Mo:Mo" /> 
        </div>
          <ul class="nav1">
            <li><a href="../html/index.html">Home</a></li>
            <li><a href="../html/about.html">About</a></li>
            <li><a href="../html/contact.html">Contact Us</a></li>
        </ul>
        <ul class="nav2">
                <li><a href="../php/register.php">SignUp</a></li>
               <li><a href="../php/login.php" class="active">LogIn</a></li>
              </ul>
        </div>
    </header>
    <section id="section1" class="register">
      <div class="column">
        <div class="title">
          <h1>Mo:Mo Shack</h1>
          <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...authentic Nepali Cusine!</h2>  
          <p>Good Food is the foundation<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;of genuine happiness!</p>
        </div>
      </div>
      <div class="column">
        <div class="form">
          <form method="POST" action="../php/login.php">
            <h2>LogIn Here!</h2>
            <?php 
            if (isset($_GET['error'])){
              ?><h5 class="error" style=color:red;font-size:15px;><?php echo $_GET['error']; ?></h5><hr><?php
            }
			      ?>
            <div class="form_container">
              <label for="username">Username/Email:</label><input type="text" name="username" id="username">
              <label for="password">Password:</label><input type="password" name="password" id="password"> 
            </div>
            <div class="button">
              <button type="reset" name="reset">Cancel</button>
              <button type="submit" name="submit">LogIn</button>
            </div> 
            <p>or</p>
            <p>Create an account!<a href="../php/register.php">SignUp Here.</a></p>
            <div id="logo">
              <p>Follow Us:<br></p>
                <ul>
                  <li><a href="#" class="fa fa-facebook-square"></a></li>
                  <li><a href="#" class="fa fa-instagram"></a></li>
                  <li><a href="#" class="fa fa-twitter-square"></a></li>
                  <li><a href="#" class="fa fa-youtube-square"></a></li>
                  <li><a href="#" class="fa fa-google" aria-hidden="true"></a></li>
                  <li><a href="#" class="fa fa-tripadvisor" aria-hidden="true"></a></li>
                </ul>
              
              <div id="copyright">
                <p>&#169; 2021 momo shack Inc. | All Rights Reserved.</p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>