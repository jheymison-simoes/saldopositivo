<?php
	/**
	 * Página Editar Cartoes
	 */

	/**
	 * Está página é onde o usuário edita seus cartoes
	 * @package pages/cartoes
	 * 
	 * @return void
	 */
	function editar_cartoes(){
?>
<?php

    /**
     * Esta Página realiza a edição de um cadastro de cartão de crédito
     */

    include("bd/conecta_bd.php"); // Importando banco de dados
    include("routes/links.php"); // Importando Links

    // Validação de Erro
    if (isset($_GET['erro_alterar']) ) {
		$erro_alterar = $_GET['erro_alterar'];
		// Sucesso - Todos os requisitos foram aceitos
		if ($erro_alterar == 'warnning') {
			echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					  <strong>AVISO</strong> Campos em branco!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		}
	}

    $id = $_GET['id'];

    $sql_cartoes = "SELECT * FROM cadastrar_cartoes WHERE id = '$id'";
    $sel_cartoes = $conecta_bd->query($sql_cartoes);
    $cartoes = $sel_cartoes -> fetch_assoc();

    // Valores
    $titulo = $cartoes['titulo'];
    $banco = $cartoes['banco'];
    $bandeira = $cartoes['bandeira'];
    $limite_total = $cartoes['limite_total'];
    $limite_disponivel = $cartoes['limite_disponivel'];

?>

<form method="post" action="<?php echo $serv_edita_cartoes ?>">
    <div class="container">
        <div class="row">
            <!-- Titulo do Cartão -->
            <label class="col-0 col-form-label" style="color: #495057;">
                <span class="material-icons">
                    subtitles
                </span>
            </label>
            <div class="col-4">
                <div class="form-group bmd-form-group text-left">
                    <label for="titulo_cartao" class="bmd-label-floating">Dê um titulo ao Cartão</label>
                    <input id="titulo_cartao" type="text" class="form-control" name="titulo_cartao" value="<?php echo $titulo ?>">
                </div>
            </div>

            <!-- Banco do Cartão -->
            <label class="col-0 col-form-label" style="color: #495057;">
                <span class="material-icons">
                    account_balance
                </span>
            </label>
            <div class="col-4">
                <div class="form-group bmd-form-group text-left">
                    <label for="banco" class="bmd-label-floating">Banco do Cartão</label>
                    <input id="banco" type="text" class="form-control" name="banco" value="<?php echo $banco ?>">
                </div>
            </div>

            <!-- Bandeira do Cartão - Select -->
            <label class="col-0 col-form-label" style="color: #495057;">
                <span class="material-icons">
                    emoji_flags
                </span>
            </label>
            <div class="col-3">
                <div class="form-group dropdown bootstrap-select form-control form-control-sm dropup ">
                    <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1 tipo_renda" name="bandeira">
                        <option value="Bandeira">Bandeira</option>
                        <option value="Mastercard" <?=($bandeira == "Mastercard")?'selected':''?> >Mastercard</option>
                        <option value="ELO" <?=($bandeira == "ELO")?'selected':''?> >ELO</option>
                        <option value="Visa" <?=($bandeira == "Visa")?'selected':''?> >Visa</option>
                        <option value="BrCard" <?=($bandeira == "BrCard")?'selected':''?> >BrCard</option>
                        <option value="Hipercard" <?=($bandeira == "Hipercard")?'selected':''?> >Hipercard</option>
                        <option value="American" <?=($bandeira == "American")?'selected':''?> >American Express</option>         
                    </select>
                </div>
            </div>

            <!-- Limite Total do Cartão -->
            <label class="col-0 col-form-label" style="color: #495057;">
                <span class="material-icons">
                    monetization_on
                </span>
            </label>
            <div class="col-2">
                <div class="form-group bmd-form-group text-left">
                    <label for="limite" class="bmd-label-floating">Limite Total</label>
                    <input id="limite" type="number" step="0.010" class="form-control" name="limite" value="<?php echo $limite_total ?>">
                </div>
            </div>

            <!-- Limite Disponivel do Cartão -->
            <label class="col-0 col-form-label" style="color: #495057;">
                <span class="material-icons">
                    attach_money
                </span>
            </label>
            <div class="col-2">
                <div class="form-group bmd-form-group text-left">
                    <label for="limite_disponivel" class="bmd-label-floating">Limite Disponivel</label>
                    <input id="limite_disponivel" type="number" step="0.010" class="form-control" name="limite_disponivel" value="<?php echo $limite_disponivel ?>">
                </div>
            </div>
        </div>

        <!-- Inicio - Botões Salvar e Cancelar -->
        <div class="row" style="margin-top: 10px; margin-left: 15px;">
            <!-- Botão Salvar
                - ao clicar em salvar ele pegará os dados inseridos e selecionados
                e adicionárá ao Banco de dados
            -->
            <input hidden value="<?php echo $id_usuario ?>" name="id_usuario">
            <input hidden value="<?php echo $id ?>" name="id">
            <div class="col-sm-0">
                <button type="submit" class="btn btn-primary btn-success">
                    <i class="material-icons">save</i> Salvar
                </button>
            </div>

            <!-- Botão Cancelar 
                - Ao clicar no botão cancelar ele retornará a página inicial Dashboard
            -->
            <div class="col-sm-0">
                <a href="<?php echo $page_cadastrar_cartoes ?>">
                    <button type="button" class="btn btn-success">
                        <i class="material-icons">cancel</i> Cancelar
                    </button>
                </a>
            </div>
        </div>
    </div>
</form>
<?php }; ?>
<?php editar_cartoes(); ?>