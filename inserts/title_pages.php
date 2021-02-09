
<?php
    /**
     * @isset(): Verifica se a Seção na Página
     * Caso sim:
     * Verifica qual a seção e da um titulo para elas
     * @Var: pageInfo: tipo String, retorna a página atual;
     * É utilizado nos links do menu, para deixa-los ativados quando a página atual estiver sendo usada
     * @Var: pageFormat: tipo String, verifica qual á pagina atual e da um titulo á ela
     * 
     */
        
    if(isset($_GET['sec'])){
            $pageInfo = $_GET['sec'];
        if($pageInfo == "dashboard"){
            $pageFormat = "Dashboard";
        } elseif ($pageInfo == "cadastrar_ganho") {
            $pageFormat = "Cadastrar Ganho";
        } elseif($pageInfo == "edita_ganhos"){
            $pageFormat = "Editar Ganhos";
        } elseif($pageInfo == "deleta_ganhos"){
            $pageFormat = "Deletar Ganho";
        } elseif($pageInfo == "cadastrar_despesa"){
            $pageFormat = "Cadastrar Despesas";
        } elseif($pageInfo == "edita_despesas"){
            $pageFormat = "Editar Despesas";
        } elseif($pageInfo == "deleta_despesas"){
            $pageFormat = "Deletar Despesa";
        } elseif($pageInfo == "cadastrar_cartoes"){
            $pageFormat = "Cadastrar Cartao";
        } elseif($pageInfo == "edita_cartoes"){
            $pageFormat = "Editar Cartao";
        } elseif($pageInfo == "deleta_cartoes"){
            $pageFormat = "Deletar Cartao";
        } elseif($pageInfo == "vizualizar_transacoes"){
            $pageFormat = "Visualizar Transações";
        } elseif($pageInfo == "cadastrar_metas"){
            $pageFormat = "Cadastrar Metas";
        } elseif($pageInfo == "editar_metas"){
            $pageFormat = "Editar Metas";
        } elseif($pageInfo == "deletar_metas"){
            $pageFormat = "Deletar Metas";
        } elseif($pageInfo == "relatorio_ganhos"){
            $pageFormat = "Relatorio de Ganhos";
        } elseif($pageInfo == "relatorio_despesas"){
            $pageFormat = "Relatorio de Despesas";
        } elseif($pageInfo == "relatorio_tipo_pagamento"){
            $pageFormat = "Relatorio de Tipos de Pagamentos";
        } elseif($pageInfo == "vizualizar_perfil"){
            $pageFormat = "Seu Perfil";
        } elseif($pageInfo == "editar_perfil"){
            $pageFormat = "Editar Perfil";
        } elseif($pageInfo == "cadastra_tipo_ganhos"){
            $pageFormat = "Cadastrar Tipos de Ganhos";
        } elseif($pageInfo == "cadastra_tipo_despesas"){
            $pageFormat = "Cadastrar Tipos de Despesas";
        } elseif($pageInfo == "edita_tipo_ganhos"){
            $pageFormat = "Alterar Tipos de Ganhos";
        } elseif($pageInfo == "deleta_tipo_ganhos"){
            $pageFormat = "Deletar Tipo";
        } elseif($pageInfo == "edita_tipo_despesas"){
            $pageFormat = "Alterar Tipos de Despesa";
        } elseif($pageInfo == "deleta_tipo_despesas"){
            $pageFormat = "Deletar Tipo";
        }
    } else {
        $pageFormat = "Dashboard";
        $pageInfo ="dashboard";
    }

?>