<?php include("includes/header.php"); ?>

<script>
    selectLink("register-link");
</script>
<section id="register">
    <div class="message">
        <p>
            <?php 
                if (isset($_GET['msg'])) {
                    $msg = $_GET['msg'];
                    switch ($msg) {
                        case "MATRICULA_EXISTE":
                            echo "Ya existe un usuario con esta matrícula, intente otra vez";
                            break;
                        case "ERROR_CONTRASEÑA":
                            echo "La contraseña no tiene el formato correcto, intente otra vez";
                            break;
                        case "CAMPOS_VACIOS":
                            echo "Debe llenar todos los campos";
                            break;
                        case "ERROR_INSERTAR":
                            echo "Parece que hubo un error en la consulta, intente otra vez";
                            break;
                        case "INSERTADO":
                            echo "Se ha registrado correctamente";
                            break;
                    }
                }
            ?>
        <p>
    </div>
    <div class="form-container">
        <form action="db/registrar.php" method="POST">
            <div class="mb-3">
                <label for="matrícula" class="form-label">Matrícula</label>
                <input type="text" class="form-control" name="matricula" id="matricula">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="mb-3">
                <label for="appaterno" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" name="appaterno" id="appaterno">
            </div>
            <div class="mb-3">
                <label for="apmaterno" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" name="apmaterno" id="apmaterno">
            </div>
            <div class="mb-3">
                <label for="turno" class="form-label">Turno</label>
                <select class="form-select" name="turno" id="turno">
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="pass" id="pass">
            </div>
            <button type="submit" name="registro" id="registro" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</section>

<?php include("includes/footer.php"); ?>