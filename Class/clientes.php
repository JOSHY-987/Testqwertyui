<?php
class Clientes
{
    private $DB;

    function __construct($conn)
    {
        $this -> DB = $conn;
    }

    public function ListarClientes($consulta)
    {
        $establecer = $this -> DB -> prepare($consulta);
        $establecer -> execute() > 0;
         
        while($columna = $establecer -> fetch(PDO::FETCH_ASSOC))
        {
            ?> 
            <tr>
            <td><?php echo $columna['Id']?></td>
            <td><?php echo $columna['Nombre']?></td>
            <td><?php echo $columna['Direccion']?></td>
            <td><?php echo $columna['Telefono']?></td>
            <td><?php echo $columna['Dui']?></td>
            <td>
                <a href="modificarcliente.php?ModId=<?php echo $columna['Id']?>" class="btn btn-warning">
                    Modificar
                </a>
            </td>
            <td>
                <a href="eliminarclientes.php?ElimId=<?php echo $columna['Id']?>" class="btn btn-danger">
                    Eliminar
                </a>
            </td>
        </tr>
            
        <?php
        } 
    }

    public function Actualizar($Id, $Nombre, $Direccion, $Telefono, $Dui)
    {
        try
        {
            $establecer = $this -> DB -> prepare("UPDATE clientes SET nombre=:nombre,
            direccion=:direccion, telefono=:telefono, dui=:dui WHERE id=:id");
            $establecer->bindParam(":nombre", $Nombre);
            $establecer->bindParam(":direccion", $Direccion);
            $establecer->bindParam(":telefono", $Telefono);
            $establecer->bindParam(":dui", $Dui);
            $establecer->bindParam(":id", $Id);
            $establecer->execute();

            return true;
        }
        catch(PDOException $Exc)
        {
            echo $Exc->getMessage();
            return false;
        }
    }

    public function Eliminar($Id)
    {
        try
        {
            $establecer = $this -> DB -> prepare("DELETE FROM clientes WHERE id=:id");
            $establecer->bindParam(":id", $Id);
            $establecer->execute();

            return true;
        }
        catch(PDOException $Exc)
        {
            echo $Exc->getMessage();
            return false;
        }
    }
}
?>