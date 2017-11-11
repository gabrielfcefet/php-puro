var Contact = function () {
	
	// Carrega as ações dos elementos
	var loadActions = function(){
		$('#btnSave, #btnClean, #btnAddTelephone, #btnDelTelephone, #btnAddEmail, #btnDelEmail').click(function(){
			switch (this.id) {
				case 'btnSave':{
					alert('Salvar!');
					break;
				}
				case 'btnClean':{
					alert('Limpar!');
					break;
				}
				case 'btnAddTelephone':{
					alert('Add Telefone!');
					break;
				}
				case 'btnDelTelephone':{
					alert('Del Telefone!');
					break;
				}
				case 'btnAddEmail':{
					alert('Add Email!');
					break;
				}
				case 'btnDelEmail':{
					alert('Del Email!');
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
				retornoContact = Ajax('/forms/contact', 'option=contactForm');
				$('#contentFormContact').html(retornoContact.form);
				
				// Requisita o formulário para o cadastro dos telefones
				retornoTelephone = Ajax('/forms/contact', 'option=telephoneForm');
				$('#contentFormTelephone').html(retornoTelephone.form);
				
				// Requisita o formulário para cadastro dos e-mails
				retornoEmail = Ajax('/forms/contact', 'option=emailForm');
				$('#contentFormEmail').html(retornoEmail.form);
				
				// Requisita o formulário para cadastro dos e-mails
				retornoBtnSave = Ajax('/forms/contact', 'option=btnSave');
				$('#divBtnSave').html(retornoBtnSave.form);
				
				// Requisita o formulário para cadastro dos e-mails
				retornoBtnClean = Ajax('/forms/contact', 'option=btnClean');
				$('#divBtnClean').html(retornoBtnClean.form);
				
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