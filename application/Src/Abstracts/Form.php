<?php
namespace Application\Src\Abstracts;

/**
 * Classe para criação de formulários
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 06/11/2017
 *       
 */
abstract class Form
{

    private $htmlForm;
    
    //
    // PROTECTED METHODS
    //
    
    /**
     * Define os campos com a tag html input
     *
     * @param string $label            
     * @param string $type            
     * @param string $id            
     * @param string $name            
     * @param string $alt            
     * @param float $height            
     * @param float $width            
     *
     */
    protected function setInput(string $type, string $id, string $name, string $alt, float $height, float $width, string $label = '')
    {
        // Abre a div que armazenará o campo input
        $this->openDiv($height);
        
        // Validação dos itens obrigatórios
        if (empty($type)) {
            throw new \Exception("Informe o tipo do input!");
        }
        
        if (empty($id)) {
            throw new \Exception("Informe o parâmetro id do input!");
        }
        
        if (empty($name)) {
            throw new \Exception("Informe o parâmetro name do input!");
        }
        
        if (empty($alt)) {
            throw new \Exception("Informe o parâmetro alt do input!");
        }
        
        if (empty($height)) {
            throw new \Exception("Informe a altura da div do input!");
        }
        
        if (empty($width)) {
            throw new \Exception("Informe a largura do input!");
        }
        
        // Verifica se a label foi informada
        if (! empty($label)) {
            $this->setLabel($label);
        }
        
        // Define o campo input do formulário
        $this->htmlForm .= "<input type={$type} id={$id} name={$name} alt={$alt} style='width:{$width}px;'/>";
        
        // Fecha a div que armazenará o campo input
        $this->closeDiv();
    }

    /**
     * Retorna o html do formulário
     * 
     * @return string
     */
    protected function getContentForm()
    {
        return $this->htmlForm;
    }
    
    //
    // PRIVATE METHODS
    //
    
    /**
     * Define a label do campo
     *
     * @param string $label            
     */
    private function setLabel(string $label)
    {
        $this->htmlForm .= "<label style='display: block;'>{$label}</label>";
    }

    /**
     * Abre a div de cada campo do formulário
     *
     * @param int $height            
     */
    private function openDiv(int $height)
    {
        $this->htmlForm .= "<div style=  height: {$height} px; float: left; margin-right: 15px; margin-bottom: 10px; display: table;>";
    }

    /**
     * Fecha a div de cada campo do formulário
     */
    private function closeDiv()
    {
        $this->htmlForm .= '</div>';
    }
}