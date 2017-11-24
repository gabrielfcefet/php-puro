<?php
namespace Application\Controllers;

use Application\Src\Abstracts\Grid;
use Application\Src\AppClass\BaseViewAjax;
use Application\Src\DataAccess\ContactAccess;

/**
 * Classe de para montar o grid
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 */
class ContactGridController extends Grid
{
    public function contacts()
    {
        try {
            $baseViewAjax = new BaseViewAjax();
            
            // Define as configurações do grid
            $this->setConfig([
                'width' => '100%',
                'height' => '135px',
                'pagination' => true
            ]);
            
            // Define o título da grid
            $this->setTitle('');
            
            // Define o cabeçalho da grid
            $this->setHeader([
                '#' => ['width' => '50px'],
                'Nome' => ['width' => '200px'],
                'Editar' => ['width' => '50px'],
                'Excluir' => ['width' => '50px']
            ]);
            
            // Busca os contatos
            $contactAccess = new ContactAccess();
            
            // Definindo os valores padrões caso não sejam informados pelo usuário
            $maxRowsPage = isset($_GET['maxRowsPage']) ? $_GET['maxRowsPage'] : 5;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            
            // Busca os contatos no banco
            $result = $contactAccess->findPaginationGrid($maxRowsPage, $page);
            $rows = $result->fetchAll();
            
            // Verifica a quantidade de linhas retornadas na consulta
            $numRows = count($rows);
            
            // Monta as linhas do grid
            if ($numRows > 0) {
                foreach ($rows as $row) {
                    $this->setRow([
                        $row['id'],
                        $row['nome'],
                        'Editar',
                        'Excluir'
                    ]);
                }
                
                // Busca a quantidade de registro total da tabela
                $resultTotal = $contactAccess->list();
                $maxRowsNum = count($resultTotal->fetchAll());
                
                // Define o número de páginas
                $numberPages = ceil($maxRowsNum/$maxRowsPage);
                
                $this->setPagination([
                    'url' => '/grid/contact/contacts', 
                    'numberPages' => $numberPages,
                    'pageSelected' => $page
                ]);
            }
            
            $baseViewAjax->setDataKey('grid', $this->renderGrid());
            
        } catch (\Exception $e) {
            $baseViewAjax->setError($e->getMessage());
        }
        
        echo json_encode($baseViewAjax->getData());
    }
}