<?php

	for( $m = 1; $m <= 12; $m++ ){
		$sql_ganhos = "SELECT SUM(valor) FROM cadastrar_ganhos WHERE MONTH(data) = $m AND YEAR(data) = $ano AND id_cadastrar_usuarios = '$id_usuario'";
		$sel_ganhos = $conecta_bd->query($sql_ganhos); // Roda SQL
		$ganhos = $sel_ganhos->fetch_assoc();

		foreach($ganhos as $ganhos){
			$valor_ganhos = $ganhos;
		}
		
		if($valor_ganhos == ""){
			$valor_ganhos = 0;
		}

		echo "<div hidden id='graf_ganhos$m' value='$valor_ganhos'>" . $valor_ganhos . "</div>";
	}
	
	for( $m = 1; $m <= 12; $m++ ){
		$sql_despesas = "SELECT SUM(valor_despesa) FROM cadastrar_despesas WHERE MONTH(data) = $m AND YEAR(data) = $ano AND id_cadastrar_usuarios = '$id_usuario'";
		$sel_despesas = $conecta_bd->query($sql_despesas); // Roda SQL
		$despesas = $sel_despesas->fetch_assoc();

		foreach($despesas as $despesas){
			$valor_despesas = $despesas;
		}
		
		if($valor_despesas == ""){
			$valor_despesas = 0;
		}

		echo "<div hidden id='graf_despesas$m' value='$valor_despesas'>" . $valor_despesas . "</div>";
	}
?>



<div class="row" id="cardGrafico">
	<!-- Gráfico de Ganhos -->
	<div class="col-md-6 cardValInd">
		<div class="card">
			<div class="card-header card-chart card-header-info">

				<!-- Mostra o Gráfico -->
				<div class="ct-chart chartGanhos" id="websiteViewsChart"></div>

				<!-- Define os valores dos gráficos -->
				<script>
					var jan = document.getElementById("graf_ganhos1").innerHTML;
					var fev = document.getElementById("graf_ganhos2").innerHTML;
					var mar = document.getElementById("graf_ganhos3").innerHTML;
					var abr = document.getElementById("graf_ganhos4").innerHTML;
					var mai = document.getElementById("graf_ganhos5").innerHTML;
					var jun = document.getElementById("graf_ganhos6").innerHTML;
					var jul = document.getElementById("graf_ganhos7").innerHTML;
					var ago = document.getElementById("graf_ganhos8").innerHTML;
					var set = document.getElementById("graf_ganhos9").innerHTML;
					var out = document.getElementById("graf_ganhos10").innerHTML;
					var nov = document.getElementById("graf_ganhos11").innerHTML;
					var dez = document.getElementById("graf_ganhos12").innerHTML;

					var dataGanhos = {

							labels: [
								'jan', 
								'fev', 
								'mar', 
								'abr', 
								'mai', 
								'jun', 
								'jul', 
								'ago', 
								'set', 
								'out', 
								'nov', 
								'dez'
							],
							series: [ 
								[
									jan, 
									fev, 
									mar, 
									abr, 
									mai, 
									jun, 
									jul, 
									ago, 
									set, 
									out, 
									nov, 
									dez
								]
							]
						};

						new Chartist.Bar('.chartGanhos', dataGanhos);
				</script>

			</div>
			<div class="card-body" id="textoCard">
				<h4 class="card-title">Demonstrativo dos Ganhos do Ano <?php echo $ano ?></h4>
			</div>

		</div>
	</div>

	<!-- Gráfico de Despesas -->
	<div class="col-md-6 cardValInd">
		<div class="card">
			<div class="card-header card-chart card-header-danger">

				<!-- Mostra o Gráfico -->
				<div class="ct-chart chartDespesas" id=""></div>

				<!-- Define os valores dos fráficos -->
				<script>

					var jand = document.getElementById("graf_despesas1").innerHTML;
					var fevd = document.getElementById("graf_despesas2").innerHTML;
					var mard = document.getElementById("graf_despesas3").innerHTML;
					var abrd = document.getElementById("graf_despesas4").innerHTML;
					var maid = document.getElementById("graf_despesas5").innerHTML;
					var jund = document.getElementById("graf_despesas6").innerHTML;
					var juld = document.getElementById("graf_despesas7").innerHTML;
					var agod = document.getElementById("graf_despesas8").innerHTML;
					var setd = document.getElementById("graf_despesas9").innerHTML;
					var outd = document.getElementById("graf_despesas10").innerHTML;
					var novd = document.getElementById("graf_despesas11").innerHTML;
					var dezd = document.getElementById("graf_despesas12").innerHTML;

					var dataDespesas = {

							labels: [
								'jan', 
								'fev', 
								'mar', 
								'abr', 
								'mai', 
								'jun', 
								'jul', 
								'ago', 
								'set', 
								'out', 
								'nov', 
								'dez'
							],
							series: [ 
								[
									jand, 
									fevd, 
									mard, 
									abrd, 
									maid, 
									jund, 
									juld, 
									agod, 
									setd, 
									outd, 
									novd, 
									dezd
								]
							]
						};
						new Chartist.Line('.chartDespesas', dataDespesas);
				</script>

			</div>
			<div class="card-body" id="textoCard">
				<h4 class="card-title">Demonstrativo de Despesas do Ano <?php echo $ano ?></h4>
			</div>
		</div>
	</div>

</div>
