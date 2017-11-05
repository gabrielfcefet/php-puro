var Index = function () {
	
	// Inicia o logout do usuário
	var startLogout = function(){
		$.blockUI({ 
			message: '<h1><img src='+ $('#imgAjaxLoader').val() +' /> Enviando...</h1>',
			onBlock: function() {
				retorno = Ajax('/logout', '');
			}
		});
	}
	
	// Carrega o módulo
	var loadModule = function() {
		
		// CONTINUAR
	}

    return {
        //Função principal para inicializar o módulo
        init: function () {
        	loadModule();
        }
    };
}();