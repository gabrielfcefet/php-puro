var Login = function () {
	
	// Valida se as credenciais foram informadas
	var validateCredentials = function(){
		
		if($('#username').val() == ''){
			alert('Informe o usuário!');
			$('#username').focus();
			return false;
		}
		
		if($('#password').val() == ''){
			alert('Informe a senha!');
			$('#password').focus();
			return false;
		}
		
		return true;
	}
	
	// Limpa as credenciais informadas pelo usuário
	var cleanCredentials = function(){
		$('#username').val('');
		$('#password').val('');
		$('#username').focus();
	}
	
	// Envia os dados para autenticar no servidor
	var autenticate = function(){
		$.blockUI({ 
			message: '<h1><img src='+ $('#imgAjaxLoader').val() +' /> Enviando...</h1>',
			onBlock: function() {
				var md5 = $.md5($('#password').val());
				$('#password').val(md5);
				retorno = Ajax('/autenticar', $('#formulario').serialize());
				
				if(!retorno.SUCESSO){
					cleanCredentials();
				}
			}
		});
	}
	
	var startLogin = function() {
		
		$('#username').focus();
		
		$('#btnEnviar').click(function(){
			if(validateCredentials()){
				autenticate();
			}
		});

        $('.login-form input').keypress(function (e) {
            if (e.which == 13) {
                if (validateCredentials()) {
                	autenticate();
                }
                
                return false;
            }
        });
	}

    return {
        //Função principal para inicializar o módulo
        init: function () {
            startLogin();
        }
    };
}();