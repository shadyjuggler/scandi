<?php

declare(strict_types=1);

namespace App\Type;

use GraphQL\Type\Definition\ObjectType;
use App\Types;

use App\Models\DB;

class PriceType extends ObjectType
{
    public function __construct()
    {
        $config = [
            "name" => "Price",
            "description" => "Price type",
            "fields" => static fn (): array => [
                "amount" => Types::float(),
                "currency" => [
                    "type" => Types::currency(),
                    "description" => "Product price currency",
                    "resolve" => static fn ($price) => ["label" => $price->label, "symbol" => $price->symbol]
                ]
            ]
        ];
        parent::__construct($config);
    }
}
