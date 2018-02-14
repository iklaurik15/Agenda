<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1><em>REGISTRO</em></h1>
        <section>
            <form name="registroForm" action="../controladorAgenda/controladorAgendaRegistro.php" method="POST">
                <div>                    
                    <div>
                        <input type="text" name="usuario" placeholder="Usuario" required />
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password"  required />
                    </div>
                </div>
                <br><input type="submit" value="Registrar"/>                
<!--                <br><input type="checkbox" name="chkRecordar">Recordarme-->
            </form>
            
<!--            <a href="vistaAgenda/vistaAgendaUsuario.php">Usuario</a><br>
            <a href="vistaAgenda/vistaAgendaAdmin.php">Administrador</a><br>            -->
        </section>
    </body>
</html>

