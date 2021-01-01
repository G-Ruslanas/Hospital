<?php
    session_start();
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $_SESSION['id']=$id;

        //gaunam visa informacija pagal id
        require_once "connect.php";
        $mysqli = new mysqli($host,$db_user,$db_password, $db_name);
        $sql = "SELECT * FROM users WHERE id='$id'";
        if($result = $mysqli->query($sql))
        {
            if($result->num_rows>0)
            {
                $row=$result->fetch_assoc();
                $_SESSION['profession']=$row['profession'];
                $_SESSION['dkey']=$row['dkey'];
                $_SESSION['username']=$row['username'];   
            }
            $result->close();
        }
        else {
            echo "Klaida su DB!";
        }
    }

    //duomenu pakeitimas
    if(isset($_POST['profession']))
    {
        if(isset($_POST['doctor']))
        {
            require_once "connect.php";
            $mysqli = new mysqli($host,$db_user,$db_password, $db_name);
            $id=$_SESSION['id'];
            $profession = $mysqli->real_escape_string($_POST['profession']);
            $_SESSION['profession']=$profession;
            $sql = "UPDATE users SET dkey='raktas', profession='$profession' WHERE id='$id'";
            if($result = $mysqli->query($sql))
            {
                echo "<div class='alert_success'>Duomenys sekmingai buvo pakeisti!</div>";
            }
            else
            {
                echo "Duomenys nebuvo pakeisi! Error";
            }
        }
    }

    //Vartotojo trinimas
    {
        if(isset($_POST['delete']))
        {
            require_once "connect.php";
            $mysqli = new mysqli($host,$db_user,$db_password, $db_name);
            $id=$_SESSION['id'];
            $sql = "DELETE FROM users WHERE id='$id'";
             if($result = $mysqli->query($sql))
            {
                $_SESSION['delete']=true;
                header('Location: admin.php');
                exit();

            }
            else
            {
                echo "Vartotojas nebuvo istrintas!";
            }
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User edit</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="admin-page">
    <h1>Duomenu pakeitimas</h1>
    <br>Vartotojo vardas: <b><?=$_SESSION['username'] ?> </b>
    <br>Vartotojo ID: <b><?=$_SESSION['id'] ?> </b>
    <form action="edit.php" method="post">
        <br><input type="text" name="profession" placeholder="Profesija" value="<?=$_SESSION['profession'] ?>">
        <label>
           <br> <input type="checkbox" name="doctor" <?php if($_SESSION['raktas']=='raktas') echo "checked"; ?> >Dirba gydytoju
        </label>
        <br><br><input type="submit" value="Pakeisti duomenys">
    </form>
    <form action="edit.php" method="post">
        <input type="submit" name="delete" id="del" value="Ištrinti vartotoją!">
    </form>
</div>
</body>
</html>