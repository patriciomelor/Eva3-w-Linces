<?php
// backend/includes/controller.php

require_once '../includes/auth.php';
require_once '../config/config.php';

class Conexion
{
    private $connection;

    public function getConnection()
    {
        global $dsn, $options;
        try {
            $this->connection = new PDO($dsn, null, null, $options);
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

    public function getCategoriasServicio()
    {
        $conn = $this->conexion->getConnection();
        $sql = "SELECT * FROM categoria_servicio";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conexion->closeConnection();
        return $categorias;
    }

    public function crearCategoriaServicio($nombre, $descripcion)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "INSERT INTO categoria_servicio (nombre, descripcion) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nombre, $descripcion]);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en crearCategoriaServicio: " . $e->getMessage());
            return false;
        }
    }

    public function actualizarCategoriaServicio($id, $nombre, $descripcion)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "UPDATE categoria_servicio SET nombre = ?, descripcion = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nombre, $descripcion, $id]);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en actualizarCategoriaServicio: " . $e->getMessage());
            return false;
        }
    }

    public function eliminarCategoriaServicio($id)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "DELETE FROM categoria_servicio WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en eliminarCategoriaServicio: " . $e->getMessage());
            return false;
        }
    }

    public function getInfoContacto()
    {
        $conn = $this->conexion->getConnection();
        $sql = "SELECT * FROM info_contacto";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conexion->closeConnection();
        return $contactos;
    }

    public function crearInfoContacto($nombre, $telefono, $correo)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "INSERT INTO info_contacto (nombre, telefono, correo) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nombre, $telefono, $correo]);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en crearInfoContacto: " . $e->getMessage());
            return false;
        }
    }

    public function actualizarInfoContacto($id, $nombre, $telefono, $correo)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "UPDATE info_contacto SET nombre = ?, telefono = ?, correo = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nombre, $telefono, $correo, $id]);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en actualizarInfoContacto: " . $e->getMessage());
            return false;
        }
    }

    public function getHistoria()
    {
        $conn = $this->conexion->getConnection();
        $sql = "SELECT * FROM historia";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $historias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conexion->closeConnection();
        return $historias;
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
            $sql = "INSERT INTO pregunta_frecuente (pregunta, respuesta) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$pregunta, $respuesta]);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en crearPreguntaFrecuente: " . $e->getMessage());
            return false;
        }
    }

    public function actualizarPreguntaFrecuente($id, $pregunta, $respuesta)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "UPDATE pregunta_frecuente SET pregunta = ?, respuesta = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$pregunta, $respuesta, $id]);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en actualizarPreguntaFrecuente: " . $e->getMessage());
            return false;
        }
    }

    public function actualizarParcialPreguntaFrecuente($id, $pregunta = null, $respuesta = null)
    {
        try {
            $conn = $this->conexion->getConnection();
            $fields = [];
            $params = [];
            if ($pregunta !== null) {
                $fields[] = "pregunta = ?";
                $params[] = $pregunta;
            }
            if ($respuesta !== null) {
                $fields[] = "respuesta = ?";
                $params[] = $respuesta;
            }
            $params[] = $id;
            $sql = "UPDATE pregunta_frecuente SET " . implode(", ", $fields) . " WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en actualizarParcialPreguntaFrecuente: " . $e->getMessage());
            return false;
        }
    }

    public function eliminarPreguntaFrecuente($id)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "DELETE FROM pregunta_frecuente WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en eliminarPreguntaFrecuente: " . $e->getMessage());
            return false;
        }
    }

    public function getAllParcelas()
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
            $sql = "INSERT INTO parcela (tipo, lote, servicio_id) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$tipo, $lote, $servicio_id]);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en crearParcela: " . $e->getMessage());
            return false;
        }
    }

    public function actualizarParcela($id, $tipo, $lote, $servicio_id)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "UPDATE parcela SET tipo = ?, lote = ?, servicio_id = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$tipo, $lote, $servicio_id, $id]);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en actualizarParcela: " . $e->getMessage());
            return false;
        }
    }

    public function actualizarParcialParcela($id, $datos)
    {
        try {
            $conn = $this->conexion->getConnection();
            $fields = [];
            $params = [];
            foreach ($datos as $key => $value) {
                $fields[] = "$key = ?";
                $params[] = $value;
            }
            $params[] = $id;
            $sql = "UPDATE parcela SET " . implode(", ", $fields) . " WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en actualizarParcialParcela: " . $e->getMessage());
            return false;
        }
    }

    public function eliminarParcela($id)
    {
        try {
            $conn = $this->conexion->getConnection();
            $sql = "DELETE FROM parcela WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $this->conexion->closeConnection();
            return true;
        } catch (PDOException $e) {
            error_log("Error en eliminarParcela: " . $e->getMessage());
            return false;
        }
    }
}
?>