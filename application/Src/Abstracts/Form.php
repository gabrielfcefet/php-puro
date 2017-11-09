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
     * Defino o campo do tipo date
     * 
     * @param float $height
     * @param float $width
     * @param string $name
     * @param string $id
     * @param string $alt
     * @param string $label
     * @param string $class
     * 
     */
    protected function setDate(float $height, float $width, string $name, string $id, string $alt, string $label='', string $class='')
    {
        // Validação dos itens obrigatórios
        if (empty($height)) {
            throw new \Exception("Informe a altura da div do campo data!");
        }
        
        if (empty($width)) {
            throw new \Exception("Informe a largura do campo data!");
        }
        
        if (empty($id)) {
            throw new \Exception("Informe o parâmetro id do campo data!");
        }
        
        if (empty($name)) {
            throw new \Exception("Informe o parâmetro name do campo data!");
        }
        
        if (empty($alt)) {
            throw new \Exception("Informe o parâmetro alt do campo data!");
        }
        
        // Abre a div
        $this->openDiv($height);
        
        // Verifica se a label foi informada
        if (! empty($label)) {
            $this->setLabel($label);
        }
        
        // Define o campo do tipo data
        $this->htmlForm .= "<input type='date' id='{$id}' name='{$name}'  class='{$class}' alt='{$alt}' style='width:{$width}px;'/>";
        
        // Fecha a div
        $this->closeDiv();
    }
    
    /**
     * Define o botão
     * 
     * @param float $height
     * @param float $width
     * @param string $name
     * @param string $id
     * @param string $value
     * @param string $class
     * 
     */
    protected function setButton(float $height, float $width, string $name, string $id, string $value, string $class = '')
    {
        // Validação dos itens obrigatórios
        if (empty($height)) {
            throw new \Exception("Informe a altura da div do botão!");
        }
        
        if (empty($width)) {
            throw new \Exception("Informe a largura do botão!");
        }
        
        if (empty($id)) {
            throw new \Exception("Informe o parâmetro id do botão!");
        }
        
        if (empty($name)) {
            throw new \Exception("Informe o parâmetro name do botão!");
        }
        
        if (empty($value)) {
            throw new \Exception("Informe o valor do botão!");
        }
        
        // Abre a div
        $this->openDiv($height);
        
        // Define o botão
        $this->htmlForm .= "<input type='button' name='{$name}' id='{$id}' class='{$class}' value='{$value}' style='width:{$width}px; margin-top: 23px; display: table;'/>";
        
        // Fecha a div
        $this->closeDiv();
    }
    
    /**
     * Define os campos do tipo textarea
     * 
     * @param float $height
     * @param float $width
     * @param string $label
     * @param string $value
     * 
     */
    protected function setTextArea(float $height, float $width, string $label='', string $value='')
    {
        // Validação dos itens obrigatórios
        if (empty($height)) {
            throw new \Exception("Informe a altura da div da textarea!");
        }
        
        if (empty($width)) {
            throw new \Exception("Informe a largura da textarea!");
        }
        
        // Abre a div
        $this->openDiv($height);
        
        // Verifica se a label foi informada
        if (! empty($label)) {
            $this->setLabel($label);
        }
        
        // Montando o campo do tipo textarea
        $this->htmlForm .= "<textarea style='width:{$width}px; height:{$height}px;'>{$value}</textarea>";
        
        /// Fecha a div
        $this->closeDiv();
    }
    
    /**
     * Define os campos do tipo radio
     *
     * @param array $options = [width, id, name, value, label]
     * @param float $height
     *
     */
    protected function setRadio(array $options, float $height) {
        
        // Validação dos itens obrigatórios
        if (count($options) == 0) {
            throw new \Exception("Informe as opções do checkbox!");
        }
        
        if (empty($height)) {
            throw new \Exception("Informe a altura da div do checkbox!");
        }
        
        // Abrindo a div
        $this->openDiv($height);
        
        // Montando os campos do tipo radio 
        foreach ( $options as $value ) {
            $this->htmlForm .= "<div style='width:{$value['width']}px; float:left;  margin-top: 16px;'>
                                    <input style='float:left; margin-right:5px;' type='radio' id={$value['id']} name={$value['name']} value='{$value['value']}'/>
                                    <label>{$value['label']}</label>
                                </div>";
        }
        
        // Fechando a div
        $this->closeDiv();
    }
    
    /**
     * Define os campos do tipo checkbox
     * 
     * @param array $options = [width, id, name, value, label]
     * @param float $height
     * 
     */
    protected function setCheckbox(array $options, float $height)
    {
        // Validação dos itens obrigatórios
        if (count($options) == 0) {
            throw new \Exception("Informe as opções do checkbox!");
        }
        
        if (empty($height)) {
            throw new \Exception("Informe a altura da div do checkbox!");
        }
        // Abrindo a div
        $this->openDiv($height);
        
        // Montando os campos checkbox
        foreach ( $options as $value ) {
            $this->htmlForm .= "<div style='width: {$value['width']}px; float:left;  margin-top: 16px;'>
                                    <input style='float:left; margin-right:5px;' type='checkbox' id={$value['id']} name={$value['name']} value='{$value['value']}'/>
                                    <label>{$value['label']}</label>
                                </div>";
        }
        
        // Fechando a div
        $this->closeDiv();
    }
    
    /**
     * Define os campos com a tag html select
     * 
     * @param array $options = [code, value]  
     * @param string $id            
     * @param string $name            
     * @param float $height            
     * @param float $width            
     * @param string $label            
     * @throws \Exception
     */
    protected function setSelect(array $options, string $id, string $name, float $height, float $width, string $label = '')
    {
        // Validação dos itens obrigatórios
        if (count($options) == 0) {
            throw new \Exception("Informe as opções do select!");
        }
        
        if (empty($id)) {
            throw new \Exception("Informe o parâmetro id do select!");
        }
        
        if (empty($name)) {
            throw new \Exception("Informe o parâmetro name do select!");
        }
        
        if (empty($height)) {
            throw new \Exception("Informe a altura da div do input!");
        }
        
        if (empty($width)) {
            throw new \Exception("Informe a largura do input!");
        }
        
        // Abre a div
        $this->openDiv($height);
        
        // Verifica se a label foi informada
        if (! empty($label)) {
            $this->setLabel($label);
        }
        
        // Inicializa o campo select
        $this->htmlForm .= "<select id={$id} name={$name} style='width:{$width}px;'>";
        
        // Insere as opções do select
        foreach ($options as $key => $value) {
            $this->htmlForm .= "<option value={$key}>{$value}</option>";
        }
        
        // Finaliza o select
        $this->htmlForm .= '</select>';
        
        // Fecha a div
        $this->closeDiv();
    }

    /**
     * Define os campos com a tag html input
     *
     * @param string $type            
     * @param string $id            
     * @param string $name            
     * @param string $alt            
     * @param float $height            
     * @param float $width            
     * @param string $label
     * @param string $class            
     *
     */
    protected function setInput(string $type, string $id, string $name, string $alt, float $height, float $width, string $label = '', string $class = '')
    {
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
        
        // Abre a div que armazenará o campo input
        $this->openDiv($height);
        
        // Verifica se a label foi informada
        if (! empty($label)) {
            $this->setLabel($label);
        }
        
        // Define o campo input do formulário
        $this->htmlForm .= "<input type={$type} id={$id} name={$name} class='{$class}' alt={$alt} style='width:{$width}px;'/>";
        
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
        $this->htmlForm .= "<div style= 'height: {$height}px; float: left; margin-right: 15px; margin-bottom: 10px; display: table;'>";
    }

    /**
     * Fecha a div de cada campo do formulário
     */
    private function closeDiv()
    {
        $this->htmlForm .= '</div>';
    }
}