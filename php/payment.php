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
    payment.php, 12-09-2021 -->

<html xmlns="http://www.w3.org/1999/xhtml">
  <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <meta http-equiv="content-type" content="text/html, charset=iso-8859-1" />                                                                      
    <title>Mo:Mo Shack|Bandipur|Tanahun|Nepal</title>
    <link rel="stylesheet" type="text/css" href="../css/payment.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header> <!-- Web page header part. MB -->
			<div class="navbar">
			  <img src="../photo/logo_01.jpg" alt="Mo:Mo" /> 
        <div class="nav1">
          <ul>
            <li><a href="../php/index1.php">Home</a></li>
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
                    $count = array_sum(array_column($_SESSION['cart'], 'Item_Qty'));
                    foreach($_SESSION['cart'] as $key => $value ){
                        $total = $value[Item_Qty] * $value[Item_Price];
                        $grandTotal += $total;
                    }
                  
                }
                echo' <i style="color:red; font-family:calibri; text-decoration:underline;">' .$customer. '</i>' 
              ?></a></li>
            <li><a href="../php/welcome.php#section2">Food Zone</a></li>
            <li><a href="../php/cart.php" class="active">Cart(<?php echo "<i style='color:white;
                    text-decoration:underline;text-decoration-color:black;'> ".$count."</i>"; ?>)</a></li>
            <li><a href="../php/logout.php">Logout</a></li>
          </ul>
        </div>
		  </div>
	  </header>

    <section id="section1">
      <div class="title">
        <h1>Choose your payment option!</h1>
        <h2>Order Total:<?php echo " $".$grandTotal; ?></h2>
        <h3>Including all service charges.(not delivery charge)</h3>
     </div>
    </section>

    <section id="section2">
      <div class="option">
        <a href="../php/cart.php"><input type="button" name="continue" id="go_back" value="Back to Cart"></a>
        <a href="../php/payment.php#section3"><input type="button" name="pay_online" id="online" value="Pay Online"></a>
        <form action="../php/confirm.php" method="post">
          <button name='cash_on' id='check_out'>Cash on Delivery</button>
        </form>
        </div>
    </section>

    <section id="section3">
        <form method="POST" action="../php/confirm.php">
            <div class="payment_form">
                <h2>Payment Information!</h2>
                <?php
                if (isset($_GET['error'])){
				            ?><h5 class="error"><?php echo $_GET['error']; ?></h5><hr><?php
			          }
			          ?> 
                <div class="form_container">
                    <div class="col">
                        <label for="card_type" class="form-label">CARD TYPE:</label><br>
                        <select class="form-control" name="card_type" id="card_type">
                            <option>VISA</option>
                            <option>MASTERCARD</option> 
                            <option>AMEX</option>
                            <option>DISCOVER</option>
		                    </select>
                        <input type="hidden" name="card_type" id="card_type">
                    </div>
                    <div class="col">
                        <label for="card_num" class="form-label">CARD NUMBER:</label>
                        <input type="text" name="card_num" id="card_num">
                    </div>
                    <div class="col">
                        <label for="card_holder" class="form-label">CARD HOLDER:</label>
                        <input type="text" name="card_holder" id="card_holder">
                    </div>
                    <div class="col">
                        <label for="card_expiry" class="form-label">CARD EXPIRY:</label>
                        <input type="date" name="card_expiry" id="card_expiry">
                    </div>
                    <div class="col">
                        <label for="card_cvc" class="form-label">CARD CVC:</label>
                        <input type="text" name="card_cvc" id="card_cvc">
                    </div>    
                    <div class="button">
                        <button for="order_place">MAKE PAYMENT</button>
                        <input type="hidden" name="order_place" id="order_place">
                    </div> 
                </div>
            </div>
        </form>
    </section>
  </body>
</html>