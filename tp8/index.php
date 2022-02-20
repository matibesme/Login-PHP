
<?php
    $accion = isset($_GET['id']) ? 'modificar' : 'login';
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body class="bod" >
   
<div class="form">
  <div class="form__box">
    <div class="form__left">
      <div class="form__padding"><img class="form__image" src="http://4.bp.blogspot.com/-gpmgqMBf3kg/UzOSdi9XX_I/AAAAAAAAAZI/iTtc9tF7RIE/s1600/Juan+Rom%C3%A1n+Riquelme.png"/></div>
    </div>
    <div class="form__right">
      <div class="form__padding-right">
        <form id="formulario" name="formulario">
          <h2 class="form__title">Log In</h2>
                <input type="hidden" id="accion" name="accion" value="login" />
                <input class="form__email" type="email" name="email" id="email" placeholder="Email" />
                <input class="form__password" type="password" name="clave" id="clave" placeholder="Password" />
                <input class="form__submit-btn" type="button" value="Iniciar sesion" onclick="Login()" />
                <h2>&nbsp;</h2>
        </form>
      </div>
    </div>
  </div>
</div>
        
        
        
    </form>
   

    

   
   

    <script>
        function Login(){
            var formulario = document.getElementById("formulario");
            var email = document.getElementById("email");
            var clave = document.getElementById("clave");
            var dato = new FormData(formulario);
  

            

            fetch('controller/usuarioController.php',{
                method: 'POST',
                body: dato
            })
            .then(res=> res.json())
            .then(dato=>{
                if(dato.id > 0){
                    swal({
    icon: "success",
  }); 
                    console.log(dato);
                
                }
                else{
                    swal ( "Oops" ,  "No encontramos este usuario" ,  "error" )
                }
            
            });
            
        }
    </script>
</body>
</html>