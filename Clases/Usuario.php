<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaDatos/conexion.php';

class Usuario{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $estado = 1;
    private $provincia;
    private $localidad;
    private $documento;
    private $fechaNacimiento;
    private $tabla = "usuario";

    function __construct()
    { 
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
    } 
    
    public function Usuario($nombre, $apellido, $email, $password, $provincia, $localidad, $documento, $fechaNacimiento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->password = $password;
        $this->documento = $documento;
        $this->provincia = $provincia;
        $this->localidad = $localidad;
        $this->fechaNacimiento = $fechaNacimiento;

    }

    public function __construct2($email, $password){
        $parametros["email"] = "'$email'";
        $parametros["password"] = "'$password'";

        $result = select($this->tabla, $parametros); 
    }

        // -- nombre
    public function getNombre(){return $this->nombre;}
    public function setNombre($value){$this->nombre = $value;}
        // -- apellido
    public function getApellido(){return $this->apellido;}
    public function setApellido($value){$this->apellido = $value;}
        // -- email
    public function getEmail(){return $this->email;}
    public function setEmail($value){$this->email = $value;}
        // -- password
    public function getPassword(){return $this->password;}
    public function setPassword($value){$this->password = $value;}
        // -- estado
    public function getEstado(){return $this->estado;}
    public function setEstado($value){$this->estado = $value;}
        // -- documento
    public function getDocumento(){return $this->documento;}
    public function setDocumento($value){$this->documento = $value;}
        // -- id
    public function getId(){return $this->id;}
    public function setId($value){$this->id = $value;}
        // -- provincia
    public function getProvincia(){return $this->provincia;}
    public function setProvincia($value){$this->provincia = $value;}
        // -- localidad
    public function getLocalidad(){return $this->localidad;}
    public function setLocalidad($value){$this->localidad = $value;}
        // -- fechaNacimiento
    public function getFechaNacimiento(){return $this->fechaNacimiento;}
    public function setFechaNacimiento($value){$this->fechaNacimiento = $value;}
            // -- tabla
    public function getTabla(){return $this->tabla;}
    public function setTabla($value){$this->tabla = $value;}



}
?>