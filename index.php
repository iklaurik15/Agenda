<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1><em>LOGIN</em></h1>
        <section>
           <form name="loginForm" action="controladorAgenda/controladorAgendaLogin.php" method="POST">
                <div>                    
                    <div>
                        <input type="text" name="usuario" placeholder="Usuario" 
                        <?php if (isset($_COOKIE["cook_user"])){echo 'value='.$_COOKIE["cook_user"];}?> required />
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password"  
                        <?php if (isset($_COOKIE["cook_pass"])){echo 'value='.$_COOKIE["cook_pass"];}?> required />
                    </div>                    
                </div>
                <br><input type="submit" value="Entrar"/>
                <input type="checkbox" name="chkRecordar"> Recordarme                                
            </form>
            
            <br><a href="vistaAgenda/vistaAgendaRegistro.php">Registrarse</a>
            <br><a href="vistaAgenda/vistaAgendaFormTransac.php">Formulario transaccion</a>
         
        </section>
    </body>
</html>