<?php


namespace Bradesco\Models;


class Discount
{
    private $amount;
    private $limit_date;
    private $percentage;

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
    public function getLimitDate()
    {
        return $this->limit_date;
    }

    /**
     * @param mixed $limit_date
     */
    public function setLimitDate($limit_date): void
    {
        $this->limit_date = $limit_date;
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

}
