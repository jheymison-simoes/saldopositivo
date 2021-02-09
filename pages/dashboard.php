<?php
	/**
	 * Página Relatório de Tipos de Pagamentos
	 */

	/**
	 * Esta é a página Dashboard, ela mostrara o resumo de saldos, ganhos e despesas para o usuário através de gráficos e tabelas. Página principal da aplicação.
	 * @package dashboard
	 * 
	 * @return void
	 */
	function dashboard(){
?>
<?php
	// Conectando banco de dadoos
    include("bd/conecta_bd.php");

	// Pega o nome do usuário
	$id_usuario = $_SESSION['user']['id'];
?>

<!-- Área de Cards de Valores -->
<?php
	include("inserts/cards.php");
?>

<!-- Área de Cards de Gráficos -->
<?php
	include("inserts/cards_graficos.php");
?>

<!-- Área de Tabelas de Ganhos e Despesas -->
<?php
	include("inserts/table_dashboard.php");
?>

<?php }; ?>
<?php dashboard(); ?>	



