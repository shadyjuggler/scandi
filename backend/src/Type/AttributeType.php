<?php

namespace App\Type;

use App\Types;
use GraphQL\Type\Definition\ObjectType;

use Exception;

class AttributeType extends ObjectType
{
    public function __construct()
    {
        $config = [
            "name" => "Attribute",
            "description" => "Attribute Type",
            "fields" => [
                "display_value" => Types::string(),
                "value" => Types::string(),
                "id" => Types::string()
            ]
        ];

        parent::__construct($config);
    }
}
