/* DEFINIÇÃO DE MÁSCARAS */

// MÁSCARA DE SOMENTE LETRAS
function MascaraSoLetras(){
	$('.so-letras').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 
		{translation:{
			A:{ pattern: /[A-Z a-z áéíóúâêôãõçÁÉÍÓÚÂÊÔÃÕÇ]/, optional: true}
		}
	});
}

function MascaraTelefone(){
	// MÁSCARA DE TELEFONE 
	var SPMaskBehavior = function (val) {
		  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
		},
		spOptions = {
		  onKeyPress: function(val, e, field, options) {
		      field.mask(SPMaskBehavior.apply({}, arguments), options);
		    }
		};

		$('.telefone').mask(SPMaskBehavior, spOptions);
}

/* DEFINIÇÃO DE FUNÇÕES COMUNS */

/* Função para controlar o menu ativo */
function ControleMenuAtivo(itemMenu){
	$('.' + itemMenu).addClass('active');
}

/* Função para realizar requisições Ajax */
function Ajax(url, params){
	var valor = null;
	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'json',
		data: params,	                        
		cache: false,		
		async: false,
		success: function(retorno){
			if (retorno.Redirect != ''){
				
				if (retorno.MensagemErro != ''){
					alert(retorno.MensagemErro);
				}
				
				window.location = retorno.Redirect;
			}else if (retorno.MensagemErro == ''){
				valor = retorno;
			}else{
				alert(retorno.MensagemErro);
				valor = retorno;
			}
		},
        error: function(retorno){
        	alert('Ocorreu um erro inesperado!');
		}
	});
	
	return valor;
}



/* Função para validar e-mail */
function ValidarEmail(email){
	er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
	if(er.exec(email)){
		return true;
	}else{
		return false;
	}	
}

/* Retorna o formato humanizado do tamanho dos arquivo passados em Bytes */
function TamanhoArquivoHumanizado(bytes, si) {
    var thresh = si ? 1000 : 1024;
    if(bytes < thresh) return bytes + ' B';
    var units = si ? ['kB','MB','GB','TB','PB','EB','ZB','YB'] : ['KiB','MiB','GiB','TiB','PiB','EiB','ZiB','YiB'];
    var u = -1;
    do {
        bytes /= thresh;
        ++u;
    } while(bytes >= thresh);
    return bytes.toFixed(1)+' '+units[u];
}; 