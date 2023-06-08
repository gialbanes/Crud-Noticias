<?php
include('../models/conexao.php');

$diretorio = "arquivos/"; /*nome da pasta */
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE; /*operador ternário isset: verifica se variavel existe ou esta vazia */

for ($k = 0; $k < count($arquivo['name']); $k++) { /*conta quantos arquivos existem 3, entao vai contar menor que 3*/

	$destino = $diretorio . "/" . $arquivo['name'][$k]; /*url do arquivo*/
	/*arquivo//copo.png - duas barras anteriores*/
	$extension = pathinfo($destino, PATHINFO_EXTENSION);
	$NomeRandom = md5(uniqid($extension));
	$NomeArquivo = $arquivo['name'][$k];


	if ($extension == 'png' && move_uploaded_file($arquivo['tmp_name'][$k], $diretorio . "/" . $NomeRandom . "." . $extension)) { /* transporta o arquivo argumentos: o arquivo e o destinatario - move*/
		mysqli_query($conexao, "INSERT INTO blogimgs (blogimgs_nome, blogimgs_random) values ('$NomeArquivo.$extension', '$NomeRandom.$extension')");

		echo "Arquivo enviado com sucesso!";

	} else {
		echo "Falha ao enviar o arquivo";
	}
}

?>