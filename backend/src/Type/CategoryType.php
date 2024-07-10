<?php

namespace App\Type;

use App\Types;
use GraphQL\Type\Definition\ObjectType;

use App\Models\Category\Category;

class CategoryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            "description" => "Category type",
            "fields" => function (): array {
                return [
                    "id" => Types::string()
                ];
            }
        ];

        parent::__construct($config);
    }
}
