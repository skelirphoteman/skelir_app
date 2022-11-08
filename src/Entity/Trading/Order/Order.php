<?php


namespace App\Entity\Trading\Order;


use App\Entity\Utils\TemporalyEntity;
use App\Repository\Trading\Order\OrderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: OrderRepository::class)]
#[Table(name: "trade_order")]
class Order extends TemporalyEntity
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;


    #[Column(type: Types::STRING)]
    private string $crypto;

    #[Column(type: Types::FLOAT)]
    private float $fee;

    #[Column(type: Types::FLOAT)]
    private float $buy;

    #[Column(type: Types::FLOAT, nullable: true)]
    private float $sell;


    /**
     * @return int
     */
    public function getId() : ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCrypto() : string
    {
        return $this->crypto;
    }

    /**
     * @param string $crypto
     */
    public function setCrypto($crypto): Order
    {
        $this->crypto = $crypto;

        return $this;
    }

    /**
     * @return float
     */
    public function getFee() : float
    {
        return $this->fee;
    }

    /**
     * @param float $fee
     * @return Order
     */
    public function setFee(float $fee): Order
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * @return float
     */
    public function getFloat()
    {
        return $this->buy;
    }

    /**
     */
    public function getBuy(): float
    {
        return $this->buy;
    }

    /**
     * @param float $buy
     */
    public function setBuy(float $buy): void
    {
        $this->buy = $buy;
    }

    /**
     * @return mixed
     */
    public function getSell()
    {
        return $this->sell;
    }

    /**
     * @param mixed $sell
     */
    public function setSell(float $sell): void
    {
        $this->sell = $sell;
    }
}