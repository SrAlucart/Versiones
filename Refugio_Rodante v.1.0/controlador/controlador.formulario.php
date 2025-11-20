<?php
class controladorformularios {

    // Cambiamos el método de private a public
    public static function crearPermisosAdmin($email) {
        try {
            $pdo = conexion::conectar();
            
            // Obtener el ID del usuario recién creado
            $stmt = $pdo->prepare("SELECT IdUsuario FROM usuario WHERE Email = :Email");
            $stmt->bindParam(":Email", $email, PDO::PARAM_STR);
            $stmt->execute();
            
            if($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Crear permisos básicos de admin
                $stmt = $pdo->prepare("INSERT INTO permisos_admin (IdUsuario, GestionReservas, GestionUsuarios, GestionParqueaderos, GestionNotificaciones) 
                                     VALUES (:IdUsuario, 1, 1, 1, 1)");
                $stmt->bindParam(":IdUsuario", $usuario["IdUsuario"], PDO::PARAM_INT);
                $stmt->execute();
                return "ok";
            }
            return "error";
        } catch(PDOException $e) {
            error_log("Error al crear permisos de admin: " . $e->getMessage());
            return "error";
        }
    }


    static public function ctrRegistro() {
        if(isset($_POST["btnregistro"])) {
            
            // Validaciones
            if(empty($_POST["Nombre"]) || empty($_POST["Email"]) || 
               empty($_POST["Contrasena"])) {
                return "campos_vacios";
            }
            
            if(!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
                return "email_invalido";
            }

            

            // Hash de la contraseña
            $hashContrasena = password_hash($_POST["Contrasena"], PASSWORD_DEFAULT);

            // Asegurarnos que el rol se establezca correctamente
            $rol = (isset($_POST["tipoUsuario"]) && $_POST["tipoUsuario"] === "admin") ? "admin" : "usuario";

            $tabla = "usuario";
            $datos = array(
                "Nombre" => trim($_POST["Nombre"]),
                "Apellido" => isset($_POST["Apellido"]) ? trim($_POST["Apellido"]) : '',
                "Email" => trim($_POST["Email"]),
                "Contrasena" => $hashContrasena,
                "Rol" => $rol  // Usar la variable que acabamos de crear
            );

            

            // Debug - Verificar los datos antes de enviar
            error_log("Datos a registrar: " . print_r($datos, true));

            $respuesta = modeloFormulario::mdlRegistro($tabla, $datos);
            
            if($respuesta == "ok") {
                // Si es admin, crear permisos
                if($datos["Rol"] === "admin") {
                    // Dentro de la clase controladorformularios, donde llamas a crearPermisosAdmin:
                    $resultadoPermisos = self::crearPermisosAdmin($datos["Email"]);  // Correcto
                    if($resultadoPermisos !== "ok") {
                        return "error_permisos";
                    }
                }

                
                
                echo '<script>
                    if(confirm("Registro exitoso. ¿Desea iniciar sesión?")) {
                        window.location = "index.php?pagina=login";
                    }
                </script>';
                return "ok";
            } else if($respuesta == "existe") {
                echo '<div class="alert alert-danger">El email ya está registrado</div>';
                return "existe";
            } else {
                echo '<div class="alert alert-danger">Error al registrar</div>';
                return "error";
            }
        }
        return null;
    }
    static public function ctrIniciarSesion() {
        if(isset($_POST["btnLogin"])) {
            if(empty($_POST["Email"]) || empty($_POST["Contrasena"])) {
                return "campos_vacios";
            }

            $tabla = "usuario";
            $datos = array(
                "Email" => trim($_POST["Email"]),
                "Contrasena" => $_POST["Contrasena"]  // La contraseña sin hash
            );

            $respuesta = modeloFormulario::mdlIniciarSesion($tabla, $datos);

            if($respuesta == "ok") {
                $redireccion = $_SESSION["usuario"]["Rol"] === "admin" ? 
                              "index.php?pagina=admin" : 
                              "index.php?pagina=parqueadero";
                              
                echo "<script>window.location = '$redireccion';</script>";
                return "ok";
            }
            return "error";
        }
        return null;
    }

    // ... resto del código .
public static function mdlIniciarSesion($tabla, $datos) {
    try {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Email = :Email");
        $stmt->bindParam(":Email", $datos["Email"], PDO::PARAM_STR);
        $stmt->execute();

        if($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Verificar la contraseña
            if(password_verify($datos["Contrasena"], $usuario["Contrasena"])) {
                $_SESSION["usuario"] = $usuario;
                return "ok";
            }
        }
        return "error";
    } catch(PDOException $e) {
        return "error";
    }
}
public static function ctrCerrarSesion() {
    // Iniciar la sesión si no está iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Destruir la sesión
    session_unset();    // Limpiar las variables de sesión
    session_destroy();  // Destruir la sesión actual

    // Redireccionar al login o a la página que desees después del cierre de sesión
    echo '<script>
            alert("Sesión cerrada correctamente.");
            window.location = "index.php?pagina=login";
          </script>';
}

}

