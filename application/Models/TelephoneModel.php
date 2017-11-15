<?php
namespace Application\Models;

/**
 * Classe model da tabela telefone
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 10/11/2017
 *       
 */
class TelephoneModel
{

    private $id;

    private $telephone;

    private $contatoId;

    private $tiposTelephoneId;

    /**
     * Método construtor
     *
     * @param int $id            
     * @param string $telephone            
     * @param int $contatoId            
     * @param int $tiposTelephoneId            
     */
    public function __construct(int $id = null, string $telephone = null, int $contatoId = null, int $tiposTelephoneId = null)
    {
        $this->id = $id;
        $this->telephone = $telephone;
        $this->contatoId = $contatoId;
        $this->tiposTelephoneId = $tiposTelephoneId;
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
    public function getTelephone()
    {
        return $this->telephone;
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
    public function getTipoTelephoneId()
    {
        return $this->tiposTelephoneId;
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
     * @param string $telephone            
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
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
     * @param int $tipoTelephoneId            
     */
    public function setTipoTelephoneId(int $tipoTelephoneId)
    {
        $this->tiposTelephoneId = $tipoTelephoneId;
    }
}