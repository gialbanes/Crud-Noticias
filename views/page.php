<?php
include("../models/conexao.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Blog</title>
</head>

<body>
    <div class="container p-3 mt-5 rounded-4 shadow-lg">
    <table class="table table-bordered table-striped" width="800">
            <?php
            $varblogCodigo = $_GET["blog_codigo"];

            $query = mysqli_query($conexao, "SELECT * from blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo 
            INNER JOIN blogimgs on blog_blogimgs_codigo = blogimgs_codigo 
            INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo 
            where blog_codigo = $varblogCodigo");

            while ($exibe = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><img src="../views/arquivos/<?php echo $exibe[11] ?>" width="200px" alt=""></td>
                    <td>
                        <h3>
                            <?php echo $exibe[5] ?>
                        </h3>
                        Criada por <b>
                            <?php echo $exibe[13] ?>
                        </b> em
                        <?php echo $exibe[7] ?>
                        <hr>

                        <?php echo $exibe[6] ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>