<?php include_once '../public/header.php'; ?>

<link rel="stylesheet" href="../public/css/style.css">
<link rel="stylesheet" href="../public/css/index.css">

<div class="dashboard-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6">
                <div class="form-container text-center">
                    <h1>Registro de Usuario</h1>
                    <form action="registrar" method="POST" class="form-horizontal my-form">
                        <div class="form-icon">
                            <i class="fa fa-user-circle"></i>
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <label for="nombre_usuario">Nombre de Usuario:</label>
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <label for="contraseña">Contraseña:</label>
                            <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                        </div>
                        <br>
                        <button class="btn btn-primary signin">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once '../public/footer.php'; ?>