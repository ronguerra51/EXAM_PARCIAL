<?php
require "./modelos/conexion.php";

class Persona extends Conexion{
    public $ran_id;
    public $ran_nombre;
    public $ran_menu;
    public $ran_fechayhora;
    public $ran_tiempo;
    public $ran_nombresirvio;


    public function __construct($args = [])
    {
        $this->ran_id = $args['ran_id'] ?? null;
        $this->ran_nombre = $args['ran_nombre'] ?? '';
        $this->ran_menu = $args['ran_menu'] ?? '';
        $this->ran_fechayhora= $args['ran_fechayhora'] ?? 0;
        $this->ran_tiempo = $args['ran_tiempo'] ?? 0;
        $this->ran_nombresirvio = $args['ran_nombresirvio'] ?? '';

    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into rancho (ran_nombre, ran_menu, ran_fechayhora,
         ran_tiempo, ran_nombresirvio) values ('$this->ran_nombre',
         '$this->ran_menu', '$this->ran_fechayhora', '$this->ran_tiempo', '$this->ran_nombresirvio')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }


    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM rancho where ran_situacion = 1 ";

        if($this->ran_nombre != ''){
            $sql .= " AND ran_nombre like '%$this->ran_nombre%' ";
        }
        if($this->ran_menu != ''){
            $sql .= " AND ran_menu = $this->ran_menu ";
        }

        if($this->ran_fechayhora != ''){
            $sql .= " AND ran_fechayhora = $this->ran_fechayhora ";
        }

        if($this->ran_tiempo != ''){
            $sql .= " AND ran_tiempo = $this->ran_tiempo ";
        }

        if($this->ran_nombresirvio != ''){
            $sql .= " AND ran_nombresirvio = $this->ran_nombresirvio ";
        }


        $resultado = self::servir($sql);
        return $resultado;
    }
}