
<?php
    /*  
        Esta parte verifica qual página será incerida no layou;
        Quando clicado em algum menu, retornará a pagina solicitada

        @Var isset: verifica se á páginas;
        @Var secoes: instaciamento das páginas criadas;
        @Var sec: recebe as páginas criadas;
        @in_array: verifica as páginas e as jogam na url, caso não exista a página solicitada retorna a página principal.
    */

    if (isset($_GET['sec']) && isset($_GET['page'])) {
    
        // Inclusão do diretório
        $paginate = [
            'ganhos',
            'despesas',
            'cartoes',
            'tipoganhos',
            'tipodespesas',
            'transacoes',
            'metas',
            'relatorios',
            'usuarios',
            'perfil'
        ];

        // Inclusão das páginas
        $secoes = [
            'cadastrar_ganho', 
            'edita_ganhos', 
            'deleta_ganhos', 
            'cadastrar_despesa', 
            'edita_despesas',
            'deleta_despesas',
            'cadastrar_cartoes',
            'edita_cartoes',
            'deleta_cartoes', 
            'vizualizar_transacoes',
            'cadastrar_metas',
            'editar_metas',
            'deletar_metas',
            'relatorio_ganhos',
            'relatorio_despesas',
            'relatorio_tipo_pagamento',
            'vizualizar_perfil',
            'editar_perfil',
            'cadastra_tipo_ganhos', 
            'cadastra_tipo_despesas', 
            'edita_tipo_ganhos', 
            'deleta_tipo_ganhos', 
            'edita_tipo_despesas', 
            'deleta_tipo_despesas' 
        ];

        $sec = $_GET['sec'];
        $pages = $_GET['page'];

        if (in_array($pages, $paginate) && in_array($sec, $secoes)) { //existe esta secao
            
            include("pages/" . $pages . "/" . $sec . ".php");

        }else{ // nao existe
            include("pages/dashboard.php");
        }
    }else {
        include('./pages/dashboard.php');
    }
?>