var Contact = function () {
	
	// Adiciona um campo de telefone
	var addTelephone = function(){
		$('.btnAddTelephone').unbind('click');
		$('.btnAddTelephone').bind('click', function(){
			if ($('div.contentFormTelephone').length <= 3) {
				telephoneClone = $('#fdsTelefone .contentFormTelephone').first().clone(true);
				telephoneClone.find('input[type=text]').val('');
				telephoneClone.appendTo('#fdsTelefone').last();
				MascaraTelefone();
			}
		});
	}
	
	// Remove o campo de telefone
	var delTelephone = function(){
		$('.btnDelTelephone').unbind('click');
		$('.btnDelTelephone').bind('click', function(){
			if ($('div.contentFormTelephone').length > 1) {
				$(this).parent().parent().remove();
				loadActions();
			}
		});
	}
	
	// Adiciona um campo de email
	var addEmail = function(){
		$('.btnAddEmail').unbind('click');
		$('.btnAddEmail').bind('click', function(){
			if ($('div.contentFormEmail').length <= 3) {
				emailClone = $('#fdsEmail .contentFormEmail').first().clone(true);
				emailClone.find('input[type=email]').val('');
				emailClone.appendTo('#fdsEmail').last();
			}
		});
	}
	
	// Remove o campo de email
	var delEmail = function(){
		$('.btnDelEmail').unbind('click');
		$('.btnDelEmail').bind('click', function(){
			if ($('div.contentFormEmail').length > 1) {
				$(this).parent().parent().remove();
				loadActions();
			}
		});
	}
	
	// Limpa o formulário de telefones
	var cleanTelephones = function(){
		while ($('div.contentFormTelephone').length > 1) {
			$('.btnDelTelephone').click();
		}
		
		$('#telephoneNumber').val('');
		$('#telephoneType').val(0);
	}
	
	// Limpa o formulário de emails
	var cleanEmails = function(){
		while ($('div.contentFormEmail').length > 1) {
			$('.btnDelEmail').click();
		}
		
		$('#dscEmail').val('');
		$('#emailType').val(0);
	}
	
	// Valida os dados do formulário
	var formValidate = function(){
		
		if($('#name').val() == ''){
			alert('Informe o nome do contato!');
			$('#name').focus();
			return false;
		}else {
			$('input[type=email]').each(function(index){
				
				if($(this).val() != ''){
					if(ValidarEmail($(this).val()) == false){
						alert('O email ' + $(this).val() + ' é inválido!');
						$(this).focus();
						return false;
					}
				}
			});
			
		}
		
		return true;
	}
	
	/* Envia as informações do contato 
	   para salvar na base de dados*/
	var saveContact = function(){
		if(formValidate()){
			
			$.blockUI({ 
				message: '<h1><img src='+ $('#imgAjaxLoader').val() +' /> Salvando...</h1>',
				onBlock: function() {
					// Requisita o botão de cadatro do contato
					retorno = Ajax('/contact/insert', $('#formulario').serialize());
					
					if (retorno.SUCESSO) {
						alert('Contato salvo com sucesso!');
					}
				}
			});
		}
	}
	
	// Carrega as ações dos elementos
	var loadActions = function(){
 		$('#btnSave, #btnClean, #btnAddTelephone, #btnDelTelephone, #btnAddEmail, #btnDelEmail').click(function(){
			switch (this.id) {
				case 'btnSave':{
					saveContact();
					break;
				}
				case 'btnClean':{
					cleanTelephones();
					cleanEmails();
					$('#name').val('').focus();
					break;
				}
				case 'btnAddTelephone':{
					addTelephone();
					delTelephone();
					break;
				}
				case 'btnDelTelephone':{
					delTelephone();
					break;
				}
				case 'btnAddEmail':{
					addEmail();
					delEmail();
					break;
				}
				case 'btnDelEmail':{
					delEmail();
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
				$('.contentFormTelephone').html(retornoTelephone.form);
				
				// Requisita o formulário para cadastro dos e-mails
				retornoEmail = Ajax('/forms/contact', 'option=emailForm');
				$('.contentFormEmail').html(retornoEmail.form);
				
				// Requisita o formulário para cadastro dos e-mails
				retornoBtnSave = Ajax('/forms/contact', 'option=btnSave');
				$('#divBtnSave').html(retornoBtnSave.form);
				
				// Requisita o formulário para cadastro dos e-mails
				retornoBtnClean = Ajax('/forms/contact', 'option=btnClean');
				$('#divBtnClean').html(retornoBtnClean.form);
				
				MascaraTelefone();
				addTelephone();
				addEmail();
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