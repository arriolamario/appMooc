<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaDatos/conexion.php';

class Modulo{
    private $id;
    private $idCurso;
    private $nombre;
    private $estado = 1;
    private $fecha;
    private $tabla = "modulo";

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
                $this->idCurso = intval($fila["idCurso"]);
                $this->nombre = $fila["nombre"];
                $this->estado = intval($fila["estado"]);
                $this->fecha = $fila["fecha"];
            }
        }
    } 
    
    public function __construct3($idCurso, $nombre, $fecha)
    {
        $this->nombre = $nombre;
        $this->idCurso = $idCurso;
        $this->fecha = $fecha;
    }

    public function mostrarDatos()
    {
        if($this->id){
            echo "id $this->id<br>";    
        }
        echo "nombre $this->nombre<br>";
        echo "fecha $this->fecha<br>";
        echo "estado $this->estado<br>";
        echo "idCurso $this->idCurso<br>";
    }

    public function grabar()
    {
        $retorno;
        $respuesta = insert($this->tabla, $this->getArray());
        if($respuesta["success"]){
            $this->id = $respuesta["retorno"];
            $retorno = true;
        }else {
            echo $respuesta["retorno"]."<br>";
            $retorno = false;
        }

        return $retorno;
    }

    private function getArray()
    {
        return array("nombre" => "'$this->nombre'",
                     "fecha" => "'$this->fecha'",
                     "idCurso" => "'$this->idCurso'",
                     "estado" => $this->estado
                    );
    }

    public function eliminar(){
        $respuesta = delete($this->tabla, array("columna" => "id", "valor" => $this->id));
        return $respuesta["success"];
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
        // -- idCurso
    public function getIdCurso(){return $this->idCurso;}
    public function setIdCurso($value){$this->idCurso = $value;}
        // -- fecha
    public function getFecha(){return $this->fecha;}
    public function setFecha($value){$this->fecha = $value;}
        // -- estado
    public function getEstado(){return $this->estado;}
    public function setEstado($value){$this->estado = $value;}
        // -- id
    public function getId(){return $this->id;}
    public function setId($value){$this->id = $value;}




}

    $modulo = new Modulo(1);
    // echo "grabamos<br>";
    // if($modulo->grabar()){
    //     echo "se grabo correctamente<br>";
    // }else{
    //     echo "No se grabo correctamente<br>";
    // }
    
    $modulo->mostrarDatos();

    // $alumno->setDocumento("otro documento");
    // $alumno->setEstado(0);

    // // echo "actualizamos<br>";
    // if($alumno->actualizar()){
    //     echo "se actualizo correctamente<br>";
    // }else{
    //     echo "no se actualizo correctamente<br>";
    // }

    // echo "creamos una instancia nueva de alumno guardada en la base<br>";
    // $alumno2 = new Alumno($alumno->getId());

    // $alumno2->mostrarDatos();

    // echo "eliminamos<br>";

    // if($alumno->eliminar()){
    //     echo "se elimino correctamente<br>";
    // }else{
    //     echo "no se elimino correctamente<br>";
    // }
?>