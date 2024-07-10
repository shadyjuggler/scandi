<?php

namespace App\Type;

use App\Types;
use GraphQL\Type\Definition\ObjectType;


use App\Models\Entities\Order;


class MutationType extends ObjectType
{
    public function __construct()
    {
        $config = [
            "name" => "Mutation",
            "fields" => static fn (): array => [
                "addOrder" => [
                    "type" => Types::boolean(),
                    "args" => [
                        "order" => Types::order()
                    ],
                    "resolve" => static fn ($rootValue, $args) => Order::addOrder($args["order"])
                ]
            ]
        ];

        parent::__construct($config);
    }
}
