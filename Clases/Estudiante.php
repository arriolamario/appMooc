<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaDatos/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Usuario.php';
class Estudiante extends Usuario{
    private $idRol = 3; 
    private $tabla = "usuario";
    //Estudiante
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
            }
        }
    } 
    
    public function __construct8($nombre, $apellido, $email, $password, $provincia, $localidad, $documento, $fechaNacimiento)
    {
        $this->Usuario($nombre, $apellido, $email, $password, $provincia, $localidad, $documento, $fechaNacimiento);
    }

    public function mostrarDatos()
    {
        if($this->id){
            echo "id $this->id<br>";    
        }
        echo "nombre $this->nombre<br>";
        echo "apellido $this->apellido<br>";
        echo "email $this->email<br>";
        echo "password $this->password<br>";
        echo "tipoUsuario $this->tipoUsuario<br>";
        echo "estado $this->estado<br>";
        echo "documento $this->documento<br>";
    }

    public function grabar()
    {
        $retorno;
        $respuesta = insert($this->getTabla(), $this->getArray());
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
        $nombre = $this->getNombre();
        $apellido = $this->getApellido();
        $email = $this->getEmail();
        $password = $this->getPassword();
        $estado = $this->getEstado();
        $provincia = $this->getProvincia();
        $localidad = $this->getLocalidad();
        $documento = $this->getDocumento();
        $fechaNacimiento = $this->getFechaNacimiento();
        return array("nombre" => "'$nombre'",
                     "apellido" => "'$apellido'",
                     "email" => "'$email'",
                     "password" => "'$password'",
                     "fechaNacimiento" => "'$fechaNacimiento'",
                     "estado" => $estado,
                     "documento" => "'$documento'",
                     "provincia" => "'$provincia'",
                     "localidad" => "'$localidad'",
                     "idRol" => "$this->idRol"
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

//    $est = new Estudiante('nombre', 'apellido', 'email', '$password', '$provincia', '$localidad', '$documento', '$fechaNacimiento');
//    $est->grabar();
?>