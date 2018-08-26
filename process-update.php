<?php

include('session.php');
$id = mysqli_real_escape_string($db,$_REQUEST['id']);
$sql = "select * from first where id = $id";
$result = mysqli_query($db,$sql);
while($row = $result->fetch_assoc()) {

$name = $row['name'];
$desc = $row['description'];
$url = $row['url'];
$price = $row['price'];

}

$sql2 = "select count(*) from features where id_first = $id";
$result2 = mysqli_query($db,$sql2);
while($row2 = $result2->fetch_assoc()) {

$count = $row2['count(*)'];
}
$sql3 = "select feature from features where id_first = $id";
$result3 = mysqli_query($db,$sql3);
$features = array();
while($row3 = $result3->fetch_assoc()) {

$features[] = $row3['feature'];

}
// for($i = 0; $i < $count ; $i++){

//       echo $features[$i];
// }
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
        <form class="text-center" style="color: #757575;" action="upload.php?" id="myform" enctype="multipart/form-data" method="post" id="mainform">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="count" value="<?php echo $count; ?>">
            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormFirstName" class="form-control" name="name" value=<?php echo $name; ?> >
                        <label for="materialRegisterFormFirstName">First name</label>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormLastName" class="form-control" name="desc" value=<?php echo $desc; ?> >
                        <label for="materialRegisterFormLastName">Description</label>
                    </div>
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="text" id="materialRegisterFormEmail" class="form-control" name="price" value=<?php echo $price;?> >
                <label for="materialRegisterFormEmail">Price</label>
            </div>

            <?php for($y = $count; $y > 0 ; $y--){ ?>
            <div class="md-form">
                <input type="text" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="feature[<?php echo $y;?>]" required value=<?php echo $features[$y-1]; ?> >
                <label for="materialRegisterFormPassword">Feature</label>
                <!-- <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    At least 8 characters and 1 digit
                </small> -->
            </div>

          <?php } ?>
             Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
           <!-- -->
          
            <!-- Newsletter -->
            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialRegisterFormNewsletter">
                <label class="form-check-label" for="materialRegisterFormNewsletter">Subscribe to our newsletter</label>
            </div> -->

              <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Update</button>
        </form>
        <!-- Form -->
       <!--   <button id="addfeature">Add Feature?</button> -->
    </div>

</div>
<!-- Material form register -->
            </div>
      </div>

      <script type="text/javascript">

      // Menu-toggle button

      // $(document).ready(function() {
      //       $("#addfeature").on("click", function() {



      //            // input = $('<div class="md-form">'+
      //            //  '<input type="text" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="feature" required >'+
      //            //   '<label for="materialRegisterFormPassword">Feature</label>  </div>');
      //            input = $('<p>hey</p>');

      //             #("#mainform").append(input);
      //       });
      // });


//       $(document).ready(function() {
// var max_fields = 20; //maximum input boxes allowed
// var wrapper = $("#items"); //Fields wrapper
// var add_button = $(".add_field_button"); //Add button ID

// var x = 1; //initlal text box count
// $(add_button).click(function(e){ //on add input button click
// e.preventDefault();
// if(x < max_fields){ //max input box allowed
// x++; //text box increment
// $(wrapper).append('<div class="form-group"><label for="title">Author Email:</label>' +
// '<input class="form-control col-md-11" id="author_email" type="email" placeholder=""name="author"/>' +
// '<a href="#" class="remove_field"><i class="fa fa-times"></a></div>'); //add input box
// }
// });



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
