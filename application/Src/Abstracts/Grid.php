<?php
namespace Application\Src\Abstracts;

use Application\Src\AppClass\Session;

abstract class Grid extends TemplateParser
{

    private $templateGrid;

    private $htmlRowsGrid;
    
    private $arrConfigGrid;
    
    private $arrConfigColumn;

    /**
     * Método construtor
     */
    public function __construct()
    {
        $this->templateGrid = GLOBAL_VARS['TEMPLATE_GRID'];
    }

    /**
     * Define a configuração inicial do grid
     * 
     * Example: ['width' => 'value', 'height' => 'value', 'pagination' => 'boolean']
     * 
     * @param array $arrConfig            
     */
    protected function setConfig(array $arrConfig)
    {
        $this->parser('WIDTH', isset($arrConfig['width']) ? $arrConfig['width'] : '');
        $this->parser('HEIGHT', isset($arrConfig['height']) ? $arrConfig['height'] : '');
        $this->parser('PAGINATION', (isset($arrConfig['pagination']) && $arrConfig['pagination'] == true) ? 'inline' : 'none');
        $this->arrConfigGrid = $arrConfig;
    }

    /**
     * Define o título do grid
     *
     * @param string $title            
     */
    protected function setTitle(string $title)
    {
        $this->parser('TITLE', $title);
    }

    /**
     * Monta o cabeçalho do grid
     *
     *Example: ['titleColumn' => ['width' => 'value', 'height' => 'value']]
     *
     * @param array $arrHeader            
     */
    protected function setHeader(array $arrHeader)
    {
        $headerHtml = "<tr>";
        
        foreach ($arrHeader as $titleColumn => $configColumn) {
            
            $arrConfigColumn['width'] = isset($configColumn['width'])?$configColumn['width']:'';
            $arrConfigColumn['height'] = isset($configColumn['height'])?$configColumn['height']:'';
            $this->arrConfigColumn[] = $arrConfigColumn;
            $headerHtml .= "<th width={$arrConfigColumn['width']} height={$arrConfigColumn['height']}>{$titleColumn}</th>";
        }
        
        $headerHtml .= "</tr>";
        
        $this->parser('HEADER', $headerHtml);
    }

    /**
     * Define as linhas do grid
     *
     * @param array $arrRow            
     */
    protected function setRow(array $arrRow)
    {
        $this->htmlRowsGrid .= '<tr>';
        
        foreach ($arrRow as $key => $rowColumn) {
            $this->htmlRowsGrid .= "<td width={$this->arrConfigColumn[$key]['width']} height={$this->arrConfigColumn[$key]['height']}>{$rowColumn}</td>";
        }
        
        $this->htmlRowsGrid .= '</tr>';
    }
    
    /**
     * Monta os botões de paginação
     * 
     * Example: ['url' => 'route','numberPages' => 'number','pageSelected' => 'number']
     * 
     * @param array $configPagination
     */
    protected function setPagination(array $configPagination)
    {
        // Verifica se a paginação está ativada
        if (isset($this->arrConfigGrid['pagination']) && $this->arrConfigGrid['pagination'] == true) {
            for ($i=0; $i<$configPagination['numberPages']; $i++){
                $htmlPagination .= "<li class='page-item'><a class='page-link' href='{$configPagination['url']}?page={$i}'>" . $i + 1 . '</a></li>';
            }
            
        }
        
        $this->parser('PAGES', $htmlPagination);
    }

    /**
     * Retorna as linhas da grid
     *
     * @return string
     */
    private function getRows()
    {
        return $this->htmlRowsGrid;
    }

    /**
     * Retorna o conteúdo do grid
     *
     * @return string
     */
    protected function renderGrid()
    {
        if (file_exists($this->templateGrid)) {
            
            // Valida se existe uma sessão ativa
            Session::validate();
            
            // Carregando o layout do grid
            $this->setMasterPageContent($this->templateGrid);
            
            // Injetando o valores na masterpage
            $this->parser('ROWS', $this->getRows());
            
            return $this->getMasterPageContent();
        }
    }
}