
<?php
class database{
    $conexion
    $conectado
    public function __construct(){
        $this->connect();
    }
    private function connect()
    {
        $this->conexion = new mysqli('localhost', 'antoni', 'alumno', 'prestamos');

        if ($this->conexion->connect_errno) {
            $this->conectado = false;
        } else {
            $this->conectado = true;
        }

    }
    function get_persona_id($name)/*comprueba el ID del nombre que recibe */{
       
        $select = "SELECT * FROM Persona WHERE nombre LIKE '$name'";

        $resultado = $this->conexion->query($select);
        
        $row = $resultado->fecth_all();


        if ($row == null) {
            return false;
        }
        else {

            $idPersona = $row['ID'];

            return $idPersona;
        }
    }

    function get_prestamos()/*obtiene los prestamos */{
       
        $sql = "SELECT Prestamos.ID_pedido, Prestamos.Tipo, Prestamos.Descripcion, Prestamos.Fecha, Persona.Nombre
        FROM Prestamos JOIN Persona ON Prestamos.ID_persona = Persona.ID";

      
        $consulta = $this->conexion->query($sql);
        $resultado = $consulta->fecth_all();
      
        return $resultado;
    }

    function get_amigos(){

        $sql = "SELECT Nombre FROM Persona";
        $datos = $this->conexion->query($sql);

        $resultado = $datos->fecth_all();

        return $resultado;
    }
    
    function insertarPrestamo($name, $type, $title, $date ){

        /*sentencia sql para añadir prestamos a la tabla */
        $sql="INSERT INTO Prestamos (Tipo, Descripcion, Fecha, ID_persona)
        VALUES('$type', '$title', '$date', $name)";

        $datos = $this->conexion->query($sql);

        $id = get_persona_id($name);
    
        if ($id == false) {
    
            /*añade el nuevo nombre a la tabla persona */
            $insertPersona = "INSERT INTO Persona (Nombre) VALUES ('$name')";
            $insertPersonasql = $this->conexion->query($insertPersona);
        
            /*recuperamos el nuevo id */
            $id = get_persona_id($name);
    
            /*insertamos el prestamo */
            $insertPrestamo = "INSERT INTO Prestamos (Tipo, Descripcion, Fecha, ID_persona)
                VALUES ('$type', '$title', '$date', $id)";
            $insertPrestamosql = $this->conexion->query($insertPrestamo;
        }
       else {
    
            $insertPrestamo = "INSERT INTO Prestamos (Tipo, Descripcion, Fecha, ID_persona)
                VALUES ('$type', '$title', '$date', $id)";
            $insertPrestamosql = $this->conexion->query($insertPrestamo;
    
        }
    }

}


?>