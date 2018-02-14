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
                        <input type="text" name="usuario" placeholder="Usuario" required />
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password"  required />
                    </div>
                </div>
                <br><input type="submit" value="Entrar"/>
                <br><a href="vistaAgenda/vistaAgendaRegistro.php">Registrarse</a>
                <br><a href="vistaAgenda/vistaAgendaFormTransac.php">Formulario transaccion</a>
<!--                <br><input type="checkbox" name="chkRecordar">Recordarme-->
            </form>
            
<!--            <a href="vistaAgenda/vistaAgendaUsuario.php">Usuario</a><br>
            <a href="vistaAgenda/vistaAgendaAdmin.php">Administrador</a><br>            -->
        </section>
    </body>
</html>