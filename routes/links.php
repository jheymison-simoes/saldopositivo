<?php
    
    // Rotas Index
   
    $confirma_cadastro = "index.php?page=usuarios&sec=confirma_cadastro_usuario";
    $contem_cadastro = "index.php?page=usuarios&sec=contem_cadastro_usuario";

    // Rotas do Main
    $dashboard = "main.php?sec=dashboard";
    $novo_ganho = "main.php?page=ganhos&sec=cadastrar_ganho";
    $nova_despesa = "main.php?page=despesas&sec=cadastrar_despesa";
    $transacoes = "main.php?page=transacoes&sec=vizualizar_transacoes";
    $tipo_despesas = "main.php?page=tipodespesas&sec=cadastra_tipo_despesas";

    // Rotas Services

    // despesa
    $cadastra_despesa = "services/despesas/cadastra_despesa.php";
    $edita_despesa = "services/despesas/edita_despesas.php";

    // ganhos
    $cadastra_ganhos = "services/ganhos/cadastra_ganhos.php";
    $edita_ganhos = "services/ganhos/edita_ganhos.php";
    $deleta_ganhos = "services/ganhos/deleta_ganhos.php";

    // tipo depesa
    $cadastra_tipo_despesas = "services/tipodespesas/cadastra_tipo_despesas.php";
    $deleta_tipo_despesas = "services/tipodespesas/deleta_tipo_despesas.php";
    $edita_tipo_despesas = "services/tipodespesas/edita_tipo_despesas.php";

    // tipo ganhos
    $cadastra_tipo_ganhos = "services/tipoganhos/cadastra_tipo_ganhos.php";
    $deleta_tipo_ganhos = "services/tipoganhos/deleta_tipo_ganhos.php";
    $edita_tipo_ganhos = "services/tipoganhos/edita_tipo_ganhos.php";

   

   
