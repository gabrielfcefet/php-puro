<?php
namespace Application\Src\Abstracts;

/**
 * Permite injetar dados no arquivo html
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/10/2017
 * @package Application/Src/Abstracts
 *         
 */
abstract class TemplateParser
{

    private $masterPageContent;

    private $coreContent;

    private $tagValue;

    private $tagTemplate;

    private $arrParser;

    /**
     * Recupera o conteúdo do template
     * 
     * @param string $filename            
     */
    protected function setMasterPageContent(string $filename)
    {
        $this->masterPageContent = file_get_contents($filename);
    }

    /**
     * Retorna o template
     * 
     * @return string
     */
    protected function getMasterPageContent()
    {
        foreach ($this->arrParser as $arrValue) {
            $this->masterPageContent = preg_replace($arrValue['TAG_TEMPLATE'], $arrValue['TAG_VALUE'], $this->masterPageContent);
        }
        
        return $this->masterPageContent;
    }

    /**
     * Recupera o conteúdo do core
     * @param string $filename
     */
    protected function setCoreContent(string $filename)
    {
        $this->coreContent = file_get_contents($filename);
    }
    
    /**
     * Retorna o conteúdo do core
     * @return string
     */
    protected function getCoreContent() {
        
        foreach ((array)$this->arrParser as $arrValue) {
            $this->coreContent = preg_replace($arrValue['TAG_TEMPLATE'], 
                                              $arrValue['TAG_VALUE'], 
                                              $this->coreContent);
        }
        
        return $this->coreContent;
    }

    /**
     * Captura os dados que serão inseridos no html
     * 
     * @param string $tagName            
     * @param string $value            
     */
    protected function parser(string $tagName, string $value)
    {
        $this->tagValue = str_replace('$', '\$', $value);
        $this->tagTemplate = "{{\{$tagName\}}}";
        
        $this->arrParser[] = [
            'TAG_TEMPLATE' => $this->tagTemplate,
            'TAG_VALUE' => $this->tagValue
        ];
    }
}