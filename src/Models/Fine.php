<?php


namespace Bradesco\Models;

class Fine extends Model
{
    private $amount;
    private $percentage;
    private $fine_days;

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    public function getPercentage()
    {
        return $this->percentage;
    }

    public function setPercentage($percentage): void
    {
        $this->percentage = $percentage;
    }

    public function getFineDays()
    {
        return $this->fine_days;
    }

    public function setFineDays($fine_days): void
    {
        $this->fine_days = $fine_days;
    }

}
