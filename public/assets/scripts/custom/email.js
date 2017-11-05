/*
 * Nome do arquivo: email.js
 * Criado por: Gabriel de Figueiredo Corrêa
 * Data de criação: 26/03/2016
 * 
 * Modificado por: Gabriel de Figueiredo Corrêa
 * Data da modificação: 29/03/2016
 * */
var Email = (function(){
	// Atributos
	var _idEmail;
	var _dscEmail;
	var _codPessoa;
	
	// Métodos
	var _setIdEmail = function(idEmail){
		_idEmail = idEmail;
	};
	
	var _setDscEmail = function(dscEmail){
		_dscEmail = dscEmail;
	};
	
	var _setCodPessoa = function(codPessoa){
		_codPessoa = codPessoa;
	};
	
	var _getIdEmail = function(){
		return _idEmail;
	};
	
	var _getDscEmail = function(){
		return _dscEmail;
	};
	
	var _getCodPessoa = function(){
		return _codPessoa;
	};
	
	return {
		setIdEmail: _setIdEmail,
		setDscEmail: _setDscEmail,
		setCodPessoa: _setCodPessoa,
		getIdEmail: _getIdEmail,
		getDscEmail: _getDscEmail,
		getCodPessoa: _getCodPessoa
	};
})();