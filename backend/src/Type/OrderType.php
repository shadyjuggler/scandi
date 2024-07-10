<?php

namespace App\Type;

use App\Types;
use GraphQL\Type\Definition\InputObjectType;


use App\Models\Entities\Category;
use App\Models\Entities\Price;
use App\Models\Entities\Product;


class OrderType extends InputObjectType
{
    public function __construct()
    {
        $config = [
            "name" => "Order",
            "fields" => static fn (): array => [
                "total_price" => Types::float(),
                "total_items" => Types::int(),
                "items_data" => Types::string()
            ]
        ];

        parent::__construct($config);
    }
}
