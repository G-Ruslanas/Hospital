<?php
  session_start();
  $_SESSION['message']="";

  
  
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    require_once "connect.php";
    $mysqli = new mysqli($host,$db_user,$db_password, $db_name);

    //passwords are equal
    if($_POST['password'] == $_POST['confirmpassword']){


      $username = $mysqli->real_escape_string($_POST['username']);
      $lastname = $mysqli->real_escape_string($_POST['lastname']);
      $email = $mysqli->real_escape_string($_POST['email']);
      $password = md5($_POST['password']); //hashing md5 pass
      $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);

      
        //is an email registered? verify will store all rows from DB
        $verify = $mysqli->query("SELECT id FROM users WHERE email='$email'");
        $how_many_emails = $verify->num_rows;
        if($how_many_emails==0)
        {
          
      //make sure file type is image
      if(preg_match("!image!", $_FILES['avatar']['type']))
      {
        //copy image to images/ folder
//         if(copy($_FILES['avatar']['tmp_name'], $avatar_path))
//         {
          $_SESSION['username']=$username;
          $_SESSION['avatar']=$avatar_path;

          $sql = "INSERT INTO users (username,lastname, email, password, avatar) "
                  . "VALUES ('$username','$lastname', '$email', '$password', '$avatar_path')";


          //if the query  is successful redirect to index 
          if($mysqli->query($sql)===true){
            $_SESSION['message']="Registracija uzbaigta $username !";
            header("Location: welcome.php");
          }
//           else
//           {
//             $_SESSION['message']="Vartotojas negali buti pridetas!";
//           }

        }
        else
        {
          $_SESSION['message']="Pasirinktas netinkamas failas!";
        }

      }
      else
      {
        $_SESSION['message']="Pasirinktas ne img/jpg/png failas!";
      }

        }  
        else
        {
          $_SESSION['message']="Toks vartotojas jau uzregistruotas";
        }


    }
    else
    {
      $_SESSION['message']="Slaptazodziai nera identiski!";
    }


  }




?>


<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Registration</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="register-page">
<div class="form">
  <form action="register.php" method="POST" enctype="multipart/form-data">

    <div class="alert"><?=$_SESSION['message'] ?></div>

     <input class="first" type="text" value=""name="username" placeholder="Vardas" required >

    <br> <input class="first" type="text" value=""name="lastname" placeholder="Pavardė" required >

    <br> <input class="first" type="email" value="" name="email" placeholder="E-mail" required >
    
    <br> <input class="first" type="password" name="password" placeholder="Slaptažodis" required >
    
    <br> <input class="first" type="password" name="confirmpassword" placeholder="Slaptažodzio patvirtinimas" required >

    <br> <p class="msg">Profilio nuotraukos įkėlimas</p>

    <input class="photos" type="file" name="avatar" id="avatar"> <br>
      
    <br><input class="second" type="submit" value="Registracija" name="submit"/>

    <p class ="message">Jau turite paskyrą ? <a href="login.php">Prisijunkite</a></p>

  </form>
</div>
</div>


</body>
</html>
