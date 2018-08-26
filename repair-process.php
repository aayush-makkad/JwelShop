<?php
include('config.php');
$name = mysqli_real_escape_string($db,$_REQUEST['nameperson']);
$phone = mysqli_real_escape_string($db,$_REQUEST['phone']); 
$explain = mysqli_real_escape_string($db,$_REQUEST['explain']);
//$mypassword = mysqli_real_escape_string($db,$_REQUEST['password']); 
$query=$db->prepare("INSERT INTO `repair`(`name`, `phone`, `explain`) VALUES (?,?,?)");
$query->bind_param("sss",$name,$phone,$explain);
$query->execute();
echo "<script>
window.location.href='index.html';</script>";
?>