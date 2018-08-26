<?php
include('config.php');
$first_name = mysqli_real_escape_string($db,$_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($db,$_REQUEST['last_name']); 
$address = mysqli_real_escape_string($db,$_REQUEST['address']);
$phone = mysqli_real_escape_string($db,$_REQUEST['phone']); 
$mail = mysqli_real_escape_string($db,$_REQUEST['email']); 

//$first_name = $_REQUEST['first_name'];
// $last_name =  $_REQUEST['last_name'];
// $address = $_REQUEST['address'];
// $phone = $_REQUEST['phone'];
$id = $_REQUEST['id'];
$query1=mysqli_query($db,"SELECT name from first where id = $id") or die(mysqli_error($db));
      	foreach($query1 as $row):
      		$item = $row['name'];
      	 endforeach;
$query=$db->prepare("INSERT INTO `orders`(`item_id`, `item_name`, `first_name`, `last_name`, `address`, `phone`, `mail`) VALUES (?,?,?,?,?,?,?)");
$query->bind_param("issssss",$id,$item,$first_name,$last_name,$address,$phone,$mail);
$query->execute();

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
                                    <li><a href="#">About</a></li>
                                    <li><a href="shop.php">Shop</a></li>
                                    <li><a href="#">Contact</a></li>
                              </ul>
                        </div>
                  </nav>

            </header>

            <div class="content">
                  <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </p>
                  <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </p>
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
