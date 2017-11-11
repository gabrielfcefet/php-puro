var Contact = function () {
	
	// Carrega as ações dos elementos
	/*var loadActions = function(){
		$('#btnRegister, #btnSearch, #btnClean').click(function(){
			switch (this.id) {
				case 'btnRegister':{
					popUp('/popups/contact/register', 800, 400, 'Cadastro de contato', 'popUp');
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
	}*/
	
	// Inicia a carga dos formulários
	var loadForm = function(){
		$.blockUI({ 
			message: '<h1><img src='+ $('#imgAjaxLoader').val() +' /> Carregando...</h1>',
			onBlock: function() {
				
				// Requisita o botão de cadatro do contato
				retornoContact = Ajax('/forms/contact', 'option=contactForm');
				$('#contentFormContact').html(retornoContact.form);
				
				// Requisita o formulário para o cadastro dos telefones
				retornoTelephone = Ajax('/forms/contact', 'option=telephoneForm');
				$('#contentFormTelephone').html(retornoTelephone.form);
				
				// Requisita o formulário para cadastro dos e-mails
				retornoEmail = Ajax('/forms/contact', 'option=emailForm');
				$('#contentFormEmail').html(retornoEmail.form);
				
				MascaraTelefone();
				//loadActions();
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