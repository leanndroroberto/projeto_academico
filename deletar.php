<?php

if (isset($_GET["id"]) ) {
$id = $_GET["id"];

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "usuarios_db";

$conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);

$sql = "DELETE FROM usuarios WHERE id=$id";
$conexao->query($sql);
}

header("location: /portfolio_crud/index.php");
exit;

?>