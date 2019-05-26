<?php 
include("includes/layout/header.php");
include("conn/clases.php");


$db = new db();
$sql = "SELECT * FROM `usuarios`";
$result = $db->db_sql($sql);


?>

<style>
th, td {
    border: 1px solid #acacac;
    padding: 10px;
}
</style>

<div class="container" >
<br> <br>
<h1>Administración de Usuarios</h1>
<br> <br>
<table>
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Estado</th>
        <th>Acceso</th>
        <th>Último Acceso</th>
        <th>Activar/Desactivar</th>
    </tr>

<?php 
$count = 0;
while($row = $result->fetch_assoc()): 
    $count++;
?>
<tr>
    <td><?php echo $count; ?></td>
    <td><?php echo $row['nombre1'] . " "
    . (isset($row['nombre2']) ? $row['nombre2']: "" ) . " "
    . (isset($row['apellido1']) ? $row['apellido1']: "" ) . " "
    . (isset($row['apellido2']) ? $row['apellido2']: "" ) . " "
    ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['rol']; ?></td>
    <td><?php echo ($row['estado']== 1 ? "Activo" : "Inactivo"); ?></td>
    <td><?php echo ($row['acceso']== 1 ? "Si" : "No" ); ?></td>
    <td><?php echo $row['fecha_acceso']; ?></td>
    <td><button class="btn btn-danger changeUser" data-email="<?php echo $row['email']; ?>" data-state="<?php echo $row['estado'];?>">
        <?php echo ($row['estado']== 1 ? "Desactivar" : "Activar"); ?>
    </button></td>
    </tr>
<?php endwhile;?>
</table>


<script>

function ChangeUser(){
    $(".changeUser").click(function() {
        var email = $(this).data('email');
        var state = $(this).data('state');
        ChangeStUser(email, state)
    });
};

function ChangeStUser(user, state){
    $.ajax({
        type: 'POST',    
        url:'/cambiarestadousuario.php',
        data:'user='+ user+'&state='+ state,
        success: function(msg){
            location.reload();
        },
        error: function(msg){
            alert('Ocurrió un error ' + msg);
            console.log(msg);
        }
    });
};
ChangeUser();
    
</script>


</div>