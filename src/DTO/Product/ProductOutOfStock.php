<?php

declare(strict_types=1);

namespace Shared\Contracts\DTO\Product;

use Symfony\Component\Validator\Constraints as Assert;

final readonly class ProductOutOfStock
{

    public function __construct(
        #[Assert\Uuid]
        public string $productID,
        #[Assert\Uuid]
        public string $orderID,
    ) {}

}
