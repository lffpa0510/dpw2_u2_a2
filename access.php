<?php include("includes/header.php"); ?>
<script>
    selectLink("access-link");
</script>
<section id="access">
    <div class="message">
        <p>
            <?php 
                if (isset($_GET['msg'])) {
                    $msg = $_GET['msg'];
                    if ($msg == "USUARIO_NO_EXISTE") {
                        echo "El usuario no está registrado.";
                    }
                }
            ?>
        <p>
    </div>
    <div class="form-container">
        <form action="db/iniciar.php" method="POST">
            <div class="mb-3">
                <label for="matrícula" class="form-label">Matrícula</label>
                <input type="text" class="form-control" name="matricula" id="matricula">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="pass" id="pass">
            </div>
            <button type="submit" name="login" id="login" class="btn btn-primary">Iniciar sesión</button>
        </form>
    </div>
</section>

<?php include("includes/footer.php"); ?>
