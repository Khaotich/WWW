<?php
include "0begin.php";
?>
<h1> Dodawanie Zdjęcia </h1>

<form method="post" enctype="multipart/form-data">
  Wybierz zdjęcie do dodania: <br><br>
  <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
  Login:
  <input type="text" name="login" id="login"><br><br>
  Hasło:
  <input type="password" name="pass" id="pass"><br><br>
  <input type="submit" value="Dodaj zdjęcie" name="submit">
</form>
<br><br>

<?php
$target_dir = "img/";
@$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if(@$_POST['pass']=='klucze123' && @$_POST['login']=='admin')
{
  if($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo " Zdjęcie ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " zostało dodany.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
else{
  if(!empty($_POST['pass'])) echo 'Złe hasło lub login!';
}

?>

<?php
include "0end.php";
?>