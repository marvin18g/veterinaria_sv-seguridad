<?php
include('config.php');
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$status = $_POST['status'];
$id_roles = $_POST['id_roles'];

$token = md5($_POST['username']. "+" . $_POST["email"]);




$stmt = $pdo->prepare('INSERT INTO usuarios (token, username, password, email, telefono, status, id_roles) VALUES (:token, :username, :password, :email, :telefono, :status, :id_roles)');
if ($stmt->execute(array(
    ':token' => $token,
    ':username' => $username,
    ':password' => $password,
    ':email' => $email,
    ':telefono' => $telefono,
    ':status' => $status,
    ':id_roles' => $id_roles,


 
 
 
))) {

} else {
    echo "<script>alert('Error al registrar la mascota');</script>";
}


$conn = null;
