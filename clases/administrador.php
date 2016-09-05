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

        $query = "INSERT INTO $this->tabla (nombre, apellido, email, password, tipousuario, estado) VALUES ('$this->nombre', '$this->apellido', '$this->email', '$this->password', '$this->tipoUsuario',$this->estado);";
        $conn = getConexion();
        // echo "query: $query <br>";
        mysqli_begin_transaction($conn);
        if(mysqli_query($conn, $query)){
            // echo 'se agrego correctamente <br>';
            $this->id = mysqli_insert_id ($conn);
            mysqli_commit($conn);
        }
        else{
            // echo 'error <br>';
            mysqli_rollback($conn);
        }
        closeConexion();
    }

    public function borrar($id){
        echo "vamos a borrar el id $id";

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
        }
        else{
            echo "error en la consulta";
        }
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
        if($id) return;
        $query = "UPDATE $this->tabla SET (
            nombre = $this->nombre,
            apellido = $this->apellido,
            email = $this->email,
            password = $this->password,
            tipoUsuario = $this->tipousuario)
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
        }else{
            echo 'esta mal la '
        }
    }




}
?>