<?php include("models/conexao.php") ?>
<?php include("views/blades/header.php"); ?>

<div class="container bg-white pt-2 mt-5 p-3 rounded-4 shadow">
    <!-- 'p-3' é o padding geral do container, evitando ter que declarar o padding de cada lado (bottom, top, start e end), valeu igor filho da puta por ensinar.-->
    <p class="h3 p-4" style="text-align:center; font-weigth: bold;">Sistema Crud - Notícias</p>

    <a class="btn btn-success" href="views/cadastro.php">Cadastrar</a>

    <table class="table table-bordered table-striped table-hover mt-5">

        <?php
        $query = mysqli_query($conexao, "SELECT * from blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimgs on blog_blogimgs_codigo = blogimgs_codigo INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo group by blog_bloginfo_codigo;");
        while ($exibe = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><img class="rounded mx-auto d-block " src="views/arquivos/<?php echo $exibe[11] ?>" width="200px"
                        alt=""></td>
                <td>
                    <a class="link-underline-opacity-0" href="views/page.php?blog_codigo=<?php echo $exibe[0] ?>">
                        <h3 class="title">
                            <?php echo $exibe[5] ?>
                        </h3> 
                        Criada por <b>
                            <?php echo $exibe[13] ?>
                        </b> em
                        <?php echo $exibe[7] ?>
                        <hr>
                        <?php echo substr($exibe[6], 0, 250) . "..." ?>
                    </a>
                </td>
                <td><a class="btn btn-primary"
                        href="views/cadastroAtualiza.php?bloginfo_codigo=<?php echo $exibe[0] ?>">Editar</a>
                </td>
                <td><a class="btn btn-danger "
                        href="controllers/deletar.php?bloginfo_codigo=<?php echo $exibe[0] ?>">Excluir</a>
                </td>
            </tr>

        <?php } ?>
    </table>
    <?php ?>

</div>

<?php include("views/blades/footer.php"); ?>