<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin Console</title>
</head>

<body>

    <div class="container-everything">

        <h2>Crear nueva entrada de Tarea</h2>

        <form action="php/newTarea.php" method="post">

            <div class="label-input">
                <label for="tarea">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo de la tarea" required>
            </div>

            <br>

            <div class="label-input">
                <label for="tarea">Materia:</label>
                <select name="materia" id="materia">
                    <option value="sinespecificar">Sin especificar</option>
                    <option value="sub1">Sub 1</option>
                    <option value="sub2">Sub 2</option>
                    <option value="matematicas">Matemáticas</option>
                    <option value="fisica">Física</option>
                    <option value="ctsv">Ciencia, Tecnologia, Sociedad y Valores</option>
                    <option value="ingles">Inglés</option>
                    <option value="tutoria">Tutoria</option>
                </select>
            </div>

            <br>

            <div class="label-input">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="1" placeholder="Descripción de la tarea"
                    required></textarea>
            </div>

            <br>

            <div class="label-input">

                <label for="fecha">Fecha de entrega:</label>
                <div class="input-checkbox-fecha">
                    <div class="checkbox-fecha">
                        <input type="checkbox" id="checkbox-fecha" checked>
                    </div>
                    <div class="input-fecha">
                        <input type="text" id="fecha" name="fecha" placeholder="dd/mm/aa" required>
                    </div>
                </div>

            </div>

            <br>

            <div class="label-input">
                <label for="imagenes">Imagenes:</label>
                <input name="imagenes" id="imagenes" cols="30" rows="1" placeholder='Solo escribe el nombre del archivo'>
            </div>

            <br>

            <div class="div-submitButton">
                <button type="submit" id="submit" class="btn btn-primary">Crear</button>
            </div>

        </form>


    </div>

    <script src="js/admin.js"></script>

</body>

</html>