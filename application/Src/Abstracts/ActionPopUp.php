<?php
namespace Application\Src\Abstracts;

use Application\Src\AppClass\Session;

/**
 * Classe Action PopUp
 * @author Gabriel de Figueiredo Corrêa
 * @since 10/11/2017
 * @package Application/Src/Abstract
 *
 */
abstract class ActionPopUp extends TemplateParser
{
    private $action;
    private $masterPagePath;

    /**
     * Método construtor
     */
    public function __construct()
    {
        $this->masterPagePath = GLOBAL_VARS['MASTER_PAGE_POPUP'];
    }

    /**
     * Método de renderização
     * @param string $action
     * @param string $layout
     */
    protected function render($action)
    {
        $this->action = $action;

        if (file_exists($this->masterPagePath)) {

            // Valida se existe uma sessão ativa
            Session::validate();

            // Carregando a masterpage
            $this->setMasterPageContent($this->masterPagePath);

            // Injetando o valores na masterpage
            $this->parser('CONTENT', $this->content());

            // Faz o parser das constantes GLOBAL_VARS
            foreach (GLOBAL_VARS as $keyGlobal => $valueGlobal){
                $this->parser($keyGlobal, $valueGlobal);
            }
             
            // Faz o parser das contantes ASSETS
            foreach (ASSETS as $keyAssets => $valueAssets){
                $this->parser($keyAssets, $valueAssets);
            }

            return $this->getMasterPageContent();
        }
    }

    /**
     * Método de recuperação do conteúdo
     */
    protected function content()
    {
        $atualClass = get_class($this);
        $singleClassName = str_replace('popupcontroller', '', strtolower(str_replace("Application\\Controllers\\", "", $atualClass)));
        $filePath = 'application/Views/popup/' . $singleClassName . DIRECTORY_SEPARATOR . $this->action . '.phtml';

        $this->setCoreContent($filePath);
        return $this->getCoreContent();
    }
}
?>