<?php
	//  Realiza a verificação de erro retornado pelo cadastra_tipo_ganhos
	//  Após verificado se os campos de preenchimento estão corretos
	//  Exibe mensagem de Sucesso e de Aviso
	//  Sucesso quando todos os requisitos forem atendidos
	//  Aviso quando algum campo não for preenchido corretamente
	
	// Erro ao cadastrar
	if (isset($_GET['erro_cadastro']) ) {
        $erro = $_GET['erro_cadastro'];

        if($erro == 'branco'){
            $msg_email = "<label id='erro_nome_cadastrar' class='error'>Preencha este campo!</label>";
            $msg_senha = "<label id='erro_nome_cadastrar' class='error'> Preencha este campo!</label>";
			$msg_senha_conf = "<label id='erro_nome_cadastrar' class='error'> Preencha este campo!</label>";
			$msg_failed = "";
        } if( $erro == 'nome' ){
            $msg_email = "<label id='erro_nome_cadastrar' class='error'></label>";
            $msg_senha = "<label id='erro_nome_cadastrar' class='error'></label>";
			$msg_senha_conf = "<label id='erro_nome_cadastrar' class='error'></label>";
			$msg_failed = "";
        } else if( $erro == 'email' ){
            $msg_email = "<label id='erro_nome_cadastrar' class='error'>Preencha este campo com um e-mail válido!</label>";
            $msg_senha = "<label id='erro_nome_cadastrar' class='error'></label>";
			$msg_senha_conf = "<label id='erro_nome_cadastrar' class='error'></label>";
			$msg_failed = "";
        } else if( $erro == 'senha' ){
            $msg_email = "<label id='erro_nome_cadastrar' class='error'></label>";
            $msg_senha = "<label id='erro_nome_cadastrar' class='error'> A senha deve conter ao menos 01 letra maiuscula, 01 minuscula, 01 numero e 06 caracteres!</label>";
			$msg_senha_conf = "<label id='erro_nome_cadastrar' class='error'></label>";
			$msg_failed = "";
        } else if( $erro == 'senhaconf' ){
            $msg_email = "<label id='erro_nome_cadastrar' class='error'></label>";
            $msg_senha = "<label id='erro_nome_cadastrar' class='error'></label>";
			$msg_senha_conf = "<label id='erro_nome_cadastrar' class='error'>As senhas devem ser exatas!</label>";
			$msg_failed = "";
        } else if( $erro == 'no_email' ){
            $msg_email = "<label id='erro_nome_cadastrar' class='error'>Email Não Existe!</label>";
            $msg_senha = "<label id='erro_nome_cadastrar' class='error'></label>";
			$msg_senha_conf = "<label id='erro_nome_cadastrar' class='error'></label>";
			$msg_failed = "";
        } else if( $erro == 'failed' ){
			$msg_failed = "<div class='alert alert-danger' role='alert'>
								Cadastro não realizado!
		  				   </div>";
		}
        
    } else {
        $msg_email = "";
        $msg_senha = "";
        $msg_senha_conf = "";
		$msg_failed = "";
    }
?>