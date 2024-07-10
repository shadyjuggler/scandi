<?php

namespace App\Type;

use App\Types;
use GraphQL\Type\Definition\ObjectType;

use App\Models\Entities\AttributeItems;

class AttributeSetType extends ObjectType
{
    public function __construct()
    {
        $config = [
            "name" => "AttributeSet",
            "description" => "Attribute set type",
            "fields" => function (): array {
                return [
                    "id" =>  Types::id(),
                    "name" => Types::string(),
                    "type" => Types::string(),
                    "items" => [
                        "type" => Types::listOf(Types::attribute()),
                        "description" => "List of set's attributes",
                        "resolve" => static fn ($attributeSet) => AttributeItems::getAllByAttrSetId($attributeSet->id)
                    ]
                ];
            }
        ];

        parent::__construct($config);
    }
}
