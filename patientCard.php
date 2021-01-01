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
            <p style="border: 4px solid;font-size:64px;text-align:left;width:66%;">Paciento kortelė</p>
            <div class="patient-info-card">

                <?php
                require_once "connect.php";
                $mysqli = new mysqli($host,$db_user,$db_password, $db_name);
                $sql = "SELECT  username, lastname FROM users WHERE id=$_SESSION[id]";
                $username = $_SESSION['username'];
                $lastname = $_SESSION['lastname'];
                $id = $_SESSION['id'];

                $s_id = $_SESSION['id'];
                $sql_select = "SELECT card_id FROM users WHERE id='$s_id'";
                $selects_query = mysqli_query($mysqli, $sql_select);

                while($row = $selects_query->fetch_assoc()){
                    $card_id = $row['card_id'];
                    if($card_id==0){
                        $rand = rand(9000,9999);
                        $value = $id . $rand;
                        $sql_insert = "UPDATE users SET card_id = $value WHERE id='$s_id'";
                        $inserts_query = mysqli_query($mysqli, $sql_insert);
                    }
                    else {
                        $card_value= $card_id;

                    }
                }



                echo "<label style='position: relative;left:-8%; border:1px solid red; padding:6px'>Vardas</label>";
                echo "<input style='position: relative;left:-5%' type='text' value='$username' placeholder='Vardas' readonly/>";
                echo "<label style='position: relative;left:7%; border:1px solid red; padding:6px'>Pavarde</label>";
                echo "<input style='position: relative;left:10.5%' type='text' value='$lastname' placeholder='Pavardė' readonly/>";
                echo "<label style='position: relative;left:-59%;top:65px; border:1px solid red; padding:6px' type='text'>Kortelės numeris</label>";
                error_reporting(0);
                echo "<input style='position: relative;left:-1.5%' type='text' value='$card_value' placeholder='Kortelės numeris' readonly/>";
                ?>



                <p style="border: 4px solid;font-size:32px;text-align:left;width:99%;">Registracijos pas gydytojus</p>
                <?php
                require_once "connect.php";
                $connection = new mysqli($host,$db_user,$db_password, $db_name);
                $user_id = $_SESSION['id'];
                $query = "SELECT * FROM registrations WHERE user_id=$user_id";
                $search_query = mysqli_query($connection, $query);
                ?>


                <table class="patient-table"style="width:100%">
                    <tr>
                        <thead>
                        <th>Vardas</th>
                        <th>Pavarde</th>
                        <th>Data</th>
                        <th>Laikas</th>
                        <th>Registracijos atšaukimas</th>
                        </thead>
                    </tr>
                        <tbody>

                        <?php
                        while($row = mysqli_fetch_assoc($search_query)){
                        ?>
                    <tr>
                        <td><?php echo $row['username']?></td>
                        <td><?php echo $row['lastname']?></td>
                        <td><?php echo $row['date']?></td>
                        <td><?php echo $row['time']?></td>
                        <?php
                        $doctor_ids = $row['doctor_id'];
                        $doctor_date = $row['date'];
                        $doctor_time = $row['time'];
                        ?>
                        <td><a href="patientCard.php?link<?php echo $doctor_ids.$doctor_date?>"">Išsiregistruoti</a></td>
<!--                        --><?php
                        if(isset($_GET['link'.$doctor_ids.$doctor_date])){
                            $query_delete = "DELETE FROM registrations WHERE doctor_id='$doctor_ids' AND date='$doctor_date' AND time='$doctor_time'";
                            $delete_query = mysqli_query($connection, $query_delete);
                            header('Location: patientCard.php');
                        }
                        ?>
                    </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                </table>
            </div>

        </form>

    </div>


</div>