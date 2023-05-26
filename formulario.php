<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php if (!empty($errorMessage)) { ?>
        <p><?php echo $errorMessage; ?></p>
    <?php } elseif (!empty($successMessage)) { ?>
        <p><?php echo $successMessage; ?></p>
    <?php } else { ?>
    <h1>Registro de Usuarios</h1>
    <form method="POST" action="registro.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="apellido1">Primer Apellido:</label>
        <input type="text" name="apellido1" required>

        <label for="apellido2">Segundo Apellido:</label>
        <input type="text" name="apellido2" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="login">Login:</label>
        <input type="text" name="login" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Enviar">
    </form>
    <?php } ?>
</body>
</html>