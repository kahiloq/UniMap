<?php

class Connection {
    private $server = "mysql:host=localhost;dbname=logincrud1";
    private $username = "migui";
    private $password = "locote123";
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    protected $conn;

    public function open() {
        try {
            $this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
            return $this->conn;
        } catch (PDOException $e) {
            // Registra la excepción para depuración
            error_log("Error de Conexión a la Base de Datos: " . $e->getMessage(), 0);
            // Muestra un mensaje amigable para el usuario
            echo "Actualmente, hay un problema con la conexión. Por favor, contacta al administrador.";
            // Detén la ejecución del script o redirige a una página de error
            // die();
        }
    }

    public function close() {
        $this->conn = null;
    }
}
?>
