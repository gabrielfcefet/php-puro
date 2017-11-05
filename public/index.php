<?php
use Application\Src\AppClass\AppInit;

/**
 * Início da aplicação - Teste MediaPost
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 23/10/2017
 * @package public
 */

require_once '../vendor/autoload.php';

$appInit = new AppInit();
echo $appInit->run();