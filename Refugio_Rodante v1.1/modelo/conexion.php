<?php
class conexion {
  static public function conectar() {
    try {
      $link = new PDO(
        "mysql:host=localhost;port=3307;dbname=rodante",
        "root",
        "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
      );
      
      $link->exec("set names utf8");
      return $link;
      
    } catch(PDOException $e) {
      echo "Error de conexión: " . $e->getMessage();
      return null;
    }
  }
}