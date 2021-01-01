<!--<div class="photo"><h1>Photo</h1></div>-->
<img src="https://image.shutterstock.com/image-photo/healthcare-people-group-professional-doctor-260nw-1213711042.jpg" alt="hospital banner" style="width:900px">
<div class="navas">
<!--    <ul class="navigation">-->
    <a href="main.php" class="navi">Pradžia</a>
    <a href="search.php" class="navi">Gydytojo paieška</a>
    <a href="doctors.php" class="navi">Visi gydytojai</a>
    <?php  if($_SESSION['gydytojas']!='raktasteisingas'){
        echo "<a href='patientCard.php' class='navi'>Paciento kortelė</a>";
    }
    else{
        echo "<a href='docCard.php'>Gydytojo kortelė</a>";
    }?>
    <?php

    if(!isset($_SESSION['username'])){
        echo "<a href='register.php' class='navi'>Registracija</a>";
        echo "<a href='login.php' class='navi'>Prisijungimas</a>";
    }
    else {
        echo "<a href='logout.php' class='navi'>Atsijungti</a>";
    }
    ?>

</div>
