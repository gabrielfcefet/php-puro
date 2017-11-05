<?php
namespace Application\Src\Abstracts;

/**
 * Classe de inicialização do sistema
 * 
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 * @package Application\Src
 *         
 */
abstract class Bootstrap
{

    private $routes;

    public function __construct()
    {
        $this->loadConfig();
        $this->initConstants();
        $this->loadConstants();
        $this->changeRoot();
        $this->initRoutes();
    }

    /**
     * Carrega as configurações do arquivo config.ini
     */
    abstract protected function loadConfig();

    /**
     * Carrega as constantes do sistema
     */
    abstract protected function loadConstants();

    /**
     * Inicializa as rotas a serem utilizadas
     */
    abstract protected function initRoutes();

    /**
     * Inicializa as constantes do sistema
     */
    abstract protected function initConstants();

    /**
     * Altera o diretório raiz
     */
    abstract protected function changeRoot();

    /**
     * Define as rotas do sistema
     * 
     * @param array $routes            
     */
    protected function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Recupera a URL utilizada
     * 
     * @return string
     */
    protected function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /**
     * Valida se a rota informada é válida
     * 
     * @return boolean
     */
    protected function urlValidate()
    {
        $value = false;
        $url = $this->getUrl();
        
        foreach ($this->routes as $route) {
            if ($url == $route['route']) {
                $value = true;
            }
        }
        
        return $value;
    }

    /**
     * Redireciona o acesso do usuário para o controller e a action apropriada
     * 
     * @param string $url            
     */
    protected function runUrl($url)
    {
        if ($this->urlValidate()) {
            foreach ($this->routes as $route) {
                if ($url == $route['route']) {
                    $class = "Application\\Controllers\\" . ucfirst($route['controller']);
                    $controller = new $class();
                    echo $controller->{$route['action']}();
                }
            }
        }else {
            header("Location: /error");
        }
    }
}