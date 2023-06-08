<?php

include("../models/conexao.php");
$diretorio = "../views/arquivos/";
$varNoticiaTitulo = $_POST["noticiaTitulo"];
$varNoticiaCorpo = $_POST["noticiaCorpo"];
$varNoticiaData = $_POST["noticiaData"];
$varUsuario = $_POST["noticiaUsuario"];



mysqli_query($conexao, "INSERT INTO bloginfo (bloginfo_titulo, bloginfo_corpo, bloginfo_data) values ('$varNoticiaTitulo', '$varNoticiaCorpo', '$varNoticiaData')");
$idblog = mysqli_insert_id($conexao);




// guarda o que esta na caixinha alunoNome na variavel varAlunoNome
// variavel $_POST e uma variavel universal
$diretorio = "../views/arquivos/"; /*nome da pasta */

$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE; /*operador ternário isset: verifica se variavel existe ou esta vazia */

for ($k = 0; $k < count($arquivo['name']); $k++){ /*conta quantos arquivos existem 3, entao vai contar menor que 3*/ 
	
	$destino = $diretorio."/".$arquivo['name'][$k]; /*url do arquivo*/
     /*arquivo//copo.png - duas barras anteriores*/
	 $extension = pathinfo($destino, PATHINFO_EXTENSION);
	 $NomeRandom = md5(uniqid($NomeArquivo ));
	 $NomeArquivo = $arquivo['name'][$k] ;


	 if ($extension == "png") {
	 if (move_uploaded_file($arquivo['tmp_name'][$k], $diretorio . "/" . $NomeRandom . "." . $extension)) { /* transporta o arquivo argumentos: o arquivo e o destinatario - move*/		
		mysqli_query($conexao, "INSERT INTO blogimgs (blogimgs_nome, blogimgs_random) values ('$NomeArquivo', '$NomeRandom.$extension')");
		$idimagem = mysqli_insert_id($conexao);


	} else {
		echo "Falha ao enviar o arquivo";
	}   
} else {
	echo "Arquivo não é compatível com o tipo 'PNG'";
}

}



mysqli_query($conexao, "INSERT INTO blog (blog_bloginfo_codigo, blog_blogimgs_codigo, blog_usuario_codigo) VALUES ('$idblog', '$idimagem', '$varUsuario')");




header("location:../index.php"); //manda pra index novamente


?>