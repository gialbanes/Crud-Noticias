<?php
include("../models/conexao.php");

$varBlogCodigo = $_POST["bloginfo_codigo"];
$varNoticiaTitulo = $_POST["noticiaTitulo"];
$varNoticiaCorpo = $_POST["noticiaCorpo"];
$varNoticiaData = $_POST["noticiaData"];


mysqli_query($conexao, "UPDATE bloginfo set  bloginfo_titulo = '$varNoticiaTitulo', bloginfo_corpo = '$varNoticiaCorpo', bloginfo_data = '$varNoticiaData'  where bloginfo_codigo = '$varBlogCodigo';");

header("location:../")
    ?>