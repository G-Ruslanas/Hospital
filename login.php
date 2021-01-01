<?php
  session_start();
  $_SESSION['message']="";
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
   
    require_once "connect.php";
    $mysqli = new mysqli($host,$db_user,$db_password, $db_name);

    $email = $mysqli->real_escape_string($_POST['email']);
    $password = md5($_POST['password']); //hashing md5 pass

    //trying to connect to DB and select users with email(email is unique)
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    if($result = $mysqli->query($sql))
    {
      $how_many_users = $result->num_rows;
      if($how_many_users>0)
      {
        $row=$result->fetch_assoc();

        $_SESSION['id']=$row['id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['email']=$row['email'];
        $_SESSION['avatar']=$row['avatar'];
        $_SESSION['raktas']=$row['dkey'];
        $_SESSION['lastname']=$row['lastname'];
        $_SESSION['profession']=$row['profession'];
        
        
        //ar prisijunge gydytojas ar paprastas klientas
        $raktas = $mysqli->real_escape_string($_POST['key']);
        if($raktas==$_SESSION['raktas'] && $raktas!=null)
        {
            $_SESSION['gydytojas']='raktasteisingas';
        }
        else {
            $_SESSION['gydytojas']='raktasneteisingas';
        }
      echo $_SESSION['username'];
        echo $_SESSION['email'];
        if($_SESSION['username']=='admin'&&$_SESSION['email']=='admin@gmail.com'){
            header('Location: admin.php');
        }
        else {
            header('Location: main.php');
        }


        $result->close();
      }
      else
      {
        $_SESSION['message']="Neteisingas slaptazodis!";
      }

    }else
    {
      $_SESSION['message']="Problema su DB!";
    }
    



  }

?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Main</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="login-page">
    <div class="form">
    <form action="login.php" method="POST" enctype="multipart/form-data">

<div class="alert"><?=$_SESSION['message'] ?></div>

<br> <input class="first" type="email" value="" name="email" placeholder="E-mail" required >

<br> <input class="first" type="password" name="password" placeholder="Slaptažodis" required >

<br> <input class="first" type="text" name="key" placeholder="Gydytojo raktas">

<br><input class="second" type="submit" value="Prisijungti" name="submit"/>

<p class ="message">Neturite paskyros ? <a href="register.php">Užsiregistruokite</a></p>
</form>

    </div>
</div>




</body>
</html>