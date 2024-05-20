<?php
class Conexion {
    protected static $conexion = null;

    protected static function conectar() : PDO {
        try {
            self::$conexion = new PDO("informix:host=host.docker.internal; service=9088;database=tienda; server=informix; protocol=onsoctcp;EnableScrollableCursors=1", "informix", "in4mix");
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa";
        } catch (PDOException $e) {
            echo "No se pudo conectar a la base de datos";
            echo "<br>";
            echo $e->getMessage();
            self::$conexion = null;
            exit;
        }

        return self::$conexion;
    }

    public function ejecutar($sql) {
        $conexion = self::conectar();
        $sentencia = $conexion->prepare($sql);
        $resultado = $sentencia->execute();
        $idInsertado = $conexion->lastInsertId();
        self::$conexion = null;

        return [
            "resultado" => $resultado,
            "id" => $idInsertado
        ];
    }

    public function servir($sql) {
        $conexion = self::conectar();
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();
        $data = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $datos = [];
        foreach ($data as $k => $v) {
            $datos[] = array_change_key_case($v, CASE_LOWER);
        }
        self::$conexion = null;

        return $datos;
    }
}
