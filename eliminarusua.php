<?php include('config.php'); ?>
<?php
$id = $_GET['id'];
// Eliminar el registro de la base de datos
$stmt = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario = :id");
$stmt->execute(['id' => $id]);

// Redirigir de vuelta a la lista de registros
//header('Location: mascotas.php');
echo "<script>alert('El usuario ha sido eliminado correctamente'); 
    window.location = 'usuario.php';
    </script>";
exit;
