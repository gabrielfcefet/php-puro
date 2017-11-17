<?php
namespace Application\Src\Abstracts;

use Application\Src\AppClass\Session;

abstract class Grid extends TemplateParser
{

    private $templateGrid;

    private $htmlRowsGrid;

    /**
     * Método construtor
     */
    public function __construct()
    {
        $this->templateGrid = GLOBAL_VARS['TEMPLATE_GRID'];
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
     * @param array $arrHeader            
     */
    protected function setHeader(array $arrHeader)
    {
        $headerHtml = "<tr>";
        
        foreach ($arrHeader as $titleColumn) {
            $headerHtml .= "<th>{$titleColumn}</th>";
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
        
        foreach ($arrRow as $rowColumn) {
            $this->htmlRowsGrid .= "<td>{$rowColumn}</td>";
        }
        
        $this->htmlRowsGrid .= '</tr>';
    }

    protected function setPagination()
    {
        //CONTINUAR
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