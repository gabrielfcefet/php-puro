var Index = function () {
	
	// Carrega as ações dos elementos
	var loadActions = function(){
		$('#btnRegister').click(function(){
			alert('Cadastrar!');
			// CONTINUAR
		});
		
		$('#btnClean').click(function(){
			alert('Limpar!');
			// CONTINUAR
		});
	}
	
	// Inicia a carga dos formulários
	var loadForm = function(){
		$.blockUI({ 
			message: '<h1><img src='+ $('#imgAjaxLoader').val() +' /> Carregando...</h1>',
			onBlock: function() {
				
				// Requisita o formulário para cadatro do contato
				retorno = Ajax('/form/contact/register', '');
				$('#contentFormCadastro').html(retorno.form);
				
				// Requisita o formulário para o cadastro dos telefones
				retornoTelephone = Ajax('/form/contact/telephone', '');
				$('#contentFormTelephone').html(retornoTelephone.form);
				
				// Requisita o formulário para cadastro dos e-mails
				retornoEmail = Ajax('/form/contact/email', '');
				$('#contentFormEmail').html(retornoEmail.form);
				
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