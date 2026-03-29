<?php

declare(strict_types=1);

namespace Shared\Contracts\Model;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\MappedSuperclass]
abstract class AbstractProduct
{

    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    private readonly Uuid $id;

    public function __construct(
        #[ORM\Column(length: 255)]
        protected string $name,

        #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
        protected string $price,

        #[ORM\Column(length: 12, unique: true)]
        protected string $SKU,

        #[ORM\Column]
        protected int    $quantity,
    ) {
        $this->id = Uuid::v4();
    }

    public function id(): Uuid {
        return $this->id;
    }

    public function name(): string {
        return $this->name;
    }

    public function price(): string {
        return $this->price;
    }

    public function quantity(): int {
        return $this->quantity;
    }

    public function SKU(): string {
        return $this->SKU;
    }

}
