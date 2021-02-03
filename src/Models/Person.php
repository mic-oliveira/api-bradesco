<?php

namespace Bradesco\Models;

class Person extends Model
{
    private $name;
    private $cpfCnpj;
    private $email;
    private Address $address;
    private Document $document;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * @param mixed $cpfCnpj
     */
    public function setCpfCnpj($cpfCnpj): void
    {
        $this->cpfCnpj = $cpfCnpj;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param mixed $document
     */
    public function setDocument($document): void
    {
        $this->document = $document;
    }

}
