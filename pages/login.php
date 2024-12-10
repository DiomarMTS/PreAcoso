<?php
session_start();
require_once '../config/datos.php';
require_once '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id_user,nombre, apellidoPaterno, email, pass, id_rol FROM usuario WHERE email = :email;");
    $stmt->bindParam(':email', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $row['id_user'];
        $user = $row['email'];
        $firstName = $row['nombre'];
        $lastName = $row['apellidoPaterno'];
        $pass = $row['pass'];
        $role = $row['id_rol'];


        if ($password === $pass) {
            if ($role == 4) {
                $_SESSION['user_id'] = $id;
                $_SESSION['correo'] = $user;
                $_SESSION['username'] = $firstname;
                $_SESSION['first'] = $firstName;
                $_SESSION['last'] = $lastName;
                header("Location: ../admin/index.php");
                exit;
            } else {
                $_SESSION['user_id'] = $id;
                $_SESSION['correo'] = $user;
                $_SESSION['username'] = $firstname;
                $_SESSION['first'] = $firstName;
                $_SESSION['last'] = $lastName;
                header("Location: ../index.php");
                exit;
            }
        } else {
?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Contraseña incorrecta',
                    text: 'La contraseña que has introducido es incorrecta.',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Usuario no encontrado',
                text: 'No se encontró una cuenta con ese correo electrónico.',
                confirmButtonText: 'Aceptar'
            });
        </script>
<?php
    }

    $stmt = null;
    $conexion = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="icon" href="../assets/images/images.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>Login</title>
</head>

<body style="background: -webkit-gradient(linear, left top, right top, from(#864ddf), to(#203376));
  background: linear-gradient(to right, #864ddf, #203376);">

    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <p>PreAcoso</p>
            </div>
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="../index.php" class="link active">Inicio</a></li>
                    <li><a href="about.php" class="link">Nosotros</a></li>
                    <li><a href="contact.php" class="link">Contacto</a></li>
                    <li><a href="mapa.php" class="link">Ver mapa</a></li>
                </ul>
            </div>
            <div class="nav-button">
                <button class="btn white-btn" id="loginBtn" onclick="login()">Iniciar sesión</button>
                <button class="btn" id="registerBtn" onclick="register()">Inscribirse</button>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>

        <!----------------------------- Form box ----------------------------------->
        <div class="form-box">

            <!------------------- Forma de Iniciar sesion-------------------------->

            <div class="login-container" style="display: flex;
                        padding: 400px 40px;
                        flex-wrap: wrap;
                        background: rgba(255, 255, 255, 0.10);
                        border-radius: 10%;" id="login">
                <div class="top">
                    <span>¿Crear una cuenta? <a href="#" onclick="register()">Registrarse</a></span>
                    <header>Iniciar Sesión</header>
                </div>
                <form action="login.php" method="post">
                    <div class="input-box">
                        <input type="text" class="input-field" name="username" placeholder="Correo">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" name="password" placeholder="Contraseña">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Iniciar sesión">
                    </div>
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="login-check">
                            <label for="login-check">Guardar Contraseña</label>
                        </div>
                        <div class="two">
                            <label><a href="#">¿Has olvidado tu contraseña?</a></label>
                        </div>

                    </div>
                </form>
            </div>

            <!------------------- Forma de registrarte -------------------------->
            <div class="register-container" style="display: flex;
                        padding: 400px 40px;
                        flex-wrap: wrap;
                        background: rgba(255, 255, 255, 0.10);
                        border-radius: 25px;" id="register">
                <div class="top">
                    <span>¿Ya tienes una cuenta? <a href="#" onclick="login()">Iniciar Sesión</a></span>
                    <header>Inscribirse</header>
                </div>


                <form action="register.php" method="post">
                    <div class="two-forms">
                        <div class="input-box">
                            <input id="dni" type="number" class="input-field" min="1" step="1" name="identificacion" placeholder="DNI" required>
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="button" class="submit" id="buscarCliente" value="Buscar">
                        </div>
                    </div>
                    <div class="two-forms">
                        <div class="input-box">
                            <input id="nombres" type="text" class="input-field" name="first_name" placeholder="Nombres" required>
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input id="apellidoPaterno" type="text" class="input-field" name="last_nameP" placeholder="Apellidos" required>
                            <input id="apellidoMaterno" type="hidden" class="input-field" name="last_nameM" placeholder="Apellidos" required>
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" name="email" placeholder="Email" required>
                        <i class="bx bx-envelope"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" name="password" placeholder="Contraseña" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Registrarse">
                    </div>
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="register-check">
                            <label for="register-check"> Guardar Contraseña
                            </label>
                        </div>
                        <div class="two">
                            <label><a href="#">Términos y condiciones</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/JS/login.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>