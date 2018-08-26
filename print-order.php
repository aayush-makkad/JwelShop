<?php
include('session.php');
$id = mysqli_real_escape_string($db,$_REQUEST['id']);
$sql = "select * from orders where id = $id";
$result = mysqli_query($db,$sql);
while($row = $result->fetch_assoc()) {
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$address = $row['address'];
$phone = $row['phone'];
$item = $row['item_name'];
$mail = $row['mail'];
if($mail === NULL){
	$mail = "N/A";
	}
}
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
      



      $(document).ready(function() {
           $('#myform').submit(function() {
           		printDiv();
           		return true;
			});
      });



      	function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

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
                                    <li><a href="manage-orders.php">Manage Orders</a></li>
                                    <li><a href="shop.php">Manage products</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                              </ul>
                        </div>
                  </nav>

            </header>
            <div class="form_wrap">
<!-- Material form register -->
<div class="card">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Please enter details</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0" id='DivIdToPrint'>

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="process-order.php?" id="myform" >
        	<input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormFirstName" class="form-control" name="first_name" value=<?php echo $first_name; ?> readonly>
                        <label for="materialRegisterFormFirstName">First name</label>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormLastName" class="form-control" name="last_name" value=<?php echo $last_name; ?> readonly>
                        <label for="materialRegisterFormLastName">Last name</label>
                    </div>
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="email" id="materialRegisterFormEmail" class="form-control" name="email" value=<?php echo $mail;?> readonly>
                <label for="materialRegisterFormEmail">E-mail</label>
            </div>

            <!-- Password -->
            <div class="md-form">
                <input type="text" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="address" required value=<?php echo $address; ?> readonly>
                <label for="materialRegisterFormPassword">Address</label>
                <!-- <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    At least 8 characters and 1 digit
                </small> -->
            </div>

            <!-- Phone number -->
            <div class="md-form">
                <input type="text" id="materialRegisterFormPhone" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock" name="phone" required value=<?php echo $phone;?> readonly>
                <label for="materialRegisterFormPhone">Phone number</label>
               <!--  <small id="materialRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                    Optional - for two step authentication
                </small> -->
            </div>

            <div class="md-form">
                <input type="text" id="materialRegisterFormPhone" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock" name="item" required value = <?php echo $item; ?> readonly>
                <label for="materialRegisterFormPhone">Item name</label>
               <!--  <small id="materialRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                    Optional - for two step authentication
                </small> -->
            </div>


            <!-- Newsletter -->
            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialRegisterFormNewsletter">
                <label class="form-check-label" for="materialRegisterFormNewsletter">Subscribe to our newsletter</label>
            </div> -->

            <!-- Sign up button -->
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Process and Print</button>

            <!-- Social register -->
            <p>or sign up with:</p>

            <a type="button" class="btn-floating btn-fb btn-sm">
                <i class="fa fa-facebook"></i>
            </a>
            <a type="button" class="btn-floating btn-tw btn-sm">
                <i class="fa fa-twitter"></i>
            </a>
            <a type="button" class="btn-floating btn-li btn-sm">
                <i class="fa fa-linkedin"></i>
            </a>
            <a type="button" class="btn-floating btn-git btn-sm">
                <i class="fa fa-github"></i>
            </a>

            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a> and
                <a href="" target="_blank">terms of service</a>. </p>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->
</div>
<button value="pdf" onclick="pdfgen();"></button>
</body>
</html>