// ##############################################################################
    
    /**
     * USUÁRIOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * ALTERAR_SENHA_USUARIO.PHP
     */
    
    $serv_altera_senha = "services/usuarios/altera_senha.php";

    /**
     * USUÁRIOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * CADASTRA_USUARIO.PHP
     */

    $serv_cadastra_usuario = "services/usuarios/cadastra_usuario.php"; //Utilizado

    /**
     * USUÁRIOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * CONTEM_CADASTRO_USUARIO.PHP
     */

    $page_esqueceu_senha = "index.php?page=usuarios&sec=alterar_senha_usuario"; //Utilizado

    /**
     * USUÁRIOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * REALIZA_LOGIN.PHP
     */

    $realiza_login = "services/usuarios/realiza_login.php";

    /**
     * USUÁRIOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * ALTERA_SENHA.PHP
     */
    $senha_alterada = "../../index.php?page=usuarios&sec=confirma_altera_senha_usuario"; //Utilizado
    $erro_senha_alterada = "../../index.php?page=usuarios&sec=alterar_senha_usuario&erro_cadastro=failed"; //Utilizado
    $erro_senha_alt_branco = "../../index.php?page=usuarios&sec=alterar_senha_usuario&erro_cadastro=branco";
    $erro_senha_alt_email_invalido = "../../index.php?page=usuarios&sec=alterar_senha_usuario&erro_cadastro=email"; //Utilizado
    $erro_senha_alt_senha_invalida = "../../index.php?page=usuarios&sec=alterar_senha_usuario&erro_cadastro=senha"; //Utilizado
    $erro_senha_alt_senha_diferente = "../../index.php?page=usuarios&sec=alterar_senha_usuario&erro_cadastro=senhaconf"; //Utilizado
    $erro_senha_alt_email_inexistente = "../../index.php?page=usuarios&sec=alterar_senha_usuario&erro_cadastro=no_email"; //Utilizado
    $page_cadastro_usuario = "index.php?page=usuarios&sec=cadastrar_usuario"; //utilizado
    
    /**
     * USUÁRIOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * CADASTRA_USUARIO.PHP
     */

    $page_confirma_cadastro_usuario = "../../index.php?page=usuarios&sec=confirma_cadastro_usuario";
    $page_contem_cadastro_usuario = "../../index.php?page=usuarios&sec=contem_cadastro_usuario";
    $serv_cadastro_nao_realizado = "../../index.php?page=usuarios&sec=cadastrar_usuario&erro_cadastro=failed";
    $erro_cadastro_branco = "../../index.php?page=usuarios&sec=cadastrar_usuario&erro_cadastro=branco";
    $erro_cadastro_sem_sobrenome = "../../index.php?page=usuarios&sec=cadastrar_usuario&erro_cadastro=nome";
    $erro_cadastro_email_invalido = "../../index.php?page=usuarios&sec=cadastrar_usuario&erro_cadastro=email";
    $erro_cadastro_senha_invalida = "../../index.php?page=usuarios&sec=cadastrar_usuario&erro_cadastro=senha";
    $erro_cadastro_senha_diferente = "../../index.php?page=usuarios&sec=cadastrar_usuario&erro_cadastro=senhaconf";

    /**
     * USUÁRIOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * REALIZA_LOGIN.PHP
     */

    $login_realizado = "../../main.php";
    $erro_login_nao_realizado = "../../index.php?page=usuarios&sec=login&erro_cadastro=failed";
    $erro_login_branco = "../../index.php?page=usuarios&sec=login&erro_cadastro=branco";
    $erro_login_email_invalido = "../../index.php?page=usuarios&sec=login&erro_cadastro=email";
    $erro_login_senha_invalida = "../../index.php?page=usuarios&sec=login&erro_cadastro=senha";

    /**
     * DESPESAS
     * 
     * Links de validação de erros e cadastro 
     * 
     * CADASTRAR_DESPESA.PHP
     */

    $page_cadastrar_despesa = "main.php?page=despesas&sec=cadastrar_despesa";
    $serv_cadastra_despesa = "services/despesas/cadastra_despesa.php";
    $despesa_cadastrada = "../../main.php?page=despesas&sec=cadastrar_despesa&erro_cadastro=sucess";
    $despesa_nao_cadastrada = "../../main.php?page=despesas&sec=cadastrar_despesa&erro_cadastro=failed";
    $erro_cadastro_despesa_branco = "../../main.php?page=despesas&sec=cadastrar_despesa&erro_cadastro=warnning";

    /**
     * DESPESAS
     * 
     * Links de validação de erros e cadastro 
     * 
     * EDITA_DESPESAS.PHP
     */

    $serv_edita_despesa = "services/despesas/edita_despesas.php";
    $erro_edita_despesas_branco = "../../main.php?page=despesas&sec=edita_despesas&id=";
    $despesa_editada = "../../main.php?page=despesas&sec=cadastrar_despesa&erro_cadastro=sucess";
    $despesa_nao_editada = "../../main.php?page=despesas&sec=cadastrar_despesa&erro_cadastro=failed";

    /**
     * DESPESAS
     * 
     * Links de validação de erros e cadastro 
     * 
     * DELETA_DESPESAS.PHP
     */

    $serv_deleta_despesas = "services/despesas/deleta_despesas.php";
    $despesa_deletada = "../../main.php?page=despesas&sec=cadastrar_despesa&erro_deletar=sucess";
    $despesa_nao_deletada = "../../main.php?page=despesas&sec=cadastrar_despesa&erro_deletar=failed";

    /**
     * GANHOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * CADASTRAR_GANHO.PHP
     * 
     */

    $serv_cadastra_ganhos = "services/ganhos/cadastra_ganho.php";
    $ganho_cadastrado = "../../main.php?page=ganhos&sec=cadastrar_ganho&erro_cadastro=sucess";
    $ganho_nao_cadastrado = "../../main.php?page=ganhos&sec=cadastrar_ganho&erro_cadastro=failed";
    $erro_cadastro_ganhos_branco = "../../main.php?page=ganhos&sec=cadastrar_ganho&erro_cadastro=warnning";
    $page_cadastrar_ganho = "main.php?page=ganhos&sec=cadastrar_ganho";

    /**
     * GANHOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * EDITA_GANHO.PHP
     * 
     */

    $serv_edita_ganhos = "services/ganhos/edita_ganhos.php";
    $edita_ganhos_branco = "../../main.php?sec=edita_ganhos&";
    $ganho_editado = "../../main.php?page=ganhos&sec=cadastrar_ganho&erro_alterar=sucess";
    $ganho_nao_editado = "../../main.php?page=ganhos&sec=cadastrar_ganho&erro_alterar=failed";
    
    /**
     * GANHOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * DELETA_GANHO.PHP
     * 
     */
    $serv_delata_ganho = "services/ganhos/deleta_ganhos.php";
    $ganho_deletado = "../../main.php?page=ganhos&sec=cadastrar_ganho&erro_deletar=sucess";
    $ganho_nao_deletado = "../../main.php?page=ganhos&sec=cadastrar_ganho&erro_deletar=failed";
    
    /**
     * CARTÕES
     * 
     * Links de validação de erros e cadastro 
     * 
     * CADASTRAR_CARTOES.PHP
     * 
     */

    $page_cadastrar_cartoes = "main.php?page=cartoes&sec=cadastrar_cartoes";
    $serv_cadastrar_cartoes = "services/cartoes/cadastra_cartoes.php";
    $erro_cadastrar_cartoes_branco = "../../main.php?page=cartoes&sec=cadastrar_cartoes&erro_cadastro=warnning";
    $cartao_cadastrado = "../../main.php?page=cartoes&sec=cadastrar_cartoes&erro_cadastro=sucess";
    $cartao_nao_cadastrado = "../../main.php?page=cartoes&sec=cadastrar_cartoes&erro_cadastro=failed";

    /**
     * CARTÕES
     * 
     * Links de validação de erros e cadastro 
     * 
     * EDITA_CARTOES.PHP
     * 
     */

    $serv_edita_cartoes = "services/cartoes/edita_cartoes.php";
    $erro_edita_cartoes_branco = "../../main.php?page=cartoes&sec=edita_cartoes";

    /**
     * CARTÕES
     * 
     * Links de validação de erros e cadastro 
     * 
     * DELETA_CARTOES.PHP
     * 
     */
    $serv_deleta_cartoes = "services/cartoes/deleta_cartoes.php";
    $cartao_deletado = "../../main.php?page=cartoes&sec=cadastrar_cartoes&erro_deletar=sucess";
    $cartao_nao_deletado = "../../main.php?page=cartoes&sec=cadastrar_cartoes&erro_deletar=failed";

    /**
     * METAS E OBJETIVOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * CADASTRA_METAS.PHP
     * 
     */

    $serv_cadastrar_metas = "services/metas/cadastra_metas.php";
    $erro_metas_branco = "../../main.php?page=metas&sec=cadastrar_metas&erro_cadastro=warnning";
    $metas_cadastrada = "../../main.php?page=metas&sec=cadastrar_metas&erro_cadastro=success";
    $metas_nao_cadastrada = "../../main.php?page=metas&sec=cadastrar_metas&erro_cadastro=failed";
    $page_cadastrar_metas = "main.php?page=metas&sec=cadastrar_metas";

    /**
     * METAS E OBJETIVOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * DELETA_METAS.PHP
     * 
     */
    $serv_deleta_metas = "services/metas/deleta_metas.php";

    /**
     * METAS E OBJETIVOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * EDITA_METAS.PHP
     * 
     */
    $serv_edita_metas = "services/metas/edita_metas.php";
    $erro_editar_metas_branco = "../../main.php?page=metas&sec=editar_metas";

    /**
     * TIPOS DE GANHOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * TIPOS_DE_GANHOS.PHP
     * 
     */
    $serv_cadastra_tipo_ganhos = "services/tipoganhos/cadastra_tipo_ganhos.php";
    $erro_tipo_ganho_branco = "../../main.php?page=tipoganhos&sec=cadastra_tipo_ganhos&erro_cadastro=warnning";
    $erro_tipo_ganho_ja_cadastrado = "../../main.php?page=tipoganhos&sec=cadastra_tipo_ganhos&erro_cadastro=info";
    $tipo_ganhos_cadastrado = "../../main.php?page=tipoganhos&sec=cadastra_tipo_ganhos&erro_cadastro=sucess";
    $tipo_ganhos_nao_cadastrado = "../../main.php?page=tipoganhos&sec=cadastra_tipo_ganhos&erro_cadastro=failed";
    $page_cadastra_tipo_ganho = "main.php?page=tipoganhos&sec=cadastra_tipo_ganhos";

    /**
     * TABELA TIPOS DE GANHOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * EDITA_TIPOS_GANHOS.PHP
     * 
     */
    $serv_edita_tipo_ganhos = "services/tipoganhos/edita_tipo_ganhos.php";
    $erro_edita_tipo_ganhos_branco = "../../main.php?page=tipoganhos&sec=edita_tipo_ganhos";
    $tipo_ganhos_editado = "../../main.php?page=tipoganhos&sec=cadastra_tipo_ganhos&erro_alterar=sucess";
    $tipo_ganhos_nao_editado = "../../main.php?page=tipoganhos&sec=edita_tipo_ganhos&erro_alterar=failed";
    $page_edita_tipo_ganhos = "main.php?page=tipoganhos&sec=edita_tipo_ganhos";


    /**
     * TABELA TIPOS DE GANHOS
     * 
     * Links de validação de erros e cadastro 
     * 
     * DELETA_TIPOS_DE_GANHOS.PHP
     * 
     */
    $serv_deleta_tipo_ganhos = "services/tipoganhos/deleta_tipo_ganhos.php";
    $tipo_ganho_deletado = "../../main.php?page=tipoganhos&sec=cadastra_tipo_ganhos&erro_deletar=sucess";
    $tipo_ganho_nao_deletado = "../../main.php?page=tipoganhossec=cadastra_tipo_ganhos&erro_deletar=failed";
    $page_deleta_tipo_ganhos = "main.php?page=tipoganhos&sec=deleta_tipo_ganhos";

    /**
     * TIPOS DE DEPESAS
     * 
     * Links de validação de erros e cadastro 
     * 
     * CADASTRA_TIPO_DESPESAS.PHP
     * 
     */
    $serv_cadastra_tipo_despesas = "services/tipodespesas/cadastra_tipo_despesas.php";
    $erro_tipo_despesa_branco = "../../main.php?page=tipodespesas&sec=cadastra_tipo_despesas&erro_cadastro=warnning";
    $erro_tipo_despesa_ja_cadastrado = "../../main.php?page=tipodespesas&sec=cadastra_tipo_despesas&erro_cadastro=info";
    $tipo_despesa_cadastrado = "../../main.php?page=tipodespesas&sec=cadastra_tipo_despesas&erro_cadastro=sucess";
    $tipo_despesa_nao_cadastrado = "../../main.php?page=tipodespesas&sec=cadastra_tipo_despesas&erro_cadastro=failed";
    $page_tipo_despesas = "main.php?page=tipodespesas&sec=cadastra_tipo_despesas";
    
    /**
     * TABELA TIPOS DE DESPESAS
     * 
     * Links de validação de erros e cadastro 
     * 
     * EDITA_TIPOS_DESPESAS.PHP
     * 
     */
    $erro_edita_tipo_despesas_branco = "../../main.php?page=tipodespesas&sec=edita_tipo_despesas";
    $tipo_despesa_alterado = "../../main.php?page=tipodespesas&sec=cadastra_tipo_despesas&erro_alterar=sucess";
    $tipo_despesa_nao_alterado = "../../main.php?page=tipodespesas&sec=cadastra_tipo_despesas&erro_alterar=failed";

    /**
     * TABELA TIPOS DE DESPESAS
     * 
     * Links de validação de erros e cadastro 
     * 
     * DELETA_TIPOS_DESPESAS.PHP
     * 
     */
    $serv_delata_tipo_depesas = "services/tipodespesas/deleta_tipo_despesas.php";
    $tipo_despesas_deletado = "../../main.php?page=tipodespesas&sec=cadastra_tipo_despesas&erro_deletar=sucess";
    $tipo_despesas_nao_deletado = "../../main.php?page=tipodespesas&sec=cadastra_tipo_despesas&erro_deletar=failed";

    // Index
    $index = "index.php"; //Utilizado

    // Main
    $main = "main.php"; //Utilizado
?>