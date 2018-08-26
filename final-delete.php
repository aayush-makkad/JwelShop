<?php
include('config.php');
$id = $_REQUEST['id'];

$sql = "delete from first where id = $id";
$result = mysqli_query($db,$sql);
echo "<script>
alert('product deleted');
window.location.href='product-delete.php';</script>";
?>