<?php


namespace Bradesco\Models;


class Discount extends Model
{
    private float $amount;
    private string $limit_date;
    private int $percentage;

    protected array $mandatory = [
        'amount',
        'limit_date',
        'percentage'
    ];

    protected array $attribute_scalable = [
        'amount' => 17,
        'limit_date' => 10,
        'percentage' => 8
    ];

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    public function getLimitDate(): string
    {
        return $this->limit_date;
    }

    public function setLimitDate($limit_date): void
    {
        $this->limit_date = $limit_date;
    }

    public function getPercentage(): int
    {
        return $this->percentage;
    }

    public function setPercentage($percentage): void
    {
        $this->percentage = $percentage;
    }

}
