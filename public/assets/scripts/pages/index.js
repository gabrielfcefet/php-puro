var Index = function () {
	
	// Carrega as ações dos elementos
	var loadActions = function(){
		$('#btnRegister, #btnSearch, #btnClean').click(function(){
			switch (this.id) {
				case 'btnRegister':{
					popUp('/popups/contact/register', 1024, 400, 'Cadastro de contato', 'popUp');
					break;
				}
				case 'btnSearch':{
					alert('Pesquisar!');
					break;
				}	
				case 'btnClean':{
					alert('Limpar!');
					break;
				}
			}
		});
	}
	
	// Inicia a carga dos formulários
	var loadForm = function(){
		$.blockUI({ 
			message: '<h1><img src='+ $('#imgAjaxLoader').val() +' /> Carregando...</h1>',
			onBlock: function() {
				
				// Requisita o botão de cadatro do contato
				retornoBtnRegister = Ajax('/forms/contact', 'option=btnRegister');
				$('#contentFormBtn').html(retornoBtnRegister.form);
				
				// Requisita o formulário de pesquisa do contato
				retornoPesquisa = Ajax('/forms/contact', 'option=searchForm');
				$('#contentFormPesquisa').html(retornoPesquisa.form);
				
				MascaraTelefone();
				loadActions();
			}
		});
	}
	
    return {
        //Função principal para inicializar o módulo
        init: function () {
        	loadForm();
        }
    };
}();