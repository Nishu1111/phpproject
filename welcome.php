<?php 

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'my_login');
if(!$conn){
    echo 'Connection failed';
    }
    if(isset($_POST['submit'])){
        $imageCount = count($_FILES['image']['name']);
        for($i=0;$i<$imageCount;$i++){
            $imageName = $_FILES['image']['name'][$i];
            $imageTempName = $_FILEs['image']['tmp_name'][$i];
            $taregtPath = "./upload".$imageName;
            if(move_uploaded_file($imageTempName, $targetPath)){
                $sql = "INSERT INFO images(image)VALUES('$imageName')";
            }
        }
        if($result){
            header('location:welcome.php?msg=ins');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Image upload</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            background-color: #ffe6e6;
        }
        h1 {
       font-size: 3.5em;
       border: 2px white solid;
       color: #fff;
        }
        </style>
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <br><br>

  <div class="container">
      <div class="col-md-12">
<div class="row">
    <div class="col-md-6">
        <h3 class="text-center">UPLOAD IMAGE</h3>
        <from action="welcome.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image[]" multiple><br>
        <label for="images"><b>Select image to upload:</b></label>

            <select name="type" id="images">
          <option value="Portrait">Portrait</option>
            <option value="Landscape">Landscape</option>
  
             </select>
        <input type="submit" name="submit" value="Upload">
    </form>
    </div>
    <br>
    <div class="col-md-6">
        <h3 class="text-center">DISPLAY IMAGE</h3>
    </div>
    </div>    
    </div>
    </div>
        <br>
        <br>
        <br>
    <button><a style="border: 1px white solid"; href="logout.php">Logout</a></button>
</body>
</html>