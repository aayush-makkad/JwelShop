<?php
include('session.php');
// echo print_r($_REQUEST);
$name= $_REQUEST['name'];
$desc = $_REQUEST['desc'];
$price = $_REQUEST['price'];
echo $name;
echo $desc;
echo $price;
// $featureArray = $_REQUEST['feature'];
$url = null;
$id=null;
$maxid=0;
// if(!is_uploaded_file($_FILES['fileToUpload']['name'])) {
//     goto startprocess;
// }

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
    $uploadOk = 0;

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

        $url = $target_file;


        //get max id that already exists
        {

            $sqlmaxid = "select max(id) from first";
            $result2 = mysqli_query($db,$sqlmaxid);
            while($row2 = $result2->fetch_assoc()) {

                $maxid = $row2['max(id)'];
                }            


        }
        // update first entries
     {
                $usableid = $maxid+1;
                $sql2 = "insert into first(id,name,description,url,price) values ('$usableid','$name','$desc','$url','$price')";
                $result2 = mysqli_query($db,$sql2);
                echo $sql2; 


        }

        //get id
        {

            $sqlid = "select id from first where name = '$name' and description = '$desc' and price = $price";
            echo $sqlid;
            $result2 = mysqli_query($db,$sqlid);
            while($row2 = $result2->fetch_assoc()) {

                $id = $row2['id'];
                }
                echo $id;
        }



        echo "<script>
alert('details added, add features now');
window.location.href='feature-add-for-id.php?id=$id';</script>";


       
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>