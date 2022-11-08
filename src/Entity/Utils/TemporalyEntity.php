<?php


namespace App\Entity\Utils;


use Doctrine\ORM\Mapping\Column;
use Doctrine\DBAL\Types\Types;

abstract class TemporalyEntity
{
    #[Column(name: 'created_at', type: Types::DATE_IMMUTABLE)]
    private \DateTime $created_at;

    public function __construct(

    ){
        $this->created_at   = new \DateTime('now');
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreatedAt(\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }


}