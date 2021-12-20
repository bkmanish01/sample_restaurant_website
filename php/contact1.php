<?php
 include "db_conn.php";
 session_start();

 $sql = "SELECT first_name FROM users WHERE username='".$_SESSION['username']."'";
 $result = mysqli_query($DBConnect, $sql);
 if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $customer = $row['first_name'];
  }
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Manish Bishowkarma
    contact1.php, 12-09-2021 -->

<html xmlns="http://www.w3.org/1999/xhtml">
  <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <meta http-equiv="content-type" content="text/html, charset=iso-8859-1" />                                                                      
    <title>Mo:Mo Shack|Bandipur|Tanahun|Nepal</title>
    <link rel="stylesheet" type="text/css" href="../css/contact1.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  	<header> 
		<div class="navbar">
			<img src="../photo/logo_01.jpg" alt="Mo:Mo" /> 
			<div class="nav1">
			<ul>
				<li><a href="../php/index1.php">Home</a></li>
				<li><a href="../php/about1.php">About</a></li>
				<li><a href="../php/contact1.php" class="active">Contact Us</a></li>
			</ul>
			</div>
			<div class="nav2">
			<ul>
				<li><a href="../php/welcome.php">Welcome
				<?php 
					$count = 0;
					if(isset($_SESSION['cart'])){
						//$count = count($_SESSION['cart']);
						$count = array_sum(array_column($_SESSION['cart'], 'Item_Qty'));
						
					}
					echo' <i style="color:red; font-family:calibri; text-decoration:underline;">' .$customer. '</i>' 
				?></a></li>
				<li><a href="../php/welcome.php#section2">Food Zone</a></li>
				<li><a href="../php/cart.php">Cart(<?php echo "<i style='color:red;
						text-decoration:underline;text-decoration-color:black;'> ".$count."</i>"; ?>)</a></li>
				<li><a href="../php/logout.php">Logout</a></li>
			</ul>
			</div>
		  </div>
	  </header>
	    <section id="secondSection" class="contact_info">
        	<h2><b>Contact Info</b></h2>
        	<div class="contact">
	        	<div class="hgh_address">
	                <p><b>Mo:Mo Shack Inc.</b><br>Bandipur-02, Mohoriya<br>Tanahun, Nepal<br>
	                Email:<a href="mailto:momoshack01@gmail.com">momoshack01@gmail.com</a><br>Phone: (+977) 1111111111</p>
	        	</div>
	        	<div class="ownership">
	        		<p><b>Owner:</b><br>Mr.Ram B. Bishowkarma &amp; Mrs. Uma Bishowkarma<br>(+977) 2222222222, (+977) 9999999999</p>
	        		<p><b>Manager:</b><br>Mr. Bibek Bishowkarma<br>(+977) 33333333333</p>
	        	</div>
	        	<div class="contact_form">
	        		<form id="contact" action="#" method="post">
	        			<fieldset>
	        				<legend><b>Contact Us</b></legend> 
	        				<label for="username">Name</label><span class="m_error" id="errName"></span>
	        				<input type="text" name="name" id="username" placeholder="Enter your name">
	        				<label for="userphone">Phone</label><span class="m_error" id="errPhone"></span>
	        				<input type="tel" name="phone" id="userphone" placeholder="000-000-0000">  
	        				<label for="useremail">Email</label><span class="m_error" id="errEmail"></span>
	        				<input type="email" name="email" id="useremail" placeholder="example@yahoo.com">
	        				<label for="usermessage">Message</label><span class="m_error" id="errMessage"></span>
	        				<textarea id="usermessage" name="message" placeholder="Write something..." style="height: 150px"></textarea>
	        				<div class="sub_btn">
                                 <input type="submit" value="Submit" id="submit">
                            </div>
                            <div id="error_messsage"></div>
	        			</fieldset>
	        		</form>
	        	</div>
        	</div>
        </section>
        <section class="thirdSection" id="map_info">
        	<h2>Mo:Mo Shack Inc. | Map</h2>
        	<div id="map"></div>
        </section>
  	    <footer>
	    	<div id="address">
                <p><b>Mo:Mo Shack Inc.</b><br>Bandipur-02, Mohoriya<br>Tanahun, Nepal<br>
                Email:<a href="mailto:momoshack01@gmail.com">momoshack01@gmail.com</a><br>Phone: (+977) 1111111111</p>
	    	</div>
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
	    	<div id="other">
	    		<ul>
					<li><a href="../php/index1.php">Home</a></li>
         		 	<li><a href="../php/about1.php">About</a></li>
         			<li><a href="../php/review.php">Reviews</a></li>
         			<li><a href="../php/contact1.php">Contact Us</a></li>
	    		</ul>
	    	</div>
	    </footer>
	    <script src="../javascript/google-map.js"></script>
	    <script src="../javascript/validate.js"></script>
  </body>
</html>