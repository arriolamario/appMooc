<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaDatos/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Usuario.php';

class Profesor extends Usuario{
    private $idRol = 2;
    private $idCreador;

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
        $parametros["id"] = $id;
        $resultado = select($this->getTabla(), $parametros);
        if($resultado){
            while($fila = mysqli_fetch_assoc($resultado)){
                $this->setId(intval($fila["id"]));
                $this->setNombre($fila["nombre"]);
                $this->setApellido($fila["apellido"]);
                $this->setEmail($fila["email"]);
                $this->setPassword($fila["password"]);
                $this->setEstado(intval($fila["estado"]));
                $this->setDocumento($fila["documento"]);
                $this->setProvincia($fila["provincia"]);
                $this->setLocalidad($fila["localidad"]);
                $this->setFechaNacimiento($fila["fechaNacimiento"]);
                $this->idCreador = $fila["idCreador"];
            }
        }
    } 
    
    public function __construct9($nombre, $apellido, $email, $password, $provincia, $localidad, $documento, $fechaNacimiento, $idCreador)
    {
        $this->idCreador = $idCreador;
        $this->Usuario($nombre, $apellido, $email, $password, $provincia, $localidad, $documento, $fechaNacimiento);
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
                     "apellido" => "'$this->apellido'",
                     "email" => "'$this->email'",
                     "password" => "'$this->password'",
                     "tipousuario" => "'$this->tipoUsuario'",
                     "estado" => $this->estado,
                     "documento" => "'$this->documento'"
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
    // -- idRol
    public function getIdRol(){return $this->idRol;}
    public function setIdRol($value){$this->idRol = $value;}
  
}

     
?>