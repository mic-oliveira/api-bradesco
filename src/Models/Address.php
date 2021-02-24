<?php

namespace Bradesco\Models;

class Address extends Model
{
    private string $public_place;
    private string $number;
    private string $complement;
    private int $cep;
    private string $neighborhood;
    private string $city;
    private string $fu; // União federativa.: RJ

    // SET MANDATORY ATTRIBUTES
    protected array $mandatory = [
        'public_place',
        'number',
        'cep',
        'neighborhood',
        'city',
        'fu',
    ];

    // SET ATTRIBUTE MAX LENGTH
    protected array $attribute_scalable = [
        'public_place' => 40,
        'number' => 10,
        'complement' => 15,
        'cep' => 8,
        'neighborhood' => 40,
        'city' => 30,
        'fu' => 2
    ];

    public function getPublicPlace(): string
    {
        return $this->public_place;
    }

    public function setPublicPlace($public_place): void
    {
        $this->public_place = $public_place;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber($number): void
    {
        $this->number = $number;
    }

    public function getComplement(): string
    {
        return $this->complement;
    }

    public function setComplement($complement): void
    {
        $this->complement = $complement;
    }

    public function getCep(): int
    {
        return $this->cep;
    }

    public function setCep($cep): void
    {
        $this->cep = $cep;
    }

    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    public function setNeighborhood($neighborhood): void
    {
        $this->neighborhood = $neighborhood;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity($city): void
    {
        $this->city = $city;
    }

    public function getFu(): string
    {
        return $this->fu;
    }

    public function setFu($fu): void
    {
        $this->fu = $fu;
    }

}
