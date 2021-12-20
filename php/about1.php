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
    about1.php, 12-09-2021 -->

<html xmlns="http://www.w3.org/1999/xhtml">
  <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <meta http-equiv="content-type" content="text/html, charset=iso-8859-1" />                                                                      
    <title>Mo:Mo Shack|Bandipur|Tanahun|Nepal</title>
    <link rel="stylesheet" type="text/css" href="../css/about1.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <header> 
    <div class="navbar">
            <img src="../photo/logo_01.jpg" alt="Mo:Mo" /> 
    <div class="nav1">
        <ul>
        <li><a href="../php/index1.php">Home</a></li>
        <li><a href="../php/about1.php" class="active">About</a></li>
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
    <div id="section1" class="detail">
        <div class="column">
            <h1>About</h1>
            <p>“<i>Bandipur Where Heaven Meets</i>” One of the famous tourist destinations of <b><i>Nepal</i>
				</b> located at 1050m in central Nepal. Approximately 700m above the Marsyangdi River Valley, 143 
				km to the west of Kathmandu and 80 km to the East of the Pokhara; it is connected by an 8 km access 
				road from Dumre bazar. <b><i>Mo:Mo Shack</i></b> is located in entry point of the historic, 
				traffic-free, stone paved <b><i>Bandipur</i></b> bazar, and it has a very best panorama views of the 
				spectacular Himalayas range from its dinning. It has been serving visitors since 2017. Basically, restaurant is run by
				a very pleasant and charming family which is built with concrete, bricks, and wood with traditional 
				looks. Therefore, you will feel like “Home away from Home.” The restaurant has the cozy dinning and 
				terrace for the views with the simple coffee shop & bar and free wife zone.</p>
        </div>
        <div class="column">
            <div class="container">
                <img src="../photo/food1.jpg" alt="">
                <img src="../photo/chickenchoila.jpg" alt="">
                <img src="../photo/food2.jpeg" alt="">
                <img src="../photo/food5.jpg" alt="">	
            </div>
            <div class="center"><img src="../photo/food4.jpg" alt=""></div>
        </div>
    </div>
    <div id="section2" class="foods">
        <div>
            <h2>Mo:Mo</h2>
            <p>&nbsp;&nbsp;&nbsp;Mo:Mo is type of steamed dumpling with some form of filling<br>
                This is traditional and famous food in Nepal.</p>
        </div>
        <div>
            <h2>Chowmin</h2>
            <p>&nbsp;&nbsp;&nbsp;Chowmin are stir-fried noodles with vegetables and sometime meat.<br>
                It is a popular food in Nepal.</p>
        </div>
        <div>
            <h2>Sausage</h2>
            <p>&nbsp;&nbsp;&nbsp;A sausage is a type of meat product usually made from ground meat <br>
                along with salt and some kind of spices.<br>Sausage fry is very popular in Nepal.</p>
        </div>
        <div>
            <h2>Choila</h2>
            <p>&nbsp;&nbsp;&nbsp;Choila is a typical Nepali dish that consists of spiced grilled buffalo meat.<br>
                This is one of the popular food in Nepal.</p>
        </div>
        <div>
            <h2>Bhatamas</h2>
            <p>&nbsp;&nbsp;&nbsp;Bhatamas Sadeko is a traditional Nepali dish.<br>
                It is a must have dish for numerous festival in Nepal.</p>
        </div>
        <div>
            <h2>Kachila</h2>
            <p>&nbsp;&nbsp;&nbsp;Kachila is a special marinated raw minced mead with mixing of various spices.<br>
                Kachila is well know food in Nepal.</p>
        </div>
        <div>
            <h2>Thukpa</h2>
            <p>&nbsp;&nbsp;&nbsp;Thukpa is some kind of noodles soup cooked with vegetables and meat.<br>
                Thukpa is popular in mountain region in Nepal.</p>
        </div>
        <div>
            <h2>Chatpat</h2>
            <p>&nbsp;&nbsp;&nbsp;Chatpat is a version of chaat, made with puffed rice, with some kind of peas.<br>
                This is famous for instant snack in Nepal.</p>
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