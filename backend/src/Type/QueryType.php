<?php

namespace App\Type;

use App\Types;
use GraphQL\Type\Definition\ObjectType;

use App\Models\Entities\Category;
use App\Models\Entities\Price;
use App\Models\Entities\Product;


class QueryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            "name" => "Query",
            "fields" => static fn (): array => [
                "categories" => [
                    "type" => Types::listOf(Types::string()),
                    "description" => "Returns all categories",
                    "resolve" => static fn (): array | false => Category::getAll()
                ],

                "product" => [
                    "type" => Types::product(),
                    "description" => "Returns product by id",
                    "args" => [
                        "id" => Types::nonNull(Types::id())
                    ],
                    "resolve" => static fn ($root, $args): object | null => Product::getById($args['id'])
                ],

                "products" => [
                    "type" => Types::listOf(Types::product()),
                    "description" => "Returns products selection by category",
                    "args" => [
                        "category" => Types::nonNull(Types::string())
                    ],
                    "resolve" => static fn ($root, $args) => Product::getAllByCategory($args["category"]) 
                ]
            ]
        ];

        parent::__construct($config);
    }
}
