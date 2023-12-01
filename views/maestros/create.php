<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University | Funval</title>
</head>

<body>
    <h1>Crear nuevo alumno</h1>

    <form action="/alumnos/create" method="post">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
        </div>
        <div>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido">
        </div>
        <div>
            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" name="direccion">
        </div>
        <div>
            <label for="fecha_nac">Fecha Nacimiento:</label>
            <input type="date" id="fecha_nac" name="fecha_nac">
        </div>

        <button type="submit">Guardar</button>
    </form>
</body>

</html>