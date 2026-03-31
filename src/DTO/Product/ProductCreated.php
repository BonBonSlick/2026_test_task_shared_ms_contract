<?php

declare(strict_types=1);

namespace Shared\Contracts\DTO\Product;

use Symfony\Component\Validator\Constraints as Assert;

final readonly class ProductCreated
{

    public function __construct(
        #[Assert\Uuid]
        public string $id,

        #[Assert\Length(
            min: 2,
            max: 50,
        )]
        public string $name,

        #[Assert\Length(
            min: 2,
            max: 12,
        )]
        public string $sku,

        #[Assert\PositiveOrZero]
        public string $price,

        #[Assert\PositiveOrZero]
        public int    $quantity,
    ) {}

}
