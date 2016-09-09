<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaDatos/conexion.php';

class Administrador{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $tipoUsuario = "A";
    private $estado = 1;
    private $tabla = "usuarios";

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
                $this->id = $fila["id"];
                $this->nombre = $fila["nombre"];
                $this->apellido = $fila["apellido"];
                $this->email = $fila["email"];
                $this->password = $fila["password"];
                $this->tipoUsuario = $fila["tipoUsuario"];
                $this->estado = $fila["estado"];
            }
        }
    } 
    
    public function __construct4($nombre, $apellido, $email, $password)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->password = $password;
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

    // public function getUsuariosLogin($email = -1, $password = -1){
    //     $query = "SELECT * FROM $this->tabla";
    //     if ($email != -1 && $password != -1) {
    //         $query = "$query WHERE email = '$email' AND password = '$password';"
    //     }else{
    //         $query = "$query;";
    //     }
    //     $conn = getConexion();
    //     mysqli_begin_transaction($conn);
    //     $retorno;
    //     if()
    // }
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





}

    // $adm = new Administrador("mario","apellido","aa@mail.com","pwd");
    // $adm->grabar();
    // $adm->mostrarDatos(); 
    // $adm->eliminar();

    $adm = new Administrador(19);
    $adm->mostrarDatos();
    $adm->setNombre("lautaroActualizando");
    $adm->setApellido("arriolaActualizando");
    $adm->actualizar();
    $adm->mostrarDatos();

?>