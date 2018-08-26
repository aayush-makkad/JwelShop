<?php

include('session.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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

                  <nav style="z-index: 1;">

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
                                    <li><a href="manage-products.php">Manage products</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                              </ul>
                        </div>
                  </nav>

            </header>

            <div class="content" style="text-align: center;">

             
                              <?php

  //  $sql = $pdo->query("SELECT * FROM first")->fetchall(PDO::FETCH_ASSOC);
                 $query=mysqli_query($db,"SELECT * from first") or die(mysqli_error($db));
    foreach($query as $row):?>

                  <!-- <h2>Delete Product</h2> -->
                  <div onclick = "clicked(this);" class="product-image" value = <?php echo $row['id'];?> >
  <div class="card" style="width:400px; text-align: center; display: table; margin: 0 auto;">
    <img class="card-img-top" src="<?php echo $row['url'];?>" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title"><?php echo $row['name'];?></h4>
      <p class="card-text">Price : <?php echo $row['price'];?></p>
      <a href="process-update.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Update</a>
    </div>
  </div>
  <br>

  <?php

    endforeach;
?>
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
