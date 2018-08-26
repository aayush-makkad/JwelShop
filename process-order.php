<?php
include('session.php');
//order id :
$id = mysqli_real_escape_string($db,$_REQUEST['id']);
$first_name = mysqli_real_escape_string($db,$_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($db,$_REQUEST['last_name']); 
$address = mysqli_real_escape_string($db,$_REQUEST['address']);
$phone = mysqli_real_escape_string($db,$_REQUEST['phone']); 
$mail = mysqli_real_escape_string($db,$_REQUEST['email']); 
$item = mysqli_real_escape_string($db,$_REQUEST['item']); 
if($id>0){

$sql = "delete from orders where id = $id";
$result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);

echo "<script>
alert('order processed');
window.location.href='manage-orders.php';</script>";


}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
	<script type="text/javascript">
		
$(document).ready(function() {
   jsPDF();
});

	</script>
</head>
<script type="text/javascript">
	function print(){
		var doc = new jsPDF()

		doc.text('Order Data', 10, 10)
		doc.text('---------------------------------------------------------------------------------------', 10, 10)
		doc.text('<?php echo $first_name; ?>', 10, 10)
		doc.text('---------------------------------------------------------------------------------------', 10, 10)
		doc.text('<?php echo $last_name; ?>', 10, 10)
		doc.text('---------------------------------------------------------------------------------------', 10, 10)
		doc.text('<?php echo $address; ?>', 10, 10)
		doc.text('---------------------------------------------------------------------------------------', 10, 10)
		doc.text('<?php echo $phone; ?>', 10, 10)
		doc.text('---------------------------------------------------------------------------------------', 10, 10)
		doc.text('<?php echo $mail; ?>', 10, 10)
		doc.text('---------------------------------------------------------------------------------------', 10, 10)
		doc.text('<?php echo $item; ?>', 10, 10)
		doc.save('a4.pdf')

	}
</script>
<body>

</body>
</html>