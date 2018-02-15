<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
    </head>
    <body>
        <div class="jumbotron">
            <h1>Formulario de envio de mensaje</h1>
            <form method="POST" action="../controladorAgenda/controladorAgendaMandarCorreo.php">
                <div class="form-group col-md-14">
                    <input type="email" class="form-control" name="email" placeholder="Introduce tu email..." required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="nombre" placeholder="Introduce tu nombre..." required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="apellido" placeholder="Introduce tu apellido..." required>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="enviar">
            </form>
        </div>
    </body>
</html>

