<?php

declare(strict_types=1);

namespace App\Models\Entities;

use App\Models\Model;
use App\Models\DB;

abstract class AttributeItems extends Model
{

    // Table
    protected static $table = "attribute_items";

    // Columns
    protected static $id = "id";
    protected static $attributeSetId = "attribute_id";
    protected static $displayValue = "display_value";
    protected static $value = "value";


    public static function getAll()
    {
        return DB::query(self::$table, "*")
            ->fetchAll();
    }

    public static function getById(string | int $id)
    {
        $where = DB::where(self::$id, $id);

        return DB::query(self::$table, "*", $where)
            ->fetch();
    }


    public static function getAllByAttrSetId(string $attrSetId)
    {
        $where = DB::where(self::$attributeSetId, $attrSetId);

        return DB::query(self::$table, "*", $where)
            ->fetchAll();
    }
}
