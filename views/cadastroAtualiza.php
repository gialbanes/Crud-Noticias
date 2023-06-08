<?php include("blades/header.php"); ?>
<?php include("../controllers/upload.php"); ?>
<?php include("../models/conexao.php"); ?>

<div class="container bg-white pt-2 mt-5 p-3 rounded-2 shadow">
<?php
$varBlogCodigo = $_GET["bloginfo_codigo"];
$query = mysqli_query($conexao, "SELECT * from bloginfo WHERE bloginfo_codigo = $varBlogCodigo");
while ($exibe = mysqli_fetch_array($query)) {
    ?>
    <h3 class="p-4" style="text-align:center;">Atualizar</h3>
    <form action="../controllers/atualizar.php" method="post">
        <!-- metodo: "post" serve para enviar as paginas desse formulario pro "cadastrar.php" -->
        <input type="hidden" name="bloginfo_codigo" value="<?php echo $exibe[0] ?>">
        <label class="form-label"><b>Título</b></label>
        <input class="form-control"type="text" name="noticiaTitulo" value="<?php echo $exibe[1] ?>"> <br>
        <label class="form-label"><b>Corpo</b></label>
        <input class="form-control"type="text" name="noticiaCorpo" value="<?php echo $exibe[2] ?>"> <br>
        <label class="form-label"><b>Data</b></label> <br>
        <input class="form-control"type="text" name="noticiaData" value="<?php echo $exibe[3] ?>"> <br>


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

    <br>
    <br>

       <!-- <form name="upload" enctype="multipart/form-data" method="post" action="upload.php"> atributo obrigatorio p indicar op tipo de post que sera trabalhado no form - enctype-->
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999"> <!--p definir o tamanho do upload - value -->
        <input type="file" name="arquivo[]" multiple="multiple" /><br><br> <!--seleção de vários arquivos ao mesmo tempo - multiple--> <!--p fazer o array dos arquivos - colchetes-->
        <input name="enviar" type="submit" value="Enviar">

    </form>
    </body>
</html>

    

<?php } ?>
</div>
<?php include("blades/footer.php"); ?>