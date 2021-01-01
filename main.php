<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: index.php');
		exit();
  }

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Main page</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="style.css">

</head>

<body>


<div class="content">
<?php include "navigation.php" ?>

    <div class="mainpage">
        <header class="text-center">
            <h2>
                Apie mūsų svetainę
            </h2>
        </header>
        <hr>
    <p>
        Šiame portale galite:
        <ul class="list">
            <br>
            <li>Surasti jums reikalingą gydytoją</li>
            <br>
            <li>Peržiūrėti visus galimus gydytojus</li>
            <br>
            <li>Registruotis pas jums norimą gydytoją</li>
            <br>
            <li>Peržiūrėti savo asmeninę kortelę</li>
        </ul>
    </p>
    </div>
  <div class="personal">


      <div style='width: 50%;height: 70%;padding:5px'>
          <img src=<?php echo $_SESSION['avatar'] ?> style='width: 100%; height: 100%'>
      </div>

      <div style="padding: 5px; width: 45%; position: relative; top:-64%;left:62%;width: max-content;border-bottom: 1px solid black">
    <?php if($_SESSION['gydytojas']=='raktasteisingas'){

        echo "Gydytojas <br>";
        echo $_SESSION['username'];
      }
      else {
          echo "Pacientas <br>";
          echo $_SESSION['username'];
      }
      ?>
      </div>

    <div style="position: relative;top:-20%;left:2%; padding: 1px; border-bottom: 1px solid black;width: max-content" >
    <?= $_SESSION['email'] ?>
    </div>

    <div style="position: relative;top:-65%;left:65%; width: max-content">
    <a href="logout.php">Atsijungti</a>
    </div>

  </div>
  <div style="clear:both;"></div>
</div>


</body>
</html>