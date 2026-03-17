<!DOCTYPE html>
<html>
<head><title>File Upload</title></head>
<body>
  <h1>Upload a File</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload">
    <input type="submit" value="Upload">
  </form>

  <?php
  $target_dir = "uploads/";
  if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "File uploaded successfully.";
    } else {
      echo "Error uploading file.";
    }
  }
  ?>

  <h2>Uploaded Files</h2>
  <ul>
    <?php
    $files = scandir($target_dir);
    foreach ($files as $file) {
      if ($file != "." && $file != "..") {
        echo "<li><a href='uploads/$file'>$file</a></li>";
      }
    }
    ?>
  </ul>
</body>
</html>
