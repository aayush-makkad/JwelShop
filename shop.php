<?php
include("config.php");
?>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Shop</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="shopstyle.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="onclickhandler.js"></script>
      <script type="text/javascript">
            function clicked(item) {
                  window.location.href = "details.php?id="+($(item).attr("value"));
  //  alert($(item).attr("value"));
   }
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
                                    <li><a href="#">About</a></li>
                              <!--       <li><a href="#">Shop</a></li> -->
                                    <li><a href="#">Contact</a></li>
                              </ul>
                        </div>
                  </nav>

            </header>

            <div class="content">
                 <?php

  //  $sql = $pdo->query("SELECT * FROM first")->fetchall(PDO::FETCH_ASSOC);
                 $query=mysqli_query($db,"SELECT * from first") or die(mysqli_error($db));
    foreach($query as $row):?>
<div class="product">
<div onclick = "clicked(this);" class="product-image" value = <?php echo $row['id'];?> >
 <img src="<?php echo $row['url'];?>" alt=" " class="img-responsive"/>
</div>
<div>
 <p><b> Name : <?php echo $row['name'];?></b></p>
<!--   <span> from people near you. </span> -->
</div>
<div>
 <p><i class="item_price"> Price : <?php echo $row['price'];?></i></p>
<!--   <span> from people near you. </span> -->
</div>
<br>
<br><br>
</div>

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


      function clickhandle(id){

     


}



      </script>
   <!--  <div class="footer"><p>hey7y7</p></div> -->

</body>
</html>
