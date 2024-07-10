<?php

namespace App;

use App\Type\QueryType;
use App\Type\MutationType;
use App\Type\AttributeSetType;
use App\Type\AttributeType;
use App\Type\CategoryType;
use App\Type\ProductType;
use App\Type\PriceType;
use App\Type\CurrencyType;
use App\Type\Enum\CategoriesEnum;
use App\Type\OrderType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ScalarType;
use GraphQL\Type\Definition\NonNull;

class Types
{
    private static $query;
    private static $mutation;
    private static $category;
    private static $product;
    private static $attributeSet;
    private static $attribute;
    private static $price;
    private static $currency;
    private static $categoriesEnum;
    private static $order;

    // Root types
    public static function query(): QueryType
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    public static function mutation(): MutationType
    {
        return self::$mutation ?: (self::$mutation = new MutationType());
    }


    // Custom Types
    public static function category(): CategoryType
    {
        return self::$category ?: (self::$category = new CategoryType());
    }

    public static function product(): ProductType
    {
        return self::$product ?: (self::$product = new ProductType());
    }

    public static function attributeSet(): AttributeSetType
    {
        return self::$attributeSet ?: (self::$attributeSet = new AttributeSetType());
    }

    public static function attribute(): AttributeType
    {
        return self::$attribute ?: (self::$attribute = new AttributeType());
    }

    public static function price(): PriceType
    {
        return self::$price ?: (self::$price = new PriceType());
    }

    public static function currency(): CurrencyType
    {
        return self::$currency ?: (self::$currency = new CurrencyType());
    }

    public static function order(): OrderType
    {
        return self::$order ?: (self::$order = new OrderType());
    }


    // Enum

    public static function categoriesEnum(): CategoriesEnum
    {
        return self::$categoriesEnum ?: (self::$categoriesEnum = new CategoriesEnum());
    }


    // Utility types

    public static function id(): ScalarType
    {
        return Type::id();
    }

    public static function string(): ScalarType
    {
        return Type::string();
    }

    public static function int(): ScalarType
    {
        return Type::int();
    }

    public static function float(): ScalarType
    {
        return Type::float();
    }

    public static function boolean(): ScalarType
    {
        return Type::boolean();
    }

    public static function listOf($type)
    {
        return Type::listOf($type);
    }

    public static function nonNull($type)
    {
        return Type::nonNull($type);
    }
}
