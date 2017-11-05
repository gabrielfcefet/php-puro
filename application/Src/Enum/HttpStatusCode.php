<?php
namespace Application\Src\Enum;

/**
 * Códigos dos erros HTTP
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 02/11/2017
 * @package Enum
 */
class HttpStatusCode
{

    const OK = 200;

    const CREATED = 201;

    const NOT_MODIFIED = 304;

    const BAD_REQUEST = 400;

    const UNAUTHORIZED = 401;

    const FORBIDDEN = 403;

    const NOT_FOUND = 404;

    const INTERNAL_SERVER_ERROR = 500;
}
?>