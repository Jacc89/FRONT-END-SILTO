<?php require RUTA_APP . '/views/inc/header.php'; ?>
<a href="<?php echo RUTA_URL; ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
<div class="card card-body  bg-ligth mt-5 container">
    <h2>Editar Usuario</h2>
    <form action="<?php echo RUTA_URL; ?>/paginas/editar/<?php echo $datos['id_usuario']; ?>" method="POST">
        <div class="form-grup">
            <label for="nombre">Nombre:<sup>*</sup></label>
            <input type="text" name="nombre" class="form-control form-control-lg" value="<?php echo $datos['nombre']; ?>">
        </div>
        <div class="form-grup">
            <label for="email">Email:<sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg" value="<?php echo $datos['email']; ?>">
        </div>
        <div class="form-grup">
            <label for="telefono">Telefono:<sup>*</sup></label>
            <input type="text" name="telefono" class="form-control form-control-lg" value="<?php echo $datos['telefono']; ?>">
        </div><br>
        <input type="submit" class=" btn btn-success" value="Actualizar usuario">
    </form>
</div>
<?php require RUTA_APP . '/views/inc/footer.php'; ?>
