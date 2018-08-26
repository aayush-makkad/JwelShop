<?php

include('session.php');
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
</head>
<body>
      <div class="wrapper">
            <header style="background-image: url(<?php echo $url; ?>);">

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

            <div class="content">
                  <!-- main data -->

<div class="card">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Please enter details</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0" id='DivIdToPrint'>

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="upload-add.php?" id="myform" enctype="multipart/form-data" method="post" id="mainform">
       
            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormFirstName" class="form-control" name="name"  >
                        <label for="materialRegisterFormFirstName">First name</label>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormLastName" class="form-control" name="desc" > 
                        <label for="materialRegisterFormLastName">Description</label>
                    </div>
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="price"  >
                <label for="materialRegisterFormEmail">Price</label>
            </div>

            


                <!-- <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    At least 8 characters and 1 digit
                </small>
      <!--       </div> -->

    
             Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
           <!-- -->
          
              <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Update</button>
        </form>
     
    </div>

</div>
<!-- Material form register -->
            </div>
      </div>

      <script type="text/javascript">

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
