/*
 * Nome do arquivo: ClassUsuario.js
 * Criado por: Gabriel de Figueiredo Corrêa
 * Data de criação: 01/10/2017
 * 
 * Modificado por: Gabriel de Figueiredo Corrêa
 * Data da modificação: 02/10/2017
 * */

var Usuario = (function (){
	
	// Atributos
	var _idUser;
	var _loginUser;
	var _password;
	
	/*****************/
	/** SET METHODS **/
	/*****************/
	
	var _setIdUser = function(idUser){
		_idUser = idUser;
	};
	
	var _setLoginUser = function (loginUser){
		_loginUser = loginUser;
	};
	
	var _setPassword = function(password){
		_password = password;
	};
	
	/*****************/
	/** GET METHODS **/
	/*****************/
	
	var _getIdUser = function(){
		return _idUser;
	};
	
	var _getLoginUser = function(){
		return _loginUser;
	};
	
	var _getPassword = function(){
		return _password;
	};
	
	// Retorna o objeto
	return {
		setIdUser: _setIdUser,
		setLoginUser: _setLoginUser,
		setPassword: _setPassword,
		getIdUser: _getIdUser,
		getLoginUser: _getLoginUser,
		getPassword: _getPassword,
	};
})();