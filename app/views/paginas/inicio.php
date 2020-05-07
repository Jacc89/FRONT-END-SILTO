<?php require RUTA_APP . '/views/inc/header.php'; ?>

<!-- Bloque  ejemplo Framework
    <h3><?php //echo $datos['titulo'];?></h3>
<ul>
    <?php //foreach($datos['articulos'] as $articulos) : ?>
        <li><?php //echo $articulos->titulo; ?></li>
<?php //endforeach;  ?>
</ul>  }
<p>Framework php MVC</p> -->

    <table class="table container">
  <thead class="thead-dark">
    <tr>
      <th >Id</th>
      <th >Nombre</th>
      <th >Email</th>
      <th >Telefono</th>
      <th colspan="2" >Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($datos['usuarios'] as $usuarios) : ?>
    <tr>
      <td><?php echo $usuarios->id_usuario; ?></td>
      <td><?php echo $usuarios->nombre; ?></td>
      <td><?php echo $usuarios->email;?></td>
      <td><?php echo $usuarios->telefono; ?></th>
      <td><a href="<?php echo RUTA_URL; ?>/paginas/editar/<?php echo $usuarios->id_usuario; ?>">Editar</a></td>
      <td><a href="<?php echo RUTA_URL; ?>/paginas/borrar/<?php echo $usuarios->id_usuario; ?>">Borrar</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<?php require RUTA_APP . '/views/inc/footer.php'; ?>

