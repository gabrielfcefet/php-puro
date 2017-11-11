<?php
namespace Application\Models;

/**
 * Classe model da tabela tipos_telefone
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 10/11/2017
 *       
 */
class TiposTelefoneModel
{

    private $id;

    private $tipoTelefone;

    /**
     * Método Construtor
     *
     * @param int $id            
     * @param string $tipoTelefone            
     */
    public function __construct(int $id = null, string $tipoTelefone = null)
    {
        $this->id = $id;
        $this->tipoTelefone = $tipoTelefone;
    }
    
    //
    // GET METHODS
    //
    
    /**
     * Retorna o ID
     * 
     * @return \Application\Models\int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Retorna o tipo do telefone
     * 
     * @return \Application\Models\string
     */
    public function getTipoTelefone()
    {
        return $this->tipoTelefone;
    }
    
    //
    // SET METHODS
    //
    
    /**
     * Atribui o ID
     * 
     * @param int $id            
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Atribui o tipo do telefone
     * 
     * @param string $tipoTelefone            
     */
    public function setTipoTelefone(string $tipoTelefone)
    {
        $this->tipoTelefone = $tipoTelefone;
    }
}