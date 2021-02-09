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
			$msg_failed = "";
        } else if( $erro == 'email' ){
            $msg_email = "<label id='erro_nome_cadastrar' class='error'>Preencha este campo com um e-mail válido!</label>";
            $msg_senha = "<label id='erro_nome_cadastrar' class='error'></label>";
			$msg_failed = "";
        } else if( $erro == 'senha' ){
            $msg_email = "<label id='erro_nome_cadastrar' class='error'></label>";
            $msg_senha = "<label id='erro_nome_cadastrar' class='error'> A senha deve conter ao menos 01 letra maiuscula, 01 minuscula, 01 numero e 06 caracteres!</label>";
			$msg_failed = "";
        } else if( $erro == "failed" ){
            $msg_email = "<label id='erro_nome_cadastrar' class='error'>Email e ou Senha digitados incorretamente, ou não há cadastro para este e-mail!</label>";
            $msg_senha = "<label id='erro_nome_cadastrar' class='error'>Email e ou Senha digitados incorretamente, ou não há cadastro para este e-mail!</label>";
			$msg_failed = "";
        }
        
    } else {
        $msg_email = "";
        $msg_senha = "";
		$msg_failed = "";
    }
?>