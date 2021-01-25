<?php

namespace Bradesco\Models;

class Address
{
    private $public_place;
    private $number;
    private $complement;
    private $cep;
    private $neighborhood;
    private $city;
    private $fu;

    /**
     * @return mixed
     */
    public function getPublicPlace()
    {
        return $this->public_place;
    }

    /**
     * @param mixed $public_place
     */
    public function setPublicPlace($public_place): void
    {
        $this->public_place = $public_place;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * @param mixed $complement
     */
    public function setComplement($complement): void
    {
        $this->complement = $complement;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep): void
    {
        $this->cep = $cep;
    }

    /**
     * @return mixed
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * @param mixed $neighborhood
     */
    public function setNeighborhood($neighborhood): void
    {
        $this->neighborhood = $neighborhood;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getFu()
    {
        return $this->fu;
    }

    /**
     * @param mixed $fu
     */
    public function setFu($fu): void
    {
        $this->fu = $fu;
    }

}
