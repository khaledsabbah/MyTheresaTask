<?php


namespace App\Entities;


use App\Contracts\IEntity;

class PriceEntity implements IEntity
{
    /**
     * @var float
     */
    protected $original;

    /**
     * @var integer
     */
    protected $discountPercentage;

    /**
     * @var float
     */
    protected $final;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @return float
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * @param float $original
     */
    public function setOriginal(float $original): void
    {
        $this->original = $original;
        $this->setFinal($original);
    }

    /**
     * @return int
     */
    public function getDiscountPercentage()
    {
        return $this->discountPercentage;
    }

    /**
     * @param int $discountPercentage
     */
    public function setDiscountPercentage(int $discountPercentage): void
    {
        $this->discountPercentage = $discountPercentage;
        $this->computeFinalPrice();
    }

    /**
     * @return float
     */
    public function getFinal()
    {
        return $this->final;
    }

    /**
     * @param float $final
     */
    public function setFinal(float $final): void
    {
        $this->final = $final;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency="EUR"): void
    {
        $this->currency = $currency;
    }

    public function computeFinalPrice()
    {
        $discount= ($this->getOriginal()*$this->discountPercentage)/100;
        $this->setFinal($this->getOriginal()-$discount);
    }



}
