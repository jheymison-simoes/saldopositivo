<?php
	/**
	 * Página Cadastrar Metas
	 */

	/**
	 * Está página é onde o usuário cadastrar suas metas e objetivos
	 * @package pages/metas
	 * 
	 * @return void
	 */
	function cadastrar_metas(){
?>
<?php

    /**
     * Esta tela contém o formulário para cadastro de Metas e Objetivos
     * 
     */

    include("bd/conecta_bd.php"); // Importando Conecção com o BD
    include("routes/links.php"); // Importando Links
    include("assets/validations/validate_metas.php");

    // Pega o nome do usuário
    $id_usuario = $_SESSION['user']['id'];
?>

<!-- Inicio do Formulário -->
<form method="post" action="<?php echo $serv_cadastrar_metas ?>">
    <div class="container">
        <div class="row">

            <!-- Escolhe o tipo de Meta - Select -->
            <label class="col-0 col-form-label" style="color: #495057;">
                <span class="material-icons">
                    category
                </span>
            </label>
            <div class="col-3">
                <div class="form-group dropdown bootstrap-select form-control form-control-sm dropup ">
                    <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1 bandeira" name="tipo_meta">
                        <option>Tipo Aquisição</option>
                        <option value="Carro">Carro</option>
                        <option value="Moto">Moto</option>
                        <option value="Casa">Casa</option>
                        <option value="Video-Game">Video-Game</option>
                        <option value="PC">PC</option>
                        <option value="Lancha">Lancha</option>
                        <option value="Viagem">Viagem</option>
                        <option value="Construcao">Construção</option>
                        <option value="Construcao">Poupança</option>
                        <option value="Outros">Outros</option>         
                    </select>
                </div>
            </div>

            <!-- Descrição da Emta ou Objetivo á ser alcançado -->
            <label class="col-0 col-form-label" style="color: #495057;">
                <span class="material-icons">
                    assignment_turned_in
                </span>
            </label>
            <div class="col-5">
                <div class="form-group bmd-form-group text-left">
                    <label for="descricao" class="bmd-label-floating">Sua Meta ou Objetivo a alcançar?</label>
                    <input id="descricao" type="text" class="form-control" name="descricao">
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
                    <label for="valor_meta" class="bmd-label-floating">Valor Total</label>
                    <input id="valor_meta" type="number" step="0.010" class="form-control" name="valor_meta">
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

<!-- Tabela que retorna todos os dados cadastrados de Metas e Objetivos -->
<?php

    include("inserts/table_metas.php");

?>

<?php }; ?>
<?php cadastrar_metas(); ?>