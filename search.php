
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
      <div class="searchbox">
        <h3>Gydytojų paieška</h3>
        <form method="POST" enctype="multipart/form-data">

          <div class="alert"><?=$_SESSION['message'] ?></div>

          <br> <input type="text" name="vardas" placeholder="Vardas"> <br>

          <br> <input type="text" name="pavarde" placeholder="Pavarde"> <br>

          <br> <input type="text" name="profesija" placeholder="Profesija"> <br>

          <br><input type="submit" value="Ieškoti" name="search"/>

        </form>

      </div>

    <?php
    if(isset($_POST['search'])){
        require_once "connect.php";
        $connection = new mysqli($host,$db_user,$db_password, $db_name);
        $vardas = $_POST['vardas'];
        $pavarde = $_POST['pavarde'];
        $profesija = $_POST['profesija'];
        $raktas = 'raktas';
        $count = 0;
        if($vardas!=null) {
            $query = "SELECT * FROM users WHERE username LIKE '%$vardas%' AND dkey LIKE '%$raktas%' ";
            $search_query = mysqli_query($connection, $query);
            $count = mysqli_num_rows($search_query);
        }
        if($pavarde!=null) {
            $query = "SELECT * FROM users WHERE lastname LIKE '%$pavarde%' AND dkey LIKE '%$raktas%' ";
            $search_query = mysqli_query($connection, $query);
            $count = mysqli_num_rows($search_query);
        }
        if($profesija!=null) {
            $query = "SELECT * FROM users WHERE profession LIKE '%$profesija%' AND dkey LIKE '%$raktas%'";
            $search_query = mysqli_query($connection, $query);
            $count = mysqli_num_rows($search_query);
        }
         if($pavarde!=null&&$vardas!=null){
                $query = "SELECT * FROM users WHERE username LIKE '%$vardas%' AND lastname LIKE '%$pavarde%' AND dkey LIKE '%$raktas%'";
                $search_query = mysqli_query($connection, $query);
                $count = mysqli_num_rows($search_query);
         }
        if($pavarde!=null&&$profesija!=null){
                $query = "SELECT * FROM users WHERE lastname LIKE '%$pavarde%' AND profession LIKE '%$profesija%' AND dkey LIKE '%$raktas%'";
                $search_query = mysqli_query($connection, $query);
                $count = mysqli_num_rows($search_query);
                }
       if($profesija!=null&&$vardas!=null){
                $query = "SELECT * FROM users WHERE profession LIKE '%$profesija%' AND vardas LIKE '%$vardas%' AND dkey LIKE '%$raktas%'";
                $search_query = mysqli_query($connection, $query);
                $count = mysqli_num_rows($search_query);
       }
       if($pavarde!=null&&$vardas!=null&&$profesija!=null){
                    $query = "SELECT * FROM users WHERE username LIKE '%$vardas%' AND lastname LIKE '%$pavarde%' AND profession LIKE '%$profesija%' AND dkey LIKE '%$raktas%'";
                    $search_query = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($search_query);
       }

        if($count == 0){
            echo "<div class='results'>
            <h2>Mūsų duomenų bazėje nėra gydytojo su tokiais duomenimis, pabandykite iš naujo </h2>
            </div>";
        } else {
            while($row = mysqli_fetch_assoc($search_query)){
                $username=$row['username'];
                $email=$row['email'];
                $lastname=$row['lastname'];
                $avatar=$row['avatar'];
                $profession=$row['profession'];
                ?>
                <div class="results">
                <h2>Paieškos rezultatai</h2>
                    <hr>

                    <div style='width: 22%;height: 36%;padding:5px'>
                        <img src="<?php echo $avatar?> " style='width: 100%; height: 168%'>
                    </div>
                    <label style="position: relative;top: -39%;left: -20%;border: 1px solid black;padding: 5px;">Vardas</label>
                    <div style="position: relative;top:-41%;left:26%;border-bottom: 1px solid black; width: max-content;height: 6%">
                    <p><?php  echo $username?></p>
                    </div>
                    <label style="position: relative;top: -58.1%;left: -6%;border: 1px solid black;padding: 5px;">Pavardė</label>
                    <div style="position: relative;top:-60%;left:39%;border-bottom: 1px solid black; width: max-content;height: 6%">
                        <p><?php  echo $lastname?></p>
                    </div>
                    <label style="position: relative;top: -53%;left: -20.6%;border: 1px solid black;padding: 5px;">Email</label>
                    <div style="position: relative;top:-54%;left:26%;border-bottom: 1px solid black; width: max-content;height: 6%">
                    <p><?php  echo $email?></p>
                    </div>
                    <label style="position: relative;top: -45%;left: -19%;border: 1px solid black;padding: 5px;">Profesija</label>
                    <div style="position: relative;top:-58%;left:39%;border-bottom: 1px solid black; width: max-content;height: 6%">
                        <p><?php  echo $profession?></p>
                    </div>

                    <hr>
      </div>

<?php }

        }
    }


    ?>




</div>

</body>
</html>