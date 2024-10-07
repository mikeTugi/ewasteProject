<?php
  include 'connect.php';
  session_start();

  if (!isset($_SESSION['staffname'])) {
    header('location:login.php');
  }else{
  $filter = $_SESSION['staffname'];
  $result=mysqli_query($connect,"SELECT * FROM `users` WHERE `Id`='$filter'")or die(mysqli_error());
  $row=mysqli_fetch_array($result);
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-waste Management Systems-Staff Homepage</title>
	<link href="homestyle.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>
<body>
<section id="waste">
  <img src="logo.jpg" class="logo">
  <div class="waste-text">
    <p>Welcome <p> Welcome <?php echo $row['Account_Type'];?>, <?php echo $row['Firstname'];?></p>
    <h1>E-waste Management System</h1>
    <p>Collect Your Waste Make The Environment Safe</p>
    <div class="waste-btn">
      <a href="#"><span></span>Get Started</a>
      <a href="#service"><span></span>Read More</a>
    </div>
  </div>
</section>
<div id="sideNav">
  <nav>
    <ul>
      <li><a href="#">HOME</a></li>
      <li><a href="#service">ABOUT US</a></li>
      <li><a href="#footer">CONTACT US</a></li>
      <li><a href="staffuserprofile.php">USER PROFILE</a></li>
      <li><a href="Logout.php">LOG OUT</a></li>
    </ul>
  </nav>
</div>
<div id="ewastemenuBtn">
  <img src="menu.png" id="menu">
</div>
  <!--Service-->
  <section id="service">
    <div class="title-text">
      <p>ABOUT US</p>
    </div>
    <div class="about-row">
      <div class = "about-column">
        <p>Through cutting-edge technologies and state-of-the-art recycling processes, we strive to unlock the hidden value in e-waste, minimizing its environmental impact. Our mission is to encourage individuals and businesses to adopt responsible recycling practices, making a collective effort to preserve our planet for future generations.</p>
        <p>By choosing E-Waste System, you contribute to a cleaner and greener world while also promoting the sustainable use of valuable resources.</p>
      </div>
       <div class = "about-column">
        <p>Our e-waste system is a convenient and environmentally friendly way to dispose of your old electronics. We collect and recycle e-waste from homes, businesses, and schools, and we ensure that it is recycled in an environmentally sound manner.Our system is easy to use. Simply schedule a pickup online or by phone, and we will come to your home or business to collect your e-waste. We accept all types of e-waste, including computers, televisions, printers, appliances, and more.</p>
      </div>
       <div class = "about-column">
        <p>We recycle e-waste in a way that protects the environment. We use state-of-the-art equipment to safely disassemble and process e-waste, and we recover valuable materials that can be reused or recycled. This helps to reduce the need for raw materials and to minimize the environmental impact of e-waste.Our e-waste system is committed to protecting the environment and to providing a convenient and affordable way to dispose of your old electronics. We are proud to be a leader in the fight against e-waste, and we are committed to making a positive impact on the planet.</p>
      </div>
      
    </div>
  </section>
  <section id="Award">
    <div class="title-text">
      <p>Points to Award according to kgs</p>
    </div>
    <table>
      <tr>
        <th>Weight(kg)</th>
        <th>Points</th>
      </tr>
      <tr>
        <td><div>1-10</div>
            <div>11-20</div>
            <div>21-30</div>
            <div>31-40</div>
            <div>41-50</div>
            <div>51-60</div>
            <div>61-70</div>
            <div>71-80</div>
            <div>81-90</div>
            <div>91-100</div>
        </td>
        <td><div>1</div>
            <div>2</div>
            <div>3</div>
            <div>4</div>
            <div>5</div>
            <div>6</div>
            <div>7</div>
            <div>8</div>
            <div>9</div>
            <div>10</div>
          </td>

      </tr>
    </table>
  </section>
  <section id="Order">
    <div class="title-text">
      <p>VERIFY PICKUP</p>
    </div>
    <table class="usertb">
      <tr>
      <th style="text-align:left;">Order_Id</th>
      <th style="text-align:left;">E-waste_Type</th>
      <th style="text-align:left;">Amount to be collected(in kgs)</th>
      <th style="text-align:left;">Location</th>
      <th style="text-align:left;">Status</th>
      <th style="text-align:left;">Points</th>
      <th style="text-align:left;"></th>
      <th style="text-align:left;"></th>
  </tr>
    <?php
include 'connect.php';
$sql = "SELECT `Order_Id`,`AmountCollected`,`EwasteType`,`Location`,`Status`,`Points` FROM `orders` WHERE `Staff_Id` = '$filter'";
$result = mysqli_query($connect,$sql);
if($result){
while ($row = mysqli_fetch_assoc($result)) {
 ?>
    <tr>
      <td> <?php echo($row['Order_Id']); ?></td>
      <td><?php echo($row["EwasteType"]);?></td>
      <td><?php echo($row['AmountCollected']); ?></td>
      <td><?php echo($row['Location']); ?></td>
      <td><?php echo($row['Status']); ?></td>
      <td> <?php echo($row['Points']) ?></td>
      <td><button class="button-30"><a href='acceptAndcancelOrder.php?action=acceptO&id=<?php echo($row["Order_Id"]); ?>' value='AcceptOrder'>Accept</a></button></td>
      <td><button class="button-30"><a href='acceptAndcancelOrder.php?action=cancelO&id=<?php echo($row["Order_Id"]); ?>' value='CancelOrder'>Cancel</a></button></td>
    </tr>
    <?php
    }
    }else{
      echo "No result";
    }
    ?>
  </table>
  </section>
  <section id="details">
    <div class="title-text">
      <p>DETAILS</p>
    </div>
    <ul>
      <div class="details123-row">
        <div class="details123-left">
      <h6 style="font-size:18px; text-align:center;">Complete Order</h6>
      <form action="CompleteOrder.php" method="post">
        <fieldset>
          <input class="details543" type="text" value="" name="amountcollected" placeholder="AmountCollected" required>
          <input class="details543" type="text" value="" name="points" placeholder="Points" required>        
          <select class="account" name="orderid" required>
                  <option selected disabled>Kindly Select an Order</option>
                                     <?php
                                      $sql = "SELECT * FROM `orders` WHERE `Staff_Id` = '$filter'";
                                      $all_categories = mysqli_query($connect,$sql);
                                      while ($category = mysqli_fetch_array(
                                              $all_categories,MYSQLI_ASSOC)):;
                                  ?>
                                  <option value="<?php echo $category["Order_Id"];?>"><?php echo $category["Order_Id"];?></option>
                                  <?php
                                      endwhile;
                                  ?>
                </select> 

          <button class="button" type="submit" value="submit" name="complete">Complete Order</button>
        </fieldset>
      </form>
    </div>
      </div>
    </ul>

  </section>
    <section id="footer">
      <img src="recycle1.jpeg" class="footer-img">
    <div class="title-text">
      <p>CONTACT US</p>
    </div>
    <div class="footer-row">
    <div class="footer-left">
      <h1>Contact us</h1>
        <p>Location :Nairobi, KENYA.</p>
        <p>Email Address :e_waste@gmail.com</p>
        <p>Phone Number :+254 712 345678</p>                
      </div>
    <div class="footer-right">
    <h1>Quicklinks</h1>
    <a href="#">HOME</a>
    <a href="#service">ABOUT US</a>
    <a href="#footer">CONTACT US</a>
    <a href="Logout.php">LOGOUT</a>
      </div>
    </div>
  </section>
<script>
  var ewastemenuBtn = document.getElementById('ewastemenuBtn');
  var sideNav = document.getElementById('sideNav');
  var menu = document.getElementById('menu');

  sideNav.style.right == "-250px";

  ewastemenuBtn.onclick = function () {
    if(sideNav.style.right == "-250px"){
      sideNav.style.right = "0";
      menu.src= "close.png";
    }else{
      sideNav.style.right = "-250px";
      menu.src= "menu.png";
    }
    
  }
</script>
</body>
</html>