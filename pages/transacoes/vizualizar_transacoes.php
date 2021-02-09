<?php
	/**
	 * Página Vizualizar Transações
	 */

	/**
	 * Está página é onde o usuário vizualiza todas as transações realizadas, seja elas ganhos ou despesas
	 * @package pages/transacoes
	 * 
	 * @return void
	 */
	function visualizar_transacoes(){
?>

<?php
	// Pega o nome do usuário
	$id_usuario = $_SESSION['user']['id'];

	// Conectando banco de dadoos
	include("bd/conecta_bd.php");

	// Importando links
	include("routes/links.php");
	
	// Seleciona todas as transações
	if(isset($_GET['filter'])){
		$filter = $_GET['filter'];
		
		if($filter == "renda"){
			$sql = "SELECT * FROM transacoes WHERE tipo_transacao = 'Renda' AND id_cadastrar_usuarios = '$id_usuario'";
		} elseif($filter == "despesa"){
			$sql = "SELECT * FROM transacoes WHERE tipo_transacao = 'Despesa' AND id_cadastrar_usuarios = '$id_usuario'";
		}
	} else {
		$sql = "SELECT * FROM transacoes WHERE id_cadastrar_usuarios = '$id_usuario'";
	}
	$sel = $conecta_bd->query($sql);

	// Paginação - está area mostrará proximas páginas de ultimos ganhos
	$total_dados = $sel->num_rows;

	// Total de dados por página
	$registros = 8;

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
	$sql = $sql . " LIMIT $page_inicial, $registros";
	$sel = $conecta_bd->query($sql);

?>

<div class="row d-flex justify-content-end" style="margin-bottom: 20px">
	<div class="col-6">
	Filtros:
		<a href="main.php?page=transacoes&sec=vizualizar_transacoes&filter=renda" class="btn btn-success btn-round">
			<i class="material-icons">thumb_up_alt</i> Ganhos
		</a>
		<a href="main.php?page=transacoes&sec=vizualizar_transacoes&filter=despesa" class="btn btn-danger btn-round">
			<i class="material-icons">thumb_down_alt</i> Despesas
		</a>
		<a href="main.php?page=transacoes&sec=vizualizar_transacoes" class="btn btn-info btn-round">
			<i class="material-icons">select_all</i> Todos
		</a>
	</div>
</div>

<!-- Esta é a Tabela de Transações -->
<div class="row d-flex justify-content-center">
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
		                    <th>Tipo Transação</th>
		                    <th>Tipo de Pagamento</th>
		                    <th>Valor</th>
		                </tr>
		            </thead>
		            <tbody class="text-center">
						<?php while ( $dados = $sel->fetch_assoc() ) : ?>
							<?php
		            			// Formatando data par ainserção no banco de dados
		            			$date = $dados['data'];
		            			$data = implode('/', array_reverse(explode('-', $date)));
		            			$id_dados = $dados['id'];
		            			// Pega valor das Tabelas pagamentos_a_vista e pagamentos_parcelados
		            		?>
							<tr class="<?=($dados['tipo_transacao'] == "Renda")?'table-success':'table-danger'?>">
								<td><?php echo $data ?></td>
								<td><?php echo $dados['descricao'] ?></td>
								<td><?php echo $dados['tipo_transacao'] ?></td>
								<td><?php echo $dados['tipo_pagamento'] ?></td>
								<td>R$ <?php echo number_format($dados['valor'],'2',',','.') ?></td>
							</tr>
						<?php endwhile; ?>
		            </tbody>
		        </table>
		    </div>
		</div>
	</div>
</div>

<!-- Inicio - Paginação da Tabela caso o usuário deseje ver mais dados -->
<div class="row" style="margin-top: 20px;">
	<div class="col-sm">
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center alert-success">
				<li class="page-item">
					<a class="page-link" href="main.php?page=transacoes&sec=vizualizar_transacoes&pagina=<?=($total_paginas == 1)?$total_paginas = 1:$page_previous?>" title="Previous">
						<span class="material-icons">arrow_back_ios</span> 
					</a>
				</li>

				<!-- Gera os numeros das páginas em HTML -->
				<?php
					for ( $i = 1; $i <= 3; $i++ ) {
						$ativa = ($url_page == $i)? "active" : "";
						?>
							<li class="page-item <?php echo $ativa ?>">
								<a class="page-link" href="main.php?page=transacoes&sec=vizualizar_transacoes&pagina=<?php echo $i ?>">
									<?php echo $i?>
								</a>
							</li>
						<?php
					}
				?>
				<li class="page-item">
					<a class="page-link" href="main.php?page=transacoes&sec=vizualizar_transacoes&pagina=<?php echo $page_next ?>" title="Next">
						<span class="material-icons">arrow_forward_ios</span> 
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- Fim - Páginação -->
<?php }; ?>
<?php visualizar_transacoes(); ?>