// ---------------------- ### Tela Dashboard ### --------------------------------


// function retornaMesAno(){
//    var mes = document.getElementById('meses');
//    var ano = document.getElementById('anos');
//    // verifica qual option foi selecionado
//    var valor_mes = mes.options[mes.selectedIndex].value;
//    var valor_ano = ano.options[ano.selectedIndex].value;
//    document.getElementById('result_mes').innerHTML = valor_mes;
//    document.getElementById('result_ano').innerHTML = valor_ano;
// }

// $(document).change(function (){ retornaMesAno() });
// $(document).ready(function (){ retornaMesAno() });
document.getElementById('meses').addEventListener('change', function() {
   this.form.submit();
});

document.getElementById('anos').addEventListener('change', function() {
   this.form.submit();
});

// $(document).change(function (){
//    var mes = document.getElementById('meses');
//    var ano = document.getElementById('anos');
//    // verifica qual option foi selecionado
//    var valor_mes = mes.options[mes.selectedIndex].value;
//    var valor_ano = ano.options[ano.selectedIndex].value;


//    document.getElementById('result').innerHTML = valor_mes + "/" + valor_ano;
// });



// $(document).ready(function () {

//     // Pega o valor do select
// var mes = document.getElementById('meses');
// var ano = document.getElementById('anos');
// // verifica qual option foi selecionado
// var valor_mes = mes.options[mes.selectedIndex].value;
// var valor_ano = ano.options[ano.selectedIndex].value;


// document.getElementById('result').innerHTML = valor_mes + "/" + valor_ano;

// // // pega o value dos input que usei 
// // var mes_janeiro = document.getElementById('mes_janeiro').innerHTML;
// // var mes_fevereiro = document.getElementById('mes_fevereiro').innerHTML;
// // var mes_marco = document.getElementById('mes_marco').innerHTML;
// // var mes_abril = document.getElementById('mes_abril').innerHTML;
// // var mes_maio = document.getElementById('mes_maio').innerHTML;

// // if( valor_select == 1 ){
// //     document.getElementById("total_ganhos").innerHTML = mes_janeiro;
// // } else if ( valor_select == 2 ) {
// //    document.getElementById("total_ganhos").innerHTML = mes_fevereiro;
// // } else if ( valor_select == 3 ) {
// //    document.getElementById("total_ganhos").innerHTML = mes_marco;
// // } else if ( valor_select == 4 ) {
// //    document.getElementById("total_ganhos").innerHTML = mes_abril;
// // } else if ( valor_select == 5 ) {
// //    document.getElementById("total_ganhos").innerHTML = mes_maio;
// // } else {
// //     document.getElementById("total_ganhos").innerHTML = "<small>R$</small> 0,00";
// // }

// });