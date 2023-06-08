<?php include("blades/header.php"); 
include("../models/conexao.php");
?>

<div class="container bg-white pt-2 mt-5 p-3 rounded-2 shadow" >

<form action="../controllers/cadastrar.php"   enctype="multipart/form-data" method="post">

<h3 class="p-4" style="text-align:center;">Cadastrar</h3>

    <!-- metodo: "post" serve para enviar as paginas desse formulario pro "cadastrar.php" -->
    <label class="form-label"><b>Título</b></label>
    <input class="form-control" type="text" name="noticiaTitulo"> <br>
    <label class="form-label"><b>Corpo</b></label>
    <input class="form-control"type="text" name="noticiaCorpo"> <br>
    <label class="form-date"><b>Data</b></label> <br>
    <input type="date" name="noticiaData"> <br><br>

    <label class="usuario"><b>Selecione um usuario</b></label>     
    <?php  
    $query = mysqli_query($conexao, "SELECT * FROM usuario ORDER BY usuario_codigo;");
    ?>
    <select name="noticiaUsuario" id="">
        <?php 
            while ($row = mysqli_fetch_array($query))
            {
                    echo "<option value='" . $row['usuario_codigo'] ."'>" . $row['usuario_nome'] ."</option>";
            }
        ?> 
    </select>

    <br><br>


<!--         <form name="upload" enctype="multipart/form-data" method="post" action="controllers/upload.php"> --> <!--atributo obrigatorio p indicar op tipo de post que sera trabalhado no form - enctype-->
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999"> <!--p definir o tamanho do upload - value -->
        <input type="file" name="arquivo[]" multiple="multiple" /><br><br> <!--seleção de vários arquivos ao mesmo tempo - multiple--> <!--p fazer o array dos arquivos - colchetes-->
        <input name="enviar" type="submit" value="Enviar">


       
    </form>    
</body>
</html>

<!-- 
pathinfo
md5()
uniqid()
 -->

<!--vai p upload -->


</div>
<?php include("blades/footer.php");?>
