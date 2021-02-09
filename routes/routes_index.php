<?php

    /**
     * Esta parte verifica qual página será incerida no layou;
     * Quando clicado em algum menu, retornará a pagina solicitada
     * Esta parte verifica qual página será incerida no layou;
     * Quando clicado em algum menu, retornará a pagina solicitada
    */
    if (isset($_GET['sec'])) {

        // Incluindo Diretórios
        $paginate = [
            'usuarios'
        ];

        // Inclusão de Páginas
        $secoes = [
            'login', 
            'cadastrar_usuario',  
            'confirma_cadastro_usuario', 
            'contem_cadastro_usuario', 
            'alterar_senha_usuario', 
            'confirma_altera_senha_usuario'
        ];

        $sec = $_GET['sec'];
        $pages = $_GET['page'];
        
        if (in_array($pages, $paginate) && in_array($sec, $secoes)) { //existe esta secao
            include("pages/" . $pages . "/" . $sec . ".php");
        }else{ // nao existe
            include("pages/usuarios/login.php");
        }
    }else {
        include('./pages/usuarios/login.php');
    }


?>