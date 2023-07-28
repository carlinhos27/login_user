<?php include_once '../public/header.php'; ?>

<link rel="stylesheet" href="../public/css/style.css">
<link rel="stylesheet" href="../public/css/index.css">
<div class="form-bg dashboard-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6">
                <div class="form-container text-center">
                    <form action="iniciarsesion" method="POST" class="form-horizontal my-form">
                        <div class="form-icon">
                            <i class="fa fa-user-circle"></i>
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Nombre de Usuario" id="nombre_usuario" name="nombre_usuario" required>
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Password" id="contraseña" name="contraseña" required>
                            
                            <?php if (isset($_GET['error']) && $_GET['error'] == 1) : ?>
                                <p style="color: red;">Nombre de usuario o contraseña incorrectos</p>
                            <?php endif; ?>
                            <span class="forgot"><a href="">Olvidaste Tu Contraseña?</a></span>
                        </div>
                        <button class="btn btn-primary signin">Iniciar Sesion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   
<?php 
    include_once '../public/footer.php'; 
?>
