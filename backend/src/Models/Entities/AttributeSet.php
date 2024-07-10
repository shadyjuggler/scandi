<?php

declare(strict_types=1);

namespace App\Models\Entities;

use App\Models\Model;

use App\Models\DB;

abstract class AttributeSet extends Model
{

    // Table
    protected static $table = "attributes";

    // Columns
    protected static $id = "id";
    protected static $productId = "product_id";
    protected static $name = "name";
    protected static $type = "type";


    public static function getAll()
    {
        return DB::query(self::$table, "*")->fetchAll();
    }

    public static function getById(string | int $id)
    {
        $where = DB::where(self::$id, $id);

        return DB::query(self::$table, "*", $where)->fetch();
    }


    public static function getAllByType(string $type)
    {
        $where = DB::where(self::$type, $type);

        return DB::query(self::$table, "*", $where)->fetchAll();
    }


    public static function getAllByProductId(string $productId)
    {
        $where = DB::where(self::$productId, $productId);

        return DB::query(self::$table, "*", $where)->fetchAll();
    }
}
