<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Formulario</title>
</head>
<body>
     <div class="wrap">
        <!-- No olvidemos ponder para que se envie en el mismo archivo y con el método POST-->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method ='POST'>
            <input type="text" name="nombre" id="" placeholder="Nombre" value="">
            <input type="text" name="email" id=""  placeholder="Email" value"="">
            <textarea name="mensaje" placeholder="Mensaje"></textarea>
            <!-- mensaje de error-->
             <?php if(!empty($errores)):?>
               <div class="alert error"> 
                 <?php echo $errores; ?>
            </div>
         
             <?php elseif($enviar): ?>
                   <div class="alert success">
                       <p>Enviado Correctamente</p>
                   </div> 
            <?php endif;?>
            <input type="submit"  name="submit" value="Enviar">
        </form>
     </div>
</body>
</html>