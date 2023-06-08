
<?php
include("../models/conexao.php");

$path = "../views/arquivos/";
$destino = $diretorio . "/" . $arquivo['name'];

$varIdPost = $_GET["bloginfo_codigo"];
$varIdImg = $_GET["blog_blogimgs_codigo"];
$varIdUsuario = $_GET["blog_usuario_codigo"];


mysqli_query($conexao, "DELETE FROM blog where blog_codigo = $varIdPost ");
mysqli_query($conexao, "DELETE FROM blog where blog_blogimgs_codigo = $varIdPost ");
mysqli_query($conexao, "DELETE FROM blog where blog_usuario_codigo = $varIdPost ");

unlink($path . $destino);




header("location:../"); //voltar pra index


?>
