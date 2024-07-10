<?php

declare(strict_types=1);

namespace App\Type;

use GraphQL\Type\Definition\ObjectType;
use App\Types;

use App\Models\DB;

class CurrencyType extends ObjectType
{
    public function __construct()
    {
        $config = [
            "name" => "Currency",
            "description" => "Currency type",
            "fields" => static fn (): array => [
                "label" => Types::string(),
                "symbol" => Types::string()
            ]
        ];
        parent::__construct($config);
    }
}
