
<?php

    /**
     * Esta é a tabela dos Metas e Objetivos, retorna todas as metas cadastradas no banco de dados
     */

    include("routes/links.php"); // Inportando Links
    $id_adm = 100;

    // Seleciona a tabela cadastrar_metas
    $sql_metas = "SELECT * FROM cadastrar_metas WHERE id_cadastrar_usuarios = '$id_usuario' ORDER BY id DESC";
    $sel = $conecta_bd->query($sql_metas);

?>

<div class="row d-flex justify-content-center">
<!-- Tabela de Ultimas Ganhos adicionados -->
<div class="col-lg-6 col-md-6">
    <div class="card">
        <div class="card-header card-header-success">
            <h4 class="card-title text-center">Ultimas Ganhos Adicionados</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead class="text-info text-center">
                    <tr>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php while ( $dados = $sel->fetch_assoc() ) : ?>
                    <tr>
                        <td><?php echo $dados['tipo_meta']  ?></td>
                        <td><?php echo $dados['descricao'] ?></td>
                        <td><?php echo number_format($dados['valor_meta'],'2',',','.'); ?></td>
                        <td class="td-actions text-center">
                            <a href="main.php?page=metas&sec=editar_metas&id=<?php echo $dados['id'] ?>">
                                <button type="button" rel="tooltip" class="btn btn-success" title="Editar">
                                    <i class="material-icons">edit</i>
                                   </button>
                            </a>

                            <a href="main.php?page=metas&sec=deletar_metas&id=<?php echo $dados['id'] ?>">
                                <button type="button" name="deletar" type="button" rel="tooltip" class="btn btn-danger" title="Meta Alcançada?">
                                    <i class="material-icons">delete</i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
