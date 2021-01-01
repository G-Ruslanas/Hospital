<?php
    session_start();
    if(isset($_SESSION['delete']))
    {
        echo "<div class='alert_success'>Vartotojas Istrintas!</div>";
        unset($_SESSION['delete']);
    }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <div class="admin-page">
            <h1>ADMIN</h1>
            <?php
                //gaunam visus irasus
                require_once "connect.php";
                $mysqli = new mysqli($host,$db_user,$db_password, $db_name);
                $sql = "SELECT * FROM users";
                if($result = $mysqli->query($sql))
                {
                    if($result->num_rows>0)
                    {
                        echo '<table class="">';
                        echo "<tr><td><b>Id</b></td><td><b>Vardas</b></td><td><b>Pavarde</b></td><td><b>Email</b></td><td></td></tr>";
                        while($row=$result->fetch_assoc())
                        {
                            echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['lastname']."</td><td>".$row['email']."<td><a target='_blank' href='edit.php?id=".$row['id']."'>Edit</a></td>";
                        }
                        echo "</table>";
                    }
                    $result->close();
                }
                else {
                    echo "Klaida su DB!";
                }
                ?>
        </div>
    </div>           
</body>
</html>