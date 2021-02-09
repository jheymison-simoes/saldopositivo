
<?php
    /**
     * Tabela de dados dos cartões cadastrados
     * Mostra Limite Total
     * Mostra Limite Disponivel
     */

    $sql_cartoes = "SELECT * FROM cadastrar_cartoes WHERE id_cadastrar_usuarios = '$id_usuario' ORDER BY id DESC";
    $sel_cartoes = $conecta_bd->query($sql_cartoes);

?>

<div class="row">
	<!-- Tabela de Cartões Cadastrados -->
	<div class="col-lg-12 col-md-12">
		<div class="card">
		    <div class="card-header card-header-success">
		        <h4 class="card-title text-center">Cartões Cadastrados</h4>
		    </div>
		    <div class="card-body table-responsive">
		        <table class="table table-hover">
		            <thead class="text-info text-center">
		                <tr>
                            <th>Titulo do Cartão</th>
                            <th>Banco</th>
                            <th>Bandeira</th>
                            <th>Limite Total</th>
                            <th>Limite Disponível</th>
                            <th>Ações</th>
		                </tr>
		            </thead>
		            <tbody class="text-center">
                        <?php while ( $dados = $sel_cartoes->fetch_assoc() ) : ?>
                            <tr>
                                <td><?php echo $dados['titulo'] ?></td>
                                <td><?php echo $dados['banco'] ?></td>
                                <td><?php echo $dados['bandeira'] ?></td>
                                <td>R$ <?php echo number_format($dados['limite_total'],'2',',','.') ?></td>
                                <td>R$ <?php echo number_format($dados['limite_disponivel'],'2',',','.') ?></td>
                                <td class="td-actions text-center">
                                    <a href="main.php?page=cartoes&sec=edita_cartoes&id=<?php echo $dados['id'] ?>">
                                        <button type="button" rel="tooltip" class="btn btn-success" title="Editar">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </a>
                                    <a href="main.php?page=cartoes&sec=deleta_cartoes&id=<?php echo $dados['id'] ?>">
                                        <button type="button" rel="tooltip" class="btn btn-danger" title="Deletar">
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
