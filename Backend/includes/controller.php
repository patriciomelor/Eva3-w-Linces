<?php
// backend/includes/controller.php

require_once __DIR__ . '/../config/config.php';

class Conexion
{
    private $connection;

    public function getConnection()
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $this->connection = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
        return $this->connection;
    }

    public function closeConnection()
    {
        $this->connection = null;
    }
}


class Controlador
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }
    //Categoria y Servicios
    public function getCategoriasServicio()
    {
        $conn = $this->conexion->getConnection();
        $sql = "SELECT * FROM categoria_servicio"; // Ajusta el nombre de la tabla según tu base de datos
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conexion->closeConnection();
        return $categorias;
    }

    public function crearCategoriaServicio($nombre, $descripcion)
    {
        $conn = $this->conexion->getConnection();
        $sql = "INSERT INTO categoria_servicio (nombre, descripcion) VALUES (:nombre, :descripcion)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);

        if ($stmt->execute()) {
            $this->conexion->closeConnection();
            return true;
        } else {
            $this->conexion->closeConnection();
            return false;
        }
    }
   
    public function eliminarCategoriaServicio($id)
    {
        $conn = $this->conexion->getConnection();
        $sql = "DELETE FROM categoria_servicio WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            $this->conexion->closeConnection();
            return true;
        } else {
            $this->conexion->closeConnection();
            return false;
        }
    }
    //info contacto
    public function getInfoContacto()
    {
        $conn = $this->conexion->getConnection();
        $sql = "SELECT * FROM info_contacto";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $info_contacto = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conexion->closeConnection();
        return $info_contacto;
    }

    public function crearInfoContacto($nombre, $telefono, $correo)
    {
        $conn = $this->conexion->getConnection();
        $sql = "INSERT INTO info_contacto (nombre, telefono, correo) VALUES (:nombre, :telefono, :correo)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':correo', $correo);

        if ($stmt->execute()) {
            $this->conexion->closeConnection();
            return true;
        } else {
            $this->conexion->closeConnection();
            return false;
        }
    }

    public function eliminarInfoContacto($id)
    {
        $conn = $this->conexion->getConnection();
        $sql = "DELETE FROM info_contacto WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            $this->conexion->closeConnection();
            return true;
        } else {
            $this->conexion->closeConnection();
            return false;
        }
    }
    //Historia
    public function getHistorias()
    {
        $conn = $this->conexion->getConnection();
        $sql = "SELECT * FROM historia";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $historias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conexion->closeConnection();
        return $historias;
    }

    public function crearHistoria($titulo, $descripcion, $imagen)
    {
        $conn = $this->conexion->getConnection();
        $sql = "INSERT INTO historia (titulo, descripcion, imagen) VALUES (:titulo, :descripcion, :imagen)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':imagen', $imagen);

        if ($stmt->execute()) {
            $this->conexion->closeConnection();
            return true;
        } else {
            $this->conexion->closeConnection();
            return false;
        }
    }

    public function eliminarHistoria($id)
    {
        $conn = $this->conexion->getConnection();
        $sql = "DELETE FROM historia WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            $this->conexion->closeConnection();
            return true;
        } else {
            $this->conexion->closeConnection();
            return false;
        }
    }
    //parcela
    public function getParcelas()
    {
        $conn = $this->conexion->getConnection();
        $sql = "SELECT * FROM parcela";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $parcelas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conexion->closeConnection();
        return $parcelas;
    }

    public function crearParcela($tipo, $lote, $servicio_id)
    {
        try {
            $conn = $this->conexion->getConnection();
            
            // Verificar si el servicio_id existe en la tabla categoria_servicio
            $sql_check = "SELECT id FROM categoria_servicio WHERE id = :servicio_id";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bindParam(':servicio_id', $servicio_id);
            $stmt_check->execute();
            if ($stmt_check->rowCount() == 0) {
                $this->conexion->closeConnection();
                error_log("Error: El servicio_id no existe en la tabla categoria_servicio", 3, '/Applications/XAMPP/xamppfiles/logs/php_error_log');
                return ['error' => 'El servicio_id no existe en la tabla categoria_servicio'];
            }

            $sql = "INSERT INTO parcela (tipo, lote, servicio_id) VALUES (:tipo, :lote, :servicio_id)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':lote', $lote);
            $stmt->bindParam(':servicio_id', $servicio_id);

            if ($stmt->execute()) {
                $this->conexion->closeConnection();
                error_log("Parcela creada correctamente: Tipo = $tipo, Lote = $lote, Servicio_ID = $servicio_id", 3, '/Applications/XAMPP/xamppfiles/logs/php_error_log');
                return true;
            } else {
                $this->conexion->closeConnection();
                error_log("Error al ejecutar el statement", 3, '/Applications/XAMPP/xamppfiles/logs/php_error_log');
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error en crearParcela: " . $e->getMessage(), 3, '/Applications/XAMPP/xamppfiles/logs/php_error_log');
            return false;
        }
    }

    public function eliminarParcela($id)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "DELETE FROM parcela WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                $this->conexion->closeConnection();
                return true;
            } else {
                $this->conexion->closeConnection();
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error en eliminarParcela: " . $e->getMessage(), 3, '/Applications/XAMPP/xamppfiles/logs/php_error_log');
            return false;
        }
    }
    public function getPreguntasFrecuentes()
    {
        $conn = $this->conexion->getConnection();
        $sql = "SELECT * FROM pregunta_frecuente";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $preguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conexion->closeConnection();
        return $preguntas;
    }

    public function crearPreguntaFrecuente($pregunta, $respuesta)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "INSERT INTO pregunta_frecuente (pregunta, respuesta) VALUES (:pregunta, :respuesta)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':pregunta', $pregunta);
            $stmt->bindParam(':respuesta', $respuesta);

            if ($stmt->execute()) {
                $this->conexion->closeConnection();
                return true;
            } else {
                $this->conexion->closeConnection();
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error en crearPreguntaFrecuente: " . $e->getMessage(), 3, '/Applications/XAMPP/xamppfiles/logs/php_error_log');
            return false;
        }
    }

    public function actualizarPreguntaFrecuente($id, $pregunta, $respuesta)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "UPDATE pregunta_frecuente SET pregunta = :pregunta, respuesta = :respuesta WHERE id = :id";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':pregunta', $pregunta);
            $stmt->bindParam(':respuesta', $respuesta);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                $this->conexion->closeConnection();
                return true;
            } else {
                $this->conexion->closeConnection();
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error en actualizarPreguntaFrecuente: " . $e->getMessage(), 3, '/Applications/XAMPP/xamppfiles/logs/php_error_log');
            return false;
        }
    }

    public function actualizarParcialPreguntaFrecuente($id, $pregunta = null, $respuesta = null)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "UPDATE pregunta_frecuente SET ";
            $params = [];
            if ($pregunta !== null) {
                $sql .= "pregunta = :pregunta";
                $params[':pregunta'] = $pregunta;
            }
            if ($respuesta !== null) {
                if (!empty($params)) {
                    $sql .= ", ";
                }
                $sql .= "respuesta = :respuesta";
                $params[':respuesta'] = $respuesta;
            }
            $sql .= " WHERE id = :id";
            $params[':id'] = $id;

            $stmt = $conn->prepare($sql);

            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }

            if ($stmt->execute()) {
                $this->conexion->closeConnection();
                return true;
            } else {
                $this->conexion->closeConnection();
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error en actualizarParcialPreguntaFrecuente: " . $e->getMessage(), 3, '/Applications/XAMPP/xamppfiles/logs/php_error_log');
            return false;
        }
    }

    public function eliminarPreguntaFrecuente($id)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "DELETE FROM pregunta_frecuente WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                $this->conexion->closeConnection();
                return true;
            } else {
                $this->conexion->closeConnection();
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error en eliminarPreguntaFrecuente: " . $e->getMessage(), 3, '/Applications/XAMPP/xamppfiles/logs/php_error_log');
            return false;
        }
    }
}
?>