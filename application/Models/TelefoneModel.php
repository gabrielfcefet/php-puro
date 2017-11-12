<?php
namespace Application\Models;

/**
 * Classe model da tabela telefone
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 10/11/2017
 *       
 */
class TelefoneModel
{

    private $id;

    private $telefone;

    private $contatoId;

    private $tiposTelefoneId;

    /**
     * Método construtor
     *
     * @param int $id            
     * @param string $telefone            
     * @param int $contatoId            
     * @param int $tiposTelefoneId            
     */
    public function __construct(int $id = null, string $telefone = null, int $contatoId = null, int $tiposTelefoneId = null)
    {
        $this->id = $id;
        $this->telefone = $telefone;
        $this->contatoId = $contatoId;
        $this->tiposTelefoneId = $tiposTelefoneId;
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
     * Retorna o telefone
     *
     * @return \Application\Models\string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Retorna o id do contato
     *
     * @return \Application\Models\int
     */
    public function getContatoId()
    {
        return $this->contatoId;
    }

    /**
     * Retorna o id do tipo de telefone
     *
     * @return \Application\Models\int
     */
    public function getTipoTelefoneId()
    {
        return $this->tiposTelefoneId;
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
     * Atribui o telefone
     *
     * @param string $telefone            
     */
    public function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * Atribui o id do contato
     *
     * @param int $contatoId            
     */
    public function setContatoId(int $contatoId)
    {
        $this->contatoId = $contatoId;
    }

    /**
     * Atribui o id do tipo de telefone
     *
     * @param int $tipoTelefoneId            
     */
    public function setTipoTelefoneId(int $tipoTelefoneId)
    {
        $this->tiposTelefoneId = $tipoTelefoneId;
    }
}