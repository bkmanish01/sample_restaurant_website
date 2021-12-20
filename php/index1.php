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
    index1.php, 12-09-2021 -->

<html xmlns="http://www.w3.org/1999/xhtml">
  <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <meta http-equiv="content-type" content="text/html, charset=iso-8859-1" />                                                                      
    <title>Mo:Mo Shack|Bandipur|Tanahun|Nepal</title>
    <link rel="stylesheet" type="text/css" href="../css/index1.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <header> 
    <div class="navbar">
        <img src="../photo/logo_01.jpg" alt="Mo:Mo" /> 
		<div class="nav1">
			<ul>
			<li><a href="../php/index1.php" class="active">Home</a></li>
			<li><a href="../php/about1.php">About</a></li>
			<li><a href="../php/contact1.php">Contact Us</a></li>
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
	    <div id="section1" class="title">
	    	<h1>Mo:Mo Shack</h1>
	        <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...authentic Nepali Cusine!</h2>	
	         <p>Good Food is the foundation<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;of genuine happiness!</p>
	    </div>
	   	<div id="section2" class="gues_serv">
	    	<div class="serv_imgs">
				<div class="serv">
	    			<img src="../photo/momo.jpg" alt="">
	    			<figcaption><b>Mo:Mo</b></figcaption>
	    		</div>
	    		<div class="serv">
	    			<img src="../photo/thukpa1.jpg" alt="">
	    			<figcaption><b>Thukpa</b></figcaption>
	    		</div>
	    		<div class="serv">
	    			<img src="../photo/kachila.jpg" alt="">
	    			<figcaption><b>Kachila</b></figcaption>
	    		</div>
	    		<div class="serv">
	    			<img src="../photo/chowmin.jpg" alt="">
	    			<figcaption><b>Chowmin</b></figcaption>
	    		</div>
	    		<div class="serv">
	    			<img src="../photo/bhatmas1.jpg" alt="">
	    			<figcaption><b>Bhatmas</b></figcaption>
	    		</div>
	    	</div>
	    </div>
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
  </body>
</html>