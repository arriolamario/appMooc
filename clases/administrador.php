<?php
include_once 'conexion.php';

class Administrador{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $tipoUsuario = "A";
    private $estado = 1;
    private $tabla = "usuarios";

    public function __construct($nombre, $apellido, $email, $password){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->password = $password;
    }

    public function mostrarDatos(){
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

    public function insertar(){
        // echo 'vamos a insertar <br>';
        $retorno;
        $query = "INSERT INTO $this->tabla (nombre, apellido, email, password, tipousuario, estado) VALUES ('$this->nombre', '$this->apellido', '$this->email', '$this->password', '$this->tipoUsuario',$this->estado);";
        $conn = getConexion();
        // echo "query: $query <br>";
        mysqli_begin_transaction($conn);
        if(mysqli_query($conn, $query)){
            // echo 'se agrego correctamente <br>';
            $this->id = mysqli_insert_id ($conn);
            mysqli_commit($conn);
            $retorno = true;
        }
        else{
            // echo 'error <br>';
            $msg = mysqli_error($conn);
            $nro = mysqli_errno($conn);
            mysqli_rollback($conn);
            $retorno = "Error numero $nro mensaje $msg"; 
        }
        closeConexion();
        return $retorno;
    }

    public function borrar($id){
        echo "vamos a borrar el id $id";
        $retorno;
        $query = "DELETE FROM $this->tabla WHERE id = '$id'";
        echo "query $query";
        $conn = getConexion();
        mysqli_begin_transaction($conn);
        if(mysqli_query($conn, $query)){
            if (mysqli_affected_rows($conn)>0) {
                echo "se borro correctamente";
            }
            else{
                echo "No se encontro";
            }
            mysqli_commit($conn);
            $retorno = true;
        }
        else{
            // echo "error en la consulta";
            $msg = mysqli_error($conn);
            $nro = mysqli_errno($conn);
            mysqli_rollback($conn);
            $retorno = "Error numero $nro mensaje $msg";
        }
        closeConexion();
        return $retorno;
    }

    public function actualizar(){
        echo 'vamos a actualizar <br>';
        // -- id
        // -- nombre
        // -- apellido
        // -- email
        // -- password
        // -- documento
        // -- tipoUsuario
        // -- estado
        $retorno;
        $query = "UPDATE $this->tabla SET 
            nombre = '$this->nombre',
            apellido = '$this->apellido',
            email = '$this->email',
            password = '$this->password',
            tipoUsuario = '$this->tipoUsuario',
            estado = '$this->estado'
            WHERE id = $this->id;";
        echo "query $query <br>";
        $conn = getConexion();
        mysqli_begin_transaction($conn);
        if(mysqli_query($conn, $query)){
            if(mysqli_affected_rows($conn) > 0){
                echo 'se actualizo correctamente <br>';
            }else{
                echo 'no se actualizo <br>';
            }
            mysqli_commit($conn);
            $retorno = true;
        }else{
            // echo "error en la consulta";
            $msg = mysqli_error($conn);
            $nro = mysqli_errno($conn);
            mysqli_rollback($conn);
            $retorno = "Error numero $nro mensaje $msg";
        }
        closeConextion();
        return $retorno;
    }

    public function getUsuariosLogin($email = -1, $password = -1){
        $query = "SELECT * FROM $this->tabla";
        if ($email != -1 && $password != -1) {
            $query = "$query WHERE email = '$email' AND password = '$password';"
        }else{
            $query = "$query;";
        }
        $conn = getConexion();
        mysqli_begin_transaction($conn);
        $retorno;
        if()
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





}
?>