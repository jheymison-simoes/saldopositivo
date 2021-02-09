
<?php

	// Importando Links
	include("routes/links.php");

    // Seleciona a tabela cadastrar_ganhos
	$sql_cadastrar_ganhos = "SELECT * FROM cadastrar_ganhos WHERE id_cadastrar_usuarios = '$id_usuario' ORDER BY id DESC ";
	$sel_page = $conecta_bd->query($sql_cadastrar_ganhos);

	// Paginação - está area mostrará proximas páginas de ultimos ganhos
	$total_dados = $sel_page->num_rows;

	// Total de dados por página
	$registros = 5;

	// Retorno da página e inserção na URL (Por Padrão é página 1)
	$url_page = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

	if($url_page < 1){
		$url_page = 1;
	}

	// Quantidade de páginas
	$total_paginas = ceil($total_dados / $registros);

	// Página inicial
	$page_inicial = ($registros * $url_page) - $registros;

	// Página anterior
	$page_previous = $url_page - 1;

	// Próxima Página
	$page_next = $url_page + 1;

	// Ultima Página
	$page_las = $total_paginas - 1;

	// Alteração no sql_cadastrar_ganhos
	$sql_pages = $sql_cadastrar_ganhos . "LIMIT $page_inicial, $registros";
	$sel_page = $conecta_bd->query($sql_pages);

?>

<!-- Inicio - Tabela que mostra os ultimos ganhos -->
<div class="row">
	<!-- Tabela de Ultimas Ganhos adicionados -->
	<div class="col-lg-12 col-md-12">
		<div class="card">
		    <div class="card-header card-header-success">
		        <h4 class="card-title text-center">Ultimas Ganhos Adicionados</h4>
		    </div>
		    <div class="card-body table-responsive">
		        <table class="table table-hover">
		            <thead class="text-info text-center">
		                <tr>
		                    <th>Data</th>
		                    <th>Descrição</th>
		                    <th>Tipo Renda</th>
		                    <th>Fixa</th>
		                    <th>Valor</th>
		                    <th>Ações</th>
		                </tr>
		            </thead>
		            <tbody class="text-center">
		            	<!-- Percorre todos os dados adicionados na tablea do banco de dados e o retorna em cada linha -->
		            	<!-- Inicio - While -->
		            	<?php while ( $dados = $sel_page->fetch_assoc() ) : ?>

		            		<?php
		            			// Formatando data par ainserção no banco de dados
		            			$date = $dados['data'];
		            			$data = implode('/', array_reverse(explode('-', $date)));
		            		?>
			                <tr>
			                    <td><?php  echo $data ?></td>
			                    <td><?php  echo $dados['descricao']?></td>
			                    <td><?php  echo $dados['tipo_renda']?></td>
			                    <td><?php  echo $dados['renda_fixa']?></td>
			                    <td>R$ <?php  echo number_format($dados['valor'],'2',',','.')?></td>
			                    <td class="td-actions text-center">
					                <a href="main.php?page=ganhos&sec=edita_ganhos&id=<?php echo $dados['id'] ?>">
					                	<button type="button" rel="tooltip" class="btn btn-success" title="Editar">
					                    	<i class="material-icons">edit</i>
					               		</button>
					                </a>
					                <a href="main.php?page=ganhos&sec=deleta_ganhos&id=<?php echo $dados['id'] ?>">
						                <button type="button" rel="tooltip" class="btn btn-danger" title="Deletar">
						                    <i class="material-icons">delete</i>
						                </button>
					                </a>
					            </td>
			                </tr>
		                <?php endwhile; ?>
		                <!-- Fim - While -->
		            </tbody>
		        </table>
		    </div>
		</div>
	</div>
</div>
<!-- Fim Tabela Ultimos Ganhos -->

<!-- Inicio - Paginação da Tabela caso o usuário deseje ver mais dados -->
<div class="row" style="margin-top: 20px;">
	<div class="col-sm">
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center alert-success">
				<li class="page-item">
					<a class="page-link" href="main.php?page=ganhos&sec=cadastrar_ganho&pagina=<?=($total_paginas == 1)?$total_paginas = 1:$page_previous?>" title="Previous">
						<span class="material-icons">arrow_back_ios</span> 
					</a>
				</li>

				<!-- Gera os numeros das páginas em HTML -->
				<?php
					for ( $i = 1; $i <= 3; $i++ ) {
						$ativa = ($url_page == $i)? "active" : "";
						?>
							<li class="page-item <?php echo $ativa ?>">
								<a class="page-link" href="main.php?page=ganhos&sec=cadastrar_ganho&pagina=<?php echo $i ?>">
									<?php echo $i?>
								</a>
							</li>
						<?php
					}
				?>
				<li class="page-item">
					<a class="page-link" href="main.php?page=ganhos&sec=cadastrar_ganho&pagina=<?php echo $page_next ?>" title="Next">
						<span class="material-icons">arrow_forward_ios</span> 
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- Fim - Páginação -->
