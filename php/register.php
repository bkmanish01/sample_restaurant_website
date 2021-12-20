<?php
	include "db_conn.php";
	session_start();
	if (isset($_POST['submit'])) {
		$errors = 0;
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$address = $_POST['address'];
		$city =	$_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$username =	$_POST['username'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];

		// Validate user input
		if (empty($first_name) || empty($last_name) || empty($address) || empty($city) || 
				empty($state) || empty($zip) || empty($phone)) {
			++$errors;
			header("location: register.php?error=Must fillup required fields!");
			exit();
		}
		if (empty($email)) {
			++$errors;
			header("location: register.php?error=Email is required!");
			exit();
		}
		else {
			if (!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,})$/i", $email)) {
				++$errors;
				header("location: register.php?error=You must enter valid email address!");
				exit();
			}
		}
		if (empty($password1)) {
			++$errors;
			header("location: register.php?error=Password is required!");
			exit();
		}
		if (empty($password2)) {
			++$errors;
			header("location: register.php?error=Confirmation password is required!");
			exit();
		}
		if ((!(empty($password1))) && (!(empty($password2)))) {
			if (strlen($password1) < 8) {
				++$errors;
				header("location: register.php?error=Password is too short!");
				exit();
			}
			if ($password1 <> $password2) {
				++$errors;
				header("location: register.php?error=Password do not match!");
				exit();
			}
		}

		// Create table users
		$TableName = "users";
		$SQLstring = "SHOW TABLES LIKE '$TableName'";
		$QueryResult = mysqli_query($DBConnect, $SQLstring);
		if (mysqli_num_rows($QueryResult) == 0) {
			$SQLstring = "CREATE TABLE IF NOT EXISTS $TableName (userID SMALLINT AUTO_INCREMENT NOT NULL PRIMARY KEY,
				first_name VARCHAR(40) NOT NULL, last_name VARCHAR(40) NOT NULL, user_address VARCHAR(100) NOT NULL,
				user_city VARCHAR(40) NOT NULL, user_state VARCHAR(20) NOT NULL, user_zip VARCHAR(20) NOT NULL,
				user_phone VARCHAR(20) NOT NULL UNIQUE, user_email VARCHAR(40) NOT NULL UNIQUE, 
				username VARCHAR(40) NOT NULL UNIQUE, user_password VARCHAR(40) NOT NULL)";
			$QueryResult = mysqli_query($DBConnect, $SQLstring);
			if ($QueryResult === FALSE) 
				echo "<p>Unable to create the table.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . 
					": " . mysqli_error($DBConnect) . "</p>";
				++$errors;
		}

		// Clean up data retrieve
		$FirsName = stripslashes($first_name);	
		$LastName = stripslashes($last_name);	
		$Address = stripslashes($address);	
		$City = stripslashes($city);	
		$State = stripslashes($state);	
		$Zip = stripslashes($zip);	
		$Phone = stripslashes($phone);	
		$Email = stripslashes($email);
		$Username = stripslashes($username);	
		$Password1 = stripslashes($password1);
		$Password2 = stripslashes($password2);

		// Add records into users table
		$SQLstring = "INSERT INTO $TableName (first_name, last_name, user_address, user_city, user_state, 
								user_zip, user_phone, user_email, username, user_password) 
			VALUES ('$FirsName', '$LastName', '$Address', '$City', '$State', '$Zip', '$Phone', '$Email', 
							'$Username', '$Password2')";
		$QueryResult = mysqli_query($DBConnect, $SQLstring);
		if ($QueryResult === FALSE) {
			header("location: register.php?error=Username or email already exist!");
			++$errors;
		}
		else {
			header("location: register.php?error=Register Successful!");
			exit();
		} 
		// Connection close                
		mysqli_close($DBConnect);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Manish Bishowkarma
    register.php, 12-09-2021 -->

<html xmlns="http://www.w3.org/1999/xhtml">
  <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <meta http-equiv="content-type" content="text/html, charset=iso-8859-1" />                                                                      
    <title>Mo:Mo Shack|Bandipur|Tanahun|Nepal</title>
    <link rel="stylesheet" type="text/css" href="../css/register.css" />
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
                <li><a href="../php/register.php" class="active">SignUp</a></li>
               <li><a href="../php/login.php">LogIn</a></li>
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
          <form method="POST" action="../php/register.php">
            <h2>SignUp Here!</h2>
			<?php 
			if (isset($_GET['error'])){
				?><h5 class="error"><?php echo $_GET['error']; ?></h5><hr><?php
			}
			?> 
            <div class="form_container">
				<div class="col">
					<label for="first_name" class="form-label">First Name:</label>
					<input type="text" name="first_name" id="frist">
				</div>
				<div class="col">
					<label for="last_name" class="form-label">Last Name:</label>
					<input type="text" name="last_name" id="last">
				</div>
				<div class="col">
					<label for="address" class="form-label">Address:</label>
					<input type="text" name="address" id="address">
				</div>
				<div class="col">
					<label for="city" class="form-label">City:</label>
					<input type="text" name="city" id="city">
				</div>
				<div class="col">
					<label for="state" class="form-label">State:</label>
					<input type="text" name="state" id="state">
				</div>
				<div class="col">
					<label for="zip" class="form-label">Zip:</label>
					<input type="text" name="zip" id="zip">
				</div>
				<div class="col">
					<label for="phone" class="form-label">Phone:</label>
					<input type="text" name="phone" id="phone">
				</div>
				<div class="col">
					<label for="email" class="form-label">Email:</label>
					<input type="text" name="email" id="email"> 
				</div>
				<div class="col">
					<label for="username" class="form-label">Username:</label>
					<input type="text" name="username" id="username">
				</div>
				<div class="col">
					<lable for="password1" class="form-label">Password:</lable>
					<input type="password" name="password1" id="password1"> 
				</div>
				<div class="col">
					<label for="password2" class="form-label">Confirm Password:</label>
					<input type="password" name="password2" id="password2"> 
				</div>
            </div>
            <div class="button">
              	<button type="reset" name="reset">Cancel</button>
              	<button type="submit" name="submit">Register</button>
            </div> 
            <p>or</p>
            <p>Have an account?<a href="../php/login.php">LogIn Here.</a></p>
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


