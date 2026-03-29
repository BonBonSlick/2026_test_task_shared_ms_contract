<?php

declare(strict_types=1);

namespace Shared\Contracts\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final readonly class ProductQuantityDecreased
{

    public function __construct(
        #[Assert\Uuid]
        public string $productID,
        #[Assert\GreaterThan(0)]
        public int    $quantity,
    ) {}

}
