<?php

declare(strict_types=1);

namespace App\Type;

use GraphQL\Type\Definition\ObjectType;
use App\Types;

use App\Models\Entities\Gallery;
use App\Models\Entities\Price;
use App\Models\Entities\AttributeSet;

class ProductType extends ObjectType
{
    public function __construct()
    {
        $config = [
            "name" => "Product",
            "description" => "Product type",
            "fields" => static fn (): array => [
                "id" => Types::id(),
                "name" => Types::string(),
                "category_id" => Types::id(),
                "in_stock" => Types::boolean(),
                "description" => Types::string(),
                "brand" => Types::string(),
                "thumbnail" => [ 
                    "type" => Types::string(),
                    "resolve" => static fn ($product) => Gallery::getOneUrlByProductId($product->id) 
                ],
                "gallery" => [ 
                    "type" => Types::listOf(Types::string()),
                    "resolve" => static fn ($product) => Gallery::getUrlsByProductId($product->id) 
                ],
                "attributes" => [
                    "type" => Types::listOf(Types::attributeSet()),
                    "description" => "Product attributes set",
                    "resolve" => static fn ($product) => AttributeSet::getAllByProductId($product->id)
                ],
                "price" => [
                    "type" => Types::price(),
                    "description" => "Product price data",
                    "resolve" => static fn ($product) => Price::getByProductId($product->id)
                ]
            ]
        ];
        parent::__construct($config);
    }
}
