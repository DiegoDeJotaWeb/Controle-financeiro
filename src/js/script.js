 var categoriaLista = document.querySelectorAll('.categoria');
 tamanho = categoriaLista.length;

 var valor = document.querySelectorAll('.valorLista');


 temanho = valor.length;
 v = 0;


 for (var i = 0; i < categoriaLista.length; i++) {

     var cat = categoriaLista[i];
     catTxt = cat.textContent;

     if (catTxt == 'Despesa') {
         categoriaLista[i].style.color = "#fa4";
         for (v = 0; v < temanho; v++) {
             console.log(valor[v].textContent);
             if(valor[v].textContent < 0){
             valor[v].style.color = "#fa4";
             
                }
         }

     }


 }

 var total = document.getElementById('total').textContent;
 var totalCard = document.getElementById('total-card');
 console.log(total);
 if (parseFloat(total) < 0) {
     totalCard.style.backgroundColor = "#b95f5f";
     totalCard.style.color = "#fff";
 }

 if (parseFloat(total) > 0) {
     totalCard.style.backgroundColor = "#5fb989";
     totalCard.style.color = "#fff";
 }





$(document).ready(function(){
	$('a[data-confirm]').click(function(ev){
		var href = $(this).attr('href');
        alert(href);
        if(!$('#confirm-delete').length){
			$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Apagar</a></div></div></div></div>');
		}
		$('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
		return false;
		
	});
});












//function alterar(){
//    titulo = document.getElementById('lancamentoTitulo').value;
//    valor = document.getElementById('lancamentoValor').value;
//    id = document.getElementById('id').value;
//    
//  
//    var hrefAlterar = './vendor/_alterar.php?titulo=' + titulo + '&valor=' + valor + '&id=' + id; 
//    document.getElementById("btn-aterar").setAttribute("href",hrefAlterar);
//    
//    console.log(hrefTeste);    
//}









