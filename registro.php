<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];

// Validar los datos
if (empty($nombre) || empty($apellido1) || empty($apellido2) || empty($email) || empty($login) || empty($password)) {
  echo "Por favor, completa todos los campos.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "El email ingresado no es válido.";
} elseif (strlen($password) < 4 || strlen($password) > 8) {
  echo "La contraseña debe tener entre 4 y 8 caracteres.";
} else {
  // Crear la conexión a la base de datos
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Verificar si hay error en la conexión
  if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
  }
  
  // Consultar si el email ya existe en la base de datos
  $emailExists = false;
  $checkEmailQuery = "SELECT * FROM usuarios WHERE email='$email'";
  $checkEmailResult = $conn->query($checkEmailQuery);
  if ($checkEmailResult->num_rows > 0) {
    $emailExists = true;
  }
  
  if ($emailExists) {
    echo "El email ya está registrado.";
  } else {
    // Insertar los datos en la base de datos
    $insertQuery = "INSERT INTO usuarios (nombre, apellido1, apellido2, email, login, password) VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login', '$password')";
    if ($conn->query($insertQuery) === true) {
      echo "Registro completado con éxito.";
    } else {
      echo "Error al registrar los datos: " . $conn->error;
    }
  }
  
  // Cerrar la conexión a la base de datos
  $conn->close();
}
?>
