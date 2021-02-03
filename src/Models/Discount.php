<?php


namespace Bradesco\Models;


class Discount extends Model
{
    private float $amount;
    private string $limit_date;
    private int $percentage;

    /**
     * @return mixed
     */
    public function getAmount(): float
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
    public function getLimitDate(): string
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
    public function getPercentage(): int
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
