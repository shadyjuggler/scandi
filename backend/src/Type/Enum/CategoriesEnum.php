<?php 

declare(strict_types=1);

namespace App\Type\Enum;

use GraphQL\Type\Definition\EnumType;

class CategoriesEnum extends EnumType
{
    public const ALL = 'all';
    public const TECH = 'tech';
    public const CLOTHES = 'clothes';

    public function __construct()
    {
        parent::__construct([
            'name' => 'CategoriesEnum',
            'values' => [
                self::ALL,
                self::TECH,
                self::CLOTHES,
            ],
        ]);
    }
}
