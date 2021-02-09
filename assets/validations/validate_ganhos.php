<?php
	//  Realiza a verificação de erro retornado pelo cadastra_tipo_ganhos
	//  Após verificado se os campos de preenchimento estão corretos
	//  Exibe mensagem de Sucesso e de Aviso
	//  Sucesso quando todos os requisitos forem atendidos
	//  Aviso quando algum campo não for preenchido corretamente

	
	
	// Erro ao cadastrar
	if (isset($_GET['erro_cadastro']) ) {

		$erro_cadastro = $_GET['erro_cadastro'];

		// Sucesso - Todos os requisitos foram aceitos
		if ($erro_cadastro == 'sucess') {
			$msg = 'Filme Adicionado com Sucesso';
			echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>SUCESSO</strong> Dados cadastrados ou Alterados com Sucesso!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		} 
		// Warnning - algum campo com erro ou em branco
		if ( $erro_cadastro == 'warnning' ) {
			$msg = 'Aviso: revise todos os campos!';
			echo "<div class='alert alert-warning  alert-dismissible fade show' role='alert'>
					  <strong>AVISO</strong> Campo não preenchido!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";  
		} 
		// Info - Dados já Cadastrados
		if ( $erro_cadastro == 'info' ) {
			$msg = 'Aviso: revise todos os campos!';
			echo "<div class='alert alert-info  alert-dismissible fade show' role='alert'>
					  <strong>AVISO</strong> Dados já cadastrados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";	  
		} 
		// Failed - Dados não adicionados ao banco de dados
		if ( $erro_cadastro == 'failed' ) {
			$msg = 'Dados não adicionado ao Banco de Dados';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					  <strong>ERRO</strong> Dados não adicionados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		}  
	}


	// Erro ao Alterar
	if (isset($_GET['erro_alterar']) ) {

		$erro_alterar = $_GET['erro_alterar'];

		// Sucesso - Todos os requisitos foram aceitos
		if ($erro_alterar == 'sucess') {
			$msg = 'Filme Adicionado com Sucesso';
			echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>SUCESSO</strong> Dados Alterados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		} 
		// Failed - Dados não adicionados ao banco de dados
		if ( $erro_alterar == 'failed' ) {
			$msg = 'Dados não adicionado ao Banco de Dados';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					  <strong>ERRO</strong> Dados não alterados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		}  
	}

	// Erro ao Deletar
	if (isset($_GET['erro_deletar']) ) {

		$erro_deletar = $_GET['erro_deletar'];

		// Sucesso - Todos os requisitos foram aceitos
		if ($erro_deletar == 'sucess') {
			$msg = 'Filme Adicionado com Sucesso';
			echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>SUCESSO</strong> Dados Deletados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		} 
		// Failed - Dados não adicionados ao banco de dados
		if ( $erro_deletar == 'failed' ) {
			$msg = 'Dados não adicionado ao Banco de Dados';
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					  <strong>ERRO</strong> Dados não Deletados!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		}  
	}

?>