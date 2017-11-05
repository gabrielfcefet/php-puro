/*
 * Nome do arquivo: telefone.js
 * Criado por: Gabriel de Figueiredo Corrêa
 * Data de criação: 31/03/2016
 * 
 * Modificado por: --
 * Data da modificação: --
 * */
var Telefone = (function(){
	// Atributos
	var _idTelefone;
	var _numDdd;
	var _numTelefone;
	var _tipoTelefone;
	var _codPessoa;
	var _regexTelefone = /^\d{4,5}-\d{4}$/;
	
	// Métodos SET
	var _setIdTelefone = function(idTelefone){
		_idTelefone = idTelefone;
	};
	
	var _setNumDdd = function(numDdd){
		_numDdd = numDdd;
	};
	
	var _setNumTelefone = function(numTelefone){
		_numTelefone = numTelefone;
	};
	
	var _setTipoTelefone = function(tipoTelefone){
		_tipoTelefone = tipoTelefone; 
	};
	
	var _setCodPessoa = function(codPessoa){
		_codPessoa = codPessoa; 
	};
	
	// Métodos GET
	
	var _getIdTelefone = function(){
		return _idTelefone;
	};
	
	var _getNumDdd = function(){
		return _numDdd;
	};
	
	var _getNumTelefone = function(){
		return _numTelefone;
	};
	
	var _getTipoTelefone = function(){
		return _tipoTelefone; 
	};
	
	var _getCodPessoa = function(){
		return _codPessoa; 
	};
	
	// Métodos Gerais
	var _mascaraTelefone = function(){
		// MÁSCARA DE TELEFONE 
		var SPMaskBehavior = function (val) {
			  return val.replace(/\D/g, '').length === 11 ? '00000-0000' : '0000-00009';
			},
			spOptions = {
			  onKeyPress: function(val, e, field, options) {
			      field.mask(SPMaskBehavior.apply({}, arguments), options);
			    }
			};

			$('.telefone-mask').mask(SPMaskBehavior, spOptions);
	};
	
	var _validarTelefone = function(numTelefone){
		
		if(numTelefone == ''){
			alert('informe o número do telefone!');
		}else{
			_setNumTelefone(numTelefone);
			
			return _regexTelefone.test(numTelefone);
		}
	};
	
	return {
		setIdTelefone: _setIdTelefone,
		setNumDdd: _setNumDdd,
		setNumTelefone: _setNumTelefone,
		setTipoTelefone: _setTipoTelefone,
		setCodPessoa: _setCodPessoa,
		getIdTelefone: _getIdTelefone,
		getNumDdd: _getNumDdd,
		getNumTelefone: _getNumTelefone,
		getTipoTelefone: _getTipoTelefone,
		getCodPessoa: _getCodPessoa,
		mascaraTelefone: _mascaraTelefone,
		validarTelefone: _validarTelefone
	};
})();