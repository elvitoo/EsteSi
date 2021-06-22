<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>


    <br>

     <div class="alert alert-success">
         <?php echo $mensaje; ?>   
        
         <a href="#" class="badget badget-success">Ver carrito</a>
     </div>

    <div class="row">
    <?php
      $sentencia=$pdo->prepare("SELECT * FROM `tblproductos`");
      $sentencia->execute();
      $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      //print_r($listaProductos);
    ?>
     <?php foreach($listaProductos as $producto){?>
         <div class="col-3">
         <div class="card">
              <img 

              title="<?php echo $producto ['Nombre'];?>"
              alt="<?php echo $producto ['Nombre'];?>"
              class="card-img-top" 
              src="<?php echo $producto ['Imagen'];?>" 
              data-toggle="popover"
              data-trigger="hover"
              data-content="<?php echo $producto ['Descripcion'];?>"
              height="317px"

             >
              <div class="card-body">
              <span>"<?php echo $producto ['Nombre'];?>"</span>  
                   <h5 class="card-title">$"<?php echo $producto ['Precio'];?>"</h5>
                   <p class="card-text">Descripcion</p>

                  <form action="" method="post">
                  
                  <input type="hidden" name="id" id="id" values="<?php echo openssl_encrypt($producto ['ID'],COD,KEY)?>">
                  <input type="hidden" name="nombre" id="nombre" values="<?php echo openssl_encrypt($producto ['NOMBRE'],COD,KEY)?>">
                  <input type="hidden" name="precio" id="precio" values="<?php echo openssl_encrypt($producto ['PRECIO'],COD,KEY)?>">
                  <input type="hidden" name="cantidad" id="cantidad" values="<?php echo openssl_encrypt(1,COD,KEY)?>">

                  <button class="btn btn-primary"
                    name="btnAccion" 
                    values="Agregar" 
                    type="submit">Agregar al carrito</button>
                  
                  </form>

              </div>
         </div>

         </div>
     <?php } ?>
         
    </div>

  </div>
   <script>
   $(function () {
      $('[data-toggle="popover"]').popover()
     });
   </script>
   
<?php include 'templates/pie.php';?>
