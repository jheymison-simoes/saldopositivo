
<?php

    // Seleciona a tabela cadastrar_ganhos
	$sql_cadastrar_despesas = "SELECT * FROM cadastrar_despesas WHERE id_cadastrar_usuarios = '$id_usuario' ORDER BY data DESC";
	$sel = $conecta_bd->query($sql_cadastrar_despesas);

	// Paginação - está area mostrará proximas páginas de ultimos ganhos
	$total_dados = $sel->num_rows;

	// Total de dados por página
	$registros = 5;

	// Retorno da página e inserção na URL (Por Padrão é página 1)
	$url_page = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

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
	$sql = $sql_cadastrar_despesas . " LIMIT $page_inicial, $registros";
	$sel = $conecta_bd->query($sql);

?>



<!-- Inicio - Tabela que mostra os ultimas despesas -->
<div class="row">
	<!-- Tabela de Ultimas Despesas adicionados -->
	<div class="col-lg-12 col-md-12">
		<div class="card">
		    <div class="card-header card-header-success">
		        <h4 class="card-title text-center">Ultimas Despesas Adicionadas</h4>
		    </div>
		    <div class="card-body table-responsive">
		        <table class="table table-hover">
		            <thead class="text-info text-center">
		                <tr>
		                    <th>Data</th>
		                    <th>Descrição</th>
		                    <th>Tipo Despesa</th>
		                    <th>Tipo Pagamento</th>
		                    <th>Fixa</th>
		                    <th>Valor</th>
		                    <th>Pagamento</th>
		                    <th>Ações</th>
		                </tr>
		            </thead>
		            <tbody class="text-center">

		            	<!-- Percorre todos os dados adicionados na tabela do banco de dados e o retorna em cada linha -->
		            	<!-- Inicio - While -->
		            	<?php while ( $dados = $sel->fetch_assoc() ) : ?>

		            		<?php
		            			// Formatando data par ainserção no banco de dados
		            			$date = $dados['data'];
		            			$data = implode('/', array_reverse(explode('-', $date)));
		            			$id_dados = $dados['id'];
		            			// Pega valor das Tabelas pagamentos_a_vista e pagamentos_parcelados
		            		?>
			                <tr>
			                    <td><?php  echo $data ?></td>
			                    <td id="n_ultrapassa"><?php  echo $dados['descricao']?></td>
			                    <td><?php  echo $dados['tipo_despesa']?></td>
			                    <td><?php  echo $dados['tipo_pagamento']?></td>
			                    <td><?php  echo $dados['despesa_fixa']?></td>
			                    <td><?php  echo number_format($dados['valor_despesa'],'2',',','.') ?></td>

			                    <!-- Retorna o Valor se For Pagamento A Vista -->
			                    <?php if ($dados['tipo_pagamento'] == "a_vista") : ?>
			                    	<?php
			                    	// Busca os dados nba tabela de pagamento a_vista
			                    		$sql_valor_despesa = "SELECT * FROM pagamentos_a_vista WHERE id_cadastrar_despesas = '$id_dados'";
			            				$sel_valor_despesa = $conecta_bd->query($sql_valor_despesa);
			                    	?>
			                    	<?php while ( $valor_vista = $sel_valor_despesa->fetch_assoc() ) : ?>
				                    	<td><?php echo $valor_vista['forma_pagamento'] ?></td>
				                	<?php endwhile; ?>

				                <!-- Retorna valor se for pagamento Parcelado -->
				                <?php else: ?>
				                	<?php
			                    	// Busca os dados nba tabela de pagamento parcelado
			                    		$sql_valor_parcela = "SELECT * FROM pagamentos_parcelados WHERE id_cadastrar_despesas = '$id_dados'";
			            				$sel_valor_parcela = $conecta_bd->query($sql_valor_parcela);
			                    	?>
			                    	<?php while ( $valor_parcela = $sel_valor_parcela->fetch_assoc() ) : ?>
				                    	<td><?php echo $valor_parcela['forma_pagamento'] ?></td>
				                	<?php endwhile; ?>

			                    <?php endif; ?>

			                    <td class="td-actions text-center">
					                <a href="main.php?page=despesas&sec=edita_despesas&id=<?php echo $dados['id'] ?>">
					                	<button type="button" rel="tooltip" class="btn btn-success" title="Editar">
					                    	<i class="material-icons">edit</i>
					               		</button>
					                </a>
					                <a href="main.php?page=despesas&sec=deleta_despesas&id=<?php echo $dados['id'] ?>">
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
<!-- Fim Tabela Ultimas Depesas -->

<!-- Inicio - Paginação da Tabela caso o usuário deseje ver mais dados -->
<div class="row" style="margin-top: 20px;">
	<div class="col-sm">
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center alert-success">
				<li class="page-item">
					<a class="page-link" href="main.php?page=despesas&sec=cadastrar_despesa&pagina=<?=($total_paginas == 1)?$total_paginas = 1:$page_previous?>" title="Previous">
						<span class="material-icons">arrow_back_ios</span> 
					</a>
				</li>

				<!-- Gera os numeros das páginas em HTML -->
				<?php
					for ( $i = 1; $i <= 3; $i++ ) {
						$ativa = ($url_page == $i)? "active" : "";
						?>
							<li class="page-item <?php echo $ativa ?>">
								<a class="page-link" href="main.php?page=despesas&sec=cadastrar_despesa&pagina=<?php echo $i ?>">
									<?php echo $i?>
								</a>
							</li>
						<?php
					}
				?>
				<li class="page-item">
					<a class="page-link" href="main.php?page=despesas&sec=cadastrar_despesa&pagina=<?php echo $page_next ?>" title="Next">
						<span class="material-icons">arrow_forward_ios</span> 
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- Fim - Páginação -->