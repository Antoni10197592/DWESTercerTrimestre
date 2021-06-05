<?php
class Database
{
    private $conexion;
    private $conectado;

    public function __construct()
    {
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

    public function get_persona_id($name) /*comprueba el ID del nombre que recibe */
    {

        $select = "SELECT * FROM Persona WHERE nombre LIKE '$name'";

        $resultado = $this->conexion->query($select);

        $row = $resultado->fetch_assoc();

        if ($row == null) {
            return false;
        } else {

            $idPersona = $row['ID'];

            return $idPersona;
        }
    }

    public function get_prestamos() /*obtiene los prestamos */
    {

        $sql = "SELECT Prestamos.ID_pedido, Prestamos.Tipo, Prestamos.Descripcion, Prestamos.Fecha, Persona.Nombre
        FROM Prestamos JOIN Persona ON Prestamos.ID_persona = Persona.ID";

        $consulta = $this->conexion->query($sql);
        $resultado = $consulta->fetch_all();

        return $resultado;
    }

    public function get_amigos()
    {

        $sql = "SELECT Nombre FROM Persona";
        $datos = $this->conexion->query($sql);

        $resultado = $datos->fetch_all();

        return $resultado;
    }
    public function get_prestamos_amigos(){
        $db = new Database();
        $persona = $db->get_persona_id($_GET["Nombre"]);
    
        $sql = "SELECT Prestamos.ID_pedido, Prestamos.Tipo, Prestamos.Descripcion, Prestamos.Fecha, Persona.Nombre
        FROM Prestamos JOIN Persona ON Prestamos.ID_persona = Persona.ID WHERE Persona.ID=$persona";
    
    
        $consulta = $db->conexion->query($sql);
        $resultado = $consulta->fetch_all();
    
        return $resultado;
    }

<<<<<<< HEAD
    function borrar_prestamo($id){

        $sql="DELETE FROM Prestamos WHERE ID_pedido=$id";
        $consulta=$this->conexion->query($sql);
        
    }

    function editar_pedido($id, $tipo, $fecha, $titulo){
		
		$sql="UPDATE Prestamos 
			SET Tipo='$tipo' , Fecha='$fecha', Descripcion='$titulo'
			WHERE ID_pedido=$id";
		$sentencia =$this->conexion->query($sql);	

	}

=======
    function borrar(){
        $db=new Database();

        $sql="DELETE FROM Prestamos WHERE ID_pedido=$id";
        $consulta=$db->conexion->query($sql);
        
    }

>>>>>>> 46b774e343dea72642bd57b5cca6768e8ec5128d
    public function insertarPrestamo($name, $type, $title, $date)
    {

        /*sentencia sql para añadir prestamos a la tabla */
        $sql = "INSERT INTO Prestamos (Tipo, Descripcion, Fecha, ID_persona)
        VALUES('$type', '$title', '$date', $name)";

        $datos = $this->conexion->query($sql);

        $id = $this->get_persona_id($name);

        if ($id == false) {

            /*añade el nuevo nombre a la tabla persona */
            $insertPersona = "INSERT INTO Persona (Nombre) VALUES ('$name')";
            $insertPersonasql = $this->conexion->query($insertPersona);

            /*recuperamos el nuevo id */
            $id = $this->get_persona_id($name);

            /*insertamos el prestamo */
            $insertPrestamo = "INSERT INTO Prestamos (Tipo, Descripcion, Fecha, ID_persona)
                VALUES ('$type', '$title', '$date', $id)";
            $insertPrestamosql = $this->conexion->query($insertPrestamo);
        } else {

            $insertPrestamo = "INSERT INTO Prestamos (Tipo, Descripcion, Fecha, ID_persona)
                VALUES ('$type', '$title', '$date', $id)";
            $insertPrestamosql = $this->conexion->query($insertPrestamo);

        }
    }

}
