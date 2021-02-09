
<?php

	include("routes/links.php");
	$id_adm = 100;
	// Seleciona a tabela cadastrar_ganhos
	$sql_cadastrar_tipo_ganhos = "SELECT * FROM tipos_de_ganhos WHERE id_cadastrar_usuarios = '$id_usuario' OR id_cadastrar_usuarios = '$id_adm' ORDER BY tipo_ganho ASC";
	$sel = $conecta_bd->query($sql_cadastrar_tipo_ganhos);
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
		                    <th>Tipo de Ganhos</th>
		                    <th>Ações</th>
		                </tr>
		            </thead>
		            <tbody class="text-center">
		                <?php while ( $tipos = $sel->fetch_assoc() ) : ?>
		                <tr>
		                    <td><?php echo $tipos['tipo_ganho'] ?></td>
		                    <td class="td-actions text-center">
				                <a href="<?php echo $page_edita_tipo_ganhos ?>&id=<?php echo $tipos['id'] ?>">
				                	<button type="button" rel="tooltip" class="btn btn-success" title="Editar">
				                    	<i class="material-icons">edit</i>
				               		</button>
				                </a>

				                <a href="<?php echo $page_deleta_tipo_ganhos ?>&id=<?php echo $tipos['id'] ?>">
					                <button type="button" name="deletar" type="button" rel="tooltip" class="btn btn-danger" title="Deletar">
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
