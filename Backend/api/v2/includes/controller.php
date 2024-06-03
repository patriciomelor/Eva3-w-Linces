<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/auth.php';

use OpenApi\Annotations as OA;

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

/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="1.0.0"
 * )
 */
class Controlador
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    /**
     * @OA\Get(
     *     path="/api/v2/categorias",
     *     summary="Obtiene todas las categorías de servicio",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */
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

    /**
     * @OA\Post(
     *     path="/api/v2/categorias",
     *     summary="Crea una nueva categoría de servicio",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nombre", type="string"),
     *             @OA\Property(property="descripcion", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categoría creada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Put(
     *     path="/api/v2/categorias/{id}",
     *     summary="Actualiza una categoría de servicio existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nombre", type="string"),
     *             @OA\Property(property="descripcion", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categoría actualizada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/api/v2/categorias/{id}",
     *     summary="Elimina una categoría de servicio",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categoría eliminada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/api/v2/contactos",
     *     summary="Obtiene toda la información de contacto",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */
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

    /**
     * @OA\Post(
     *     path="/api/v2/contactos",
     *     summary="Crea una nueva información de contacto",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nombre", type="string"),
     *             @OA\Property(property="telefono", type="string"),
     *             @OA\Property(property="correo", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Información de contacto creada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Put(
     *     path="/api/v2/contactos/{id}",
     *     summary="Actualiza una información de contacto existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nombre", type="string"),
     *             @OA\Property(property="telefono", type="string"),
     *             @OA\Property(property="correo", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Información de contacto actualizada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/api/v2/historia",
     *     summary="Obtiene toda la historia",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/api/v2/preguntas-frecuentes",
     *     summary="Obtiene todas las preguntas frecuentes",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */
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

    /**
     * @OA\Post(
     *     path="/api/v2/preguntas-frecuentes",
     *     summary="Crea una nueva pregunta frecuente",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="pregunta", type="string"),
     *             @OA\Property(property="respuesta", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pregunta frecuente creada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Put(
     *     path="/api/v2/preguntas-frecuentes/{id}",
     *     summary="Actualiza una pregunta frecuente existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="pregunta", type="string"),
     *             @OA\Property(property="respuesta", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pregunta frecuente actualizada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Patch(
     *     path="/api/v2/preguntas-frecuentes/{id}",
     *     summary="Actualiza parcialmente una pregunta frecuente existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="pregunta", type="string"),
     *             @OA\Property(property="respuesta", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pregunta frecuente actualizada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/api/v2/preguntas-frecuentes/{id}",
     *     summary="Elimina una pregunta frecuente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pregunta frecuente eliminada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/api/v2/parcelas",
     *     summary="Obtiene todas las parcelas",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */
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

    /**
     * @OA\Post(
     *     path="/api/v2/parcelas",
     *     summary="Crea una nueva parcela",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="tipo", type="string"),
     *             @OA\Property(property="lote", type="string"),
     *             @OA\Property(property="servicio_id", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Parcela creada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Put(
     *     path="/api/v2/parcelas/{id}",
     *     summary="Actualiza una parcela existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="tipo", type="string"),
     *             @OA\Property(property="lote", type="string"),
     *             @OA\Property(property="servicio_id", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Parcela actualizada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Patch(
     *     path="/api/v2/parcelas/{id}",
     *     summary="Actualiza parcialmente una parcela existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="tipo", type="string"),
     *             @OA\Property(property="lote", type="string"),
     *             @OA\Property(property="servicio_id", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Parcela actualizada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/api/v2/parcelas/{id}",
     *     summary="Elimina una parcela",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Parcela eliminada exitosamente"
     *     )
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/api/v2/nosotros",
     *     summary="Obtiene toda la información sobre nosotros",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */
    public function getNosotros()
    {
        $conn = $this->conexion->getConnection();
        $sql = "SELECT * FROM about_us";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->conexion->closeConnection();
        return $result;
    }

    /**
     * @OA\Delete(
     *     path="/api/v2/nosotros/{id}",
     *     summary="Elimina información sobre nosotros",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Información sobre nosotros eliminada exitosamente"
     *     )
     * )
     */
    public function eliminarNosotros($id)
    {
        $conn = $this->conexion->getConnection();
        $sql = "DELETE FROM about_us WHERE id = :id";
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

    /**
     * @OA\Post(
     *     path="/api/v2/nosotros",
     *     summary="Crea nueva información sobre nosotros",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="titulo", type="string"),
     *             @OA\Property(property="descripcion", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Información sobre nosotros creada exitosamente"
     *     )
     * )
     */
    public function crearNosotros($titulo, $descripcion)
    {
        $conn = $this->conexion->getConnection();
        $sql = "INSERT INTO about_us (titulo, descripcion) VALUES (:titulo, :descripcion)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);

        if ($stmt->execute()) {
            $this->conexion->closeConnection();
            return true;
        } else {
            $this->conexion->closeConnection();
            return false;
        }
    }
}
?>
