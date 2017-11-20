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
    public function contacts() {
        try {
            $baseViewAjax = new BaseViewAjax();
            
            // Define o título da grid
            $this->setTitle('');
            
            // Define o cabeçalho da grid
            $this->setHeader(['#', 'Nome']);
            
            // Busca os contatos
            $contactAccess = new ContactAccess();
            $result = $contactAccess->list();
            $rows = $result->fetchAll();
            
            if (count($rows) > 0) {
                foreach ($rows as $row) {
                    $this->setRow([$row['id'], $row['nome']]);
                }
            }
            
            $baseViewAjax->setDataKey('grid', $this->renderGrid());
            
        } catch (\Exception $e) {
            $baseViewAjax->setError($e->getMessage());
        }
        
        echo json_encode($baseViewAjax->getData());
    }
}