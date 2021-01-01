<?php session_start();
if(!isset($_SESSION['username'])){
    header('Location: index.php');
    exit();
}
?>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<div class="patient-page">
  <div class="card">
    <form class="patient-info">
        <?php include "navigation.php"?>
    <p style="border: 4px solid;font-size:64px;text-align:left;width:66%;">Daktaro kortelė</p>
    <div class="patient-info-card">
        <div style='width: 25%;height: 25%;padding:5px'>
        <img src=<?php echo $_SESSION['avatar'] ?> style='width: 100%; height: 100%'>
        </div>
            <b style="position: relative;top:-236px;left:21%;border:1px solid red; padding:6px"> Dr. </b>
            <?php
            require_once "connect.php";
            $mysqli = new mysqli($host,$db_user,$db_password, $db_name);
            $sql = "SELECT  username, lastname FROM users WHERE id=$_SESSION[id]";
            $username = $_SESSION['username'];
            $lastname = $_SESSION['lastname'];
            $profession = $_SESSION['profession'];
            echo "<input style='position: relative;top:-235px;left:23%' type'text' value='$username' placeholder='Vardas' readonly style='width:240px'/>";
            echo "<input style='position: relative;top:-235px;left:28%'type='text' value='$lastname' placeholder='Pavardė' readonly style='width:240px'/>";
            echo "<label style='position: relative;left:-34%; top:-162px;border:1px solid red; padding:6px'>Profesija</label>";
            echo "<input style='position: relative;top:-110px;left:-43.5%' type='text' value='$profession' placeholder='Profesija' readonly/>";
            ?>

<p style="border: 4px solid;font-size:32px;text-align:left;position: relative; top:-75px; width:99%;">Pacientų registracijos</p>
        <?php
        require_once "connect.php";
        $mysqli = new mysqli($host,$db_user,$db_password, $db_name);
        $sql = "SELECT  username, lastname, date, time FROM registrations WHERE doctor_id=$_SESSION[id]";
        $select_query = mysqli_query($mysqli, $sql);
        ?>


<table class="doctors-table" style="width:100%; position: relative;top:-87px;">
    <thead>
<tr>
<th>Vardas</th>
<th>Pavarde</th>
<th>Data</th>
<th>Laikas</th>
</tr>
    </thead>
    <tbody>
    <?php
    while($row = mysqli_fetch_assoc($select_query)){
    ?>
<tr>
  <td><?php echo $row['username']?></td>
  <td><?php echo $row['lastname']?></td>
  <td><?php echo $row['date']?></td>
  <td><?php echo $row['time']?></td>
</tr>
    <?php } ?>
    </tbody>
</table>
      </div>
      </form>
    </div>
  </div>
