
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


<div class="content-doctors">
<?php include "navigation.php" ?>
    <br>
    <div style="border: 1px solid black;color:white;background-color: black">
        VISI GYDYTOJAI
    </div>

<?php
//gaunam visus irasus kurie turi gydytojo rakta
require_once "connect.php";
$connection = new mysqli($host,$db_user,$db_password, $db_name);
$sql = "SELECT  id,username, lastname, profession FROM users WHERE dkey='raktas'";

if($result = $connection->query($sql))
{

    if($result->num_rows>0)
    {
        echo '<table class="table-doctors">';
        echo '<thead>';
        echo "<tr><th>Id</th><th>Vardas</th><th>Pavardė</th><th>Profesija</th><th>Registracija</th></tr>";
        echo '</thead>';
        echo '<tbody>';
        while($row=$result->fetch_assoc())
        {
            $id=$row['id'];
            ?>
           <tr>
           <td><?php echo $row['id']?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['lastname']?></td>
            <td><?php echo $row['profession']?></td>
            <td><a href="doctors.php?<?php echo $id?>">Registruotis</a></td>
            </tr>
            <?php
            if(isset($_GET[$id])) {
                echo "<div style='position: absolute;top: 43%;padding:5px;border: 1px solid red;left: 58%;width: 300px;height: 155px;'>";
                echo "<div>";
                echo "<form name='form' action='' method='post'>";
                echo "Pasirinkite jums tinkama laika ir data:";
                echo "<hr>";
                echo "</div>";

                echo "<input name='date' style='position: relative;top: 1px;left: -7%;'type='date' required>";
                echo "<input name='time' style='position: relative;top: 44px;left: -55%;'type='time' min='07:00' max='18:00' required>";
                echo "<input name='pateikti' style='position: relative;top: 62px;left: -37.5%;'type='submit' value='Pateikti'>";
                echo "<div style='border: 1px solid red;position: relative;top: -22px;left: 59%;width: max-content;padding: 2px'>";
                echo "Darbo laikas";
                echo "<hr>";
                echo "I-V: 08:00-17:00";
                echo "<br>";
                echo "VI: 07:00-16:00";
                echo "<br>";
                echo "VII: 8:00-16:00";
                echo "</div>";
                echo "</form>";
                echo "</div>";
                error_reporting(0);
            }
                if(isset($_GET[$id])&&isset($_POST['date'])&&isset($_POST['time'])) {
                    echo $_GET['time'];
                    error_reporting(0);
                    $id = $row['id'];
                    $user_id = $_SESSION['id'];
                    $username = $row['username'];
                    $lastname = $row['lastname'];
                    $profession = $row['profession'];
                    $date = $_POST['date'];
                    $time = $_POST['time'];
                    $query_insert = "INSERT INTO registrations (registration_id,user_id,doctor_id,username,lastname,profession,date,time)
           VALUES(NULL,'$user_id','$id','$username','$lastname','$profession','$date','$time')";
                    $insert_query = mysqli_query($connection, $query_insert);
                   header('Location: doctors.php');
                }

            ?>

            </tbody>
    <?php
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

</body>
</html>
