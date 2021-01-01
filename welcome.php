<?php
  session_start();


?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Welcome</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">
  <div class="aler-success">
    <?=$_SESSION['message'] ?>
  </div>
  <img src='<?= $_SESSION['avatar'] ?>' alt="">
  
  <a href="login.php" class="option">Prisijungimas</a>
    
</div>

<?php
   session_destroy();
?>

</body>
</html>