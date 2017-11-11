<?php
namespace Application\Src\AppClass;

use Application\Src\Abstracts\Bootstrap;

/**
 * Classe de inicialização do sistema
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 * @package Application/Src
 * 
 */
class AppInit extends Bootstrap
{
	private $appConfig;
	private $arrayParameters;
	
	###############
	# MÉTODOS GET #
	###############
	
	/**
	 * Retorna o array com os dados do arquivo config.ini
	 * @return array
	 */
	private function getConfig(){
		return  $this->appConfig;
	}
	
	/**
	 * Retorna o array de parâmetros
	 * @return array
	 */
	private function getArrayParameters(){
		return $this->arrayParameters;
	}
	
	
	
	###############
	# MÉTODOS SET #
	###############
	
	/**
	 * Inicializa o array de configuração com as informações do arquivo config.ini (De acordo com o ambiente)
	 * @param array $config
	 */
	private function setConfig( Array $config){
		$this->appConfig = $config;
	}
	
	/**
	 * Inicializa o array de parâmetros
	 * @param array $arrayParam
	 */
	private function setArrayParameters(Array $arrayParam){
		$this->arrayParameters = $arrayParam;
	}
	
	######################
	#	MÉTODOS GERAIS	 #
	######################
	
	/**
	 * Inicializa as rotas do sistema
	 * 
	 */
	protected function initRoutes()
	{
	    // Rotas das páginas
		$arrRoutes['login'] = array('route'=>'/', 'controller'=>'loginController', 'action'=>'login');
		$arrRoutes['index'] = array('route'=>'/admin', 'controller'=>'indexController', 'action'=>'index');
		$arrRoutes['error'] = array('route'=>'/error', 'controller'=>'errorController', 'action'=>'error');
		
		// Rotas dos recursos
		$arrRoutes['autenticar'] = array('route'=>'/autenticar', 'controller'=>'acessoController', 'action'=>'autenticar');
		$arrRoutes['logout'] = array('route'=>'/logout', 'controller'=>'acessoController', 'action'=>'logout');
		
		// Rotas dos formulários
		$arrRoutes['formsContact'] = array('route'=>'/forms/contact', 'controller'=>'formContatoController', 'action'=>'formsContact');
		
		// Rotas dos PopUps
		$arrRoutes['popUpContact'] = array('route'=>'/popups/contact/register', 'controller'=>'contactPopUpController', 'action'=>'contactRegister');
		
		$this->setRoutes($arrRoutes);
	}
	
	/**
	 * Faz a leitura do arquivo de configuração - config.ini
	 */
	protected function loadConfig(){
		$ambiente = getenv('ambiente') !== null ? getenv('ambiente') : 'desenv';
		$iniConfig = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../config/config.ini', true);
		$this->setConfig($iniConfig[$ambiente]);
	}

	/**
	 * Inicializa as constantes do sistema
	 * @see \Ibranch\Init\Bootstrap::initConstants()
	 */
	protected function initConstants()
	{
		$config = $this->getConfig();
		
		$arrayParam = [
			// Diretório raiz da aplicação
			'APP_ROOT' => dirname( $_SERVER['DOCUMENT_ROOT'] ),
		    
		    // Credenciais de acesso ao banco de dados
		    'DATA_BASE' => [
		        'DSN' => $config['db.dsn'],
		        'USER' => $config['db.user'],
		        'PASSWORD' => $config['db.password']
		    ],
				
			// Endereço da área administrativa da aplicação
			'URL_ADMIN' => $config['url.admin'],
			'URL_LOGIN' => $config['url.login'],
			
			// Caminho dos diretórios 
			'ASSETS' => [
				'IMG' => $config['assets.img.basepath'],
				'CSS' => $config['assets.css.basepath'],
				'SCRIPTS' => $config['assets.scripts.basepath'],
				'PLUGINS' => $config['assets.plugins.basepath']
			],
				
			// Configurações Globais
			'GLOBAL_VARS' => array(
				'TITULO' => $config['global.titulo'],
				'LINGUAGEM' => $config['global.linguagem'],
			    'CHARSET' => $config['global.charset'],
				'URL_SITE' => $_SERVER['HTTP_HOST'],
				'DESCRICAO' => $config['global.descricao'],
				'AUTOR' => $config['global.autor'],
			    'MASTER_PAGE' => $config['global.masterpage'],
			    'MASTER_PAGE_POPUP' => $config['global.masterpage.popup']
			)
		];
		
		$this->setArrayParameters($arrayParam);
	}
	
	/**
	 * arrega as constantes do sistema
	 */
	protected function loadConstants(){
		$arrayParam = $this->getArrayParameters();
	
		foreach ($arrayParam as $name => $value){
			define($name, $value);
		}
	}
	
	/**
	 * Altera o diretório raiz
	 */
	protected function changeRoot(){
		// Alterando o diretório raiz
		chdir(APP_ROOT);
	}
	
	public function run(){
	    $getUrl = $this->getUrl();
	    echo $this->runUrl($getUrl);
	}
}