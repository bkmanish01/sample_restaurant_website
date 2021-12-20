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
    cart.php, 12-09-2021 -->

<html xmlns="http://www.w3.org/1999/xhtml">
  <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <meta http-equiv="content-type" content="text/html, charset=iso-8859-1" />                                                                      
    <title>Mo:Mo Shack|Bandipur|Tanahun|Nepal</title>
    <link rel="stylesheet" type="text/css" href="../css/cart.css" />
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
                    //$count = count($_SESSION['cart']);
                    $count = array_sum(array_column($_SESSION['cart'], 'Item_Qty'));
                  
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
        <h1>Hello, <?php echo "<i style='color:blue;'>".$customer."!</i>"; ?><br>Here is your order details:</h1>
      </div>
    </section>
    <section id="section2">
      <div class="container">
          <table class="table">
            <thead class="text-center">
              <tr>
                <th scope="col">Serial No.</th>
                <th scope="col">Foods</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php
                if(isset($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $key => $value ){
                      $total = $value[Item_Qty] * $value[Item_Price];
                      $grandTotal += $total;
                      $sr = $key + 1;
                      echo "<tr>
                              <td>$sr</td>
                              <td>$value[Item_Name]</td>
                              <td>$value[Item_Qty]</td>
                              <td>$$value[Item_Price]</td>
                              <td>$$total</td>
                              <td>
                                <form action='manage_order.php' method='post'>
                                  <button name='Remove_Item' style='color:red;'>REMOVE</button>
                                  <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                </form>
                              </td>
                           </tr>";                    
                      }
                }
              ?>
            </tbody>
          </table>
          <p><strong>Grand Total: <?php echo " $".$grandTotal; ?></strong></p>
      </div>
    </section>

    <section id="section3">
      <div class="option">
        <form action="../php/manage_order.php" method="post">
          <button name='clear_all' class='btn btn-outline-danger' id='clear_all'>Empty Cart</button>
        </form>
          <a href="../php/welcome.php#section2"><input type="button" name="continue" id="shop_cont" value="Continue Shopping"></a>
        <form action="../php/payment.php" method="post">
          <button name='check_out' id='check_out'>Checkout</button>
        </form>
        </div>
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
  </body>
</html>