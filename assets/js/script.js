

// ---------------------- ### Cadastrar Despesas ### --------------------------------
// Mostra Pagamento a vista quando selecionado a opção no Select tipo de pagamento
$('#tipo_pagamento').change(function () {

    var es_tipo = document.getElementById('tipo_pagamento');
    var mostrar_a_vista = document.getElementById('mostra_linha_vista');
    var mostrar_parcelado = document.getElementById('mostra_linha_parcelado');
    var mostrar_linha_valor = document.getElementById('linha_parcelas_valor');
    var desativar_checkbox = document.getElementById('despesa_fixa');

    esValor_tipo = es_tipo.options[es_tipo.selectedIndex].value;
    console.log(esValor_tipo);

    if(esValor_tipo == "a_vista"){
    	mostrar_a_vista.style.display = 'flex';
    	mostrar_parcelado.style.display = 'none';
    	mostrar_linha_valor.style.display = 'none';
        desativar_checkbox.classList.remove("disabled");

    } else if( esValor_tipo == "parcelado" ){
    	mostrar_parcelado.style.display = 'flex';
    	mostrar_a_vista.style.display = 'none';
        desativar_checkbox.classList.add("disabled");

    } else {
    	mostrar_a_vista.style.display = 'none';
    	mostrar_parcelado.style.display = 'none';
    	mostrar_linha_valor.style.display = 'none';
    }
});

// Mostra os cartões cadastrados quando selecionado Cartão no Select de Forma de Pagamento a Vista
$('#forma_pagamento_vista').change(function () {

    var es = document.getElementById('forma_pagamento_vista');
    var mostrar_icone_vista = document.getElementById('mostra_icone_vista');
    var mostrar_cartao_vista = document.getElementById('mostra_cartao_vista');
    var mostrar_icone_parcelado = document.getElementById('mostra_icone_vista');
    var mostrar_cartao_parcelado = document.getElementById('mostra_cartao_vista')

    esValor = es.options[es.selectedIndex].value;
    console.log(esValor);

    if(esValor == "cartao_vista"){
    	mostrar_icone_vista.style.display = 'block';
    	mostrar_cartao_vista.style.display = 'block';

    } else {
    	mostrar_icone_vista.style.display = 'none';
    	mostrar_cartao_vista.style.display = 'none';
    }
});


// Mostra os cartões cadastrados quando selecionado Cartão no Select de Forma de Pagamento a Vista
$('#forma_pagamento_parcelado').change(function () {

    var esP = document.getElementById('forma_pagamento_parcelado');
    var mostrar_icone_parcelado = document.getElementById('mostra_icone_parcelado');
    var mostrar_cartao_parcelado = document.getElementById('mostra_cartao_parcelado');
	var mostrar_linha_valor = document.getElementById('linha_parcelas_valor');

    esValorP = esP.options[esP.selectedIndex].value;
    console.log(esValorP);

    if(esValorP == "cartao_parcelado"){
    	mostrar_icone_parcelado.style.display = 'block';
    	mostrar_cartao_parcelado.style.display = 'block';
    	mostrar_linha_valor.style.display = 'flex';

    } else if ( esValorP != "tipo" ) {
    	mostrar_linha_valor.style.display = 'flex';
    	mostrar_icone_parcelado.style.display = 'none';
    	mostrar_cartao_parcelado.style.display = 'none';

    } else {
    	mostrar_icone_parcelado.style.display = 'none';
    	mostrar_cartao_parcelado.style.display = 'none';
    	mostrar_linha_valor.style.display = 'none';
    }
});

// ---------------------- ### Verifica o Checks dos Relatórios ### --------------------------------
$('#data_ganhos').change(function () {

    var v = document.getElementById('data_ganhos');
    va = v.options[v.selectedIndex].value;
    console.log(va);

    // Mostra mes e Ano
    var mostrar_mensal1 = document.getElementById('select_data_ganhos_mes_ano1');
    var mostrar_mensal2 = document.getElementById('select_data_ganhos_mes_ano2');
    var mostrar_mensal3 = document.getElementById('select_data_ganhos_mes_ano3');
    var mostrar_mensal4 = document.getElementById('select_data_ganhos_mes_ano4');

    // Mostra Período
    var mostrar_periodo1 = document.getElementById('periodo1');
    var mostrar_periodo2 = document.getElementById('periodo2');
    var mostrar_periodo3 = document.getElementById('periodo3');
    var mostrar_periodo4 = document.getElementById('periodo4');
    var mostrar_periodo5 = document.getElementById('periodo5');

    // Mostra Dia Especifico
    var mostrar_dia_especifico1 = document.getElementById('dia_especifico1');
    var mostrar_dia_especifico2 = document.getElementById('dia_especifico2');

    if(va == "Mensal"){
        // Mostra Mensal
        mostrar_mensal1.style.display = 'block';
        mostrar_mensal2.style.display = 'block';
        mostrar_mensal3.style.display = 'block';
        mostrar_mensal4.style.display = 'block';

        // Esconde Período
        mostrar_periodo1.style.display = 'none';
        mostrar_periodo2.style.display = 'none';
        mostrar_periodo3.style.display = 'none';
        mostrar_periodo4.style.display = 'none';
        mostrar_periodo5.style.display = 'none';

        // Esconde Dia Especifico
        mostrar_dia_especifico1.style.display = 'none';
        mostrar_dia_especifico2.style.display = 'none';

    } else if(va == "Periodo"){
        // Esconde Mensal
        mostrar_mensal1.style.display = 'none';
        mostrar_mensal2.style.display = 'none';
        mostrar_mensal3.style.display = 'none';
        mostrar_mensal4.style.display = 'none';

        // Mostra Período
        mostrar_periodo1.style.display = 'block';
        mostrar_periodo2.style.display = 'block';
        mostrar_periodo3.style.display = 'block';
        mostrar_periodo4.style.display = 'block';
        mostrar_periodo5.style.display = 'block';

        // Esconde Dia Especifico
        mostrar_dia_especifico1.style.display = 'none';
        mostrar_dia_especifico2.style.display = 'none';

    } else if(va == "Dia Especifico"){
        // Esconde Mensal
        mostrar_mensal1.style.display = 'none';
        mostrar_mensal2.style.display = 'none';
        mostrar_mensal3.style.display = 'none';
        mostrar_mensal4.style.display = 'none';

        // Esconde Período
        mostrar_periodo1.style.display = 'none';
        mostrar_periodo2.style.display = 'none';
        mostrar_periodo3.style.display = 'none';
        mostrar_periodo4.style.display = 'none';
        mostrar_periodo5.style.display = 'none';

        // Mostra Dia Especifico
        mostrar_dia_especifico1.style.display = 'block';
        mostrar_dia_especifico2.style.display = 'block';
    } else {
        // Esconde Mensal
        mostrar_mensal1.style.display = 'none';
        mostrar_mensal2.style.display = 'none';
        mostrar_mensal3.style.display = 'none';
        mostrar_mensal4.style.display = 'none';

        // Esconde Período
        mostrar_periodo1.style.display = 'none';
        mostrar_periodo2.style.display = 'none';
        mostrar_periodo3.style.display = 'none';
        mostrar_periodo4.style.display = 'none';
        mostrar_periodo5.style.display = 'none';

        // Esconde Dia Especifico
        mostrar_dia_especifico1.style.display = 'none';
        mostrar_dia_especifico2.style.display = 'none';
    }
});

