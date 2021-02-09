<?php
	/**
	 * Página Cadastrar Cartoes
	 */

	/**
	 * Está página é onde o usuário cadastra seus cartoes
	 * @package pages/cartoes
	 * 
	 * @return void
	 */
	function cadastrar_cartoes(){
?>
<?php

    /**
     * Esta Página realiza o cadastro de cartão de crédito
     */

    include("bd/conecta_bd.php"); // Importando Conecção com o BD
    include("routes/links.php"); // Importando Links
    include("assets/validations/validate_cartoes.php");

    // Pega o nome do usuário
    $id_usuario = $_SESSION['user']['id'];

?>

<form method="post" action="<?php echo $serv_cadastrar_cartoes ?>">
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
                    <input id="titulo_cartao" type="text" class="form-control" name="titulo_cartao">
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
                    <input id="banco" type="text" class="form-control" name="banco">
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
                    <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1 bandeira" name="bandeira">
                        <option value="Bandeira">Bandeira</option>
                        <option value="Mastercard">Mastercard</option>
                        <option value="ELO">ELO</option>
                        <option value="Visa">Visa</option>
                        <option value="BrCard">BrCard</option>
                        <option value="Hipercard">Hipercard</option>
                        <option value="American">American Express</option>         
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
                    <input id="limite" type="number" step="0.010" class="form-control" name="limite">
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
                    <input id="limite_disponivel" type="number" step="0.010" class="form-control" name="limite_disponivel">
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
            <div class="col-sm-0">
                <button type="submit" class="btn btn-primary btn-success">
                    <i class="material-icons">save</i> Salvar
                </button>
            </div>

            <!-- Botão Cancelar 
                - Ao clicar no botão cancelar ele retornará a página inicial Dashboard
            -->
            <div class="col-sm-0">
                <a href="<?php echo $main ?>">
                    <button type="button" class="btn btn-success">
                        <i class="material-icons">cancel</i> Cancelar
                    </button>
                </a>
            </div>
        </div>
    </div>
</form>

<!-- Esta div seve apenas para aparecer a borda que fica entre o formulário 
		e a tabela que mostrará os ultimos ganhos	
-->
<div id="espacoForm">
	
</div>
<!-- Fim espaço -->
<!-- Teste -->
<!-- Importando a tabela de cartões cadastrados -->
<?php
    include("inserts/table_cartoes.php");
?>

<?php }; ?>
<?php cadastrar_cartoes(); ?>