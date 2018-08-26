<?php
include('session.php');
// include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Shinga</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="manage-orders-style.css">
      <script>

</script>
</head>
<body>
      <div class="wrapper">
            <header>

                  <nav>

                        <div class="menu-icon">
                              <i class="fa fa-bars fa-2x"></i>
                        </div>

                        <div class="logo">
                              LOGO
                        </div>

                        <div class="menu">
                              <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="manage-orders.php">Manage Orders</a></li>
                                    <li><a href="shop.php">Manage products</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                              </ul>
                        </div>
                  </nav>

            </header>

            <div class="content">
                  <!-- main code here -->
                <div class="headline">
                  
                    <p><h2>Orders for today : </h2></p>
                </div>
                  <?php  $sql = "SELECT * FROM orders";
     				 $result = $db->query($sql);

	while($row = $result->fetch_assoc()) {
      $id = $row['id']; 
    	echo "<div class = 'order'>";
    	// echo "<h2> Entry Number : " .$row["serial"] . "<br></h2>";
        echo "Order id : " . $id."<br>Product: " . $row["item_name"]. " <br>First Name: " . $row["first_name"]. " <br>address :" . $row["address"]. " <br>last name :" . $row["last_name"]."<br> phone number :" . $row["phone"]."<br>";
        ;

        echo "</div>";
        echo "<br>";
    }

?>

<br>
 <div class="headline">
                  
                    <p><h2>Repairs for today : </h2></p>
                </div>
                  <?php  $sql = "SELECT * FROM repair";
             $result = $db->query($sql);

  while($row = $result->fetch_assoc()) {
      $id = $row['id']; 
      echo "<div class = 'order'>";
      // echo "<h2> Entry Number : " .$row["serial"] . "<br></h2>";
        echo "Repair id : " . $id. " <br> Name: " . $row["name"]. " <br>Explanation :" . $row["explain"]. "<br> phone number :" . $row["phone"]."<br>";
        ;

        echo "</div>";
        echo "<br>";
    }

?>
    <br>

      <div class = "process">
        
        <div class="headline">
          <p><h2>Process/Delete orders :</h2></p>
        </div>
       
       <div class="container">
<h1 class="form-heading">login Form</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Process panel</h2>
   <p>Please enter Order id to process</p>
   </div>
    <form id="Login" action="print-order.php" method="post">

        <div class="form-group">


            <input type="text" class="form-control" id="inputEmail" placeholder="Order id" name="id">

        </div>

        
        
        <button type="submit" class="btn btn-primary">Process</button>

    </form>
    </div>

</div></div></div>
<br><br>
<div class = "process-repair">
        
        <div class="headline">
          <p><h2>Process/Delete repairs :</h2></p>
        </div>
       
       <div class="container">
<h1 class="form-heading">login Form</h1>
<div class="repair-form">
<div class="main-div">
    <div class="panel">
   <h2>Process panel</h2>
   <p>Please enter Repair id to process</p>
   </div>
    <form id="Login" action="print-repair.php" method="post">

        <div class="form-group">


            <input type="text" class="form-control" id="inputEmail" placeholder="Repair id" name="id">

        </div>

        
        
        <button type="submit" class="btn btn-primary">Process</button>

    </form>
    </div>

</div></div></div>

      </div>
            </div>
      </div>

      <script type="text/javascript">

      // Menu-toggle button

      $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      })

  </script>

</body>
</html>