$('#type_valores').change(function () {

    var val = document.getElementById('type_valores');
    valores = val.options[val.selectedIndex].value;
    console.log(valores);

    var val_acima1 = document.getElementById('val_acima1');
    var val_acima2 = document.getElementById('val_acima2');

    if(valores == "Acima" || valores == "Abaixo" || valores == "Igual"){
        val_acima1.style.display = 'block';
        val_acima2.style.display = 'block';
    } else {
        val_acima1.style.display = 'none';
        val_acima2.style.display = 'none';
    }

});


// ---------------------- ### Efeito Máquina de Escrever Login ### --------------------------------

function typeWrite(elemento){
    const textoArray = elemento.innerHTML.split('');
    elemento.innerHTML = ' ';
    textoArray.forEach(function(letra, i){   
      
    setTimeout(function(){
        elemento.innerHTML += letra;
    }, 75 * i)

  });
};
const titulo = document.querySelector('.texto_login');
typeWrite(titulo);



// ---------------------- ### Exibe e oculta a senha no input senha no cadastrar usuário ### --------------------------------

// Mostra a Senha digitada quando clicado no icone de olho
let visibilidade = document.querySelector('.senha_cadastrar_icon');

// Visibilidade do input Senha - Cadastrar
visibilidade.addEventListener('click', function() {
    let senha_cadastro = document.querySelector('#senha_cadastrar');
    if(senha_cadastro.getAttribute('type') == 'password') {
        senha_cadastro.setAttribute('type', 'text');
        visibilidade.innerHTML = "visibility_off";
    } else {
        senha_cadastro.setAttribute('type', 'password');
        visibilidade.innerHTML = "visibility";
    }
});

// Visibilidade do input Senha Confirmação - Cadastrar
// Mostra a Senha digitada quando clicado no icone de olho
let visibilidade1 = document.querySelector('.senha_conf_icon');
visibilidade1.addEventListener('click', function() {
    let senha_conf = document.querySelector('#conf_senha');
    if(senha_conf.getAttribute('type') == 'password') {
        senha_conf.setAttribute('type', 'text');
        visibilidade1.innerHTML = "visibility_off";
    } else {
        senha_conf.setAttribute('type', 'password');
        visibilidade1.innerHTML = "visibility";
    }
});


// ---------------------- ### Exibe e oculta a senha no input senha no alterar senha ### --------------------------------

// Mostra a Senha digitada quando clicado no icone de olho
let visibilidade2 = document.querySelector('.senha_alterar_icon');

// Visibilidade do input Senha - Cadastrar
visibilidade2.addEventListener('click', function() {
    let senha_alterar = document.querySelector('#senha_alterar');
    if(senha_alterar.getAttribute('type') == 'password') {
        senha_alterar.setAttribute('type', 'text');
        visibilidade2.innerHTML = "visibility_off";
    } else {
        senha_alterar.setAttribute('type', 'password');
        visibilidade2.innerHTML = "visibility";
    }
});

// Visibilidade do input Senha Confirmação - Cadastrar
// Mostra a Senha digitada quando clicado no icone de olho
let visibilidade3 = document.querySelector('.senha_altconf_icon');
visibilidade3.addEventListener('click', function() {
    let senha_altconf = document.querySelector('#altconf_senha');
    if(senha_altconf.getAttribute('type') == 'password') {
        senha_altconf.setAttribute('type', 'text');
        visibilidade3.innerHTML = "visibility_off";
    } else {
        senha_altconf.setAttribute('type', 'password');
        visibilidade3.innerHTML = "visibility";
    }
});


