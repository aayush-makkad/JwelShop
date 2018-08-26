<?php
include('session.php');
$field = $_REQUEST['field'];
$id_first=$_REQUEST['first_id'];
print_r($field);

foreach ($field as $value) {
	# code...

 
                $sql3 = "insert into features(id_first,feature) values($id_first,'$value')";
                mysqli_query($db,$sql3);
                echo $sql3;
            

        }


        echo "<script>
alert('features added');
window.location.href='manage-products.php';</script>";





?>