<?php


namespace Bradesco\Models;

class Fine extends Model
{
    private $amount;
    private $percentage;
    private $fine_days;

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @param mixed $percentage
     */
    public function setPercentage($percentage): void
    {
        $this->percentage = $percentage;
    }

    /**
     * @return mixed
     */
    public function getFineDays()
    {
        return $this->fine_days;
    }

    /**
     * @param mixed $fine_days
     */
    public function setFineDays($fine_days): void
    {
        $this->fine_days = $fine_days;
    }

}
