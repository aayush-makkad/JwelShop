<?php

$id = $_REQUEST['id'];
 include("config.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Shinga</title>
      <link rel="stylesheet" href="style2.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <link rel="stylesheet" type="text/css" href="detailsstyle.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function buy(id){

      window.location.href = "buynow.php?id="+id;

    }

  </script>
</head>
<body>
      <div class="wrapper">
      	<?php $query=mysqli_query($db,"SELECT url from first where id = $id") or die(mysqli_error($db));
      	foreach($query as $row):?>
            <header style="background: url(<?php echo $row['url'];?>); background-repeat: no-repeat; background-position: center; ">

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
            <?php

    endforeach;
?>

            <div class="content">
               <div class="main_wrap">
               <?php $query=mysqli_query($db,"SELECT name,description,price from first where id = $id") or die(mysqli_error($db));
                foreach($query as $row):?>
                <?php  $price = $row['price'];?> 
                <div class="product-name">
                  <p><h2><?php echo $row['name'];?></h2></p>

                </div>
                <div class="product-desc">
                  <p><h4><i><?php echo $row['description']; ?></i></h4></p>
                </div>
                <?php

                    endforeach;
                ?>  
                <div style="text-align: left;">
                <p style="text-align: left;"><h4>Features :</h4></p>
                  
                    </div>
                <?php $query=mysqli_query($db,"SELECT feature from features where id_first = $id") or die(mysqli_error($db));
                foreach($query as $row):?>
                  <div class="features">

                    <ul class="feature-list">
                      <li>
                        <p style="color: gray; text-align: left;"><?php echo $row['feature'];?></style></p>
                      </li>
                    </ul>

                  </div>
                   <?php

                    endforeach;
                ?>  

                <button type="button" class="btn btn-primary btn-lg btn-block" onclick="buy(<?php echo $id;?>)">Buy now at Rs.<?php echo $price; ?></button>
                </div>
         

            </div>
     <!--  </div> -->

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
