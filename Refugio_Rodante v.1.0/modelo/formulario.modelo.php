<?php
require_once "conexion.php";

class modeloFormulario {
    
    // Método para registrar un usuario
    static public function mdlRegistro($tabla, $datos) {
        try {
            // Verificar si el email ya existe
            $pdo = Conexion::conectar();
            $stmt = $pdo->prepare("SELECT Email FROM $tabla WHERE Email = :email");
            $stmt->bindParam(":email", $datos["Email"], PDO::PARAM_STR);
            $stmt->execute();
            
            if($stmt->rowCount() > 0) {
                return "existe";
            }

            // Insertar nuevo usuario
            $stmt = $pdo->prepare("INSERT INTO $tabla (Nombre, Apellido, Email, Contrasena, FechaRegistro, Rol) 
                                   VALUES (:nombre, :apellido, :email, :contrasena, NOW(), :rol )");
            $stmt->bindParam(":nombre", $datos["Nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["Apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["Email"], PDO::PARAM_STR);
            $stmt->bindParam(":contrasena", $datos["Contrasena"], PDO::PARAM_STR);
            $stmt->bindParam(":rol", $datos["Rol"], PDO::PARAM_STR);
            
            if($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch(PDOException $e) {
            error_log("Error en mdlRegistro: " . $e->getMessage());
            return "error";
        }
    }

    // Método para iniciar sesión
    static public function mdlIniciarSesion($tabla, $datos) {
        try {
            // Consulta para buscar el usuario por email
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Email = :Email");
            $stmt->bindParam(":Email", $datos["Email"], PDO::PARAM_STR);
            $stmt->execute();

            if($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Verificar si la contraseña es correcta
                if(password_verify($datos["Contrasena"], $usuario["Contrasena"])) {
                    // Almacenar datos del usuario en la sesión
                    $_SESSION["usuario"] = $usuario;
                    return "ok";
                } else {
                    return "error";
                }
            } else {
                return "error";
            }
        } catch(PDOException $e) {
            error_log("Error en mdlIniciarSesion: " . $e->getMessage());
            return "error";
        }
    }
}
