<?php
	/**
	 * Página Relatório de Despesas
	 */

	/**
	 * Está página é onde o usuário Emite os Relatórios de Despesas
	 * @package pages/relatorios
	 * 
	 * @return void
	 */
	function relatorio_despesas(){
?>

<?php

    include("bd/conecta_bd.php"); // Importando Conecção com o BD
    include("routes/links.php"); // Importando Links
    include("assets/validations/validate_cartoes.php");

    // Pega o nome do usuário
    $id_usuario = $_SESSION['user']['id'];
    $id_admin = 100;

    // Pegando valores de URL
    // Por Data Mensal
    if( isset($_GET['mes']) && isset($_GET['ano']) ){
        $get_mes = $_GET['mes'];
        $get_ano = $_GET['ano'];

        // Valores de Ganhos por Mês e Ano
        $sql_despesa = "SELECT * FROM cadastrar_despesas WHERE MONTH(data) = $get_mes AND YEAR(data) = $get_ano AND id_cadastrar_usuarios = '$id_usuario'";
        $sel_despesas = $conecta_bd->query($sql_despesa);
        $rows = $sel_despesas->num_rows;
    }

    // Por Período
    if(isset($_GET['date1']) && isset($_GET['date2'])){
        $get_data1 = $_GET['date1'];
        $get_data2 = $_GET['date2'];

        $sql_despesa = "SELECT * FROM cadastrar_despesas WHERE data BETWEEN '$get_data1' AND '$get_data2' AND id_cadastrar_usuarios = '$id_usuario'";
        $sel_despesas = $conecta_bd->query($sql_despesa);
        $rows = $sel_despesas->num_rows;
    }

    // Por dia Especifico
    if( isset($_GET['date']) ){
        $get_day = $_GET['date'];

        $sql_despesa = "SELECT * FROM cadastrar_despesas WHERE data = '$get_day' AND id_cadastrar_usuarios = '$id_usuario'";
        $sel_despesas = $conecta_bd->query($sql_despesa);
        $rows = $sel_despesas->num_rows;
    }

    // Por Tipo de Despesa
    if( isset($_GET['type_despesa']) ){
        $get_type_despesa = $_GET['type_despesa'];

        $sql_despesa = "SELECT * FROM cadastrar_despesas WHERE tipo_despesa = '$get_type_despesa' AND id_cadastrar_usuarios = '$id_usuario'";
        $sel_despesas = $conecta_bd->query($sql_despesa);
        $rows = $sel_despesas->num_rows;
    }

    // Por Tipo de Valores
    if( isset($_GET['type']) || isset($_GET['valor']) ){
        $get_type_renda = $_GET['type'];
        $get_valor = $_GET['valor'];

        if($get_type_renda == "Acima"){
            $sql_despesa = "SELECT * FROM cadastrar_despesas WHERE valor_despesa > '$get_valor' AND id_cadastrar_usuarios = '$id_usuario'";
            $sel_despesas = $conecta_bd->query($sql_despesa);
            $rows = $sel_despesas->num_rows;
        }  else if($get_type_renda == "Abaixo"){
            $sql_despesa = "SELECT * FROM cadastrar_despesas WHERE valor_despesa < '$get_valor' AND id_cadastrar_usuarios = '$id_usuario'";
            $sel_despesas = $conecta_bd->query($sql_despesa);
            $rows = $sel_despesas->num_rows;
        } else if($get_type_renda == "Igual"){
            $sql_despesa = "SELECT * FROM cadastrar_despesas WHERE valor_despesa = '$get_valor' AND id_cadastrar_usuarios = '$id_usuario'";
            $sel_despesas = $conecta_bd->query($sql_despesa);
            $rows = $sel_despesas->num_rows;
        }
        
    }


    // Retorna os tipos de renda
    $sql_tipos_depesas = "SELECT * FROM tipos_de_despesas WHERE id_cadastrar_usuarios = '$id_usuario' OR id_cadastrar_usuarios = '$id_admin'";
    $sel = $conecta_bd->query($sql_tipos_depesas);
?>

<form method="post" action="services/relatorios/relatorio_despesas.php">
    <div class="container">
        <div class="row">
            <p>
                <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Por Data
                </button>
            </p>

            <p>
                <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                    Por Tipo de Despesa
                </button>
            </p>

            <p>
                <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                    Por Valores
                </button>
            </p>
        </div>

        <!-- Por Data -->
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <!-- Escolhe o tipo de Relatório - Select -->
                <div class="row">
                <!-- Escolher o tipo - Mensal, Período ou Dia -->
                    <label class="col-0 col-form-label" style="color: #495057;">
                        <span class="material-icons">
                            category
                        </span>
                    </label>
                    <div class="col-3" style="padding-top: 8px;">
                        <div class="dropdown bootstrap-select form-control form-control-sm dropup">
                            <select id="data_ganhos" class="form-control selectpicker" data-style="btn btn-link" name="data_ganhos">
                                <option>Tipo Data*</option>
                                <option value="Mensal">Mensal</option>
                                <option value="Periodo">Período</option>
                                <option value="Dia Especifico">Dia Especifico</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tipo Mensal - Escolhe Ano e Mês -->

                    <!-- Mês -->
                    <label id="select_data_ganhos_mes_ano1" class="col-0 col-form-label" style="color: #495057; display: none;">
                        <span class="material-icons">
                            date_range
                        </span>
                    </label>
                    <div id="select_data_ganhos_mes_ano2" class="col-2" style="display: none;">
                        <div class="form-group dropdown bootstrap-select form-control form-control-sm dropup">
                            <select id="teste" class="form-control selectpicker" data-style="btn btn-link" name="select_data_ganhos_mes">
                                <option>Mês*</option>
                                <option value="01">Janeiro</option>
                                <option value="02">Fevereiro</option>
                                <option value="03">Março</option>
                                <option value="04">Abril</option>
                                <option value="05">Maio</option>
                                <option value="06">Junho</option>
                                <option value="07">Julho</option>
                                <option value="08">Agosto</option>
                                <option value="09">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>    
                            </select>
                        </div>
                    </div>

                    <!-- Ano -->
                    <label id="select_data_ganhos_mes_ano3" class="col-0 col-form-label" style="color: #495057; display: none;">
                        <span class="material-icons">
                            event
                        </span>
                    </label>
                    <div id="select_data_ganhos_mes_ano4" class="col-2" style="display: none;">
                        <div class="form-group dropdown bootstrap-select form-control form-control-sm dropup">
                            <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1 ano" name="select_data_ganhos_ano">
                                <option value="">Ano*</option>
                                <?php for($i = 2000; $i < 2050; $i++ ): ?>
                                    <option type="submit" value="<?php echo $i ?>" ><?php echo $i ?></option>
                                <?php endfor; ?>
                            </select>    
                        </div>
                    </div>


                    <!-- Tipo Período - Escolhe uma Data até outra data -->
                    <!-- Data 1 -->
                    <label id="periodo1" class="col-0 col-form-label" style="color: #495057; display: none;">
                        <span class="material-icons">
                            <!-- assignment_turned_in -->
                        </span>
                    </label>
                    <div id="periodo2" class="col-2" style="display: none;">
                        <div class="form-group bmd-form-group text-left">
                            <label for="descricao" class="bmd-label-floating"></label>
                            <input id="date_periodo_1" type="date" class="form-control" name="date_periodo_1">
                        </div>
                    </div>
                    
                    <label id="periodo3" class="col-0 col-form-label" style="color: #495057; display: none;">
                        <span class="material-icons">
                            forward
                        </span> 
                    </label>
                    
                    <!-- Data 2 -->
                    <label id="periodo4" class="col-0 col-form-label" style="color: #495057; display: none;">
                        <span class="material-icons">
                            <!-- assignment_turned_in -->
                        </span>
                    </label>
                    <div id="periodo5" class="col-2" style="display: none;">
                        <div class="form-group bmd-form-group text-left">
                            <label for="descricao" class="bmd-label-floating"></label>
                            <input id="date_periodo_2" type="date" class="form-control" name="date_periodo_2">
                        </div>
                    </div>

                    <!-- Tipo Dia Especifico - Escolhe um dia apenas -->
                    <label id="dia_especifico1" class="col-0 col-form-label" style="color: #495057; display: none;">
                        <span class="material-icons">
                            <!-- calendar_today -->
                        </span>
                    </label>
                    <div id="dia_especifico2" class="col-2" style="display: none;">
                        <div class="form-group bmd-form-group text-left">
                            <label for="descricao" class="bmd-label-floating"></label>
                            <input id="date_especifico" type="date" class="form-control" name="date_especifico">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">
                    Relatório Por Data - Emissão Mensal, por Período ou por Dia Especifico!
                </div>
            </div>
        </div>
        
        <!-- Por Tipo de Despesa -->
        <div class="collapse" id="collapseExample2">
            <div class="card card-body">
                <div class="row">
                    <label class="col-0 col-form-label" style="color: #495057;">
                        <span class="material-icons">
                            category
                        </span>
                    </label>
                    <div class="col-3">
                        <div id="" class="form-group dropdown bootstrap-select form-control form-control-sm dropup">
                            <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1 tipo_despesa" name="tipo_despesa">
                                <option value="30">Tipo Despesa*</option>
                                <?php while ( $tipos = $sel->fetch_assoc() ) : ?>
                                    <option value="<?php echo $tipos['tipo_despesa'] ?>"><?php echo $tipos['tipo_despesa'] ?></option>
                                <?php endwhile; ?>         
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">
                    Relatório Por Tipo de Renda - Escolha o tipo de Renda!
                </div>
            </div>
        </div>

        <!-- Por Valores -->
        <div class="collapse" id="collapseExample3">
            <div class="card card-body">
                <div class="row">
                    <label class="col-0 col-form-label" style="color: #495057;">
                        <span class="material-icons">
                            category
                        </span>
                    </label>
                    <div class="col-3">
                        <div id="select_valores" class="form-group dropdown bootstrap-select form-control form-control-sm dropup">
                            <select id="type_valores" class="form-control selectpicker" data-style="btn btn-link" name="type_valores">
                                <option value="50">Tipo Valores*</option>
                                <option value="Acima">Acima de</option>
                                <option value="Abaixo">Abaixo de</option>
                                <option value="Igual">Igual á</option>         
                            </select>
                        </div>
                    </div>
                    <label id="val_acima1" class="col-0 col-form-label" style="color: #495057; display: none;">
                        <span class="material-icons">
                            attach_money
                        </span>
                    </label>
                    <div id="val_acima2" class="col-2" style="display: none;">
                        <div class="form-group bmd-form-group text-left">
                            <label for="descricao" class="bmd-label-floating"></label>
                            <input id="type_valores_input" type="number" step="0.010" class="form-control" name="type_valores_input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">
                    Relatório Por Valores - Valores acima, abaixo ou igual!
                </div>
            </div>
        </div>
    </div>
    <input hidden id="id_usuario" type="text" class="form-control" name="id_usuario">                                
    <div class="row" style="margin-top:20px;" >
        <div class="col">
            <button class="btn btn-success" type="submit">
                Emitir Relatório
            </button>
        </div>
    </div>
</form>


<!-- Tabela Relatório -->

<?php if( isset($get_mes) && isset($get_ano) || isset($get_data1) && isset($get_data2) || isset($get_day) || isset($get_type_despesa) || isset($_GET['type']) && isset($_GET['valor']) ): ?>
    <?php if( $rows > 0 ): ?>
        <div class="row d-flex justify-content-center" style="margin-top: 30px;">
            <!-- Tabela de Ultimas Ganhos adicionados -->
            <div class="col-lg-10 col-md-10">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title text-center">Relatório de Ganhos</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-info text-center">
                                <tr>
                                    <th>Data</th>
                                    <th>Descrição</th>
                                    <th>Tipo Despesa</th>
                                    <th>Tipo Pagamento</th>
                                    <th>Fixa</th>
                                    <th>Valor</th>
                                    <th>Pagamento</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php while ( $dados = $sel_despesas->fetch_assoc() ) : ?>
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
                                        <td><?php  echo $dados['tipo_despesa']?></td>
                                        <td><?php  echo $dados['tipo_pagamento']?></td>
                                        <td><?php  echo $dados['despesa_fixa']?></td>
                                        <td><?php  echo number_format($dados['valor_despesa'],'2',',','.') ?></td>

                                        <!-- Retorna o Valor se For Pagamento A Vista -->
                                        <?php if ($dados['tipo_pagamento'] == "a_vista") : ?>
                                            <?php
                                            // Busca os dados nba tabela de pagamento a_vista
                                                $sql_valor_despesa = "SELECT * FROM pagamentos_a_vista WHERE id_cadastrar_despesas = '$id_dados'";
                                                $sel_valor_despesa = $conecta_bd->query($sql_valor_despesa);
                                            ?>
                                            <?php while ( $valor_vista = $sel_valor_despesa->fetch_assoc() ) : ?>
                                                <td><?php echo $valor_vista['forma_pagamento'] ?></td>
                                            <?php endwhile; ?>

                                        <!-- Retorna valor se for pagamento Parcelado -->
                                        <?php else: ?>
                                            <?php
                                            // Busca os dados nba tabela de pagamento parcelado
                                                $sql_valor_parcela = "SELECT * FROM pagamentos_parcelados WHERE id_cadastrar_despesas = '$id_dados'";
                                                $sel_valor_parcela = $conecta_bd->query($sql_valor_parcela);
                                            ?>
                                            <?php while ( $valor_parcela = $sel_valor_parcela->fetch_assoc() ) : ?>
                                                <td><?php echo $valor_parcela['forma_pagamento'] ?></td>
                                            <?php endwhile; ?>

                                        <?php endif; ?>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Atenção</strong> Não há dados para esta consulta!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
		</div>
    <?php endif; ?>
<?php endif; ?>

<?php }; ?>
<?php relatorio_despesas(); ?>