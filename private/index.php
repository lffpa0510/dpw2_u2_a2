<?php
session_start();
if (isset($_SESSION['matricula'])) {
    include("includes/header.php"); 
?>
<script>
    selectLink("homeadmin-link");
</script>
<section id="welcome">
    <h1>Bienvenido <?php echo $_SESSION["nombre"] . " " . $_SESSION["appaterno"] . " " . $_SESSION["apmaterno"] ?></h1>
    <?php 
        $tipo = '';
        if ($_SESSION["tipo"] == "AL") {
            $tipo = "alumno";
        } else {
            $tipo = "servicios escolares";
        }
    ?>
    <h2>Haz ingresado como <?php echo $tipo ?></h2> 
</section>

<?php 

include("../includes/footer.php"); 
} else {
    header("Location: ../access.php");
    exit();
}
?>