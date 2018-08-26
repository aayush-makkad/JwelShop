<?php
include('session.php');
// echo print_r($_REQUEST);
$id = $_REQUEST['id'];
$count= $_REQUEST['count'];
$name= $_REQUEST['name'];
$desc = $_REQUEST['desc'];
$price = $_REQUEST['price'];
$featureArray = $_REQUEST['feature'];

// foreach ($featureArray as $value) {
//     # code...

//     echo $value;

// }

// for($x = 1; $x < $count+1; $x++){

// echo "feature[{$x}]";
// $featureArray[] = $_REQUEST["feature[{$x}]"];

// }

// echo $featureArray[1];

if(!is_uploaded_file($_FILES['fileToUpload']['name'])) {
    goto startprocess;
}

$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    if(unlink($target_file))
        {
            $uploadOk = 1;
        } else {  
    $uploadOk = 0;
}
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        $sql = "update first set url = '$target_file' where id = $id";
        echo $sql;
        $result = mysqli_query($db,$sql);
        echo $result;
        // update first entries
      startprocess:  {

                $sql2 = " update first set name = '$name', description = '$desc', price = '$price' where id = $id";
                $result2 = mysqli_query($db,$sql2);
                echo $sql2; 


        }

        //update feature table
        {
            $sqldel = "delete from features where id_first = $id";
            $resultdel = mysqli_query($db,$sqldel); 
            echo $sqldel;

            foreach($featureArray as $val)
            {
                $sql3 = "insert into features(id_first,feature) values($id,'$val')";
                mysqli_query($db,$sql3);
                echo $sql3;
            }

        }
        echo "<script>
alert('image updated');
window.location.href='product-update.php';</script>";


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>