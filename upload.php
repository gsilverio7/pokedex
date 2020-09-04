<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
<link rel="icon" href="assets/img/pokeball01.png">

<style>
  footer{
    position: fixed;
    bottom: 0;
  }
</style>

<?php

include "includes/header.php";

// IMAGE UPLOAD //

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$img_upload_finished = 0;

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
if ($_FILES["fileToUpload"]["size"] > 700000) {
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
    $img_upload_finished = 1;

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

// END IMAGE UPLOAD //

// SEND DATA TO DATABASE //

include "models/db_connect.php";

$id = $_POST["id"];
$name = ucfirst($_POST["name"]);
$species = ucfirst($_POST["species"]);
$type = ucfirst($_POST["type"]);
$type2 = ucfirst($_POST["type2"]);
$description = $_POST["description"];
$photo = $target_file;

if ($img_upload_finished === 1) {

  $sql = "INSERT INTO pokedex (id, name, species, type, type2, description, photo)
  VALUES ('$id', '$name', '$species', '$type', '$type2', '$description', '$photo')";

  if ($conn->query($sql) === TRUE) {
  echo "Pokemon registered!";
  } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  }

}

$conn->close();

// END SEND DATA TO DATABASE //

include "includes/footer.php";
?>
