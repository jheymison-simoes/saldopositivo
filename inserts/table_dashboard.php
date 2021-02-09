
<?php

    include("bd/conecta_bd.php"); // Conexão com o BD

    // Seleciona a tabela cadastrar_ganhos
	$sql_cadastrar_ganhos = "SELECT * FROM cadastrar_ganhos WHERE id_cadastrar_usuarios = '$id_usuario' ORDER BY data DESC LIMIT 5 ";
    $sel_page = $conecta_bd->query($sql_cadastrar_ganhos);
    
    // Seleciona a tabela cadastrar_despesas
	$sql_cadastrar_despesas = "SELECT * FROM cadastrar_despesas WHERE id_cadastrar_usuarios = '$id_usuario' ORDER BY data DESC";
	$sel = $conecta_bd->query($sql_cadastrar_despesas);

?>



<!-- Cards de Tabelas, retorna os ultimos ganhos e despesas cadastradas -->
<div class="row" id="cardTable">

	<!-- Tabela de Ultimos ganhos cadastrados -->
	<div class="col-lg-6 col-md-12 cardValInd">
		<div class="card">
		    <div class="card-header card-header-info">
		        <h4 class="card-title text-center">Ultimos Ganhos</h4>
		        <p class="card-category text-center">Ganhos adicionados anteriormente</p>
		    </div>
		    <div class="card-body table-responsive">
		        <table class="table table-hover">
		            <thead class="text-success text-center">
		                <tr>
		                    <th>Data</th>
		                    <th>Descrição</th>
		                    <th>Valor</th>
		                    <th>Tipo Renda</th>
		                </tr>
		            </thead>
		            <tbody class="text-center">
                        <?php while ( $dados = $sel_page->fetch_assoc() ) : ?>
                            <?php
                                // Formatando data par ainserção no banco de dados
                                $date = $dados['data'];
                                $data = implode('/', array_reverse(explode('-', $date)));
                            ?>
                            <tr>
                                <td><?php  echo $data ?></td>
                                <td><?php  echo $dados['descricao']?></td>
                                <td>R$ <?php  echo number_format($dados['valor'],'2',',','.')?></td>
                                <td><?php  echo $dados['tipo_renda']?></td>
                            </tr>
                        <?php endwhile; ?>
		                <!-- Fim - While -->
		            </tbody>
		        </table>
		    </div>
		</div>
	</div>

	<!-- Tabela de Ultimas despesas cadastradas -->
	<div class="col-lg-6 col-md-12">
		<div class="card">
		    <div class="card-header card-header-danger">
		        <h4 class="card-title text-center">Ultimas Despesas</h4>
		        <p class="card-category text-center">Despesas adicionados anteriormente</p>
		    </div>
		    <div class="card-body table-responsive">
		        <table class="table table-hover">
		            <thead class="text-warning text-center" >
		                <tr>
		                    <th>Data</th>
		                    <th>Descrição</th>
		                    <th>Valor</th>
		                    <th>Tipo Despesa</th>
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
                        <tr>
                            <td><?php  echo $data ?></td>
                            <td id="n_ultrapassa"><?php  echo $dados['descricao']?></td>
                            <td>R$ <?php echo number_format($dados['valor_despesa'],'2',',','.') ?></td>
                            <td><?php  echo $dados['tipo_despesa']?></td>
                        </tr>
                        <?php endwhile; ?>
                        <!-- Fim - While -->
		            </tbody>
		        </table>
		    </div>
		</div>
	</div>
</div>

<!-- Área de Carões -->
<?php
    include("inserts/table_cartoes.php");
?>