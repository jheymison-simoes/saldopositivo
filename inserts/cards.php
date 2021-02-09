<?php

	/**
	 * Inserts dos cards
	 */

	/**
	 * Esta parte mostra a parte superior da tela do dashboard
	 */

    $ano = date("Y");
	$mes = date("m");

	// Valor Total de Ganhos
	$sql_ganhos = "SELECT SUM(valor) FROM cadastrar_ganhos WHERE MONTH(data) = $mes AND YEAR(data) = $ano AND id_cadastrar_usuarios = '$id_usuario'";
	$sel_ganhos = $conecta_bd->query($sql_ganhos); // Roda SQL
	$ganhos = $sel_ganhos->fetch_assoc();

	foreach($ganhos as $ganhos){
		$valor_ganhos = $ganhos;
	}

	// Valor Total de Despesas
	$sql_despesas = "SELECT SUM(valor_despesa) FROM cadastrar_despesas WHERE MONTH(data) = $mes AND YEAR(data) = $ano AND id_cadastrar_usuarios = '$id_usuario'";
	$sel_despesas = $conecta_bd->query($sql_despesas); // Roda SQL
	$despesas = $sel_despesas->fetch_assoc();

	foreach($despesas as $despesas){
		$valor_despesas = $despesas;
	}

	if( isset($_GET['mes']) && isset($_GET['ano']) ){
		$mes = $_GET['mes'];
		$ano = $_GET['ano'];
		$valor_ganhos = $_GET['valor_ganhos'];
		$valor_despesas = $_GET['valor_despesas'];
	}

	$saldo_disponivel = $valor_ganhos - $valor_despesas;
?>

<form method="post" action="services/dashboard/cards.php">
	<div class="row d-flex justify-content-center" style="margin-bottom: 40px;">
		<div class="col-lg-4  d-flex justify-content-center">
			<input hidden value="<?php echo $id_usuario ?>" name="id_usuario">
			<select id="meses" class="selectpicker" data-style="btn btn-success btn-round" name="meses" onchange="this.form.submit()">
				<option value="01" <?=($mes == "1")?'selected':''?> >Janeiro</option>
				<option value="02" <?=($mes == "2")?'selected':''?> >Fevereiro</option>
				<option value="03" <?=($mes == "3")?'selected':''?> >Março</option>
				<option value="04" <?=($mes == "4")?'selected':''?> >Abril</option>
				<option value="05" <?=($mes == "5")?'selected':''?> >Maio</option>
				<option value="06" <?=($mes == "6")?'selected':''?> >Junho</option>
				<option value="07" <?=($mes == "7")?'selected':''?> >Julho</option>
				<option value="08" <?=($mes == "8")?'selected':''?> >Agosto</option>
				<option value="09" <?=($mes == "9")?'selected':''?> >Setembro</option>
				<option value="10" <?=($mes == "10")?'selected':''?> >Outubro</option>
				<option value="11" <?=($mes == "11")?'selected':''?> >Novembro</option>
				<option value="12" <?=($mes == "12")?'selected':''?> >Dezembro</option>
			</select>

			<select id="anos" class="selectpicker" data-style="btn btn-success btn-round" name="anos">
				<?php for($i = 2000; $i < 2050; $i++ ): ?>
					<option type="submit" value="<?php echo $i ?>" <?=($i == $ano)?'selected':''?> ><?php echo $i ?></option>
				<?php endfor; ?>
			</select>
			
		</div>
	</div>
</form>


<!-- Cards - Demostrativos de Valores -->
<div class="row" id="cardsValores">

	<!-- Card para Saldo Dinsponivel -->
	<!-- Retorna do banco de dados o valor disponovel depois de calcular todos os ganhos e despesas -->

	<div class="col-lg-4 col-md-6 col-sm-6 cardValInd">
		<div class="card card-stats">
			<div class="card-header card-header-success card-header-icon">
				<div class="card-icon">
					<i class="material-icons">attach_money</i>
				</div>
				<p class="card-category">Saldo Disponivel</p>

				<h3 class="card-title">
				<?php echo "<small>R$ </small>" . number_format($saldo_disponivel,'2',',','.') ?>
				</h3>
			</div>
			<div class="card-footer">
				<div class="stats">
                    <?php if($saldo_disponivel >= 0): ?>
                        <i class="material-icons text-success">assignment_turned_in</i>
                        <span class="text-success">Parabéns - Saldo Positivo</span>
                    <?php else: ?>
                        <i class="material-icons text-danger">assignment_late</i> 
                        <span class="text-danger">Cuidado - Saldo Negativo</span>
                    <?php endif; ?>
                </div>
			</div>
		</div>
    </div>

	<!-- Card de total de ganhos - receita -->
	<!-- Retorna do banco de dados o total de ganhos cadastrados -->

	<div class="col-lg-4 col-md-6 col-sm-6 cardValInd">
		<div class="card card-stats">
			<div class="card-header card-header-info card-header-icon">
				<div class="card-icon">
					<i class="material-icons">trending_up</i>
				</div>
				<p class="card-category">Total Ganhos</p>
				<h3 id="total_ganhos" class="card-title">
					<?php echo "<small>R$ </small>" . number_format($valor_ganhos,'2',',','.') ?>
				</h3>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons text-info">description</i>
					<a href="#" class="text-info">Visualizar Transações de Ganhos</a>
				</div>
			</div>
		</div>
    </div>

	<!-- Card de total de Despesas -->
	<!-- Retorna do banco de dados o total de despesas cadastrados -->
	
	<div class="col-lg-4 col-md-6 col-sm-6 cardValInd">
		<div class="card card-stats">
			<div class="card-header card-header-danger card-header-icon">
				<div class="card-icon">
					<i class="material-icons">trending_down</i>
				</div>
				<p class="card-category">Total Despesas</p>
				<h3 class="card-title">
					<?php echo "<small>R$ </small>" . number_format($valor_despesas,'2',',','.') ?>
				</h3>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons text-danger">clear_all</i>
					<a href="#" class="text-danger">Visualizar Transações de Despesas</a>
				</div>
			</div>
		</div>
    </div>
</div>