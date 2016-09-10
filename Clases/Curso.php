<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaDatos/conexion.php';

class Curso{
    private $id;
    private $nombre;
    private $tipo;
    private $precio;
    private $fechaInicio;
    private $fechaFin;
    private $detalle;
    private $estado;
    private $cupo;
    public $Pofesores = array();
    public $Alumnos = array();
    public $Modulos = array();
    private $tabla = "cursos";
    

    function __construct()
    { 
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
    } 
    
    function __construct1($id)
    { 
        $resultado = select($this->tabla, array("columna" => "id", "valor" => $id));
        if($resultado){
            while($fila = mysqli_fetch_assoc($resultado)){
                $this->id = intval($fila["id"]);
                $this->nombre = $fila["nombre"];
                $this->tipo = $fila["tipo"];
                $this->precio = $fila["precio"];
                $this->fechaInicio = $fila["fechaInicio"];
                $this->fechaFin = $fila["fechaFin"];
                $this->estado = intval($fila["estado"]);
                $this->detalle = $fila["detalle"];
                $this->cupo = $fila["cupo"];
            }
        }

        // $resultado = select("dicta", array("columna" => "idcurso", "valor" => $this->id));
        // if($resultado){
        //     $cant = 0;
        //     while($fila = mysqli_fetch_assoc($resultado)){
        //         $profesor = new Profesor($fila["idProfesor"]);
        //         $Pofesores[$cant] = $profesor;
        //         $cant = $cant + 1;
        //     }
        // }
        // $resultado = select("cursado", array("columna" => "idcurso", "valor" => $this->id));
        // if($resultado){
        //     $cant = 0;
        //     while($fila = mysqli_fetch_assoc($resultado)){
        //         $alumno = new Alumno($fila["idProfesor"]);
        //         $Alumnos[$cant] = $alumno;
        //         $cant = $cant + 1;
        //     }
        // }
    } 
    
    //constructor para curso preferencial
    public function __construct8($nombre, $tipo, $precio, $fechaInicio, $fechaFin, $detalle, $estado, $cupo)
    {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->detalle = $detalle;
        $this->estado = $estado;
        $this->cupo = $cupo;
    }

    //constructor para curso masivo
    public function __construct4($nombre, $tipo, $detalle, $estado)
    {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->detalle = $detalle;
        $this->estado = $estado;
    }

    public function grabar()
    {
        $retorno;
        $respuesta = insert($this->tabla, $this->getArray());
        if($respuesta["success"]){
            $this->id = $respuesta["retorno"];
            $retorno = true;
        }else {
            // echo $respuesta["retorno"];
            $retorno = false;
        }

        return $retorno;
    }

    private function getArray()
    {
        return array("nombre" => "'$this->nombre'",
                     "tipo" => "'$this->tipo'",
                     "precio" => "'$this->precio'",
                     "fechaInicio" => "'$this->fechaInicio'",
                     "fechaFin" => "'$this->fechaFin'",
                     "estado" => $this->estado,
                     "detalle" => "'$this->detalle'",
                     "cupo" => "'$this->cupo'"
                    );
    }

    // private $nombre;
    // private $tipo;
    // private $precio;
    // private $fechaInicio;
    // private $fechaFin;
    // private $detalle;
    // private $estado;
    // private $cupo;

    public function eliminar(){
        $respuesta = delete($this->tabla, array("columna" => "id", "valor" => $this->id));
        $retorno;
        if($respuesta["success"]){
            $retorno = true;
        }else{
            $retorno = false;
        }
        return $retorno;
    }


     
    public function actualizar(){
    // update($table, $datos, $where)
        $retorno = update($this->tabla, $this->getArray(), array("id" => $this->id));
        if($retorno["success"]){
            $retorno = true;
        }else{
            // echo $retorno["retorno"];
            $retorno = false;
        }
        return $retorno;
    }

        // -- nombre
    public function getNombre(){return $this->nombre;}
    public function setNombre($value){$this->nombre = $value;}
        // -- tipo
    public function getTipo(){return $this->tipo;}
    public function setTipo($value){$this->tipo = $value;}
        // -- precio
    public function getPrecio(){return $this->precio;}
    public function setPrecio($value){$this->precio = $value;}
        // -- fechaInicio
    public function getFechaInicio(){return $this->fechaInicio;}
    public function setFechaInicio($value){$this->fechaInicio = $value;}
        // -- fechaFin
    public function getFechaFin(){return $this->fechaFin;}
    public function setFechaFin($value){$this->fechaFin = $value;}
        // -- id
    public function getId(){return $this->id;}
    public function setId($value){$this->id = $value;}
        // -- detalle
    public function getDetalle(){return $this->detalle;}
    public function setDetalle($value){$this->detalle = $value;}
        // -- estado
    public function getEstado(){return $this->estado;}
    public function setEstado($value){$this->estado = $value;}

}


// $curso = new Curso("discreta", "matematicas", "500", "2016/12/31", "2017-12-31", "detalle de la materia", 1, "20");
$curso = new Curso("asd", "prueba", "test", 0);

if($curso->grabar()){
    echo "se actualizo correctamete";
}
else{
    echo "no se actualizo correctamente";
}
?>